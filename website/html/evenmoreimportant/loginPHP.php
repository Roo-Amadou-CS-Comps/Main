

<!DOCTYPE html>
<html lang="en">

<body>

<h2>Login Form</h2>
<form action="" method="POST">
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" required>
    
    <label for="password">Password:</label>
    <input type="password" id="password" name="password" required>
    
    <input type="submit" value="Login">
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    echo "testing...";

    $url = "http://$username:$password@18.188.93.218/evenmoreimportant/data/secret.html";

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($ch, CURLOPT_NOBODY, true); // We don't need the body

    $response = curl_exec($ch);
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

    curl_close($ch);

    if ($http_code == 200) {
        echo "Success";
        header("Location: $url");
        exit();
    } else {
        echo "Login failed. Please check your username and password.";
    }
}
?>

</body>
</html>


