function getFormValue(form, fieldName) {
    return form.elements[fieldName].value;
}

function encodeForAjax(data) {
  return Object.keys(data).map(function(k){
    return encodeURIComponent(k) + '=' + encodeURIComponent(data[k])
  }).join('&')
}

let reservationForm = document.getElementById('reservation-form');
let reservationErrorLabel = document.getElementById('reservation-error-label');

reservationForm.addEventListener('submit', (e)=>{
    e.preventDefault();

    let request = new XMLHttpRequest();
    request.open("post", '../actions/action_reserve.php', true);
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded')

    request.addEventListener('load', (event) => {
        let text =event.currentTarget.responseText;
        console.log(text);

        let responseJson = JSON.parse(text);

        if (responseJson['result'] == 'error') {
            reservationErrorLabel.innerHTML = responseJson['message'];
            return;
        }
        
        window.location = '../pages/home.php';
    });

    let numberOfPeople = getFormValue(reservationForm, 'numberOfPeople');
    let checkInDate = getFormValue(reservationForm, 'checkInDate');
    let checkOutdate = getFormValue(reservationForm, 'checkOutDate');
    let houseId = getFormValue(reservationForm, 'houseId');
    let userId = getFormValue(reservationForm, 'tenantId');

    request.send(encodeForAjax({
        numberOfPeople: numberOfPeople,
        checkInDate: checkInDate,
        checkOutDate: checkOutdate,
        houseId: houseId,
        userId: userId
    }));
});