<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
</head>
<body>
    <h1>User Registration Form</h1>
    <form method="POST">
        <label for="username">Username (min 8 characters):</label>
        <input type="text" name="username" id="username" required><br><br>

        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required><br><br>

        <label for="dob">Date of Birth:</label>
        <input type="date" name="dob" id="dob" required><br><br>

        <label for="phone">Phone Number (10 digits):</label>
        <input type="text" name="phone" id="phone" required><br><br>

        <button type="submit">Register</button>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Retrieve user inputs
        $username = trim($_POST['username']);
        $email = trim($_POST['email']);
        $dob = $_POST['dob'];
        $phone = trim($_POST['phone']);

        // Initialize validation flag and error messages
        $errors = [];

        // Validate username
        if (strlen($username) < 8) {
            $errors[] = "Username must be at least 8 characters long.";
        }

        // Validate email
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = "Invalid email address.";
        }

        // Validate date of birth
        $today = date("Y-m-d");
        if ($dob >= $today) {
            $errors[] = "Date of Birth must be a valid past date.";
        }

        // Validate phone number
        if (!preg_match('/^\d{10}$/', $phone)) {
            $errors[] = "Phone number must be exactly 10 digits.";
        }

        // Display errors or success message
        if (empty($errors)) {
            echo "<p>Registration successful!</p>";
            echo "<ul>
                <li>Username: $username</li>
                <li>Email: $email</li>
                <li>Date of Birth: $dob</li>
                <li>Phone: $phone</li>
            </ul>";
        } else {
            echo "<p>The following errors occurred:</p><ul>";
            foreach ($errors as $error) {
                echo "<li>$error</li>";
            }
            echo "</ul>";
        }
    }
    ?>
</body>
</html>
