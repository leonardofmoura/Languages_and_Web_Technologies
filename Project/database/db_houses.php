<?php
include_once(ROOT . 'includes/database.php');

function addHouse($house) {
    $db = Database::instance()->db();

    $stmt = $db->prepare('insert into house(landlordID, pricePerNight, title, description, area, address, capacity) values (?,?,?,?,?,?,?)');
    $stmt->execute(array(
        $house->landlordID,
        $house->pricePerNight,
        $house->title,
        $house->description,
        $house->area,
        $house->address,
        $house->capacity
    ));

    return $db->lastInsertId();
}

function getHouseInfo() {
    $db = Database::instance()->db();

    $stmt = $db->prepare('SELECT * FROM house');
    $stmt->execute();
    return $stmt->fetchAll();
}

function getHouse($houseId) {
    $db = Database::instance()->db();

    $stmt = $db->prepare('SELECT * FROM house WHERE houseID=?');
    $stmt->execute(array($houseId));
    return $stmt->fetch();
}

function getLandlordHouses($landlordID) {
    $db = Database::instance()->db();

    $stmt = $db->prepare('SELECT * FROM house where landlordID=?');
    $stmt->execute(array($landlordID));
    return $stmt->fetchAll();
}

function getReservations($houseID, $status) {
    $db = Database::instance()->db();

    $stmt = $db->prepare('SELECT * FROM reservation WHERE houseID=? and status=?');
    $stmt->execute(array($houseID, $status));

    return $stmt->fetchAll();
}

function getReservation($reservationId) {
    $db = Database::instance()->db();

    $stmt = $db->prepare("SELECT * FROM reservation WHERE reservationID=?");
    $stmt->execute(array($reservationId));

    return $stmt->fetchAll();
}

function setReservationStatus($reservationId, $status) {
    if ($status !== 'accepted' && $status !== 'pending' && $status !== 'rejected') {
        return false;
    }
    $db = Database::instance()->db();

    $stmt = $db->prepare('UPDATE reservation SET status=? WHERE reservationID=?');
    $stmt->execute(array($status, $reservationId));

    return true;
}

function addReservation($reservation) {
    $db = Database::instance()->db();

    $stmt = $db->prepare('insert into reservation(houseID, tenantID, startDate, endDate, numberOfPeople) values (?,?,?,?,?)');
    $stmt->execute(array(
        $reservation->houseId,
        $reservation->userId,
        $reservation->startDate,
        $reservation->endDate,
        $reservation->numberOfPeople
    ));

    return $db->lastInsertId();
}

?>