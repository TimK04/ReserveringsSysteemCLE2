<?php
session_start();
$firstName = $_SESSION['firstName']


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

</main>
<div id="contentfooter">
</div>
<script src="include/screensize.js"></script>
</body>
</html>