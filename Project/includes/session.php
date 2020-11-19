<?php 
include_once('../database/db_users.php');
session_start();

function generateToken() {
    return bin2hex(openssl_random_pseudo_bytes(64));
}

function getSessionUser() {
    if (!isset($_SESSION['username'])) {
        return false;
    }
    return getUser($_SESSION['username']);
}

if (!isset($_SESSION['csrf'])) {
    $_SESSION['csrf'] = generateToken();
}
    
?>