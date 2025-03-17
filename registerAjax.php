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

    if (empty($email) || empty($name) || empty($first_name) || empty($password) || empty($confirm_password)) {
        $errors[] = "Tous les champs sont obligatoires.";
    }

    if ($password !== $confirm_password) {
        $errors[] = "Les mots de passe ne correspondent pas.";
    }

}