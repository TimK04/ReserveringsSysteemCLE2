<?php
/** @var mysqli $db */
require_once "include/database.php";

$id = $_GET['id'];

$query = "SELECT * FROM users WHERE id = $id";

$result = mysqli_query($db, $query)
or die('Error ' . mysqli_error($db) . ' with query ' . $query);

$users = [];

$row = mysqli_fetch_assoc($result);
$users[] = $row;

$firstName = $row['first_name'];
$lastName = $row['last_name'];
$email = $row['email'];

if (isset($_POST['submit'])) {

    $firstName = mysqli_escape_string($db, $_POST['firstName']);
    $lastName = mysqli_escape_string($db, $_POST['lastName']);
    $email = mysqli_escape_string($db, $_POST['email']);

    if ($firstName == '') {
        $errors['firstName'] = "First name is required";
    };
    if ($lastName == '') {
        $errors['lastName'] = "Last name is required";
    };
    if ($email == '') {
        $errors['email'] = "Email is required";
    };

    if (empty($errors)) {

        $query = " 
        UPDATE users
        SET first_name = '$firstName', last_name = '$lastName', email = '$email' 
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
    <title>Klanten Aanpassen</title>
</head>
<body>
<?php require_once 'include/nav.php' ?>
<header>
    <h1>Klanten Aanpassen</h1>
</header>
<main>
    <form action="" method="Post">
        <label for="firstName">Voornaam</label>
        <input type="text" id="firstName" name="firstName" value="<?= htmlentities($firstName) ?? ''?>">

        <p><?= $errors['firstName'] ?? '' ?></p>

        <label for="lastName">Achternaam</label>
        <input type="text" id="lastName" name="lastName" value="<?= htmlentities($lastName) ?? '' ?>">

        <p><?= $errors['lastName'] ?? '' ?></p>

        <label for="email">Email</label>
        <input type="text" id="email" name="email" value="<?= htmlentities($email) ?? '' ?>">

        <p><?= $errors['email'] ?? '' ?></p>

        <input type="submit" name="submit" value="Aanpassen">
    </form>
    <a href="adminusers.php">Ga Terug</a>
</main>
<?php require_once 'include/footer.php' ?>
</body>
</html>