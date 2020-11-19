<?php 
include_once('../config.php');
include_once(ROOT . 'includes/session.php');
include_once(ROOT . 'database/db_users.php');

if (!isset($_SESSION['username'])) {
    header('Location: ../pages/home.php');
    die;
}

$user = getUser($_SESSION['username']);

addLanlord($user['id']);

header('Location: ../pages/profile.php');

?>