<?php
header('Content-Type: application/json'); // Set the correct response type
$response = ['success' => false, 'message' => '', 'imageUrl' => ''];

// Debugging: Log incoming request method and $_FILES array
error_log("Request Method: " . $_SERVER['REQUEST_METHOD']);
error_log("FILES: " . print_r($_FILES, true));

if (isset($_FILES['file'])) {
    // Check for upload errors
    if ($_FILES['file']['error'] !== UPLOAD_ERR_OK) {
        $response['message'] = "Upload error code: " . $_FILES['file']['error'];
        error_log("File upload error: " . $_FILES['file']['error']);
    } else {
        $targetDir = "uploads/";
        $fileName = uniqid() . '-' . basename($_FILES["file"]["name"]);
        $targetFile = $targetDir . $fileName;

        // Validate file type
        $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
        $allowedTypes = ['jpg', 'jpeg', 'png', 'webp'];

        if (in_array($fileType, $allowedTypes)) {
            // Check if upload directory is writable
            if (is_writable($targetDir)) {
                if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFile)) {
                    $response['success'] = true;
                    $response['imageUrl'] = $targetFile;
                    $response['message'] = "File uploaded successfully.";
                } else {
                    $response['message'] = "Failed to move uploaded file.";
                    error_log("move_uploaded_file failed for: " . $targetFile);
                }
            } else {
                $response['message'] = "Upload directory is not writable.";
                error_log("Directory not writable: " . $targetDir);
            }
        } else {
            $response['message'] = "Invalid file type. Only JPG, JPEG, PNG, and WEBP are allowed.";
            error_log("Invalid file type: " . $fileType);
        }
    }
} else {
    $response['message'] = "No file uploaded.";
    error_log("No file detected in \$_FILES.");
}

// Log response for debugging
error_log("Response: " . json_encode($response));

echo json_encode($response);
?>
