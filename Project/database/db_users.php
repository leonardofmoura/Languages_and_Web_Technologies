<?php 

include_once(ROOT . 'includes/database.php');

function addUser($user, $password) {
    $db = Database::instance()->db();

    $stmt = $db->prepare("INSERT INTO USER(username, firstName, lastName, email, password) values (?, ?, ?, ?, ?)");
    $stmt->execute(array(
        $user->username,
        $user->firstname,
        $user->lastname,
        $user->email,
        password_hash($password, PASSWORD_DEFAULT)
    ));
}

function checkUserPassword($username, $password) {
    $db = Database::instance()->db();

    $stmt = $db->prepare('SELECT username, password FROM user WHERE username=?');
    $stmt->execute(array($username));

    $user = $stmt->fetch();

    return $user !== false && password_verify($password, $user['password']);
}

function updateUserInfo($username, $firstname, $lastname, $email) {
    $db = Database::instance()->db();

    $stmt = $db->prepare('UPDATE user SET firstName=?, lastName=?, email=? where username=?');
    $stmt->execute(
        $firstname,
        $lastname,
        $email,
        $username
    );
}

function updateUserPassword($username, $oldPassword, $newPassword) {
    if ($newPassword === '') {
        return false;
    }

    if (!checkUserPassword($username, $oldPassword)) {
        return false;
    }

    $db = Database::instance()->db();

    $stmt = $db->prepare('UPDATE user SET password=? where username=?');
    $stmt->execute(
        password_hash($newPassword, PASSWORD_DEFAULT),
        $username
    );

    return true;
}

function getUser($username) {
    $db = Database::instance()->db();

    $stmt = $db->prepare("SELECT * FROM USER WHERE username=?");
    $stmt->execute(array($username));

    return $stmt->fetch();
}

function getUserById($userId) {
    $db = Database::instance()->db();

    $stmt = $db->prepare("SELECT * FROM USER WHERE id=?");
    $stmt->execute(array($userId));

    return $stmt->fetch();
}

function userExists($username) {
    $db = Database::instance()->db();

    $stmt = $db->prepare("SELECT count(*) as count FROM USER WHERE username=?");
    $stmt->execute(array($username));

    return $stmt->fetch()['count'] > 0;
}

function emailExists($email) {
    $db = Database::instance()->db();

    $stmt = $db->prepare("SELECT count(*) as count FROM user WHERE email=?");
    $stmt->execute(array($email));

    return $stmt->fetch()['count'] > 0;
}

function addLanlord($userID) {
    $db = Database::instance()->db();

    $stmt = $db->prepare("INSERT INTO landlord(id) values (?)");
    $stmt->execute(array(intval($userID)));
}

function isLandlord($userID) {
    $db = Database::instance()->db();

    $stmt = $db->prepare("SELECT count(*) as count FROM landlord WHERE id=?");
    $stmt->execute(array(intval($userID)));

    return $stmt->fetch()['count'] > 0;
}

?>