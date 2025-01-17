<?php
/** @var mysqli $db */
require_once "include/database.php";
session_start();
$id = $_GET['id'];
if ($_SESSION['admin_id'] != 1) {
    header('location: index.php');
    exit;
}

$query = "SELECT * FROM users WHERE id = $id";

$result = mysqli_query($db, $query)
or die('Error ' . mysqli_error($db) . ' with query ' . $query);

$users = [];

$row = mysqli_fetch_assoc($result);
$users[] = $row;

$firstName = mysqli_escape_string($db, $row['first_name'] ?? '');
$lastName = mysqli_escape_string($db, $row['last_name'] ?? '');
$email = mysqli_escape_string($db, $row['email'] ?? '');
$adminId = $row['admin_id'];

if (isset($_POST['submit'])) {

    $firstName = mysqli_escape_string($db, $_POST['firstName']);
    $lastName = mysqli_escape_string($db, $_POST['lastName']);
    $email = mysqli_escape_string($db, $_POST['email']);
    $checkBox = $_POST['checkBox'] ?? ' ';
    $adminId = 0;
    if ($firstName == '') {
        $errors['firstName'] = "Voornaam is vereist";
    };
    if ($lastName == '') {
        $errors['lastName'] = "Achternaam is vereist";
    };
    if ($email == '') {
        $errors['email'] = "Email is vereist";
    };
    if ($checkBox == 'on') {
        $adminId = 1;
    }

    if (empty($errors)) {

        $query = " 
        UPDATE users
        SET first_name = '$firstName', last_name = '$lastName', email = '$email', admin_id = $adminId 
        WHERE id = $id
        ";

        $result = mysqli_query($db, $query)
        or die;
        mysqli_close($db);
        header('Location: adminusers.php');
        exit;
    };
};
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/admin.css">
    <title>Auniek Interieur - Admin Klanten Aanpassen</title>
</head>
<body>
<div id="contentnav">
</div>
<script src="include/screensize.js"></script>
<?php require_once 'include/adminnav.php'; ?>
<header>
    <h1 class="admincenter">Klanten Aanpassen</h1>
</header>
<main>
    <form action="" method="Post">
        <label for="firstName">Voornaam</label>
        <input type="text" id="firstName" name="firstName" value="<?= htmlentities($firstName ?? '') ?>">

        <p><?= $errors['firstName'] ?? '' ?></p>

        <label for="lastName">Achternaam</label>
        <input type="text" id="lastName" name="lastName" value="<?= htmlentities($lastName ?? '') ?>">

        <p><?= $errors['lastName'] ?? '' ?></p>

        <label for="email">Email</label>
        <input type="text" id="email" name="email" value="<?= htmlentities($email ?? '') ?>">

        <p><?= $errors['email'] ?? '' ?></p>

        <label for="checkBox">admin</label>
        <input type="checkbox" id="checkBox" name="checkBox" <?php if ($adminId == 1) { ?> checked <?php } ?> >

        <button class="button" type="submit" name="submit">aanpassen</button>
    </form>
    <div class="adminlinks admincenter">
        <a href="adminusers.php">Ga Terug</a>
    </div>
</main>
<div id="contentfooter">
</div>
<script src="include/screensize.js"></script>
</body>
</html>