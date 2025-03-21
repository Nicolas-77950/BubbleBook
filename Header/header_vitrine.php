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
        
        /* Transition for header background on scroll */
        .header-scroll {
            transition: background-color 0.3s ease;
        }
        
        /* Transition for navigation buttons */
        .nav-buttons {
            transition: opacity 0.3s ease, transform 0.3s ease;
        }
        
        :root {
            --primary: #ec4899;
            --primary-dark: #db2777;
            --primary-light: #fbcfe8;
            --secondary: #f9a8d4;
            --text-light: #ffffff;
            --text-dark: #1f2937;
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>

<header id="main-header" class="fixed top-0 left-0 right-0 z-50 header-scroll">
    <div class="mx-auto flex justify-between items-center p-6">
        <!-- Logo -->
        <div class="flex items-center space-x-2">
            <img src="Header/logo.png" alt="Logo" class="h-10">
            <a href="index.php"><h2 class="text-white text-xl font-bold">BubbleBook</h2></a>
        </div>

        <!-- Buttons (visible on large screens) -->
        <div id="nav-buttons" class="hidden md:flex items-center space-x-4 gap-x-4 nav-buttons">
            <a href="inscription.php" class="bg-pink-600 text-white px-4 py-2 rounded-full text-sm shadow-md hover:bg-pink-600 transition-colors">
                <h2>Vous êtes toiletteur ?</h2>
            </a>
            <div class="flex flex-col items-center text-white text-sm">
                <a href="connexion.php" class="hover:text-pink-200 transition-colors">
                    <h2>Se connecter</h2>
                </a>
                <a href="#" class="text-pink-800 hover:text-pink-200 transition-colors">
                    <h2>Gérer mes RDV</h2>
                </a>
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
    <div id="mobile-menu" class="md:hidden absolute top-0 left-0 w-full bg-gray-800 transform -translate-y-full transition-transform duration-300 ease-in-out z-50">
        <div class="flex flex-col items-center p-4 space-y-4">
            <button class="bg-pink-600 text-white px-8 py-3 rounded-full font-medium hover:bg-pink-700 transition-colors">
                <h2>Vous êtes toiletteur ?</h2>
            </button>
            <div class="flex flex-col items-center text-white text-sm">
                <a href="connexion.php" class="hover:text-pink-200 transition-colors"><h2>Se connecter</h2></a>
                <a href="#" class="bg-pink-600 text-white px-8 py-3 rounded-full font-medium hover:bg-pink-700 transition-colors"><h2>Gérer mes RDV</h2></a>
            </div>
        </div>
    </div>
</header>

<!-- Script pour le menu burger -->
<script src="Header/burgerMenu.js"></script>

<!-- Script pour le header qui suit le scroll -->
<script>
window.addEventListener('scroll', function() {
    const header = document.getElementById('main-header');
    const navButtons = document.getElementById('nav-buttons');
    
    if (window.scrollY > 50) {
        // Quand on scrolle, ajouter un fond au header
        header.classList.add('bg-pink-500');
        header.classList.add('shadow-md');
        
        // Faire disparaître les boutons de navigation
        navButtons.style.opacity = '0';
        navButtons.style.transform = 'translateY(-20px)';
        setTimeout(() => {
            navButtons.style.display = 'none';
        }, 300); // Attendre la fin de la transition avant de cacher complètement
    } else {
        // Quand on est en haut, rendre le header transparent
        header.classList.remove('bg-pink-500');
        header.classList.remove('shadow-md');
        
        // Faire réapparaître les boutons de navigation
        navButtons.style.display = 'flex';
        setTimeout(() => {
            navButtons.style.opacity = '1';
            navButtons.style.transform = 'translateY(0)';
        }, 10); // Petit délai pour s'assurer que display:flex est appliqué avant l'animation
    }
});
</script>