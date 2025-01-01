<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login with Session and Cookie</title>
</head>
<body>
    <h1>Login</h1>
    <form method="POST" action="">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required><br><br>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required><br><br>
        <input type="checkbox" name="remember_me" id="remember_me">
        <label for="remember_me">Remember Me</label><br><br>
        <button type="submit">Login</button>
    </form>

    <?php
    session_start();

    // Dummy login credentials
    $valid_username = "admin";
    $valid_password = "password123";

    // Handle form submission
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $remember_me = isset($_POST['remember_me']);

        if ($username === $valid_username && $password === $valid_password) {
            $_SESSION['username'] = $username; // Store in session

            // Set a cookie if "Remember Me" is checked
            if ($remember_me) {
                setcookie('username', $username, time() + (86400 * 30), "/"); // 30 days
                echo "<p>Cookie set for user: $username</p>";
            }

            echo "<p>Login successful! Welcome, $username.</p>";
        } else {
            echo "<p>Invalid username or password.</p>";
        }
    }

    // Display message if user has logged in before using the cookie
    if (isset($_COOKIE['username']) && !isset($_SESSION['username'])) {
        echo "<p>Welcome back, " . $_COOKIE['username'] . " (from cookie)!</p>";
    }
    ?>
</body>
</html>
