<?php
class User {
    private $db;

    public function __construct($pdo) {
        $this->db = $pdo;
    }

    // register of a new user
    public function registerUser($email, $password, $name, $first_name) {
        try {
            // Verification if the email is already existing
            $stmt = $this->db->prepare("SELECT 1 FROM User WHERE email = :email");
            $stmt->execute(['email' => $email]);
            if ($stmt->rowCount() > 0) {
                return [400, 'Email déjà pris.'];
            }

            // hashed password
            $hashed_password = password_hash($password, PASSWORD_DEFAULT, ['cost' => 12]);

            // insertion of the new user
            $stmt = $this->db->prepare("INSERT INTO User (email, password, name, first_name) VALUES (:email, :password, :name, :first_name)");

            // Execution of the request
            if ($stmt->execute([
                'email' => $email,
                'password' => $hashed_password,
                'name' => $name,
                'first_name' => $first_name
            ])) {
                return [200, 'Inscription réussie.'];
            } else {
                return [400, "Erreur lors de l'inscription."];
            }
        } catch (PDOException $e) {
            // if an error occured, send the error
            return [500, "Erreur de base de données : " . $e->getMessage()];
        }
    }
}