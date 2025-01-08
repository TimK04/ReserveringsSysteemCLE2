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
    $dubblePassword = mysqli_escape_string($db, $_POST['passwordCheck']);


    if ($firstName == '') {
        $errors['firstName'] = 'uw wachtwoord is verplicht';
    }
    if ($lastName == '') {
        $errors['lastName'] = 'uw wachtwoord is verplicht';
    }
    if ($email == '') {
        $errors['email'] = 'Uw email is verplicht';
    }
    if ($dubblePassword == '') {
        $errors['passwordCheck'] = 'u moet uw wachtwoord opnieuw invullen!';
    }
    if ($password !== $dubblePassword) {
        $errors['dubblePassword'] = 'Uw wachtwoord komt niet overeen!';
    }
    if ($password == '') {
        $errors['password'] = 'uw wachtwoord is verplicht';
    }
    if (empty($_POST['conditions'])) {
        $errors['conditions'] = 'u moet de voorwaardes accepteren!! ';
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
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/user.css">
    <title>Document</title>
</head>
<body>
<nav>
    <div class="nav_img">
        <img src="images/logo.png" alt="logo Auniek Interieur">
    </div>
    <div class="empty"></div>
    <div class="nav_links">
        <a href="index.php">Home</a>
        <a href="overons.php">Over Auniek</a>
        <a href="portfolio.php">Portfolio</a>
        <a href="reservering.php">Intake</a>
        <div class="dropdown">
            <button class="nav_link" href="werkwijzen.php">Werkwijzen</button>
            <div class="dropdown_items">
                <a href="">Bestaande bouw</a>
                <a href="">Nieuw bouw</a>
            </div>
        </div>
        <a href="blog.php">Blog</a>
        <a href="contact.php">Contact</a>
    </div>
    <div class="dropdown">
        <a href=""><img class="logo" src="images/inlog.png" alt="Profiel"></a>
        <div class="dropdown_items">
            <a href="">Profiel</a>
            <a href="">Logout</a>
        </div>
    </div>
</nav>
<header>
    <h1>
        Register
    </h1>
</header>
<main>
    <form action="" method="post">
        <div class="container">
            <label for="firstName">voornaam</label>
        </div>
        <input id="firstName" type="text" name="firstName" value="<?= htmlentities($firstName) ?? '' ?>">
        <p>
            <?= $errors['lastName'] ?? '' ?>
        </p>
        <div class="container">
            <label for="lastName">achternaam</label>
        </div>
        <input id="lastName" type="text" name="lastName" value="<?= htmlentities($lastName) ?? '' ?>">
        <p>
            <?= $errors['firstName'] ?? '' ?>
        </p>
        <div class="container">
            <label for="email">E-mail</label>
        </div>
        <input id="email" type="email" name="email" value="<?= htmlentities($email) ?? '' ?>">
        <p>
            <?= $errors['email'] ?? '' ?>
            <?= $errors['dubbleMail'] ?? '' ?>
        </p>
        <div class="container">
            <label for="password">wachtwoord</label>
        </div>
        <input id="password" type="password" name="password">
        <p>
            <?= $errors['password'] ?? '' ?>
        </p>
        <div class="container">
            <label for="passwordCheck">Herhaal wachtwoord</label>
        </div>
        <input id="passwordCheck" type="password" name="passwordCheck">

        <p>
            <?= $errors['dubblePassword'] ?? '' ?>

            <?= $errors['passwordCheck'] ?? '' ?>
        </p>
        <div class="container">
            <input id="conditions" type="checkbox" name="conditions">

            <label for="conditions">ik accepteer de voorwaardes</label>
        </div>
        <p>
            <?= $errors['conditions'] ?? '' ?>
        </p>

        <button class="button" type="submit" name="submit">registreren</button>
    </form>
</main>
</body>
</html>