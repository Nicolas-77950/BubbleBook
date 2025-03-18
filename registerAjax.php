<?php
require_once 'ClassUser.php';
require_once 'database.php';
require_once 'validator.php';

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

    if (empty($email) || empty($name) || empty($first_name) || empty($password) || empty($confirm_password)) {
        $errors[] = "Tous les champs sont obligatoires.";
    }

    // validation of the email
    if (!Validator::validateEmail($email)) {
        $errors[] = "Veuillez entrer une adresse email valide.";
    }

    // Validation the password
    $passwordErrors = Validator::getPasswordErrors($password);
    if (!empty($passwordErrors)) {
        $errors = array_merge($errors, $passwordErrors);
    }

    // Vérification the password matched
    if ($password !== $confirm_password) {
        $errors[] = "Les mots de passe ne correspondent pas.";
    }

    // Validation des champs spécifiques au toiletteur si la case est cochée
    if ($is_groomer == 1) {
        if (empty($siret_number) || empty($address) || empty($city) || empty($department)) {
            $errors[] = "Tous les champs du toiletteur sont obligatoires.";
        }
    }

    // Si aucune erreur, procéder à l'inscription
    if (empty($errors)) {
        try {
            $pdo = Database::getConnection();
            $user = new User($pdo);

            // Inscription de l'utilisateur
            [$statusCode, $message, $user_id] = $user->registerUser($email, $password, $name, $first_name);

            // Si l'inscription de l'utilisateur réussit et que la case toiletteur est cochée
            if ($statusCode === 200 && $is_groomer == 1) {
                // Inscription du toiletteur
                [$groomerStatusCode, $groomerMessage] = $user->registerGroomer($email, $siret_number, $address, $city, $department, $groomer_name);

                // Si l'inscription du toiletteur échoue, retourner l'erreur
                if ($groomerStatusCode !== 200) {
                    http_response_code($groomerStatusCode);
                    echo json_encode(['status' => $groomerStatusCode, 'message' => $groomerMessage]);
                    exit;
                }
            }

            // Retourner la réponse JSON
            http_response_code($statusCode);
            echo json_encode(['status' => $statusCode, 'message' => $message]);
        } catch (PDOException $e) {
            http_response_code(500);
            echo json_encode(['status' => 500, 'message' => "Erreur de base de données : " . $e->getMessage()]);
        }
    } else {
        // Retourner les erreurs de validation
        http_response_code(400);
        echo json_encode(['status' => 400, 'message' => $errors]);
    }
} else {
    // Si la méthode HTTP n'est pas POST
    http_response_code(405);
    echo json_encode(['status' => 405, 'message' => 'Méthode non autorisée.']);
}