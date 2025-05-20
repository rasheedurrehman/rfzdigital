<?php include 'includes/ad-header.php'; ?>

<?php

// Function to decode Base64 image and save it to file
function saveBase64Image($base64String, $uploadDir = 'uploads/')
{
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $imageData = explode(',', $base64String);
    if (count($imageData) == 2) {
        $imageExtension = explode('/', explode(';', $imageData[0])[0])[1];
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'webp'];

        if (in_array($imageExtension, $allowedExtensions)) {
            $imageContent = base64_decode($imageData[1]);
            $fileName = uniqid() . '.' . $imageExtension;
            $filePath = $uploadDir . $fileName;

            if (file_put_contents($filePath, $imageContent)) {
                return $filePath;
            }
        }
    }
    return null;
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $meta_title = trim($_POST['meta_title']);
    $meta_description = trim($_POST['meta_description']);
    $canonical_url = trim($_POST['canonical_url']);
    $noindex = ($_POST['index_status'] == 'noindex') ? 1 : 0;
    $title = trim($_POST['title']);
    $content = trim($_POST['content']);
    $category_ids = $_POST['category_id'] ?? [];
    $tags = trim($_POST['tags']);
    $featured_image = $_FILES['featured_image'];
    $alt = trim($_POST['alt']);
    $faqs = $_POST['faqs'] ?? [];
    $uploadOk = 1;
    $message = '';
    $message_class = '';

    // Generate a slug from the blog post title
    $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $title), '-'));

    // Get category names from selected IDs and create comma-separated string
    $category_name = '';
    if (!empty($category_ids)) {
        $stmt = $pdo->prepare("SELECT GROUP_CONCAT(name SEPARATOR ', ') as names FROM categories WHERE id IN (".implode(',', array_fill(0, count($category_ids), '?')).")");
        $stmt->execute($category_ids);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $category_name = $result['names'] ?? '';
    }

    // Handle featured image upload
    if ($featured_image['error'] === UPLOAD_ERR_OK) {
        $upload_dir = 'uploads/';
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }

        $image_name = uniqid() . '_' . basename($featured_image['name']);
        $upload_file = $upload_dir . $image_name;

        if (!move_uploaded_file($featured_image['tmp_name'], $upload_file)) {
            $uploadOk = 0;
            $message = "Failed to upload the featured image.";
            $message_class = "alert-danger";
        }
    } else {
        $image_name = null;
    }

    // Process embedded Base64 images and preserve alt/link attributes
    if (preg_match_all('/<img([^>]+)src="data:image\/[^;]+;base64,([^"]+)"([^>]*)>/i', $content, $matches, PREG_SET_ORDER)) {
        foreach ($matches as $imgTag) {
            $imgAttributesBefore = $imgTag[1];
            $base64Data = $imgTag[2];
            $imgAttributesAfter = $imgTag[3];

            // Extract existing alt attribute if any
            preg_match('/alt="([^"]*)"/i', $imgAttributesBefore . $imgAttributesAfter, $altMatch);
            $altText = isset($altMatch[1]) ? htmlspecialchars($altMatch[1], ENT_QUOTES) : '';

            // Extract link if the image is wrapped inside <a> tag
            preg_match('/<a[^>]+href="([^"]+)"[^>]*>/', $content, $linkMatch);
            $imageLink = isset($linkMatch[1]) ? $linkMatch[1] : '';

            // Save Base64 image
            $savedImagePath = saveBase64Image('data:image/jpeg;base64,' . $base64Data);
            if ($savedImagePath) {
                // Build new image tag with alt text
                $newImageTag = '<img src="' . $savedImagePath . '" alt="' . $altText . '" />';

                // Wrap with link if exists
                if ($imageLink) {
                    $newImageTag = '<a href="' . $imageLink . '" target="_blank">' . $newImageTag . '</a>';
                }

                // Replace old image tag with new one
                $content = str_replace($imgTag[0], $newImageTag, $content);
            }
        }
    }

    // Insert blog post into database
    if ($uploadOk) {
        try {
            $pdo->beginTransaction();

            $stmt = $pdo->prepare("INSERT INTO blog_posts (meta_title, meta_description, canonical_url, title, content, category_id, category_name, tags, featured_image, alt, slug, noindex) VALUES (:meta_title, :meta_description, :canonical_url, :title, :content, :category_id, :category_name, :tags, :featured_image, :alt, :slug, :noindex)");

            // Use first category ID for backward compatibility (or NULL if none selected)
            $first_category_id = !empty($category_ids) ? $category_ids[0] : null;

            $stmt->execute([
                ':meta_title' => $meta_title,
                ':meta_description' => $meta_description,
                ':canonical_url' => $canonical_url,
                ':title' => $title,
                ':content' => $content,
                ':category_id' => $first_category_id,
                ':category_name' => $category_name,
                ':tags' => $tags,
                ':featured_image' => $image_name,
                ':alt' => $alt,
                ':slug' => $slug,
                ':noindex' => $noindex,
            ]);

            $blog_id = $pdo->lastInsertId();

            // Insert FAQs into the database
            if (!empty($faqs)) {
                $faqStmt = $pdo->prepare("INSERT INTO blog_faqs (blog_id, question, answer) VALUES (:blog_id, :question, :answer)");
                foreach ($faqs as $faq) {
                    $faqStmt->execute([
                        ':blog_id' => $blog_id,
                        ':question' => trim($faq['question']),
                        ':answer' => trim($faq['answer']),
                    ]);
                }
            }

            $pdo->commit();
            $message = "Blog post added successfully with FAQs!";
            $message_class = "alert-success";

        } catch (PDOException $e) {
            $pdo->rollBack();
            $message = "Database error: " . $e->getMessage();
            $message_class = "alert-danger";
        }
    }
}
?>





<div class="page-content-wrapper ">



    <div class="container-fluid">



        <div class="row">

            <div class="col-sm-12">

                <div class="page-title-box">

                    <div class="btn-group float-right">

                        <ol class="breadcrumb hide-phone p-0 m-0">

                            <li class="breadcrumb-item"><a href="#">Dashboard</a></li>

                            <li class="breadcrumb-item"><a href="#">RFZ Digital</a></li>

                            <li class="breadcrumb-item active">Add New Blog</li>

                        </ol>

                    </div>

                    <!-- <h4 class="page-title">Validation</h4> -->

                </div>

            </div>

        </div>

        

        <div class="row">



            <div class="col-lg-12">

                <div class="card">

                    <div class="card-body">



                        <h4 class="mt-0 header-title">Add New Blog</h4>

                        <?php if (!empty($message)): ?>

                            <div class="alert <?= $message_class; ?>"><?= $message; ?></div>

                        <?php endif; ?>



                        <form action="<?php echo BASE_URL; ?>add-new-blog" method="POST" enctype="multipart/form-data">


                             <div class="form-group">
                                <label for="meta_title">Meta Title</label>
                                <input type="text" name="meta_title" id="meta_title" class="form-control">
                            </div>
                             <div class="form-group">
                                <label for="meta_description">Meta Description</label>
                                <textarea name="meta_description" id="meta_description" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="canonical_url">Canonical Url</label>
                                <input type="text" name="canonical_url" id="canonical_url" class="form-control">
                            </div>
                            
                            <div class="form-group">
                                <label for="index_status">Index Status</label>
                                <select name="index_status" id="index_status" class="form-control">
                                    <option value="index">Index</option>
                                    <option value="noindex">No-Index</option>
                                </select>
                            </div>

                            <div class="form-group">

                                <label for="title">Post Title</label>

                                <input type="text" name="title" id="title" class="form-control" required placeholder="Enter blog title">

                            </div>



                            <div class="form-group">

                                <label for="category_id">Multiple Select Category</label>

                                <select class="select2 mb-3 select2-multiple form-control" name="category_id[]" id="category_id" style="width: 100%" multiple="multiple" data-placeholder="Choose">
                                                         <?php

                                    $stmt = $pdo->query("SELECT * FROM categories");

                                    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {

                                        echo "<option value='{$row['id']}' data-name='{$row['name']}'>{$row['name']}</option>";

                                    }

                                    ?>
                                
                                                    </select> 
                                                

                                <input type="hidden" name="category_name" id="category_name">

                            </div>



                            <div class="form-group">

                                <label for="content">Post Content</label>

                                <textarea name="content" class="summernote"></textarea>

                            </div>



                            <div class="form-group">

                                <label for="tags">Tags</label>

                                <input type="text" name="tags" id="tags" class="form-control" placeholder="Enter tags separated by commas (e.g., PHP, MySQL, Bootstrap)">

                            </div>



                            <div class="form-group mb-3">

                                <label for="featured_image">Featured Image</label>

                                <input type="file" name="featured_image" id="featured_image" class="form-control" required>

                            </div>
                            <div class="form-group mb-3">

                                <label for="featured_image_alt">Alt text</label>

                                <input type="text" name="alt" id="featured_image_alt" class="form-control" placeholder="Enter alt text for Featured Image" required>

                            </div>



                            <div class="form-group">

                                <label>FAQs</label>

                                <div id="faq-container">

                                    <div class="faq-item">

                                        <input type="text" name="faqs[0][question]" class="form-control mb-2" placeholder="Enter question" required>

                                        <textarea name="faqs[0][answer]" class="form-control mb-3" placeholder="Enter answer" required></textarea>

                                    </div>

                                </div>

                                <button type="button" id="add-faq" class="btn btn-secondary">Add FAQ</button>

                            </div>



                            <div class="form-group mb-0">

                                <button type="submit" class="btn btn-primary waves-effect waves-light">

                                    Submit

                                </button>

                                <button type="reset" class="btn btn-secondary waves-effect m-l-5">

                                    Cancel

                                </button>

                            </div>

                        </form>



                    </div>

                </div>

            </div> 



        </div> 



    </div>



</div> 



<script>

    const categorySelect = document.getElementById('category_id');

    const categoryNameInput = document.getElementById('category_name');



    categorySelect.addEventListener('change', function () {

        const selectedOption = categorySelect.options[categorySelect.selectedIndex];

        categoryNameInput.value = selectedOption.getAttribute('data-name');

    });



    let faqIndex = 1;

    document.getElementById('add-faq').addEventListener('click', function () {

        const faqContainer = document.getElementById('faq-container');

        const newFaq = document.createElement('div');

        newFaq.classList.add('faq-item');

        newFaq.innerHTML = `

            <input type="text" name="faqs[${faqIndex}][question]" class="form-control mb-2" placeholder="Enter question" required>

            <textarea name="faqs[${faqIndex}][answer]" class="form-control mb-3" placeholder="Enter answer" required></textarea>

        `;

        faqContainer.appendChild(newFaq);

        faqIndex++;

    });

</script>



<?php include 'includes/ad-footer.php'; ?>

