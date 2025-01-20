<?php

require_once 'include/database.php';
//Maak verbinding met database
/** @var mysqli $db */
session_start();

//Haal alle reviews op
// Query to get reviews
$query = "SELECT * FROM reviews";

// Execute the query and store the result (table in $result)
$result = mysqli_query($db, $query)
or exit('Error ' . mysqli_error($db) . ' with query ' . $query);

// Create an empty array to store all reviews
$reviews = [];

// Loop through all review in the table and store each row in the variable
while ($row = mysqli_fetch_assoc($result)) {
    $reviews[] = $row;
}


//Sla de review op in de database
if (isset($_POST['submit'])) {

    $name = mysqli_escape_string($db, $_POST['name']);
    $experience = mysqli_escape_string($db, $_POST['experience']);
    $rating = mysqli_escape_string($db, $_POST['rating'] ?? '');

    $errors = [];
    if (strlen($name) > 255) {
        $errors['name'] = 'Uw voornaam mag niet meer dan 255 letters';
    }
    if ($name == '') {
        $errors['name'] = 'Uw naam is verplicht';
    }

    if ($experience == '') {
        $errors['experience'] = 'Uw mening is verplicht';
    }
    if ($rating == '') {
        $errors['rating'] = 'Een aantal sterren zijn verplicht om in te vullen!';
    }

    if (empty($errors)) {
        require_once('include/database.php');

        $query = "INSERT INTO reviews(`name`, `content`, `rating`) VALUES ('$name','$experience',$rating)";
        $result = mysqli_query($db, $query)
        or exit('Error ' . mysqli_error($db) . ' with query ' . $query);

        mysqli_close($db);

        header('Location: reviews.php');
        exit;
    };

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
    <link rel="stylesheet" href="css/reviews.css">
    <link rel="stylesheet" href="css/media.css">
    <title>Reviews</title>
</head>
<body>
<div id="contentnav">
</div>
<script src="include/screensize.js"></script>
<header>
    <!-- Algemene sterren moeten hier komen-->
    <h1>Reviews</h1>
</header>
<main>
    <section>
        <!--Maak een form aan (connecten met de database)-->
        <form action="" method="post">
            <div>
                <div>
                    <label for="name">Naam*</label>
                    <div>
                        <input id="name" type="text" name="name" value="<?= htmlentities($name ?? '') ?>">
                    </div>
                </div>
                <p class="error"> <?= $errors['name'] ?? '' ?> </p>
            </div>
            <div>
                <div>
                    <label for="rating">Beoordeel je ervaring!*</label>
                    <div class="star-rating">
                        <input type="radio" id="star5" name="rating" value="5">
                        <label for="star5" title="5 stars">★</label>
                        <input type="radio" id="star4" name="rating" value="4">
                        <label for="star4" title="4 stars">★</label>
                        <input type="radio" id="star3" name="rating" value="3">
                        <label for="star3" title="3 stars">★</label>
                        <input type="radio" id="star2" name="rating" value="2">
                        <label for="star2" title="2 stars">★</label>
                        <input type="radio" id="star1" name="rating" value="1">
                        <label for="star1" title="1 star">★</label>
                    </div>
                </div>
                <!--                <p class="error"> --><?php //= $errors['rating'] ?? '' ?><!-- </p>-->
            </div>
            <div>
                <div>
                    <label for="experience">Deel je ervaring!*</label>
                    <div>
                        <textarea id="experience" name="experience" cols="30" rows="10"></textarea>
                    </div>
                </div>
                <p class="error"> <?= $errors['experience'] ?? '' ?> </p>
            </div>
            <div>
                <button class="button" type="submit" name="submit">Plaats review</button>
            </div>
            <div>
                <label for="must">* Verplichte velden</label>
            </div>
        </form>
    </section>
    <section>
        <!--    Foreach loop met alle reviews-->
        <!---->
        <!--    for(let i = 0; i< rating; i++){-->
        <!--    <span class="fa fa-star checked"></span>-->
        <!--}   -->
        <!--    for(let i = 0; i<(5-rating); i++){-->
        <!--    <span class="fa fa-star"></span>-->
        <!--}-->

        <?php foreach ($reviews as $reviews) { ?>
            <h2><?= $reviews['name'] ?></h2>
            <h3><?= $reviews['date'] ?></h3>
            <p><?= $reviews['content'] ?></p>
            <p><?= $reviews['rating'] ?></p>
        <?php } ?>
    </section>
</main>
<div id="contentfooter">
</div>
<script src="include/screensize.js"></script>
</body>
</html>