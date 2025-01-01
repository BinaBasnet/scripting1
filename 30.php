<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile Image Upload</title>
</head>
<body>
    <h1>Upload Profile Image</h1>
    <form method="POST" enctype="multipart/form-data">
        <label for="profile_image">Choose Profile Image:</label>
        <input type="file" name="profile_image" id="profile_image" required><br><br>
        <button type="submit">Upload</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $file = $_FILES['profile_image'];
        $allowed_types = ['image/png', 'image/jpeg'];
        $max_size = 500 * 1024; // 500 KB

        if (in_array($file['type'], $allowed_types) && $file['size'] <= $max_size) {
            $upload_dir = 'uploads/';
            if (!is_dir($upload_dir)) {
                mkdir($upload_dir); // Create the folder if it doesn't exist
            }

            $destination = $upload_dir . basename($file['name']);
            if (move_uploaded_file($file['tmp_name'], $destination)) {
                echo "<p>Profile image uploaded successfully!</p>";
                echo "<img src='$destination' alt='Uploaded Image' style='width:150px; height:auto;'>";
            } else {
                echo "<p>Error uploading the image.</p>";
            }
        } else {
            echo "<p>Invalid file type or size. Only PNG or JPEG files under 500 KB are allowed.</p>";
        }
    }
    ?>
</body>
</html>
