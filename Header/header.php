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
</head>
<body class="bg-gray-100">

<header class="relative w-full h-[250px] bg-no-repeat bg-cover bg-center" style="background-image: url('image.png');">
    <div class="mx-auto flex justify-between items-center p-10">
        <!-- Logo -->
        <div class="flex items-center space-x-2">
            <img src="logo.png" alt="Logo" class="h-10">
            <a href=""><h2 class="text-white text-xl font-bold">BubbleBook</h2></a>
        </div>

        <!-- Buttons (visible on large screens) -->
        <div class="hidden md:flex items-center space-x-4 gap-x-4">
            <button class="bg-pink-600 text-white px-4 py-2 rounded-full text-sm shadow-md hover:bg-pink-700">
                <h2>Vous êtes toiletteur ?</h2>
            </button>
            <div class="flex flex-col items-center text-white text-sm">
                <span><h2>Se connecter</h2></span>
                <a href="#" class="text-pink-600 hover:underline"><h2>Gérer mes RDV</h2></a>
            </div>
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
            <button class="bg-pink-600 text-white px-4 py-2 rounded-full text-sm shadow-md hover:bg-pink-700 w-full">
                <h2>Vous êtes toiletteur ?</h2>
            </button>
            <div class="flex flex-col items-center text-white text-sm">
                <span><h2>Se connecter</h2></span>
                <a href="#" class="text-pink-600 hover:underline"><h2>Gérer mes RDV</h2></a>
            </div>
        </div>
    </div>
</header>

<!-- Call the JavaScript file for the burger menu -->
<script src="burgerMenu.js"></script>