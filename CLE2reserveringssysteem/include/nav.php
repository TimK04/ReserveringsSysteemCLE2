<nav>
    <div class="nav_img">
        <img src="images/logo.webp" alt="logo Auniek Interieur">
    </div>
    <div class="empty"></div>
    <div class="nav_links">
        <a href="index.php">Home</a>
        <a href="overons.php">Over Auniek</a>
        <a href="portfolio.php">Portfolio</a>
        <a href="reservering.php">Intake</a>
        <div class="dropdown">
            <button class="nav_link" href="#">Werkwijzen</button>
            <div class="dropdown_items">
                <a href="bestaandebouw.php">Bestaande bouw</a>
                <a href="nieuwbouw.php">Nieuwbouw</a>
            </div>
        </div>
        <a href="blog.php">Blog</a>
        <a href="contact.php">Contact</a>
    </div>
    <div class="dropdown">
        <a href=""><img class="logo" src="images/inlog.webp" alt="Profiel"></a>
        <div class="dropdown_items" id="person">
            <a href="profile.php">Profiel</a>
            <?php if (isset($_SESSION['Login'])) { ?>
                <a href="logout.php">Logout</a>
            <?php } else { ?>
                <a href="login.php">Login</a>
            <?php } ?>
        </div>
    </div>
</nav>