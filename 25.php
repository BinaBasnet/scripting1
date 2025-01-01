<?php
$info = [
    'name' => 'Ram Bahadur',
    'address' => 'Lalitpur',
    'email' => 'info@ram.com',
    'phone' => '98454545',
    'website' => 'www.ram.com'
];

echo "<table border='1'>";
echo "<tr><th>Name</th><td>" . $info['name'] . "</td></tr>";
echo "<tr><th>Address</th><td>" . $info['address'] . "</td></tr>";
echo "<tr><th>Email</th><td>" . $info['email'] . "</td></tr>";
echo "<tr><th>Phone</th><td>" . $info['phone'] . "</td></tr>";
echo "<tr><th>Website</th><td>" . $info['website'] . "</td></tr>";
echo "</table>";
?>
