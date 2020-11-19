let reservationsTable = document.getElementById('reservations-table');

let confirmedButton = document.getElementById('confirmed-reservations-tab');
let pendingButton = document.getElementById('pending-reservations-tab');

let houseId = new URL(window.location.href).searchParams.get('id');

function setTableContent(event) {
    reservationsTable.innerHTML = event.currentTarget.responseText;
}

confirmedButton.addEventListener('click', (e) => {
    reservationsTable.innerHTML = '';
    makeReqest('../actions/action_getReservations.php', 'get', setTableContent, {houseId:houseId, status:'accepted'});
});

pendingButton.addEventListener('click', (e) => {
    reservationsTable.innerHTML = '';
    makeReqest('../actions/action_getReservations.php', 'get', setTableContent, {houseId:houseId, status:'pending'});
});

makeReqest('../actions/action_getReservations.php', 'get', setTableContent, {houseId:houseId, status:'accepted'});

function handleReservationStatusResponse(event) {
    let json = event.currentTarget.responseText;

    let data = JSON.parse(json);

    if (data['result'] === 'error') {
        alert('An error has ocurred.');
        window.location = '../pages/home.php';
        return;
    }

    let row = document.getElementById('reservation'+data['reservationId']);
    row.parentElement.removeChild(row);

    alert('Reservation status successfully updated.');
}

function acceptReservation(reservationId) {
    confirm('Are you sure you want to accept this reservation?');
    makeReqest(
        '../actions/action_setReservationStatus.php', 
        'post', 
        handleReservationStatusResponse,
        {reservationId:reservationId, status:'accepted'});
}

function rejectReservation(reservationId) {
    confirm('Are you sure you want to reject this reservation?');
    makeReqest(
        '../actions/action_setReservationStatus.php', 
        'post', 
        handleReservationStatusResponse,
        {reservationId:reservationId, status:'rejected'});
}