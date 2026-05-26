<?php
    $melding = $_GET['melding'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gebruiker aanmaken</title>
</head>

<body>
    <h1>Gebruiker aanmaken</h1>


    <?php
        if (!empty($melding)){
            echo '<p style="color: red">' . $melding .  '</p>';
        }
    ?>
    <form action="create_user_process.php" method="POST">

        <div>
            <label for="firstname">voornaam *</label>
            <input type="text" name="firstname" id="firstname" placeholder="eerste naam" required />
        </div>
        <div>
            <label for="lastname">achternaam</label>
            <input type="text" name="lastname" id="lastname" placeholder="achternaam" />
        </div>
        <div>
            <label for="email">email *</label>
            <input type="text" name="email" id="email" placeholder="name@domain.com" required />
        </div>
        <div>
            <label for="password">password *</label>
            <input type="text" name="password" id="password" placeholder="password" required />
        </div>
        <div>
            <label for="address">address</label>
            <input type="text" name="address" id="address" placeholder="address" />
        </div>
        <div>
            <label for="city">city</label>
            <input type="text" name="city" id="city" placeholder="city" />
        </div>
        <div>
            <label for="role">role*</label>
            <select name="role" id="role">
                <option value="administrator">Admin</option>
                <option value="teacher">Docent</option>
                <option value="student">Leerling</option>
            </select>
        </div>

        <div>
            <button type="submit">sla de gebruiker op</button>
        </div>
    </form>
</body>

</html>