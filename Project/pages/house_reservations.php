<?php 
include_once('../config.php');
include_once(ROOT . 'includes/session.php');
include_once(ROOT . 'database/db_users.php');
include_once(ROOT . 'database/db_houses.php');
include_once(ROOT . 'templates/drawTemplate.php');

if (!isset($_SESSION['username'])) {
    header('Location: home.php');
    die;
}

$user = getUser($_SESSION['username']);
$house = getHouse($_GET['id']);

if ($house['landlordID'] !== $user['id']) {
    header('Location: home.php');
    die;
}

$reservations = getReservations($house['houseID'], 'accepted');

renderPage(
    array('house_reservations'), 
    array('request', 'house_reservations'), 
    function() use ($house, $reservations) { ?>

<h1>House overview</h1>
<h2><?= $house['title'] ?></h2>
<div id="reservation-type-buttons">
    <a id="confirmed-reservations-tab">
        <div class="tab-button-container">
            Confirmed
        </div>
    </a>
    <a id="pending-reservations-tab">
        <div class="tab-button-container">
            Pending
        </div>
    </a>
</div>
<table id="reservations-table">
</table>

<?php }) ?>