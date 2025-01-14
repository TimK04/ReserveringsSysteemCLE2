<?php
/** @var mysqli $db */
require_once "include/database.php";
session_start();
if ($_SESSION['admin_id'] == 0) {
    header('location: index.php');
    exit;
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
    <title>Admin Klanten</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php require_once 'include/nav.php' ?>
<header>
    <h1>Admin Klanten</h1>
</header>
<main>

    <a href="admin.php">Admin Homepagina</a>

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
                    <th><?= htmlentities($index + 1); ?></th>
                    <th><?= htmlentities($users['first_name']); ?></th>
                    <th><?= htmlentities($users['last_name']); ?></th>
                    <th><?= htmlentities($users['email']); ?></th>
                    <th>
                        <a href="adminusersedit.php?id=<?= $users['id'] ?>">Klanten Aanpassen</a>
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