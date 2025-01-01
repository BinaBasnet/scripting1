<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Mark Sheet</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 10px;
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Student Mark Sheet</h1>
    <?php
    $students = [
        ["SN" => 1, "Name" => "Rajesh", "Roll" => 25, "WebTechII" => 56, "DBMS" => 89, "Economics" => 57, "DSA" => 64, "Account" => 98],
        ["SN" => 2, "Name" => "Barti", "Roll" => 15, "WebTechII" => 56, "DBMS" => 89, "Economics" => 57, "DSA" => 64, "Account" => 98],
        ["SN" => 3, "Name" => "Sita", "Roll" => 34, "WebTechII" => 24, "DBMS" => 56, "Economics" => 67, "DSA" => 44, "Account" => 43],
    ];

    echo "<table>
        <tr>
            <th>SN</th><th>Name</th><th>Roll</th><th>Web Tech II</th><th>DBMS</th><th>Economics</th><th>DSA</th><th>Account</th><th>Total</th><th>Result</th>
        </tr>";

    foreach ($students as $student) {
        $total = $student['WebTechII'] + $student['DBMS'] + $student['Economics'] + $student['DSA'] + $student['Account'];
        $result = $total >= 250 ? "Pass" : "Fail";
        $rowColor = $result === "Pass" ? "lightgreen" : "lightcoral";

        echo "<tr style='background-color: $rowColor;'>";
        foreach ($student as $key => $value) {
            echo "<td>$value</td>";
        }
        echo "<td>$total</td><td>$result</td></tr>";
    }

    echo "</table>";
    ?>
</body>
</html>
