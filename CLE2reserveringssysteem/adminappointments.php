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

mysqli_close($db);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Reserveringen</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/admin.css">
</head>
<body>
<div id="contentnav">
</div>
<script src="include/screensize.js"></script>
<header>
    <h1 class="admincenter">Admin Reserveringen</h1>
</header>
<main>
    <section class="tim admincenter">
        <table>
            <thead>
            <tr>
                <th>Positie</th>
                <th>Voornaanm</th>
                <th>Achternaam</th>
                <th>Email</th>
                <th>Tijd</th>
                <th>Datum</th>
                <th>text</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($reservations as $index => $reservations): ?>
                <tr>
                    <th><?= htmlentities($index + 1) ?? ''; ?></th>
                    <th><?= htmlentities($reservations['first_name'] ?? ''); ?></th>
                    <th><?= htmlentities($reservations['last_name'] ?? ''); ?></th>
                    <th><?= htmlentities($reservations['email'] ?? ''); ?></th>
                    <th><?= htmlentities($reservations['time'] ?? ''); ?></th>
                    <th><?= htmlentities($reservations['date'] ?? ''); ?></th>
                    <th><?= htmlentities($reservations['text'] ?? ''); ?></th>
                    <th>
                        <a href="adminappointmentsedit.php?id= <?= $reservations['id'] ?>" href="">Reserveringen
                            Aanpassen</a>
                    </th>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </section>
    <div class="adminlinks admincenter">
    <a href="admin.php" class="adminlinks">Admin Home</a>
    </div>
</main>
<div id="contentfooter">
</div>
<script src="include/screensize.js"></script>
</body>
</html>