<?php
$page_title = 'Saving your Registration...';
require_once ('../view/header.php');

// store the inputs into variables
$user_name = $_POST['user_name'];
$user_email = $_POST['user_email'];
$password = $_POST['password'];
$confirm = $_POST['confirm'];
$ok = true;

// validation
if (empty($user_name)) {
    echo 'Username is required<br />';
    $ok = false;
}

if (empty($user_email)) {
    echo 'Email is required<br />';
    $ok = false;
}

if (empty($password)) {
    echo 'Password is required<br />';
    $ok = false;
}

if ($password != $confirm) {
    echo 'Passwords must match<br />';
    $ok = false;
}

if ($ok) {
    // connect
    require_once ('db.php');

    // set up the sql insert
    $sql = "INSERT INTO profiles (user_name, user-email, password) VALUES (:user_name, :user_email, :password)";

    // hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // fill the params and execute
    $cmd = $conn->prepare($sql);
    $cmd->bindParam(':user_name', $user_name);
    $cmd->bindParam(':user_email', $user_email);
    $cmd->bindParam(':password', $hashed_password);
    $cmd->execute();

    // disconnect
    $conn = null;

    echo 'Your registration was successful.  Click to <a href="login.php">Log In</a>';
}

require_once ('../view/footer.php');
?>
