<?php
session_start();

?>

<nav>
    <div class="nav_img">
        <a href="index.php"> <img src="images/logo.png" alt="logo Auniek Interieur"> </a>
    </div>
    <div class="empty"></div>
    <div class="nav_links">
        <a href="index.php">Home</a>
        <a class="about_us" href="overons.php">Over Auniek</a>
        <a href="portfolio.php">Portfolio</a>
        <a href="intake.php">Intake</a>
        <div class="dropdown">
            <button class="nav_links" id="werkwijzen" href="#">Werkwijzen</button>
            <div class="dropdown_items">
                <a href="bestaandebouw.php">Bestaande bouw</a>
                <a href="nieuwbouw.php">Nieuwbouw</a>
            </div>
        </div>
        <a href="blog.php">Blog</a>
        <a href="contact.php">Contact</a>
    </div>
    <div class="dropdown profile">
        <a href=""><img class="logo" src="images/inlog.png" alt="Profiel"></a>
        <div class="dropdown_items" id="person">
            <?php if (isset($_SESSION['Login'])) { ?>
                <a href="profile.php">Profiel</a>
            <?php } ?>
            <?php if (isset($_SESSION['admin_id']) && $_SESSION['admin_id'] == 1) { ?>
                <a href="admin.php">Admin</a>
            <?php } ?>
            <?php if (isset($_SESSION['Login'])) { ?>
                <a href="logout.php">Logout</a>
            <?php } else { ?>
                <a href="login.php">Login</a>
            <?php } ?>
        </div>
    </div>
</nav>