<?php
/** @var mysqli $db */

/*
open database
if submit check if its written!
if not dont let them continue
if it is sumbited then check if its makes sense with email
oke!


 */
require_once 'include/database.php';
session_start();

$login = false;

$email = mysqli_escape_string($db, $_POST['email'] ?? '');

if (isset($_POST['submit'])) {

    $email = mysqli_escape_string($db, $_POST['email']);
    $password = mysqli_escape_string($db, $_POST['password']);


    if ($email == '') {
        $errors['email'] = 'Uw email is verplicht';
    }
    if ($password == '') {
        $errors['password'] = 'uw wachtwoord is verplicht';
    }
    if (empty($errors)) {
        $query = "
       SELECT 'email' FROM users WHERE `email` = '$email'
       ";
        $result = mysqli_query($db, $query)
        or die('Error: ' . mysqli_error($db) . 'with query ' . $query);

        if (mysqli_num_rows($result) == 1) {
            $query = "
        SELECT * FROM `users` WHERE `email` = '$email'
        ";
            $result = mysqli_query($db, $query)
            or die('Error: ' . mysqli_error($db) . 'with query ' . $query);
            while ($row = mysqli_fetch_assoc($result)) {
                $hash = $row;
            }


        } else {
            $errors['loginFailed'] = 'Login failed';
        }
        if (empty($errors)) {
            if (password_verify($password, $hash['password']) == true) {
                $_SESSION['Login'] = true;
                header('location: index.php');
                exit();
            } else {
                $errors['loginFailed'] = 'Uw logininformatie in niet correct';
            }
        }
    }
}


mysqli_close($db);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
</head>
<body>
<h1> Inloggen *bedrijf* </h1>
<form action="" method="post">

    <label for="email">E-mail</label>
    <input id="email" type="email" name="email" value="<?= htmlentities($email) ?? '' ?>">
    <p>
        <?= $errors['email'] ?? '' ?>
    </p>
    <label for="password">Wachtwoord</label>
    <input id="password" type="password" name="password">
    <p>
        <?= $errors['password'] ?? '' ?>
    </p>
    <p>
        <?= $errors['loginFailed'] ?? '' ?>
    </p>
    <button type="submit" name="submit">Login</button>
</form>
</body>
</html>
