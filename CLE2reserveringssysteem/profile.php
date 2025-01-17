<?php
/** @var mysqli $db */
session_start();
require_once 'include/database.php';
$firstName = $_SESSION['firstName'];
$email = $_SESSION['email'];

$query = " 
SELECT * FROM `users` WHERE `email` = '$email'
";
$result = mysqli_query($db, $query)
or die('Error: ' . mysqli_error($db) . 'with query ' . $query);

$users = [];

$row = mysqli_fetch_assoc($result);

$users = $row;

$sql = "
SELECT * FROM `reservations` 
INNER JOIN `users` 
ON reservations.user_id = users.id 
WHERE users.email = '$email'
";

$result = mysqli_query($db, $sql)
or die('Error: ' . mysqli_error($db) . 'with query ' . $sql);

$reservations = mysqli_fetch_assoc($result);
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
    <link rel="stylesheet" href="css/intake.css">
    <title>Auniek Interieur - Profiel</title>
</head>
<body>
<div id="contentnav">
</div>
<script src="include/screensize.js"></script>
<header>
    <h1> Welkom <?= $firstName ?></h1>
</header>
<main>

    <h2>Reservering</h2>
    <h3>Datum</h3>
    <p>
        <?= $reservations['date'] ?>
    </p>

    <h3>Tijd</h3>
    <p>
        <?= $reservations['time'] ?>
    </p>

    <h3>Wat verwacht u van ons</h3>
    <p>
        <?= $reservations['text'] ?>
    </p>


    <h2>Uw gegevens</h2>
    <div>
        <h3>Voornaam:</h3>
        <p>
            <?= $users['first_name'] ?>
        </p>
    </div>
    <div>
        <h3>Achternaam:</h3>
        <p>
            <?= $users['last_name'] ?>
        </p>
    </div>
    <div>
        <h3>Email:</h3>
        <p>
            <?= $users['email'] ?>
        </p>
    </div>

</main>
<div id="contentfooter">
</div>
<script src="include/screensize.js"></script>
</body>
</html>