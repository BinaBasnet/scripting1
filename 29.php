<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload CV</title>
</head>
<body>
    <h1>Upload CV</h1>
    <form method="POST" enctype="multipart/form-data">
        <input type="file" name="cv" required><br><br>
        <button type="submit">Upload CV</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $file = $_FILES['cv'];
        $allowed_types = ['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'];
        $max_size = 1 * 1024 * 1024; // 1 MB

        if (in_array($file['type'], $allowed_types) && $file['size'] <= $max_size) {
            $upload_dir = 'uploads/';
            if (!is_dir($upload_dir)) mkdir($upload_dir);

            move_uploaded_file($file['tmp_name'], $upload_dir . $file['name']);
            echo "<p>CV uploaded successfully!</p>";
        } else {
            echo "<p>Invalid file type or size. Only PDF and DOCX are allowed (max 1 MB).</p>";
        }
    }
    ?>
</body>
</html>
