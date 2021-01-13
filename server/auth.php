<?php
include_once '../client/config/init.php';
$username = filter_var(trim($_POST['username']),FILTER_SANITIZE_STRING);
$password = filter_var(trim($_POST['password']),FILTER_SANITIZE_STRING);

$user = new User;
$password = md5($password);


$result = $user->login($username,$password);


if($result==USER_NOT_FOUND){
    header('Location: ../client/auth.php?alert_msg='.USER_NOT_FOUND);
}
elseif($result==PASSWORD_WRONG){
    header('Location: ../client/auth.php?alert_msg='.PASSWORD_WRONG);
}
elseif($result==LOGIN_OK) {
    session_start();
    $_SESSION['logged'] = 1;
    $_SESSION['username'] = $username;
    if($user->isAdmin($username))
    {
        $_SESSION['role'] = 1;
    }
    header('Location: ../client/index.php');
}
