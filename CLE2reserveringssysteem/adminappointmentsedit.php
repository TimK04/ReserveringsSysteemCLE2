<?php
/** @var mysqli $db */
require_once "include/database.php";
session_start();
if ($_SESSION['admin_id'] != 1) {
    header('location: index.php');
    exit;
}
$id = $_GET['id'];

$query = "SELECT * FROM reservations WHERE id = $id";

$result = mysqli_query($db, $query)
or die('Error ' . mysqli_error($db) . ' with query ' . $query);

$reservations = [];

$row = mysqli_fetch_assoc($result);
$reservations[] = $row;

$firstName = mysqli_escape_string($db, $row['first_name']);
$lastName = mysqli_escape_string($db, $row['last_name']);
$email = mysqli_escape_string($db, $row['email']);
$time = mysqli_escape_string($db, $row['time']);
$date = mysqli_escape_string($db, $row['date']);
$text = mysqli_escape_string($db, $row['text']);

if (isset($_POST['submit'])) {

    $firstName = mysqli_escape_string($db, $_POST['firstName']);
    $lastName = mysqli_escape_string($db, $_POST['lastName']);
    $email = mysqli_escape_string($db, $_POST['email']);
    $time = mysqli_escape_string($db, $_POST['time']);
    $date = mysqli_escape_string($db, $_POST['date']);
    $text = mysqli_escape_string($db, $_POST['text']);

    if ($firstName == '') {
        $errors['firstName'] = "Voornaam is vereist";
    };
    if ($lastName == '') {
        $errors['lastName'] = "Achternaam is vereist";
    };
    if ($email == '') {
        $errors['email'] = "Email is vereist";
    };
    if ($time == '') {
        $errors['time'] = "Tijd is vereist";
    };
    if ($date == '') {
        $errors['date'] = "Datum is vereist";
    };
    if ($text == '') {
        $errors['text'] = "Text is vereist";
    };
    if (empty($errors)) {

        $query = " 
          UPDATE reservations
          SET first_name = '$firstName', last_name = '$lastName', email = '$email', time = '$time', date = '$date', text = '$text' 
          WHERE id = $id
          ";

        $result = mysqli_query($db, $query)
        or die;
        mysqli_close($db);
        header('Location: adminappointments.php');
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
    <title>Reserveringen Aanpassen</title>
</head>
<body>
<?php require_once 'include/nav.php' ?>
<header>
    <h1>Reserveringen Aanpassen</h1>
</header>
<main>
    <form action="" method="Post">
        <label for="firstName">Voornaam</label>
        <input type="text" id="firstName" name="firstName" value="<?= htmlentities($firstName) ?? '' ?>">

        <p><?= $errors['firstName'] ?? '' ?></p>

        <label for="lastName">Achternaam</label>
        <input type="text" id="lastName" name="lastName" value="<?= htmlentities($lastName) ?? '' ?>">

        <p><?= $errors['lastName'] ?? '' ?></p>

        <label for="email">Email</label>
        <input type="text" id="email" name="email" value="<?= htmlentities($email ?? '') ?>">

        <p><?= $errors['email'] ?? '' ?></p>

        <label for="time">Tijd</label>
        <input type="time" id="time" name="time" value="<?= htmlentities($time ?? '') ?>">

        <p><?= $errors['time'] ?? '' ?></p>

        <label for="date">Datum</label>
        <input type="date" id="date" name="date" value="<?= htmlentities($date ?? '') ?>">

        <p><?= $errors['date'] ?? '' ?></p>

        <label for="text">Text</label>
        <input type="text" id="text" name="text" value="<?= htmlentities($text ?? '') ?>">

        <p><?= $errors['text'] ?? '' ?></p>

        <input type="submit" name="submit" value="Aanpassen">
    </form>
    <a href="adminappointments.php">Ga Terug</a>
</main>
<?php require_once 'include/footer.php' ?>
</body>
</html>