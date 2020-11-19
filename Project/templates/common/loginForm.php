<?php 
function draw_login_form() { ?>
<div id="login-form-wrapper" class="login-wrapper">
    <div id="login-form-container" class="login-form-container">
    <form id="login-form" class="login-form" action="#" method="post">
        <label class="block-label" for="username">Username</label>
        <input class="text-input" type="text" name="username" id="username">
        <label class="block-label" for="password">Password</label>
        <input class="text-input" class="text-input" type="password" name="pw" id="password">

        <input id="login-submit-button" class="button submit-button standart-border" type="submit" value="Login">
    </form>
    <p id="login-error-label"></p>
    </div>
</div>
<?php } ?>