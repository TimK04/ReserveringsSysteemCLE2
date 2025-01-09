<?php

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
    <title>Document</title>
</head>
<body>
<?php require_once 'include/nav.php' ?>
<header>
    <h1>Intake gesprek inplannen:</h1>
    <p class="important">15 min intake gesprek</p>
</header>
<main>
    <form class="intake" action="">
        <div class="calender">
            <div>
                <h2>Kies een datum</h2>
            </div>
            <p>insert calendar</p>
        </div>
        <div class="column">
            <label for="first_name">Voornaam:</label>
            <input type="text" id="first_name" name="first_name">
            <label for="last_name">Achternaam:</label>
            <input type="text" id="last_name" name="last_name">
            <label for="email">Emailadres:</label>
            <input type="text" id="email" name="email">
            <label for="needs">Wat verwacht je van ons:</label>
            <textarea name="needs" id="needs" cols="30" rows="10"></textarea>
            <button class="button" type="submit" name="submit">Inplannen</button>
        </div>
    </form>
</main>
<?php require_once 'include/footer.php' ?>
</body>
</html>