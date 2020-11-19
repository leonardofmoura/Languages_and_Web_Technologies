<?php 
include_once('../config.php');
include_once(ROOT . 'templates/drawTemplate.php');

function register_page() { ?>

<form id="registration-form" action="#" method="post">
    <label class="block-label" for="fname">First Name</label>
    <input class="text-input" type="text" name="fname" id="fname" required>

    <label class="block-label" for="lname">Last Name</label>
    <input class="text-input" type="text" name="lname" id="lname" required>

    <label class="block-label" for="reg-username">Username</label>
    <input class="text-input" type="text" name="username" id="reg-username" required>

    <label class="block-label" for="email">Email</label>
    <input class="text-input" type="email" name="email" id="email" required>

    <label class="block-label" for="reg-password">Enter a password</label>
    <input class="text-input" type="password" name="password" id="reg-password" required>

    <label class="block-label" for="cpassword">Confirm password</label>
    <input class="text-input" type="password" name="cpassword" id="cpassword" required>

    <p id="registration-error-field"></p>
    <input class="standart-border submit-button button" type="submit" value="Register">
</form>

<?php
}

renderPage(array('registration'), array('register'), 'register_page');
?>