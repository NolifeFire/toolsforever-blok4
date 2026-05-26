<?php
require 'session_check.php';
require 'database.php';

$user_id = $_SESSION['user_id'];

$sql = "SELECT users.firstname, users.lastname, users.email,
               user_settings.backgroundColor, user_settings.font
        FROM users
            JOIN user_settings
                ON users.id = user_settings.user_id
        WHERE users.id = $user_id";

$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>Mijn profiel</title>
</head>
<body>
    <h1>Welkom, <?php echo $user['firstname']; ?>!</h1>

    <h2>Mijn gegevens</h2>
    <p>Naam: <?php echo $user['firstname'] . ' ' . $user['lastname']; ?></p>
    <p>Email: <?php echo $user['email']; ?></p>

    <h2>Mijn instellingen</h2>
    <p>Thema: <?php echo $user['backgroundColor']; ?></p>
    <p>Taal: <?php echo $user['font']; ?></p>
</body>
</html>