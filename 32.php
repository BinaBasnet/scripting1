<?php
// Database configuration
$servername = "localhost";
$username = "root";
$password = ""; // Update if you have a MySQL password

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Step 1: Create Database
$db_name = "user_management";
$sql_create_db = "CREATE DATABASE IF NOT EXISTS $db_name";
if ($conn->query($sql_create_db) === TRUE) {
    echo "Database '$db_name' created successfully or already exists.<br>";
} else {
    die("Error creating database: " . $conn->error);
}

// Select the database
$conn->select_db($db_name);

// Step 2: Create Table
$table_name = "users";
$sql_create_table = "CREATE TABLE IF NOT EXISTS $table_name (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    rank INT NOT NULL,
    status VARCHAR(20) NOT NULL,
    image VARCHAR(255),
    created_by VARCHAR(50),
    updated_by VARCHAR(50),
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if ($conn->query($sql_create_table) === TRUE) {
    echo "Table '$table_name' created successfully or already exists.<br>";
} else {
    die("Error creating table: " . $conn->error);
}

// Close connection
$conn->close();
?>
