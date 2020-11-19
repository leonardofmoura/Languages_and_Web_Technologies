<?php 
include_once('../config.php');
include_once(ROOT . 'includes/session.php');
include_once(ROOT . 'includes/database.php');
include_once(ROOT . 'database/db_users.php');
require_once(ROOT . 'includes/User.php');

$user = new User();

$user->firstname = $_POST['firstname'];
$user->lastname = $_POST['lastname'];
$user->username = $_POST['username'];
$user->email = $_POST['email'];
$password = $_POST['password'];

$result = "error";
$message = "";

$response = array(
    'result'=>$result,
    'message'=>$message
);

if (userExists($user->username)) {
    $response['message'] = 'Username ' . $user->username . ' already in use.';
    echo json_encode($response);
    die;
}

if (emailExists($user->email)) {
    $response['message'] = 'Email already in use.';
    echo json_encode($response);
    die;
}

addUser($user, $password);

$response['result'] = 'success';

$_SESSION['username'] = $user->username;

echo json_encode($response);
?>