<?php
// Database Connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydb";

// Create Connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check Connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Initialize variables
$id = $name = $rank = $status = $image = $created_by = $updated_by = "";
$isEdit = false;

// Handle Create and Update
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'] ?? null;
    $name = $_POST['name'];
    $rank = $_POST['rank'];
    $status = $_POST['status'];
    $created_by = $_POST['created_by'];
    $updated_by = $_POST['updated_by'];

    // Handle Image Upload
    if (!empty($_FILES['image']['name'])) {
        $image = $_FILES['image']['name'];
        $target = "uploads/" . basename($image);
        move_uploaded_file($_FILES['image']['tmp_name'], $target);
    } else {
        $image = $_POST['existing_image'] ?? null;
    }

    if ($id) {
        // Update Query
        $sql = "UPDATE records SET 
                name='$name', rank='$rank', status='$status', image='$image', 
                updated_by='$updated_by' WHERE id=$id";
    } else {
        // Insert Query
        $sql = "INSERT INTO records (name, rank, status, image, created_by, updated_by) 
                VALUES ('$name', '$rank', '$status', '$image', '$created_by', '$updated_by')";
    }

    if ($conn->query($sql)) {
        header('Location: index.php'); // Redirect to main page
    } else {
        echo "Error: " . $conn->error;
    }
}

// Handle Edit (Prefill Data)
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $result = $conn->query("SELECT * FROM records WHERE id=$id");
    $row = $result->fetch_assoc();

    $name = $row['name'];
    $rank = $row['rank'];
    $status = $row['status'];
    $image = $row['image'];
    $created_by = $row['created_by'];
    $updated_by = $row['updated_by'];

    $isEdit = true;
}

// Handle Delete
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM records WHERE id=$id");
    header('Location: index.php');
}

// Fetch All Records
$result = $conn->query("SELECT * FROM records ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>CRUD Application</title>
    <style>
        body { font-family: Arial, sans-serif; }
        table { width: 100%; border-collapse: collapse; }
        th, td { padding: 8px; text-align: left; border-bottom: 1px solid #ddd; }
        img { width: 50px; height: 50px; }
    </style>
</head>
<body>
    <h2><?= $isEdit ? 'Edit' : 'Add' ?> Record</h2>
    <form method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $id ?>">
        Name: <input type="text" name="name" value="<?= $name ?>" required><br>
        Rank: <input type="number" name="rank" value="<?= $rank ?>" required><br>
        Status:
        <select name="status">
            <option value="active" <?= $status == 'active' ? 'selected' : '' ?>>Active</option>
            <option value="inactive" <?= $status == 'inactive' ? 'selected' : '' ?>>Inactive</option>
        </select><br>
        Image: <input type="file" name="image">
        <?php if ($image): ?>
            <img src="uploads/<?= $image ?>" alt="Image">
            <input type="hidden" name="existing_image" value="<?= $image ?>">
        <?php endif; ?><br>
        Created By: <input type="text" name="created_by" value="<?= $created_by ?>" <?= $isEdit ? 'readonly' : '' ?> required><br>
        Updated By: <input type="text" name="updated_by" value="<?= $updated_by ?>" required><br>
        <button type="submit"><?= $isEdit ? 'Update' : 'Save' ?></button>
    </form>

    <h2>Records</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Rank</th>
            <th>Status</th>
            <th>Image</th>
            <th>Created By</th>
            <th>Updated By</th>
            <th>Actions</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td><?= $row['id'] ?></td>
            <td><?= $row['name'] ?></td>
            <td><?= $row['rank'] ?></td>
            <td><?= $row['status'] ?></td>
            <td><img src="uploads/<?= $row['image'] ?>" alt="Image"></td>
            <td><?= $row['created_by'] ?></td>
            <td><?= $row['updated_by'] ?></td>
            <td>
                <a href="?edit=<?= $row['id'] ?>">Edit</a> |
                <a href="?delete=<?= $row['id'] ?>" onclick="return confirm('Are you sure?')">Delete</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
