<?php
/** @var mysqli $db */
require_once 'include/database.php';
session_start();
$login = false;

$firstName = mysqli_escape_string($db, $_POST['firstName'] ?? '');
$lastName = mysqli_escape_string($db, $_POST['lastName'] ?? '');
$email = mysqli_escape_string($db, $_POST['email'] ?? '');


if (isset($_POST['submit'])) {


    $firstName = mysqli_escape_string($db, $_POST['firstName']);
    $lastName = mysqli_escape_string($db, $_POST['lastName']);
    $email = mysqli_escape_string($db, $_POST['email']);
    $password = mysqli_escape_string($db, $_POST['password']);


    if ($firstName == '') {
        $errors['firstName'] = 'uw wachtwoord is verplicht';
    }
    if ($lastName == '') {
        $errors['lastName'] = 'uw wachtwoord is verplicht';
    }
    if ($email == '') {
        $errors['email'] = 'Uw email is verplicht';
    }
    if ($password == '') {
        $errors['password'] = 'uw wachtwoord is verplicht';
    }

    $sql = " 
SELECT `email`  FROM users WHERE `email` = '$email'
";
    $result = mysqli_query($db, $sql)
    or die('Error ' . mysqli_error($db) . 'with query ' . $sql);
    if (mysqli_num_rows($result) > 0) {
        $errors['dubbleMail'] = 'dit email is al gebruikt';
    }

    if (empty($errors)) {
        $password = password_hash($password, PASSWORD_DEFAULT);

        $query = "
    INSERT INTO `users`(`first_name`, `last_name`, `email`, `password`)
    VALUES ('$firstName','$lastName','$email', '$password')
    ";
        $result = mysqli_query($db, $query)
        or die('Error ' . mysqli_error($db) . 'with query ' . $query);

        header('location: login.php');
        exit;
    };
}

mysqli_close($db);
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h1>
    Register *bedrijf*
</h1>
<form action="" method="post">
    <label for="firstName">voornaam</label>
    <input id="firstName" type="text" name="firstName" value="<?= htmlentities($firstName) ?? '' ?>">
    <p>
        <?= $errors['lastName'] ?? '' ?>
    </p>
    <label for="lastName">achternaam</label>
    <input id="lastName" type="text" name="lastName" value="<?= htmlentities($lastName) ?? '' ?>">
    <p>
        <?= $errors['firstName'] ?? '' ?>
    </p>
    <label for="email">E-mail</label>
    <input id="email" type="email" name="email" value="<?= htmlentities($email) ?? '' ?>">
    <p>
        <?= $errors['email'] ?? '' ?>
    </p>
    <label for="password">wachtwoord</label>
    <input id="password" type="password" name="password">
    <p>
        <?= $errors['password'] ?? '' ?>
    </p>
    <p>
        <?= $errors['dubbleMail'] ?? '' ?>
    </p>
    <button type="submit" name="submit">Login</button>
</form>
</body>
</html>