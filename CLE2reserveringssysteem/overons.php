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
    <link rel="stylesheet" href="css/about.css">
    <link rel="stylesheet" href="css/media.css">
    <title>Over Auniek Interieurs</title>
</head>
<body>
<?php if ($t < "20") {
    echo "Have a good day!";
} else {
    echo "Have a good night!";
} ?>
<?php require_once 'include/nav.php' ?>
<header>
    <div>
        <h1>Over Auniek Interieur</h1>
    </div>
</header>
<main>
    <section>
        <div>
            <!-- Aanbeveling om andere foto's te laten maken/gebruiken -->
            <img src="images/potretalyssa.webp" alt="Portret van Alyssa Haaring" class="img_about">
        </div>
        <div>
            <p class="about_par">
                Mijn naam is Alyssa Haaring. Vanaf kleins af aan wist ik al wat ik wilde worden, namelijk
                interieuradviseur.
                Hierbij wist ik vanaf mijn negende al dat ik naar het Hout- en Meubileringscollege in Rotterdam wilde.
                Op mijn 17e was het dan zover: ik ging naar het Hout- en Meubileringscollege in Rotterdam. In 2022 ben
                ik afgestudeerd en mag ik mezelf daarbij gediplomeerd interieuradviseur noemen. Met Auniek Interieurs
                wil ik mijn klanten laten ervaren dat er meer is dan de gangbare kleuren en materialen. Denk hierbij aan
                een visgraadvloer, stalen zwarte deuren en crèmekleurige muren.
            </p>
        </div>
    </section>
</main>
<?php require_once 'include/footer.php' ?>
</body>
</html>