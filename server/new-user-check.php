
<?php

include_once '../client/config/init.php';

$username = filter_var(trim($_POST['username']),FILTER_SANITIZE_STRING);
$firstname = filter_var(trim($_POST['firstname']),FILTER_SANITIZE_STRING);
$lastname = filter_var(trim($_POST['lastname']),FILTER_SANITIZE_STRING);
$password = filter_var(trim($_POST['password']),FILTER_SANITIZE_STRING);
$password_repeat = filter_var(trim($_POST['password_repeat']),FILTER_SANITIZE_STRING);
$email = filter_var(trim($_POST['email']),FILTER_SANITIZE_STRING);

$user = new User();
$password = md5($password);
$password_repeat = md5($password_repeat);
$result = $user->login($username,$password);

if($password!==$password_repeat){
    $msg='?new_user_message=3';
}
elseif($user->checkEmail($email)){
    $msg='?new_user_message=5';
}
else {
    $msg=$user->createUser($username,$password,$email,$firstname,$lastname);
    $msg = $msg .'&username='.$username;
}


header("Location: ../client/signIN.php".$msg);

