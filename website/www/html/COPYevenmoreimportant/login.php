<?php
session_start();

$filename = '/var/www/html/evenmoreimportant/data/hashes.txt';

function validate_user($username, $password, $filename) {
    // Open the file and read its contents
    $fp = fopen($filename, 'r');
    if (!$fp) {
        die('Password file not found.');
    }

    // Read each line and check for the username and hashed password
    while (($line = fgets($fp)) !== false) {
        // Each line is in the format: username:hashedpassword
        list($storedUser, $hashedPassword) = explode(':', trim($line), 2);

        // Check if the username matches
        if ($storedUser === $username) {
            // Verify the entered password using crypt() and the stored hash
            $generatedHash = crypt($password, $hashedPassword);
            
            // Debugging output
            echo "Generated Hash: $generatedHash<br>";
            echo "Stored Hash: $hashedPassword<br>";

            if ($generatedHash === $hashedPassword) {
                fclose($fp);
                return true; // Valid username and password
            } else {
                fclose($fp);
                return false; // Invalid password
            }
        }
    }

    fclose($fp);
    return false; // Username not found
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve inputted username and password from form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate username and password
    if (validate_user($username, $password, $filename)) {
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
