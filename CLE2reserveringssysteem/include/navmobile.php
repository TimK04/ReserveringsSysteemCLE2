<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
    .topnav {
        overflow: hidden;
        background-color: #367283;
        position: relative;
    }

    .topnav a {
        color: white;
        padding: 14px 16px;
        text-decoration: none;
        font-size: 17px;
        display: block;
    }

    .topnav a.icon {
        background: black;
        display: block;
        position: absolute;
        right: 0;
        top: 0;
    }

    .topnav a:hover {
        background-color: #367283;
        color: black;
    }

    .active {
        background-color: #367283;
        color: white;
    }

    .topnav #nav_links {
        display: none;
    }
</style>
<nav>
    <div class="topnav">
        <div class="nav_img">
            <a href="index.php" class="active"> <img src="images/logo.png" alt="logo Auniek Interieur"> </a>
        </div>
        <div id="nav_links">
            <a href="index.php">Home</a>
            <a href="overons.php">Over Auniek</a>
            <a href="portfolio.php">Portfolio</a>
            <a href="intake.php">Intake</a>
            <a href="bestaandebouw.php">Bestaande bouw</a>
            <a href="nieuwbouw.php">Nieuwbouw</a>
            <a href="blog.php">Blog</a>
            <a href="contact.php">Contact</a>
            <a href="profile.php">Profiel</a>
            <?php if (isset($_SESSION['Login'])) { ?>
                <a href="logout.php">Logout</a>
            <?php } else { ?>
                <a href="login.php">Login</a>
            <?php } ?>
        </div>
        <a href="javascript:void(0);" class="icon" onclick="burger()">
            <i class="fa fa-bars"></i>
        </a>
    </div>
</nav>

