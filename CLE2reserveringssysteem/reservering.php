<?php
/** @var mysqli $db */
session_start();
if ($_SESSION['login'] == true) {

    $firstName = mysqli_escape_string($db, $_SESSION['firstName']);
    $lastName = mysqli_escape_string($db, $_SESSION['lastName']);
    $email = mysqli_escape_string($db, $_SESSION['email']);
}


if (isset($_POST['submit'])) {
    /** @var mysqli $db */
    require_once 'include/database.php';

    $firstName = mysqli_escape_string($db, $_POST['first_name']);
    $lastName = mysqli_escape_string($db, $_POST['last_name']);
    $email = mysqli_escape_string($db, $_POST['email']);
    $needs = mysqli_escape_string($db, $_POST['needs']);

    if ($firstName === '') {
        $errors['first_name'] = 'Voornaam mag niet leeg zijn';
    }
    if ($lastName === '') {
        $errors['last_name'] = 'Achternaam mag niet leeg zijn';
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Email invoer is niet correct';
    }
    if ($email === '') {
        $errors['email'] = 'Email mag niet leeg zijn';
    }
    if ($needs === '') {
        $errors['needs'] = 'Dit veld mag niet leeg zijn';
    }

    if (empty($errors)) {
        $query = "INSERT INTO reservations(first_name, last_name, email, text) 
        VALUES ('$firstName','$lastName','$email','$needs')";

        $result = mysqli_query($db, $query);

        if ($result) {
            $succes = "Bedankt voor het inplannen! We nemen zo snel mogelijk contact met je op.";
        }
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/intake.css">
    <title>Auniek Interieur - Intake</title>
</head>
<body>
<?php require_once 'include/nav.php' ?>
<header>
    <h1>Intake gesprek inplannen:</h1>
    <p class="important">15 min intake gesprek</p>
</header>
<main>
    <form class="intake" action="" method="post">
        <div class="calender">
            <div>
                <h2>Kies een datum</h2>
            </div>
            <p>insert calendar</p>
        </div>
        <div class="column">
            <label for="first_name">Voornaam:</label>
            <input type="text" id="first_name" name="first_name" value="<?= htmlentities($firstName ?? '') ?>">
            <p class="error"> <?= $errors['first_name'] ?? '' ?> </p>

            <label for="last_name">Achternaam:</label>
            <input type="text" id="last_name" name="last_name" value="<?= htmlentities($lastName ?? '') ?>">
            <p class="error"> <?= $errors['last_name'] ?? '' ?> </p>

            <label for="email">Emailadres:</label>
            <input type="text" id="email" name="email" value="<?= htmlentities($email ?? '') ?>">
            <p class="error"> <?= $errors['email'] ?? '' ?> </p>

            <label for="needs">Wat verwacht je van ons:</label>
            <textarea name="needs" id="needs" cols="30" rows="10"
            ><?= htmlentities($needs ?? '') ?></textarea>
            <p class="error"> <?= $errors['needs'] ?? '' ?> </p>

            <button class="button" type="submit" name="submit">Inplannen</button>
            <div class="succesStyle">
                <p class="succes"> <?= $succes ?? '' ?> </p>
            </div>
        </div>
    </form>
</main>
<?php require_once 'include/footer.php' ?>
</body>
</html>