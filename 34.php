<?php
// Initialize variables
$name = $rollno = $class = "";
$subjects = ['Math', 'Science', 'English', 'Computer', 'Social'];
$marks = [];
$total = 0;
$percentage = 0;
$grade = "";

// Calculate results
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $rollno = $_POST['rollno'];
    $class = $_POST['class'];

    foreach ($subjects as $subject) {
        $marks[$subject] = $_POST[$subject];
        $total += $marks[$subject];
    }

    $percentage = $total / 5; // Average percentage

    // Assign grade based on percentage
    if ($percentage >= 90) {
        $grade = "A+";
    } elseif ($percentage >= 80) {
        $grade = "A";
    } elseif ($percentage >= 70) {
        $grade = "B+";
    } elseif ($percentage >= 60) {
        $grade = "B";
    } elseif ($percentage >= 50) {
        $grade = "C";
    } elseif ($percentage >= 40) {
        $grade = "D";
    } else {
        $grade = "F";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Mark Sheet</title>
</head>
<body>
    <h1>Student Mark Sheet</h1>
    <form method="POST">
        Name: <input type="text" name="name" required><br>
        Roll No: <input type="text" name="rollno" required><br>
        Class: <input type="text" name="class" required><br><br>

        <?php foreach ($subjects as $subject): ?>
            <?= $subject ?> Marks: <input type="number" name="<?= $subject ?>" min="0" max="100" required><br>
        <?php endforeach; ?>

        <br><button type="submit">Generate Mark Sheet</button>
    </form>

    <?php if ($_SERVER['REQUEST_METHOD'] == 'POST'): ?>
        <h2>Mark Sheet</h2>
        <table border="1">
            <tr>
                <th>Name</th>
                <td><?= $name ?></td>
            </tr>
            <tr>
                <th>Roll No</th>
                <td><?= $rollno ?></td>
            </tr>
            <tr>
                <th>Class</th>
                <td><?= $class ?></td>
            </tr>
            <?php foreach ($marks as $subject => $mark): ?>
                <tr>
                    <th><?= $subject ?></th>
                    <td><?= $mark ?></td>
                </tr>
            <?php endforeach; ?>
            <tr>
                <th>Total Marks</th>
                <td><?= $total ?> / 500</td>
            </tr>
            <tr>
                <th>Percentage</th>
                <td><?= number_format($percentage, 2) ?>%</td>
            </tr>
            <tr>
                <th>Grade</th>
                <td><?= $grade ?></td>
            </tr>
        </table>
    <?php endif; ?>
</body>
</html>
