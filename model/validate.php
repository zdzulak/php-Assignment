<?php
ob_start();
  require('db.php');
  $user_name = $_POST['user_name'];
  $password = $_POST['password'];

  $sql = "SELECT * FROM profiles WHERE user_name = :user_name;";

  $stmt = $conn->prepare($sql);
  $stmt->bindParam(':user_name', $user_name);
  $stmt->execute();
  $user = $stmt->fetch();

if ($user && password_verify($password, $user['password']))
{

    session_start();

    $_SESSION['user_id'] = $user['user_id'];

    header('location:../view/profiles.php');
}

else {
    echo "invalid";
    exit();
}

  $cmd->closeCursor();


ob_flush();
?>
