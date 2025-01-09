<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/home.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Auniek Interieur - Home</title>
</head>
<body>
<?php require_once 'include/nav.php' ?>
<header>
    <div>
        <h1>Auniek Interieur</h1>
        <p id="psize">Jouw perfecte interieur <br> van concept tot realisatie! </p>
    </div>
</header>
<main>
    <section class="werkwijzen">
        <h2>Onze werkwijzen</h2>
        <div class="bouw-container">
            <article>
                <div class="werkgrootte" id="nieuwbouw-back">
                    <h3>Nieuwbouw</h3>
                </div>
                <div class="button">
                    <a href="#">Meer lezen</a>
                </div>
            </article>
            <article>
                <div class="werkgrootte" id="bestaand-back">
                    <h3>Bestaande bouw</h3>
                </div>
                <div class="button">
                    <a href="#">Meer lezen</a>
                </div>
            </article>
        </div>
    </section>
    <section>
        <h2>Reviews</h2>
        <div class="review-container">
            <article class="review-back">
                <div>
                    <h3>Harry de Jong</h3>
                </div>
                <div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi cum deleniti
                        dicta dolorem error
                        facilis illum inventore laborum natus nihil nobis, nulla perferendis porro provident quibusdam
                        similique sit
                        temporibus vel.</p>
                </div>
                <div>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span>
                </div>
            </article>
            <article class="review-back">
                <div>
                    <h3>Ilse Vermolen</h3>
                </div>
                <div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur aut
                        consequatur consequuntur
                        dolore
                        dolorem impedit ipsam maiores officia quasi, quis soluta unde voluptas. At sunt ullam unde.
                        Accusantium,
                        cupiditate exercitationem!</p>
                </div>
                <div>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star checked"></span>
                    <span class="fa fa-star"></span>
                </div>
            </article>
        </div>
    </section>
</main>
<?php require_once 'include/footer.php' ?>
</body>
</html>