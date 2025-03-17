<?php
require_once 'ClassUser.php';
require_once 'database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = $_POST['email'];
    $name = $_POST['name'];
    $first_name = $_POST['first_name'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $is_groomer = isset($_POST['is_groomer']) ? 1 : 0;

    $errors = [];

    // Verification of the input, if their are empty
    if (empty($email) || empty($name) || empty($first_name) || empty($password) || empty($confirm_password)) {
        $errors[] = "Tous les champs sont obligatoires.";
    }

    // Verification that the password and confirm password are the same
    if ($password !== $confirm_password) {
        $errors[] = "Les mots de passe ne correspondent pas.";
    }

    //if their is no errors, we can register
    if (empty($errors)) {
        try {

            $pdo = Database::getConnection();
            $user = new User($pdo);

            // register of the user
            [$statusCode, $message] = $user->registerUser($email, $password, $name, $first_name);

            // Return the json
            http_response_code($statusCode);
            echo json_encode(['status' => $statusCode, 'message' => $message]);
        } catch (PDOException $e) {

            http_response_code(500);
            echo json_encode(['status' => 500, 'message' => "Error with the databse : " . $e->getMessage()]);
        }
    } else {
        // Return the valiators errors
        http_response_code(400);
        echo json_encode(['status' => 400, 'message' => $errors]);
    }
} else {
    // if the request is not a post
    http_response_code(405);
    echo json_encode(['status' => 405, 'message' => 'Méthode non autorisée.']);
}