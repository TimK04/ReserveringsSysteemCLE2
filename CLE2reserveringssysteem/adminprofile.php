<?php
/** @var mysqli $db */
require_once "include/database.php";
session_start();
if ($_SESSION['admin_id'] != 1) {
    header('location: index.php');
    exit;
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Auniek Interieur - Admin Profiel</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/admin.css">
</head>
<body>
<div id="contentnav">
</div>
<script src="include/screensize.js"></script>
<?php require_once 'include/adminnav.php'; ?>
<header>
    <h1 class="admincenter">Admin Profiel</h1>
</header>
<main>
    <div class="adminlinks admincenter">
        <a href="admin.php">Admin Homepagina</a>
    </div>
</main>
<div id="contentfooter">
</div>
<script src="include/screensize.js"></script>
</body>
</html>