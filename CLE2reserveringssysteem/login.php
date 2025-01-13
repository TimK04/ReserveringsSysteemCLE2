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
                $_SESSION['firstName'] = $hash['first_name'];
                $_SESSION['lastName'] = $hash['last_name'];
                $_SESSION['email'] = $hash['email'];
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
    <title>log-in</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/user.css">
</head>
<body>
<?php include_once 'include/nav.php' ?>
<header>
    <h1> Inloggen </h1>
</header>
<main>


    <form action="" method="post">
        <div class="container">
            <label for="email">E-mail</label>
        </div>
        <input id="email" type="email" name="email" value="<?= htmlentities($email ?? '') ?>">
        <p class="error">
            <?= $errors['email'] ?? '' ?>
        </p>
        <div class="container">
            <label for="password">Wachtwoord</label>
        </div>
        <input id="password" type="password" name="password">
        <p class="error">
            <?= $errors['password'] ?? '' ?>
        </p>
        <p class="error">
            <?= $errors['loginFailed'] ?? '' ?>
        </p>
        <div class="buttonStyle">
            <button class="button" type="submit" name="submit">Login</button>
        </div>
        <div class="styleLink">
            <p class="textStyle">
                Nog geen account?
            </p>
            <a href="register.php">Registreren</a>
        </div>

    </form>
</main>
<?php include_once 'include/footer.php' ?>
</body>
</html>
