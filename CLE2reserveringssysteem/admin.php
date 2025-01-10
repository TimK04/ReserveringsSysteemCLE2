<?php
/** @var mysqli $db */
require_once "include/database.php";

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
</head>
<body>
<?php require_once 'include/nav.php' ?>
<header>
    <h1>Admin Pagina</h1>
</header>
<main>
    <p>Profiel</p>
    <a href="adminprofile.php">Profiel</a>
    <p>Afspraken</p>
    <a href="adminappointments.php">Afspraken</a>
    <p>Klanten</p>
    <a href="adminusers.php">Klanten</a>

    <section>
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
                    <th><?= $index + 1; ?></th>
                    <th><?= $users['first_name']; ?></th>
                    <th><?= $users['last_name']; ?></th>
                    <th><?= $users['email']; ?></th>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </section>

    <section>
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
                    <th><?= $index + 1; ?></th>
                    <th><?= $reservations['first_name']; ?></th>
                    <th><?= $reservations['last_name']; ?></th>
                    <th><?= $reservations['email']; ?></th>
                    <th><?= $reservations['time']; ?></th>
                    <th><?= $reservations['date']; ?></th>
                    <th><?= $reservations['text']; ?></th>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </section>

</main>
<?php require_once 'include/footer.php' ?>
</body>
</html>