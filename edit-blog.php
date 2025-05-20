<?php include 'includes/ad-header.php'; ?>

<?php
if (isset($_GET['id'])) {
    $blog_id = intval($_GET['id']);

    // Fetch the existing blog data
    $stmt = $pdo->prepare("SELECT * FROM blog_posts WHERE id = :id");
    $stmt->execute([':id' => $blog_id]);
    $blog = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$blog) {
        echo "Blog not found.";
        exit;
    }

    // Fetch existing FAQs for this blog
    $faqStmt = $pdo->prepare("SELECT * FROM blog_faqs WHERE blog_id = :blog_id");
    $faqStmt->execute([':blog_id' => $blog_id]);
    $existingFaqs = $faqStmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Create an array with IDs as keys for easier reference
    $existingFaqsById = [];
    foreach ($existingFaqs as $faq) {
        $existingFaqsById[$faq['id']] = $faq;
    }
} else {
    echo "Invalid blog ID.";
    exit;
}

// Handle the update form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $meta_title = trim($_POST['meta_title']);
    $meta_description = trim($_POST['meta_description']);
    $canonical_url = trim($_POST['canonical_url']);
    $title = trim($_POST['title']);
    $slug = trim($_POST['slug']);
    $content = trim($_POST['content']);
    $category_id = intval($_POST['category_id']);
    $category_name = trim($_POST['category_name']);
    $tags = trim($_POST['tags']);
    $featured_image = $_FILES['featured_image'];
    $alt = trim($_POST['alt']);
    $noindex = intval($_POST['index_status']);
    $faqs = $_POST['faqs'] ?? [];
    $faq_ids = $_POST['faq_ids'] ?? [];

    // Handle featured image update
    if ($featured_image['error'] === UPLOAD_ERR_OK) {
        $upload_dir = 'uploads/';
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }

        // Delete the old image if exists
        if (!empty($blog['featured_image']) && file_exists($upload_dir . $blog['featured_image'])) {
            unlink($upload_dir . $blog['featured_image']);
        }

        $image_name = uniqid() . '_' . basename($featured_image['name']);
        $upload_file = $upload_dir . $image_name;

        if (move_uploaded_file($featured_image['tmp_name'], $upload_file)) {
            $blog['featured_image'] = $image_name;
        }
    }

    // Start transaction for atomic updates
    $pdo->beginTransaction();

    try {
        // Update blog data
        $stmt = $pdo->prepare("
            UPDATE blog_posts 
            SET meta_title = :meta_title, 
                meta_description = :meta_description, 
                canonical_url = :canonical_url, 
                title = :title, 
                slug = :slug,  
                content = :content, 
                category_id = :category_id, 
                category_name = :category_name, 
                tags = :tags, 
                featured_image = :featured_image, 
                alt = :alt, 
                noindex = :noindex
            WHERE id = :id
        ");

        $stmt->execute([
            ':meta_title' => $meta_title,
            ':meta_description' => $meta_description,
            ':canonical_url' => $canonical_url,
            ':title' => $title,
            ':slug' => $slug,
            ':content' => $content,
            ':category_id' => $category_id,
            ':category_name' => $category_name,
            ':tags' => $tags,
            ':featured_image' => $blog['featured_image'],
            ':alt' => $alt,
            ':noindex' => $noindex,
            ':id' => $blog_id,
        ]);

        // Handle FAQs update
        $existing_faq_ids = array_keys($existingFaqsById);
        $submitted_faq_ids = array_filter($faq_ids); // Remove empty values
        
        // FAQs to delete (existing IDs not in submitted IDs)
        $faqs_to_delete = array_diff($existing_faq_ids, $submitted_faq_ids);
        if (!empty($faqs_to_delete)) {
            $deleteStmt = $pdo->prepare("DELETE FROM blog_faqs WHERE id IN (" . implode(',', array_fill(0, count($faqs_to_delete), '?')) . ")");
            $deleteStmt->execute(array_values($faqs_to_delete));
        }
        
        // Update or insert FAQs
        foreach ($faqs as $index => $faq) {
            $question = trim($faq['question']);
            $answer = trim($faq['answer']);
            
            // Skip if both question and answer are empty
            if (empty($question) && empty($answer)) continue;
            
            $faq_id = !empty($faq_ids[$index]) ? $faq_ids[$index] : null;
            
            if ($faq_id && isset($existingFaqsById[$faq_id])) {
                // Update existing FAQ
                $updateStmt = $pdo->prepare("UPDATE blog_faqs SET question = :question, answer = :answer WHERE id = :id");
                $updateStmt->execute([
                    ':question' => $question,
                    ':answer' => $answer,
                    ':id' => $faq_id
                ]);
            } else {
                // Insert new FAQ
                $insertStmt = $pdo->prepare("INSERT INTO blog_faqs (blog_id, question, answer) VALUES (:blog_id, :question, :answer)");
                $insertStmt->execute([
                    ':blog_id' => $blog_id,
                    ':question' => $question,
                    ':answer' => $answer
                ]);
            }
        }

        $pdo->commit();
        echo "<div class='alert alert-success'>✅ Blog updated successfully!</div>";
        
        // Refresh the FAQs after update
        $faqStmt = $pdo->prepare("SELECT * FROM blog_faqs WHERE blog_id = :blog_id");
        $faqStmt->execute([':blog_id' => $blog_id]);
        $existingFaqs = $faqStmt->fetchAll(PDO::FETCH_ASSOC);
        $existingFaqsById = [];
        foreach ($existingFaqs as $faq) {
            $existingFaqsById[$faq['id']] = $faq;
        }
        
    } catch (PDOException $e) {
        $pdo->rollBack();
        echo "<div class='alert alert-danger'>❌ Error updating blog: " . $e->getMessage() . "</div>";
    }
}
?>

<div class="container pb-4">
    <h2>Edit Blog</h2>
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="title">Meta Title</label>
            <input type="text" name="meta_title" id="title" class="form-control" value="<?= htmlspecialchars($blog['meta_title']) ?>" required>
        </div>
        <div class="form-group">
            <label for="title">Meta Description</label>
            <input type="text" name="meta_description" id="title" class="form-control" value="<?= htmlspecialchars($blog['meta_description']) ?>" required>
        </div>
        <div class="form-group">
            <label for="title">Canonical url</label>
            <input type="text" name="canonical_url" id="title" class="form-control" value="<?= htmlspecialchars($blog['canonical_url']) ?>" required>
        </div>
        <label for="index_status">Index Status</label>
        <select name="index_status" id="index_status" class="form-control">
            <option value="0" <?= $blog['noindex'] == 0 ? 'selected' : '' ?>>Index</option>
            <option value="1" <?= $blog['noindex'] == 1 ? 'selected' : '' ?>>No Index</option>
        </select>

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="<?= htmlspecialchars($blog['title']) ?>" required>
        </div>
        <div class="form-group">
            <label for="title">Slug</label>
            <input type="text" name="slug" id="title" class="form-control" value="<?= htmlspecialchars($blog['slug']) ?>" required>
        </div>
        <div class="form-group">
            <label for="category_id">Category</label>
            <select name="category_id" id="category_id" class="form-control" required>
                <option value="">Select Category</option>
                <?php
                $categories = $pdo->query("SELECT * FROM categories")->fetchAll(PDO::FETCH_ASSOC);
                foreach ($categories as $category) {
                    $selected = $category['id'] == $blog['category_id'] ? 'selected' : '';
                    echo "<option value='{$category['id']}' $selected>{$category['name']}</option>";
                }
                ?>
            </select>
            <input type="hidden" name="category_name" id="category_name" value="<?= htmlspecialchars($blog['category_name']) ?>">
        </div>
        <div class="form-group">
            <label for="content">Content</label>
            <textarea name="content" id="content" class="form-control summernote" required><?= htmlspecialchars($blog['content']) ?></textarea>
        </div>
        <div class="form-group">
            <label for="tags">Tags</label>
            <input type="text" name="tags" id="tags" class="form-control" value="<?= htmlspecialchars($blog['tags']) ?>">
        </div>
        <div class="form-group">
            <label for="featured_image">Featured Image</label>
            <input type="file" name="featured_image" id="featured_image" class="form-control">
            <?php if (!empty($blog['featured_image'])): ?>
                <p>Current Image: <img src="uploads/<?= htmlspecialchars($blog['featured_image']) ?>" alt="Featured Image" class="img-thumbnail" style="max-width: 200px;"></p>
            <?php endif; ?>
        </div>
        <div class="form-group">
            <label for="title">Alt Text</label>
            <input type="text" name="alt" id="alt" class="form-control" value="<?= htmlspecialchars($blog['alt']) ?>" required>
        </div>
        
        <!-- FAQ Section -->
        <div class="form-group">
            <label>FAQs</label>
            <div id="faq-container">
                <?php if (!empty($existingFaqs)): ?>
                    <?php foreach ($existingFaqs as $index => $faq): ?>
                        <div class="faq-item mb-3">
                            <input type="hidden" name="faq_ids[<?= $index ?>]" value="<?= $faq['id'] ?>">
                            <input type="text" name="faqs[<?= $index ?>][question]" class="form-control mb-2" 
                                   value="<?= htmlspecialchars($faq['question']) ?>" placeholder="Enter question" required>
                            <textarea name="faqs[<?= $index ?>][answer]" class="form-control" 
                                      placeholder="Enter answer" required><?= htmlspecialchars($faq['answer']) ?></textarea>
                            <?php if ($index > 0 || count($existingFaqs) > 1): ?>
                                <button type="button" class="btn btn-sm btn-danger remove-faq mt-2">Remove</button>
                            <?php endif; ?>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <div class="faq-item mb-3">
                        <input type="hidden" name="faq_ids[0]" value="">
                        <input type="text" name="faqs[0][question]" class="form-control mb-2" placeholder="Enter question" required>
                        <textarea name="faqs[0][answer]" class="form-control" placeholder="Enter answer" required></textarea>
                    </div>
                <?php endif; ?>
            </div>
            <button type="button" id="add-faq" class="btn btn-secondary">Add FAQ</button>
        </div>

        <button type="submit" class="btn btn-primary mt-2">Update Blog</button>
        <a href="<?php echo BASE_URL; ?>all-blogs" class="btn btn-secondary mt-2">Back</a>
    </form>
</div>

<script>
    // FAQ management script
    document.addEventListener('DOMContentLoaded', function() {
        const faqContainer = document.getElementById('faq-container');
        let faqIndex = <?= !empty($existingFaqs) ? count($existingFaqs) : 1 ?>;
        
        // Add new FAQ
        document.getElementById('add-faq').addEventListener('click', function() {
            const newFaq = document.createElement('div');
            newFaq.classList.add('faq-item', 'mb-3');
            newFaq.innerHTML = `
                <input type="hidden" name="faq_ids[${faqIndex}]" value="">
                <input type="text" name="faqs[${faqIndex}][question]" class="form-control mb-2" placeholder="Enter question" required>
                <textarea name="faqs[${faqIndex}][answer]" class="form-control" placeholder="Enter answer" required></textarea>
                <button type="button" class="btn btn-sm btn-danger remove-faq mt-2">Remove</button>
            `;
            faqContainer.appendChild(newFaq);
            faqIndex++;
        });
        
        // Remove FAQ (event delegation)
        faqContainer.addEventListener('click', function(e) {
            if (e.target.classList.contains('remove-faq')) {
                const faqItem = e.target.closest('.faq-item');
                // Don't allow removing if it's the only FAQ
                if (faqContainer.querySelectorAll('.faq-item').length > 1) {
                    faqItem.remove();
                    // Reindex FAQs to maintain sequential array keys
                    reindexFaqs();
                }
            }
        });
        
        function reindexFaqs() {
            const faqItems = faqContainer.querySelectorAll('.faq-item');
            faqIndex = 0;
            faqItems.forEach((item, index) => {
                const hiddenInput = item.querySelector('input[type="hidden"]');
                const questionInput = item.querySelector('input[type="text"]');
                const answerTextarea = item.querySelector('textarea');
                
                hiddenInput.name = `faq_ids[${index}]`;
                questionInput.name = `faqs[${index}][question]`;
                answerTextarea.name = `faqs[${index}][answer]`;
                
                faqIndex++;
            });
        }
    });
</script>

<?php include 'includes/ad-footer.php'; ?>