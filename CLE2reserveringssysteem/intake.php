<?php
/** @var mysqli $db */
session_start();
require_once 'include/database.php';

if (isset($_SESSION['Login'])) {
    $firstName = mysqli_escape_string($db, $_SESSION['firstName']);
    $lastName = mysqli_escape_string($db, $_SESSION['lastName']);
    $email = mysqli_escape_string($db, $_SESSION['email']);
    $id = mysqli_escape_string($db, $_SESSION['id']);
}

if (isset($_POST['submit'])) {
    $firstName = mysqli_escape_string($db, $_POST['first_name']);
    $lastName = mysqli_escape_string($db, $_POST['last_name']);
    $email = mysqli_escape_string($db, $_POST['email']);
    $needs = mysqli_escape_string($db, $_POST['needs']);
    $date = date('Y-m-d', strtotime($_POST['selectedDate']));
    if (isset($_POST['time'])) {
        $time = $_POST['time'];
    }
    $id = $_POST['id'];

    if ($firstName === '') {
        $errors['first_name'] = 'Voornaam mag niet leeg zijn';
    }
    if ($lastName === '') {
        $errors['last_name'] = 'Achternaam mag niet leeg zijn';
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Email invoer is niet correct';
    }
    if ($email === '') {
        $errors['email'] = 'Email mag niet leeg zijn';
    }
    if ($needs === '') {
        $errors['needs'] = 'Dit veld mag niet leeg zijn';
    }
    if ($_POST['selectedDate'] === '') {
        $errors['selectedDate'] = 'Je moet een datum selecteren';
    }
    if (!isset($_POST['time'])) {
        $errors['time'] = 'Je moet een tijd selecteren';
    }


    if (empty($errors)) {
        if ($_POST['id'] != '') {
            $query = "INSERT INTO reservations(first_name, last_name, email, text, date, time, user_id) 
            VALUES ('$firstName','$lastName','$email','$needs', '$date', '$time', $id)";
        } else {
            $query = "INSERT INTO reservations(first_name, last_name, email, text, date, time) 
            VALUES ('$firstName','$lastName','$email','$needs', '$date', '$time')";
        }

        $result = mysqli_query($db, $query);

        if ($result) {
            $succes = "Bedankt voor het inplannen! We nemen zo snel mogelijk contact met je op.";
        }
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/intake.css">
    <title>Auniek Interieur - Intake</title>
</head>
<body>
<div id="contentnav">
</div>
<script src="include/screensize.js"></script>
<header>
    <h1>Intake gesprek inplannen:</h1>
    <p class="important">15 min intake gesprek</p>
</header>
<main>
    <form class="intake" action="" method="post">
        <div class="calendercontainer">
            <div class="header">
                <h2>Kies een datum</h2>
            </div>
            <div id="calendar">
                <div id="header">
                    <button class="button" id="prevMonth" type="button">Vorige</button>
                    <h2 id="monthAndYear"></h2>
                    <button class="button" id="nextMonth" type="button">Volgende</button>
                </div>
                <table id="calendarTable">
                    <thead>
                    <tr>
                        <th>Ma</th>
                        <th>Di</th>
                        <th>Wo</th>
                        <th>Do</th>
                        <th>Vr</th>
                        <th>Za</th>
                        <th>Zo</th>
                    </tr>
                    </thead>
                    <tbody id="calendarBody"></tbody>
                </table>
                <input type="hidden" id="selectedDate" name="selectedDate">
                <p class="error"> <?= $errors['selectedDate'] ?? '' ?> </p>
            </div>
            <div class="times">
                <!--Tijd Selecteren-->
                <p id="dateSelectionMessage">Selecteer eerst een datum uit de kalender.</p>
                <p class="error"> <?= $errors['time'] ?? '' ?> </p>
                <div id="timeSelectionContainer" style="display: none;">
                    <p>Selecteer een beschikbare tijd:</p>
                    <div id="availableTimesGrid" class="time-grid">
                        <div>
                            <label class="container">09:00
                                <input id="09:00" type="radio" name="time" value="09:00">
                                <span class="checkmark"></span>
                            </label>
                            <label class="container">09:15
                                <input id="09:15" type="radio" name="time" value="09:15">
                                <span class="checkmark"></span>
                            </label>
                            <label class="container">09:30
                                <input id="09:30" type="radio" name="time" value="09:30">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <div>
                            <label class="container">09:45
                                <input id="09:45" type="radio" name="time" value="09:45">
                                <span class="checkmark"></span>
                            </label>
                            <label class="container">10:00
                                <input id="10:00" type="radio" name="time" value="10:00">
                                <span class="checkmark"></span>
                            </label>
                            <label class="container">10:15
                                <input id="10:15" type="radio" name="time" value="10:15">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="column">
            <label for="first_name">Voornaam:</label>
            <input type="text" id="first_name" name="first_name" value="<?= htmlentities($firstName ?? '') ?>">
            <p class="error"> <?= $errors['first_name'] ?? '' ?> </p>

            <label for="last_name">Achternaam:</label>
            <input type="text" id="last_name" name="last_name" value="<?= htmlentities($lastName ?? '') ?>">
            <p class="error"> <?= $errors['last_name'] ?? '' ?> </p>

            <label for="email">Emailadres:</label>
            <input type="text" id="email" name="email" value="<?= htmlentities($email ?? '') ?>">
            <p class="error"> <?= $errors['email'] ?? '' ?> </p>

            <label for="needs">Wat verwacht u van ons:</label>
            <textarea name="needs" id="needs" cols="30" rows="10"
            ><?= htmlentities($needs ?? '') ?></textarea>
            <p class="error"> <?= $errors['needs'] ?? '' ?> </p>

            <input type="hidden" id="id" name="id" value="<?= $id ?? '' ?>">

            <button class="button" type="submit" name="submit">Inplannen</button>

            <div class="succesStyle">
                <p class="succes"> <?= $succes ?? '' ?> </p>
            </div>
        </div>
    </form>
</main>
<div id="contentfooter">
</div>
<script src="include/screensize.js"></script>
<script src="include/calender.js"></script>
</body>
</html>