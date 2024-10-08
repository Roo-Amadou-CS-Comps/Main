<?php
session_start();

// Simple hardcoded username and password for demonstration
$valid_username = 'admin';
$valid_password = 'salty';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve inputted username and password from form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate username and password
    if ($username === $valid_username && $password === $valid_password) {
        // Set session to mark the user as logged in
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;

        // Redirect to the secret page after successful login
        header('Location: data/secret.php');
        exit();
    } else {
        $error_message = "Invalid username or password!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <?php if (isset($error_message)) { echo "<p style='color:red;'>$error_message</p>"; } ?>
    <form method="post" action="login.php">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br>
        <button type="submit">Login</button>
    </form>
</body>
</html>
