<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $loginUsername = $_POST['loginUsername'];
    $loginPassword = $_POST['loginPassword'];

    // Read user data from userdata.txt
    $users = file('/var/www/html/userdata.txt', FILE_IGNORE_NEW_LINES);
    foreach ($users as $user) {
        list($username, $password, $phone, $key) = explode(',', $user);
        if ($loginUsername === $username && $loginPassword === $password) {
            // Successful sign-in
            if ($key === "vip") {
                // Redirect to VIP accepted page
                header('Location: vip_accepted.html');
                exit;
            } else {
                // Redirect to VIP denied page
                header('Location: vip_denied.html');
                exit;
            }
        }
    }

    // Invalid credentials
    echo "Invalid username or password.";
}
?>
