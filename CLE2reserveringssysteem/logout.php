<?php
/** @var mysqli $db */
if (isset($_SESSION['Login'])) {
    require_once 'include/database.php';
    session_start();
    session_destroy();
    header('location: login.php');
    exit;
} else {
    header('location: index.php');
    exit;
}
?>
