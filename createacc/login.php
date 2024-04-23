<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $loginUsername = $_POST['loginUsername'];
    $loginPassword = $_POST['loginPassword'];

    // Read user data from userdata.txt
    $users = file('/var/www/html/userdata.txt', FILE_IGNORE_NEW_LINES);
    foreach ($users as $user) {
        list($username, $password, $phone) = explode(',', $user);
        if ($loginUsername === $username && $loginPassword === $password) {
            // Successful login
            echo "Welcome, $username!";
            // You can redirect to a dashboard or other pages here
            exit;
        }
    }

    // Invalid credentials
    echo "Invalid username or password.";
}
?>
