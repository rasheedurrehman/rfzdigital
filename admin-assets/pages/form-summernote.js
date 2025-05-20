jQuery(document).ready(function () {

    $('.summernote').summernote({
        height: 300,
        focus: true,
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'italic', 'underline', 'clear']],
            ['fontname', ['fontname']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['table', ['table']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']]
        ],
        popover: {
            image: [
                ['custom', ['editAlt', 'editLink']],
                ['remove', ['removeMedia']]
            ]
        },
        buttons: {
            editAlt: function (context) {
                var ui = $.summernote.ui;
                var button = ui.button({
                    contents: '<i class="note-icon-pencil"/> Alt',
                    tooltip: 'Edit Alt Text',
                    click: function () {
                        var $img = $(context.invoke('restoreTarget'));
                        var altText = prompt("Enter Alt Text:", $img.attr('alt') || '');
                        if (altText !== null) {
                            $img.attr('alt', altText);
                        }
                    }
                });
                return button.render();
            },
            editLink: function (context) {
                var ui = $.summernote.ui;
                var button = ui.button({
                    contents: '<i class="note-icon-link"/> Link',
                    tooltip: 'Add/Edit Image Link',
                    click: function () {
                        var $img = $(context.invoke('restoreTarget'));
                        var linkUrl = prompt("Enter Image Link URL (optional):", $img.parent('a').attr('href') || '');
                        if (linkUrl) {
                            if ($img.parent('a').length) {
                                $img.parent('a').attr('href', linkUrl);
                            } else {
                                $img.wrap('<a href="' + linkUrl + '" target="_blank"></a>');
                            }
                        } else if ($img.parent('a').length) {
                            $img.unwrap(); // Remove link if empty
                        }
                    }
                });
                return button.render();
            }
        },
        callbacks: {
            onImageUpload: function (files) {
                uploadImage(files[0], this);
            },
            onMediaDelete: function(target) {
                console.log('Image deleted:', target[0].src);
            }
        }
    });

    // Upload Image Function
    function uploadImage(file, editor) {
        let data = new FormData();
        data.append("file", file);

        $.ajax({
            url: 'https://rfzdigital.co.uk/blog_content_upload_image',
            method: 'POST',
            data: data,
            contentType: false,
            processData: false,
            success: function (response) {
                try {
                    response = typeof response === "string" ? JSON.parse(response) : response;

                    if (response.success) {
                        const $img = $('<img>').attr('src', response.imageUrl).attr('alt', '');
                        $(editor).summernote('insertNode', $img[0]);
                    } else {
                        alert("Image upload failed: " + response.message);
                    }
                } catch (e) {
                    console.error("JSON parse error:", e);
                    alert("Invalid JSON response from server.");
                }
            },
            error: function (xhr, status, error) {
                console.error("AJAX error:", status, error);
                alert("Error while uploading image.");
            }
        });
    }

});
