<?php
session_start();
require_once '../database.php';
require_once '../ClassUser.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = new User(Database::getConnection());
    $res = $user -> login($email,$password);

    if ($res[0] == 200) {
        $user = $res[2];

        // creation of the session
        $_SESSION['email'] = $user ['email']?? '';
        $_SESSION['groomer_id'] = $user ['groomer_id']?? '';
    }
    echo json_encode(['succes' => $res[0],'message'=> $res[1]]);
    exit;
}

