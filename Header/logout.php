<?php
require_once '/ClassUser.php';
require_once '/database.php';

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$user = new User(Database::getConnection());

$user->logout();

header('Location: login.php');
exit();
?>