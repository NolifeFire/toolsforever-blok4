<?php

$email = $_POST['email_form'];
$password = $_POST['password_form'];

require 'database.php';

$sql = "SELECT * FROM users WHERE email = '$email'";
$result = mysqli_query($conn, $sql);

$user = mysqli_fetch_assoc($result);

if(is_array($user)){
    if($password == $user['password']){
    session_start();
    $user_id = $user['id'];

    $_SESSION['user_id'] = $user_id;
    $_SESSION['role'] = $user['role'];
    $_SESSION['email'] = $user['email'];

        header("location: dashboard.php");
        exit;
    }
} else {
    
    echo "Email is bij ons onbekend";

    exit;
}