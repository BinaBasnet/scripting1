<?php
// Initialize variables
$income = $tax = 0;
$gender = $marital_status = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form inputs
    $income = $_POST['income'];
    $gender = $_POST['gender'];
    $marital_status = $_POST['marital_status'];

    // Tax calculation logic
    if ($marital_status == "married") {
        if ($income <= 450000) {
            $tax = $income * 0.01;
        } elseif ($income <= 550000) {
            $tax = 4500 + ($income - 450000) * 0.10;
        } elseif ($income <= 750000) {
            $tax = 4500 + 10000 + ($income - 550000) * 0.20;
        } elseif ($income <= 1300000) {
            $tax = 4500 + 10000 + 40000 + ($income - 750000) * 0.30;
        } else {
            $tax = 4500 + 10000 + 40000 + 165000 + ($income - 1300000) * 0.35;
        }
    } else { // Unmarried
        if ($income <= 400000) {
            $tax = $income * 0.01;
        } elseif ($income <= 500000) {
            $tax = 4000 + ($income - 400000) * 0.10;
        } elseif ($income <= 750000) {
            $tax = 4000 + 10000 + ($income - 500000) * 0.20;
        } elseif ($income <= 1300000) {
            $tax = 4000 + 10000 + 50000 + ($income - 750000) * 0.30;
        } else {
            $tax = 4000 + 10000 + 50000 + 165000 + ($income - 1300000) * 0.35;
        }
    }

    // Apply discount for females
    if ($gender == "female") {
        $tax = $tax * 0.90; // 10% discount
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Tax Calculator</title>
</head>
<body>
    <h1>Tax Calculator</h1>
    <form method="POST">
        <label for="income">Annual Income:</label>
        <input type="number" name="income" id="income" required><br><br>

        <label for="gender">Gender:</label>
        <select name="gender" id="gender" required>
            <option value="male">Male</option>
            <option value="female">Female</option>
        </select><br><br>

        <label for="marital_status">Marital Status:</label>
        <select name="marital_status" id="marital_status" required>
            <option value="married">Married</option>
            <option value="unmarried">Unmarried</option>
        </select><br><br>

        <button type="submit">Calculate Tax</button>
    </form>

    <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
        <h2>Result</h2>
        <p>Annual Income: Rs. <?= number_format($income, 2) ?></p>
        <p>Gender: <?= ucfirst($gender) ?></p>
        <p>Marital Status: <?= ucfirst($marital_status) ?></p>
        <p><strong>Calculated Tax: Rs. <?= number_format($tax, 2) ?></strong></p>
    <?php endif; ?>
</body>
</html>
