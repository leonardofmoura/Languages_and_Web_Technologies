<?php 
include_once('../config.php');
include_once(ROOT . 'includes/session.php');
include_once(ROOT . 'database/db_houses.php');
include_once(ROOT . 'includes/Reservation.php');

if (!isset($_SESSION['username'])) {
    header('Location: ../pages/home.php');
    die;
}

$response = array(
    'result'=>'error',
    'message'=>''
);

$checkInDate = $_POST['checkInDate'];
$checkOutDate = $_POST['checkOutDate'];

if ($checkInDate == $checkOutDate) {
    $response['message'] = 'Check in and check out dates coincide.';
    echo json_encode($response);
    die;
}
if ($checkInDate > $checkOutDate) {
    $response['message'] = 'Check in date happens before check out date.';
    echo json_encode($response);
    die;
}

$reservations = getReservations($_POST['houseId'], 'accepted');

foreach ($reservations as $reservation) {
    $reservationStart = $reservation['startDate'];
    $reservationEnd = $reservation['endDate'];
    if (strcmp($checkInDate,$reservationEnd) <= 0 && strcmp($checkOutDate,$reservationStart) >= 0){
        $response['message'] = 'House will be occupied during the period you requested.';
        //$response['message'] = $reservationStart;
        echo json_encode($response);
        die;
    }
}

$house = getHouse($_POST['houseId']);

$numberOfPeople = intval($_POST['numberOfPeople']);
$houseCapacity = intval($house['capacity']);

if ($numberOfPeople < 1) {
    $response['message'] = 'Please use a positive number of people.';
    echo json_encode($response);
    die;
}

if ($numberOfPeople > $houseCapacity) {
    $response['message'] = 'House capacity exceeded.';
    echo json_encode($response);
    die;
}

$reservation = new Reservation();
$reservation->houseId = $_POST['houseId'];
$reservation->userId = $_POST['userId'];
$reservation->startDate = $checkInDate;
$reservation->endDate = $checkOutDate;
$reservation->numberOfPeople = $numberOfPeople;

addReservation($reservation);

$response['result'] = 'success';
$response['message'] = 'Reservation successful';

echo json_encode($response);

?>