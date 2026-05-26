<?php

require 'database.php';

if (isset($_POST['firstname']) && !empty($_POST['firstname'])) {
    $firstname = $_POST['firstname'];

    if (strlen($firstname) > 100) {
        $melding = urldecode('De voornaam mag maximaal 100 karakters lang zijn');
        exit;
    }
} else {
    echo 'firstname is empty';
    die();
}

if (isset($_POST['lastname'])) {
    if (strlen($_POST['lastname']) > 200) {
        $melding = 'De achternaam mag maximaal 200 karakters zijn';
    }
} else {
    $melding = 'De achternaam mag niet leeg zijn';
}

if (!empty($melding)) {
    header("location: create_user.php?melding=$melding");
    exit();
}

$lastname = $_POST['lastname'];
$email = $_POST['email'];
$password = $_POST['password'];
$address = $_POST['address'];
$city = $_POST['city'];
$role = $_POST['role'];

$query = "INSERT INTO users(firstname, lastname, email, password, role, address, city) VALUES ('$firstname', '$lastname', '$email', '$password', '$role', '$address, '$city')";
echo $query;
$result = mysqli_query($conn, $query);

if($result){
    echo 'De user is opgeslagen';
} else {
    echo 'Er is iets heleemaal misgegaan';
}