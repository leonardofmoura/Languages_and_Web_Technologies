<?php 
include_once('../config.php');
include_once(ROOT . 'includes/session.php');

session_destroy();
session_start();

header('Location: ../pages/home.php');

?>