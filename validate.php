<?php
// capture form inputs from $_POST array
$username = $_POST['username'];
$password = $_POST['password'];
// connect
require('shared/db.php');

// check if username exists
$sql = "SELECT * FROM players WHERE username = :username";
$cmd = $db->prepare($sql);
$cmd->bindParam(':username', $username, PDO::PARAM_STR, 50);
$cmd->execute();
$user = $cmd->fetch();

if (empty($user)) {
    $db = null;
    header('location:login.php?valid=false');
    exit();
}
else {
    // check if hashed password exists
    if ($password !==  $user['password']) {

        $db = null;
        header('location:login.php?valid=false');
        exit();
    }
    else {
       
        session_start(); // access the current session automatically created on the web server
        $_SESSION['status'] = true;
        $_SESSION['player'] = $username;
        //print_r($_SESSION);exit;
        header('location:home.php');
        $db = null;
    }
}
?>