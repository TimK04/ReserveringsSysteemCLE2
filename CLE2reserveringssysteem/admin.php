<?php
/** @var mysqli $db */
require_once "include/database.php";
session_start();
if ($_SESSION['admin_id'] != 1) {
    header('location: index.php');
    exit;
}
$query = "SELECT * FROM reservations";

$result = mysqli_query($db, $query)
or die('Error ' . mysqli_error($db) . ' with query ' . $query);

$reservations = [];

while ($row = mysqli_fetch_assoc($result)) {
    $reservations[] = $row;
}

$query = "SELECT * FROM users";

$result = mysqli_query($db, $query)
or die('Error ' . mysqli_error($db) . ' with query ' . $query);

$users = [];

while ($row = mysqli_fetch_assoc($result)) {
    $users[] = $row;
}

mysqli_close($db);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Homepagina</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/admin.css">
</head>
<body>
<div id="contentnav">
</div>
<script src="include/screensize.js"></script>
<header>
    <h1 class="admincenter">Admin Pagina</h1>
</header>
<main class="adminmain">
    <section class="admininfo">
        <h2 class="admincenter">Afspraken</h2>
        <section class="tim admincenter">
            <table>
                <thead>
                <tr>
                    <th>Positie</th>
                    <th>Voornaam</th>
                    <th>Achternaam</th>
                    <th>Email</th>
                    <th>Tijd</th>
                    <th>Datum</th>
                    <th>Text</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($reservations as $index => $reservations): ?>
                    <tr>
                        <th><?= htmlentities($index + 1); ?></th>
                        <th><?= htmlentities($reservations['first_name'] ?? ''); ?></th>
                        <th><?= htmlentities($reservations['last_name'] ?? ''); ?></th>
                        <th><?= htmlentities($reservations['email'] ?? ''); ?></th>
                        <th><?= htmlentities($reservations['time'] ?? ''); ?></th>
                        <th><?= htmlentities($reservations['date'] ?? ''); ?></th>
                        <th><?= htmlentities($reservations['text'] ?? ''); ?></th>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </section>
        <div class="adminlinks admincenter">
            <a href="adminappointments.php">Afspraken</a>
        </div>
        <h2 class="admincenter">Klanten</h2>
        <section class="tim admincenter">
            <table>
                <thead>
                <tr>
                    <th>Positie</th>
                    <th>Voornaam</th>
                    <th>Achternaam</th>
                    <th>Email</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($users as $index => $users): ?>
                    <tr>
                        <th><?= htmlentities($index + 1) ?? ''; ?></th>
                        <th><?= htmlentities($users['first_name'] ?? ''); ?></th>
                        <th><?= htmlentities($users['last_name'] ?? ''); ?></th>
                        <th><?= htmlentities($users['email'] ?? ''); ?></th>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </section>
        <div class="adminlinks admincenter">
            <a href="adminusers.php">Klanten</a>
        </div>
        <h2 class="admincenter">Blog</h2>
        <section class="tim admincenter">
            <!--Blog section-->
        </section>
        <div class="adminlinks admincenter">
            <a href="adminprofile.php">Profiel</a>
        </div>
    </section>

</main>
<div id="contentfooter">
</div>
<script src="include/screensize.js"></script>
</body>
</html>
