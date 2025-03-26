<?php
session_start();
require_once '../database.php';
require_once '../ClassUser.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (empty($_POST['email']) || empty($_POST['password'])) {
        echo json_encode(['status' => 400, 'message' => 'Email et mot de passe requis']);
        exit;
    }

    $email = $_POST['email'];
    $password = $_POST['password'];

    $user = new User(Database::getConnection());
    $res = $user -> login($email,$password);

    if ($res[0] == 200) {
        $user = $res[2];

        // creation of the session
        $_SESSION['email'] = $user ['email']?? '';
        $_SESSION['groomer_id'] = $user ['groomer_id']?? '';
        $_SESSION['user_id'] = $user ['user_id']?? '';

        echo json_encode(['status' => 200, 'message' => $res[1]]);
    } else {
        echo json_encode(['status' => $res[0], 'message' => $res[1]]);
    }
    
    exit;
}

