<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $loginUsername = $_POST['loginUsername'];
    $loginPassword = $_POST['loginPassword'];

    // Read existing user data from userdata.txt
    $users = file('/var/www/html/userdata.txt', FILE_IGNORE_NEW_LINES);
    $foundUser = false;

    foreach ($users as $i => $user) {
        list($username, $password, $phone, $key) = explode(',', $user);
        if ($loginUsername === $username && $loginPassword === $password) {
            // User already exists, update the key to "vip"
            $users[$i] = "$username,$password,$phone,vip";
            $foundUser = true;
            break;
        }
    }

    if (!$foundUser) {
        // User does not exist, add a new entry with the rank "vip"
        $users[] = "$loginUsername,$loginPassword,$phone,vip";
    }

    // Write the updated data back to userdata.txt
    file_put_contents('userdata.txt', implode("\n", $users) . "\n");

    echo "Welcome, $loginUsername!";
}
?>
