<?php
function calculate_points($wins, $draws, $losses) {
    return ($wins * 3) + ($draws * 1) + ($losses * 0);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $wins = $_POST['wins'];
    $draws = $_POST['draws'];
    $losses = $_POST['losses'];
    $total_points = calculate_points($wins, $draws, $losses);
    echo "Total Points: " . $total_points;
}
?>

<form method="post">
    Wins: <input type="number" name="wins"><br>
    Draws: <input type="number" name="draws"><br>
    Losses: <input type="number" name="losses"><br>
    <input type="submit" value="Calculate">
</form>
