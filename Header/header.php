<?php 

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$isLoggin = empty($_SESSION);
$isGroomer = empty($_SESSION['groomer_id']);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>BubbleBook</title>
    <style>
        /* Transition for menu open/close */
        #mobile-menu {
            transition: transform 0.3s ease-in-out;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body class="bg-pink-0">

<header class="relative w-full h-[250px] bg-no-repeat bg-cover bg-center" style="background-image: url('Header/image.png');">
    <div class="mx-auto flex justify-between items-center p-10">
        <!-- Logo -->
        <div class="flex items-center space-x-2">
            <img src="Header/logo.png" alt="Logo" class="h-10">
            <a href="/index.php"><h2 class="text-white text-xl font-bold">BubbleBook</h2></a>
        </div>

        <!-- Buttons -->
        <div class="hidden md:flex items-center space-x-4 gap-x-4">
            <?php if ($isLoggin) : ?>
                <button class="bg-pink-600 text-white px-4 py-2 rounded-full text-sm shadow-md hover:bg-pink-700">
                    <a href="/register.php"><h2>Vous êtes toiletteur ?</h2></a>
                </button>
                <div class="flex flex-col items-center text-white text-sm">
                    <a href="/login.php"><h2>Se connecter</h2></a>
                    <a href="/register.php" class="text-pink-600 hover:underline"><h2>S'inscrire</h2></a>
                </div>
            <?php elseif (!$isLoggin && $isGroomer) : ?>
                <div class="flex flex-row items-center text-sm py-2 gap-x-4">
                    <button class="bg-pink-600 text-white px-4 py-2 rounded-full text-sm shadow-md hover:bg-pink-700">
                        <a href="/log.php"><h2>Profil</h2></a>
                    </button>
                    <button class="bg-white text-pink-600 px-4 py-2 rounded-full text-sm shadow-md hover:bg-pink-100">
                        <a href="/calendar.php"><h2>Agenda</h2></a>
                    </button>
                    <a href="Header/logout.php">
                        <button class="flex items-center gap-2 bg-gray-200 text-gray-700 px-4 py-2 rounded-full text-sm shadow-md hover:bg-gray-300 transition-colors duration-200">
                            <i class="fa-solid fa-right-from-bracket text-sm"></i>
                            <span class="font-medium">Déconnexion</span>
                        </button>
                    </a>
                </div>
            <?php elseif (!$isLoggin && !$isGroomer) : ?>
                <div class="flex flex-row items-center text-sm py-2 gap-x-4">
                    <button class="bg-pink-600 text-white px-4 py-2 rounded-full text-sm shadow-md hover:bg-pink-700">
                        <a href="/updateGroomer.php"><h2>Profil</h2></a>
                    </button>
                    <button class="bg-white text-pink-600 px-4 py-2 rounded-full text-sm shadow-md hover:bg-pink-100">
                        <a href="/manage_time.php"><h2>Gérer mes RDV</h2></a>
                    </button>
                    <button class="bg-white text-pink-600 px-4 py-2 rounded-full text-sm shadow-md hover:bg-pink-100">
                        <a href="/history_time.php"><h2>Historique</h2></a>
                    </button>
                    <a href="Header/logout.php">
                        <button class="flex items-center gap-2 bg-gray-200 text-gray-700 px-4 py-2 rounded-full text-sm shadow-md hover:bg-gray-300 transition-colors duration-200">
                            <i class="fa-solid fa-right-from-bracket text-sm"></i>
                            <span class="font-medium">Déconnexion</span>
                        </button>
                    </a>
                </div>
            
            <?php endif; ?>
        </div>

        <!-- Burger menu button (visible on small screens) -->
        <button id="menu-toggle" class="md:hidden text-white focus:outline-none">
            <!-- Burger menu icon -->
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </button>
    </div>

    <!-- Mobile menu (hidden by default) -->
    <div id="mobile-menu" class="md:hidden absolute top-0 left-0 w-full bg-gray-800 transform -translate-y-full transition-transform duration-300 ease-in-out">
        <div class="flex flex-col items-center p-4 space-y-4">
            <?php if ($isLoggin) : ?>
                <button class="bg-pink-600 text-white px-4 py-2 rounded-full text-sm shadow-md hover:bg-pink-700">
                    <a href="/register.php"><h2>Vous êtes toiletteur ?</h2></a>
                </button>
                <div class="flex flex-col items-center text-white text-sm">
                    <a href="/login.php"><h2>Se connecter</h2></a>
                    <a href="/register.php" class="text-pink-600 hover:underline"><h2>S'inscrire</h2></a>
                </div>
            <?php elseif (!$isLoggin && $isGroomer) : ?>
                <div class="flex flex-col items-center text-sm py-2 gap-y-4">
                    <button class="bg-pink-600 text-white px-4 rounded-full text-sm shadow-md hover:bg-pink-700">
                        <a href="/log.php"><h2>Profil</h2></a>
                    </button>
                    <button class="bg-white text-pink-600 px-4 rounded-full text-sm shadow-md hover:bg-pink-100">
                        <a href="/calendar.php"><h2>Agenda</h2></a>
                    </button>
                    <a href="Header/logout.php">
                        <button class="flex items-center gap-2 bg-gray-200 text-gray-700 px-4 py-2 rounded-full text-sm shadow-md hover:bg-gray-300 transition-colors duration-200">
                            <i class="fa-solid fa-right-from-bracket text-sm"></i>
                            <span class="font-medium">Déconnexion</span>
                        </button>
                    </a>
                </div>
            <?php elseif (!$isLoggin && !$isGroomer) : ?>
                <div class="flex flex-col items-center text-sm py-2 gap-y-4">
                    <button class="bg-pink-600 text-white px-4 py-2 rounded-full text-sm shadow-md hover:bg-pink-700">
                        <a href="/updateGroomer.php"><h2>Profil</h2></a>
                    </button>
                    <button class="bg-white text-pink-600 px-4 py-2 rounded-full text-sm shadow-md hover:bg-pink-100">
                        <a href="/manage_time.php"><h2>Gérer mes RDV</h2></a>
                    </button>
                    <button class="bg-white text-pink-600 px-4 py-2 rounded-full text-sm shadow-md hover:bg-pink-100">
                        <a href="/history_time.php"><h2>Historique</h2></a>
                    </button>
                    <a href="Header/logout.php">
                        <button class="flex items-center gap-2 bg-gray-200 text-gray-700 px-4 py-2 rounded-full text-sm shadow-md hover:bg-gray-300 transition-colors duration-200">
                            <i class="fa-solid fa-right-from-bracket text-sm"></i>
                            <span class="font-medium">Déconnexion</span>
                        </button>
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</header>

<!-- Call the JavaScript file for the burger menu -->
<script src="Header/burgerMenu.js"></script>