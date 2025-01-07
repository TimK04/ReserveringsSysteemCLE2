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
        echo 'geen errors';

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
    <input id="email" type="email" name="email" value="">
    <p>
        <?= $errors['email'] ?? '' ?>
    </p>
    <label for="password">Wachtwoord</label>
    <input id="password" type="password" name="password">
    <p>
        <?= $errors['password'] ?? '' ?>
    </p>
    <button type="submit" name="submit">Login</button>
</form>
</body>
</html>
