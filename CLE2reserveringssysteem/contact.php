<?php
session_start();

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
    <link rel="stylesheet" href="css/user.css">


    <title>Auniek Interieur - Contact</title>
</head>
<body>
<?php require_once 'include/nav.php' ?>
<header>
    <h1> Contact</h1>
</header>
<main>
    <form class="contactForm" action="" method="post">
        <h2>Formulier</h2>
        <div class="container">
            <label for="firstName">Voornaam</label>
        </div>
        <input id="firstName" type="text" name="firstName">
        <div class="container">
            <label for="lastName">Achternaam</label>
        </div>
        <input id="lastName" type="text" name="lastName">
        <div class="container">
            <label for="email">Email</label>
        </div>
        <input id="email" type="email" name="email">
        <div class="container">
            <label for="contact">Reden van contact</label>
        </div>
        <textarea id="contact" name="contact" cols="30" rows="10"></textarea>
        <div class="buttonStyle">
            <button class="button" type="submit" name="submit">Versturen</button>
        </div>
    </form>
    <div class="contactContainer">
        <h2>Meer vragen? </h2>
        <p>
            Telefoon: 06-48729036
        </p>
        <p>
            E-mail: info@auniekinterieurs.nl
        </p>
        <div>
            <a target="_blank" href="https://nl.pinterest.com/auniekinterieurs/"><img src="images/pinterest.webp"
                                                                                      alt="Pinterest"></a>

            <a target="_blank"
               href="https://www.instagram.com/auniek_interieurs/profilecard/?igsh=czk1ODl0bzF1OTl2"><img
                        src="images/instagram.png" alt="Instagram"></a>
        </div>
    </div>
</main>
<?php require_once 'include/footer.php' ?>
</body>
</html>