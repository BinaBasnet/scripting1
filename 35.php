<?php
// Initialize variables
$principal = $rate = $time = $interest = 0;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get input values
    $principal = $_POST['principal'];
    $rate = $_POST['rate'];
    $time = $_POST['time'];

    // Calculate Simple Interest
    $interest = ($principal * $rate * $time) / 100;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Simple Interest Calculator</title>
</head>
<body>
    <h1>Simple Interest Calculator</h1>
    <form method="POST">
        <label for="principal">Principal Amount:</label>
        <input type="number" name="principal" id="principal" required><br><br>

        <label for="rate">Rate of Interest (%):</label>
        <input type="number" name="rate" id="rate" step="0.01" required><br><br>

        <label for="time">Time (in years):</label>
        <input type="number" name="time" id="time" required><br><br>

        <button type="submit">Calculate Interest</button>
    </form>

    <?php if ($_SERVER["REQUEST_METHOD"] == "POST"): ?>
        <h2>Result</h2>
        <p>Principal: $<?= number_format($principal, 2) ?></p>
        <p>Rate of Interest: <?= number_format($rate, 2) ?>%</p>
        <p>Time: <?= $time ?> years</p>
        <p><strong>Simple Interest: $<?= number_format($interest, 2) ?></strong></p>
    <?php endif; ?>
</body>
</html>
