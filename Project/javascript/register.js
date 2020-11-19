
let registrationForm = document.getElementById('registration-form');
let errorField = document.getElementById('registration-error-field')

function getFormValue(form, fieldName) {
    return form.elements[fieldName].value;
}

function encodeForAjax(data) {
  return Object.keys(data).map(function(k){
    return encodeURIComponent(k) + '=' + encodeURIComponent(data[k])
  }).join('&')
}

function showError(errorMessage) {
    errorField.style.display = "block";
    errorField.innerHTML = errorMessage;
}

function handleResponse(event) {
    let responseText = event.currentTarget.responseText;
    console.log(event);

    let json = JSON.parse(responseText);

    if (json['result'] == 'error') {
        showError(json['message']);
        return;
    }

    window.location = '../pages/profile.php';
}

registrationForm.addEventListener('submit', (e) => {
    e.preventDefault();

    let firstName = getFormValue(registrationForm, 'fname');
    let lastName = getFormValue(registrationForm, 'lname');
    let username = getFormValue(registrationForm, 'username');
    let email = getFormValue(registrationForm, 'email');
    let password = getFormValue(registrationForm, 'password');
    let confirmPass = getFormValue(registrationForm, 'cpassword');

    if (password != confirmPass) {
        showError("Passwords do not match");
    }

    let request = new XMLHttpRequest();
    request.open('post', '../actions/action_register.php', true);
    request.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    request.addEventListener('load', handleResponse);
    request.send(encodeForAjax({
        firstname: firstName,
        lastname: lastName,
        username: username,
        email: email,
        password: password
    }));
});