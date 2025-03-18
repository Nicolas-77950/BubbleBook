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
            if ($stmt->fetchColumn()) {
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

    public function registerGroomer($email, $siret_number, $address, $city, $department) {
        try {
            // Check if the SIRET number already exists and is verified
            $stmt = $this->db->prepare("SELECT 1 FROM Groomer WHERE siret_number = :siret_number AND is_verified = TRUE");
            $stmt->execute(['siret_number' => $siret_number]);
            if ($stmt->fetchColumn()) {
                return [400, 'Ce toiletteur existe déjà.'];
            }
    
            // Insert the new groomer
            $stmt = $this->db->prepare("INSERT INTO Groomer (siret_number, address, city, department) VALUES (:siret_number, :address, :city, :department)");
            $stmt->execute([
                'siret_number' => $siret_number,
                'address' => $address,
                'city' => $city,
                'department' => $department
            ]);
    
            // Get the groomer ID after insertion
            $groomer_id = $this->db->lastInsertId();
    
            // Update the user with the groomer ID using the email
            $stmt = $this->db->prepare("UPDATE User SET groomer_id = :groomer_id WHERE email = :email");
            $stmt->execute([
                'groomer_id' => $groomer_id,
                'email' => $email
            ]);
    
            return [200, 'Inscription de toiletteur réussie.'];
        } catch (PDOException $e) {
            return [500, "Erreur de base de données : " . $e->getMessage()];
        }
    }
}