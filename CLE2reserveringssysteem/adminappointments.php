<?php
/** @var mysqli $db */
require_once "include/database.php";
session_start();
if ($_SESSION['admin_id'] == 0) {
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
</head>
<body>
<?php require_once 'include/nav.php' ?>
<header>
    <h1>Admin Reserveringen</h1>
</header>
<main>

    <a href="admin.php">Admin Home</a>

    <section>
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
                    <th><?= htmlentities($reservations['first_name']) ?? ''; ?></th>
                    <th><?= htmlentities($reservations['last_name']) ?? ''; ?></th>
                    <th><?= htmlentities($reservations['email']) ?? ''; ?></th>
                    <th><?= htmlentities($reservations['time']) ?? ''; ?></th>
                    <th><?= htmlentities($reservations['date']) ?? ''; ?></th>
                    <th><?= htmlentities($reservations['text']) ?? ''; ?></th>
                    <th>
                        <a href="adminappointmentsedit.php?id= <?= $reservations['id'] ?>" href="">Reserveringen
                            Aanpassen</a>
                    </th>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </section>

</main>
<?php require_once 'include/footer.php' ?>
</body>
</html>