<?php 
include_once('../config.php');
include_once(ROOT . 'includes/session.php');
include_once(ROOT . 'database/db_users.php');

$response = array(
    'result'=>'error',
    'message'=>''
);

$username = $_POST['username'];
$password = $_POST['password'];

if (checkUserPassword($username, $password)) {
    $response['result'] = 'success'; 
    $response['message'] = 'Successful login.'; 

    $_SESSION['username'] = $username;
} else {
    $response['message'] = 'Invalid user or password.';
}

echo json_encode($response);

?>