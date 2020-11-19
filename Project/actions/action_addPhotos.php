<?php 
include_once('../config.php');
include_once(ROOT . 'includes/session.php');

if (!isset($_SESSION['username'])) {
    header('Location: ../pages/home.php');
    die;
}

$imageNames = $_FILES['images']['tmp_name'];

var_dump($imageNames);

foreach($imageNames as $image) {
    $fileName = basename($image);
    move_uploaded_file($image, ROOT . 'database/housePictures/'.$fileName);
}

?>
