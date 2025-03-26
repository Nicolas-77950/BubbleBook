<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="BubbleBook - Trouvez facilement un toiletteur professionnel pour votre animal de compagnie">
    <meta name="keywords" content="toilettage, animaux, rendez-vous, toiletteur, chien, chat">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>BubbleBook - Plateforme de réservation de toilettage pour animaux</title>
    <link rel="icon" href="Header/favicon.ico" type="image/x-icon">
    <style>
        /* Animations et transitions */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .animate-fadeIn {
            animation: fadeIn 0.8s ease-out forwards;
        }
        
        /* Transition for menu open/close */
        #mobile-menu {
            transition: transform 0.3s ease-in-out;
        }
        
        /* Transition for header background on scroll */
        .header-scroll {
            transition: all 0.3s ease;
        }
        
        /* Transition for navigation buttons */
        .nav-buttons {
            transition: opacity 0.3s ease, transform 0.3s ease;
        }
        
        /* Variables de couleur globales */
        :root {
            --primary: #ec4899;
            --primary-dark: #db2777;
            --primary-light: #fbcfe8;
            --secondary: #f9a8d4;
            --text-light: #ffffff;
            --text-dark: #1f2937;
        }
        
        /* Styles personnalisés */
        .logo-container {
            transition: all 0.3s ease;
        }
        
        .scrolled .logo-container {
            transform: scale(0.85);
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>

<header id="main-header" class="fixed top-0 left-0 right-0 z-50 header-scroll">
    <div class="mx-auto flex justify-between items-center p-6">
        <!-- Logo avec animation -->
        <div class="flex items-center space-x-2 logo-container">
            <img src="Header/logo.png" alt="Logo BubbleBook" class="h-10 drop-shadow-md">
            <a href="index.php" class="group">
                <h2 class="text-white text-xl font-bold group-hover:text-pink-200 transition-colors duration-300">
                    Bubble<span class="text-pink-200 group-hover:text-white transition-colors duration-300">Book</span>
                </h2>
            </a>
        </div>

        <!-- Buttons (visible on large screens) -->
        <div id="nav-buttons" class="hidden md:flex items-center space-x-6 nav-buttons">
            <a href="register.php" class="bg-pink-600 text-white px-5 py-2 rounded-full text-sm shadow-md hover:bg-pink-700 transition-all duration-300 transform hover:scale-105">
                <h2>Vous êtes toiletteur ?</h2>
            </a>
            <div class="flex flex-col items-center text-white text-sm">
                <a href="connexion.php" class="hover:text-pink-200 transition-colors mb-1 font-medium">
                    <h2>Se connecter</h2>
                </a>
                <a href="#" class="text-pink-200 hover:text-white transition-colors font-medium">
                    <h2>Gérer mes RDV</h2>
                </a>
            </div>
        </div>

        <!-- Burger menu button (visible on small screens) -->
        <button id="menu-toggle" class="md:hidden text-white focus:outline-none p-2 rounded-full hover:bg-pink-600/30 transition-colors">
            <!-- Burger menu icon -->
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </button>
    </div>

    <!-- Mobile menu (hidden by default) -->
    <div id="mobile-menu" class="md:hidden absolute top-0 left-0 w-full bg-gradient-to-b from-pink-600 to-pink-700 transform -translate-y-full transition-transform duration-300 ease-in-out z-50 shadow-xl">
        <div class="flex flex-col items-center p-6 space-y-6">
            <div class="flex justify-between w-full items-center">
                <div class="flex items-center space-x-2">
                    <img src="Header/logo.png" alt="Logo" class="h-8">
                    <h2 class="text-white text-lg font-bold">BubbleBook</h2>
                </div>
                <button id="close-menu" class="text-white focus:outline-none p-2 rounded-full hover:bg-pink-500/30 transition-colors">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
            
            <a href="inscription.php" class="bg-white text-pink-600 w-full py-3 rounded-full font-medium hover:bg-pink-100 transition-colors text-center shadow-md">
                Vous êtes toiletteur ?
            </a>
            
            <a href="connexion.php" class="text-white hover:text-pink-200 transition-colors text-lg font-medium">
                Se connecter
            </a>
            
            <a href="#" class="bg-pink-500 text-white w-full py-3 rounded-full font-medium hover:bg-pink-400 transition-colors text-center shadow-md">
                Gérer mes RDV
            </a>
        </div>
    </div>
</header>

<!-- Script pour le menu burger -->
<script>
document.getElementById('menu-toggle').addEventListener('click', function() {
    const mobileMenu = document.getElementById('mobile-menu');
    mobileMenu.classList.remove('-translate-y-full');
    mobileMenu.classList.add('translate-y-0');
});

document.getElementById('close-menu').addEventListener('click', function() {
    const mobileMenu = document.getElementById('mobile-menu');
    mobileMenu.classList.remove('translate-y-0');
    mobileMenu.classList.add('-translate-y-full');
});
</script>

<script>
window.addEventListener('scroll', function() {
    const header = document.getElementById('main-header');
    const navButtons = document.getElementById('nav-buttons');
    
    if (window.scrollY > 50) {
        header.classList.add('bg-pink-500', 'shadow-md', 'py-2', 'scrolled');
        
        navButtons.style.opacity = '0';
        navButtons.style.transform = 'translateY(-20px)';
        setTimeout(() => {
            navButtons.style.display = 'none';
        }, 300); 
    } else {
        header.classList.remove('bg-pink-500', 'shadow-md', 'py-2', 'scrolled');
        
        navButtons.style.display = 'flex';
        setTimeout(() => {
            navButtons.style.opacity = '1';
            navButtons.style.transform = 'translateY(0)';
        }, 10); 
    }
});
</script>
