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
        <a href="">Over Auniek</a>
        <a href="">Portfolio</a>
        <a href="reservering.php">Intake</a>
        <a href="">Werkwijzen</a>
        <a href="">Blog</a>
        <a href="">Contact</a>
    </div>
    <a class="login" href="login.php"><img src="images/inlog.png" alt="Profiel"></a>
</nav>
<header>
    <h1>Intake gesprek inplannen:</h1>
    <p class="important">15 min intake gesprek</p>
</header>
<main>
    <form class="intake" action="">
        <div>
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
<footer>
    <div class="nav_img">
        <img src="images/logo.png" alt="logo Auniek Interieur">
    </div>
    <div class="information">
        <p class="underlined">Informatie</p>
        <a href="">Algemene voorwaarden</a>
        <a href="">Privacy policy</a>
    </div>
    <div class="contact">
        <p class="underlined">Contact</p>
        <p>Tel: 06-48729036</p>
        <p>Email: info@auniekinterieurs.nl</p>
        <div>
            <a href="https://nl.pinterest.com/auniekinterieurs/"><img src="images/pinterest.png" alt="Pinterest"></a>
            <a href="https://www.instagram.com/auniek_interieurs/profilecard/?igsh=czk1ODl0bzF1OTl2"><img
                        src="images/instagram.png" alt="Instagram"></a>
        </div>
    </div>
    <div class="categorieën">
        <p class="underlined">Categorieën</p>
        <a href="index.php">Home</a>
        <a href="">Over Auniek</a>
        <a href="">Portfolio</a>
        <a href="reservering.php">Intake</a>
        <a href="">Werkwijzen</a>
        <a href="">Blog</a>
        <a href="">Contact</a>
    </div>
</footer>
</body>
</html>