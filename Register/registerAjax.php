<?php
require_once '../ClassUser.php';
require_once '../database.php';
require_once 'validator.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = $_POST['email'];
    $name = $_POST['name'];
    $first_name = $_POST['first_name'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $is_groomer = isset($_POST['is_groomer']) ? 1 : 0;

    // Get the form groomer in case the is toileteur is coched
    if ($is_groomer == 1) {
        $siret_number = $_POST['siret_number'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $department = $_POST['department'];
        $groomer_name = $_POST['groomer_name'];
    }

    $errors = [];

    if (empty($email) || empty($name) || empty($first_name) || empty($password) || empty($confirm_password)) { // if it's empty it's an error
        $errors[] = "Tous les champs sont obligatoires.";
    }

    if (!Validator::validateEmail($email)) { // error : if the email is not valid
        $errors[] = "Veuillez entrer une adresse email valide.";
    }

    $passwordErrors = Validator::getPasswordErrors($password); // error: if the password doesn't respect the password 8 char 1 maj 1 num 1 special char
    if (!empty($passwordErrors)) {
        $errors = array_merge($errors, $passwordErrors);
    }

    if ($password !== $confirm_password) { // error : password =! confirm pasword
        $errors[] = "Les mots de passe ne correspondent pas.";
    }

    if ($is_groomer == 1) { // if it's a groomer
        if (empty($siret_number) || empty($address) || empty($city) || empty($department)) { // error : if empty field
            $errors[] = "Tous les champs du toiletteur sont obligatoires.";
        }

        $siretErrors = Validator::getSiretErrors($siret_number); // error : if Siret isn't 14 int
        if (!empty($siretErrors)) {
            $errors = array_merge($errors, $siretErrors);
        }
    }

    // if the validator is ok then register the user
    if (empty($errors)) {
        try {
            $pdo = Database::getConnection();
            $user = new User($pdo);

            // Register of the user
            [$statusCode, $message] = $user->registerUser($email, $password, $name, $first_name);

            // if the user is a groomer register the groomer
            if ($statusCode === 200 && $is_groomer == 1) {
                [$groomerStatusCode, $groomerMessage] = $user->registerGroomer($email, $siret_number, $address, $city, $department, $groomer_name);

                if ($groomerStatusCode !== 200) {
                    http_response_code($groomerStatusCode);
                    echo json_encode(['status' => $groomerStatusCode, 'message' => $groomerMessage]);
                    exit;
                }
            }

            // if the login succesed, login and create the session
            if ($statusCode === 200) {

                [$loginStatusCode, $loginMessage, $userData] = $user->login($email, $password);

                if ($loginStatusCode === 200) {
                    // stocking the information in the session
                    $_SESSION['user_email'] = $userData['email'];
                    $_SESSION['groomer_id'] = $userData['groomer_id'];

                    http_response_code($statusCode);
                    echo json_encode([
                        'status' => $statusCode,
                        'message' => $message,
                        'redirect' => '/index.php'
                    ]);
                    exit;
                } else {
                    http_response_code($loginStatusCode);
                    echo json_encode(['status' => $loginStatusCode, 'message' => $loginMessage]);
                    exit;
                }
            } else {
                // if the register failed
                http_response_code($statusCode);
                echo json_encode(['status' => $statusCode, 'message' => $message]);
                exit;
            }
        } catch (PDOException $e) {
            // failed to connect at the database
            http_response_code(500);
            echo json_encode(['status' => 500, 'message' => "Erreur de base de données : " . $e->getMessage()]);
        }
    } else {
        // Error of validation with the validator
        http_response_code(400);
        echo json_encode(['status' => 400, 'message' => $errors]);
    }
} else {
    // if the hhtp method is not POST
    http_response_code(405);
    echo json_encode(['status' => 405, 'message' => 'Méthode non autorisée.']);
}