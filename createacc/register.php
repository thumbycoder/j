<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];

    // Validate input (e.g., check if username is unique)

    // Save data to userdata.txt
    $userEntry = "$username,$password,$phone\n";
    file_put_contents('/var/www/html/userdata.txt', $userEntry, FILE_APPEND);

    // Redirect to a success page or login page
    header('Location: login.html');
    exit;
}
?>
