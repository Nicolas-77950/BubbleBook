<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$isLoggedIn = !empty($_SESSION['user_id']);
$isGroomer = isset($_SESSION['groomer_id']) && !empty($_SESSION['groomer_id']);

$userName = isset($_SESSION['first_name']) ? $_SESSION['first_name'] : '';
?>

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
        
        @keyframes slideInDown {
            from { transform: translateY(-100%); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }
        
        .animate-slideInDown {
            animation: slideInDown 0.5s ease-out forwards;
        }
        
        @keyframes pulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
        }
        
        .animate-pulse-slow {
            animation: pulse 2s infinite;
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
        
        /* Effet de survol pour les boutons */
        .btn-hover-effect {
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
        }
        
        .btn-hover-effect:before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.2), transparent);
            transition: all 0.6s ease;
        }
        
        .btn-hover-effect:hover:before {
            left: 100%;
        }
        
        /* Notification badge */
        .notification-badge {
            position: absolute;
            top: -5px;
            right: -5px;
            background-color: #ef4444;
            color: white;
            border-radius: 50%;
            width: 18px;
            height: 18px;
            font-size: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }
        
        /* Dropdown menu */
        .dropdown-menu {
            visibility: hidden;
            opacity: 0;
            transform: translateY(10px);
            transition: all 0.3s ease;
        }
        
        .dropdown:hover .dropdown-menu {
            visibility: visible;
            opacity: 1;
            transform: translateY(0);
        }
    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>

<header id="main-header" class="fixed top-0 left-0 right-0 z-50 header-scroll animate-slideInDown">
    <div class="container mx-auto flex justify-between items-center p-6">
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
        <div id="nav-buttons" class="hidden md:flex items-center space-x-4 nav-buttons">
            <?php if (!$isLoggedIn): ?>
                <!-- Utilisateur non connecté -->
                <a href="login.php" class="bg-pink-600 text-white px-5 py-2 rounded-full text-sm shadow-md hover:bg-pink-700 transition-all duration-300 transform hover:scale-105 btn-hover-effect">
                    Vous êtes toiletteur ?
                </a>
                <div class="flex items-center space-x-4">
                    <a href="login.php" class="bg-pink-600 text-white px-4 py-2 rounded-full text-sm shadow-md hover:bg-pink-700 transition-all duration-300 flex items-center">
                        <i class="fas fa-sign-in-alt mr-2"></i>
                        Se connecter
                    </a>
                    <a href="register.php" class="bg-pink-600 text-white px-4 py-2 rounded-full text-sm shadow-md hover:bg-pink-700 transition-all duration-300 flex items-center">
                        <i class="fas fa-user-plus mr-2"></i>
                        S'inscrire
                    </a>
                </div>
            <?php elseif ($isLoggedIn && $isGroomer): ?>
                <!-- Toiletteur connecté -->
                <div class="flex items-center space-x-3">
                    <div class="dropdown relative">
                        <button class="flex items-center space-x-2 bg-pink-600 text-white px-4 py-2 rounded-full text-sm shadow-md hover:bg-pink-700 transition-all duration-300">
                            <span><?php echo !empty($userName) ? 'Bonjour, ' . htmlspecialchars($userName) : 'Mon compte'; ?></span>
                            <i class="fas fa-chevron-down text-xs"></i>
                        </button>
                        <div class="dropdown-menu absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-xl py-2 z-10">
                            <a href="updateGroomer.php" class="block px-4 py-2 text-gray-800 hover:bg-pink-50 transition-colors">
                                <i class="fas fa-user-edit mr-2 text-pink-500"></i> Modifier mon profil
                            </a>
                            <a href="manage_time.php" class="block px-4 py-2 text-gray-800 hover:bg-pink-50 transition-colors">
                                <i class="fas fa-calendar-alt mr-2 text-pink-500"></i> Agenda
                            </a>
                            <a href="history_time.php" class="block px-4 py-2 text-gray-800 hover:bg-pink-50 transition-colors">
                                <i class="fas fa-history mr-2 text-pink-500"></i> Historique
                            </a>
                            <div class="border-t border-gray-100 my-2"></div>
                            <a href="Header/logout.php" class="block px-4 py-2 text-gray-800 hover:bg-pink-50 transition-colors">
                                <i class="fas fa-sign-out-alt mr-2 text-pink-500"></i> Déconnexion
                            </a>
                        </div>
                    </div>
                </div>
            <?php else: ?>
                <!-- Utilisateur connecté -->
                <div class="flex items-center space-x-3">
                    <div class="dropdown relative">
                        <button class="flex items-center space-x-2 bg-pink-600 text-white px-4 py-2 rounded-full text-sm shadow-md hover:bg-pink-700 transition-all duration-300">
                            <span><?php echo !empty($userName) ? 'Bonjour, ' . htmlspecialchars($userName) : 'Mon compte'; ?></span>
                            <i class="fas fa-chevron-down text-xs"></i>
                        </button>
                        <div class="dropdown-menu absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-xl py-2 z-10">
                            <a href="profile.php" class="block px-4 py-2 text-gray-800 hover:bg-pink-50 transition-colors">
                                <i class="fas fa-user mr-2 text-pink-500"></i> Mon profil
                            </a>
                            <a href="calendar.php" class="block px-4 py-2 text-gray-800 hover:bg-pink-50 transition-colors">
                                <i class="fas fa-calendar-check mr-2 text-pink-500"></i> Mes rendez-vous
                            </a>
                            <div class="border-t border-gray-100 my-2"></div>
                            <a href="Header/logout.php" class="block px-4 py-2 text-gray-800 hover:bg-pink-50 transition-colors">
                                <i class="fas fa-sign-out-alt mr-2 text-pink-500"></i> Déconnexion
                            </a>
                        </div>
                    </div>
                    
                    <!-- Bouton de recherche rapide -->
                    <a href="research.php" class="p-2 bg-white bg-opacity-20 rounded-full hover:bg-opacity-30 transition-all duration-200">
                        <i class="fas fa-search text-white"></i>
                    </a>
                </div>
            <?php endif; ?>
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
        <div id="mobile-menu" class="md:hidden fixed top-0 left-0 w-full h-full bg-gradient-to-b from-pink-600 to-pink-700 transform -translate-y-full transition-transform duration-300 ease-in-out z-50 overflow-y-auto">
        <div class="flex flex-col p-6 min-h-screen">
            <div class="flex justify-between items-center mb-8">
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
            
            <div class="w-full h-px bg-pink-400/50 my-4"></div>
                          <?php if (!$isLoggedIn): ?>
                              <!-- Utilisateur non connecté (mobile) - Boutons harmonisés avec animations -->
                              <div class="flex flex-col space-y-4">
                                  <a href="login.php" class="bg-pink-500 text-white w-full py-3 rounded-full font-medium hover:bg-pink-400 transition-all duration-300 transform hover:scale-105 shadow-md flex items-center justify-center">
                                      <i class="fas fa-user-plus mr-2"></i>
                                      <span>Vous êtes toiletteur ?</span>
                                  </a>
                                  <a href="login.php" class="bg-pink-500 text-white w-full py-3 rounded-full font-medium hover:bg-pink-400 transition-all duration-300 transform hover:scale-105 shadow-md flex items-center justify-center">
                                      <i class="fas fa-sign-in-alt mr-2"></i>
                                      <span>Se connecter</span>
                                  </a>
                                  <a href="register.php" class="bg-pink-500 text-white w-full py-3 rounded-full font-medium hover:bg-pink-400 transition-all duration-300 transform hover:scale-105 shadow-md flex items-center justify-center">
                                      <i class="fas fa-user-plus mr-2"></i>
                                      <span>S'inscrire</span>
                                  </a>
                              </div>
                          <?php elseif ($isLoggedIn && $isGroomer): ?>
                              <!-- Toiletteur connecté (mobile) -->
                              <div class="flex flex-col space-y-4">
                                  <?php if (!empty($userName)): ?>
                                  <div class="text-white text-center mb-4">
                                      <p class="text-pink-200 text-sm">Connecté en tant que</p>
                                      <p class="font-bold text-lg"><?php echo htmlspecialchars($userName); ?></p>
                                  </div>
                                  <?php endif; ?>
                    
                                  <a href="updateGroomer.php" class="bg-pink-500 text-white w-full py-3 rounded-full font-medium hover:bg-pink-400 transition-colors text-center shadow-md flex items-center justify-center">
                                      <i class="fas fa-user-edit mr-2"></i>
                                      <span>Modifier mon profil</span>
                                  </a>
                                  <a href="manage_time.php" class="bg-pink-500 text-white w-full py-3 rounded-full font-medium hover:bg-pink-400 transition-colors text-center shadow-md flex items-center justify-center">
                                      <i class="fas fa-calendar-alt mr-2"></i>
                                      <span>Agenda</span>
                                  </a>
                                  <a href="history_time.php" class="bg-pink-500 text-white w-full py-3 rounded-full font-medium hover:bg-pink-400 transition-colors text-center shadow-md flex items-center justify-center">
                                      <i class="fas fa-history mr-2"></i>
                                      <span>Historique</span>
                                  </a>
                    
                                  <!-- Notifications -->
                                  <a href="notifications.php" class="bg-pink-500/30 text-white w-full py-3 rounded-full font-medium hover:bg-pink-400/40 transition-colors text-center shadow-md flex items-center justify-center">
                                      <i class="fas fa-bell mr-2"></i>
                                      <span>Notifications</span>
                                      <span class="ml-2 bg-red-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">3</span>
                                  </a>
                    
                                  <div class="w-full h-px bg-pink-400/50 my-2"></div>
                    
                                  <a href="Header/logout.php" class="flex items-center justify-center gap-2 bg-gray-200 text-gray-700 w-full py-3 rounded-full font-medium hover:bg-gray-300 transition-colors text-center shadow-md">
                                      <i class="fas fa-sign-out-alt"></i>
                                      <span>Déconnexion</span>
                                  </a>
                              </div>
                          <?php else: ?>
                              <!-- Client connecté (mobile) -->
                              <div class="flex flex-col space-y-4">
                                  <?php if (!empty($userName)): ?>
                                  <div class="text-white text-center mb-4">
                                      <p class="text-pink-200 text-sm">Connecté en tant que</p>
                                      <p class="font-bold text-lg"><?php echo htmlspecialchars($userName); ?></p>
                                  </div>
                                  <?php endif; ?>
                    
                                  <a href="profile.php" class="bg-pink-500 text-white w-full py-3 rounded-full font-medium hover:bg-pink-400 transition-colors text-center shadow-md flex items-center justify-center">
                                      <i class="fas fa-user mr-2"></i>
                                      <span>Mon profil</span>
                                  </a>
                                  <a href="calendar.php" class="bg-pink-500 text-white w-full py-3 rounded-full font-medium hover:bg-pink-400 transition-colors text-center shadow-md flex items-center justify-center">
                                      <i class="fas fa-calendar-check mr-2"></i>
                                      <span>Mes rendez-vous</span>
                                  </a>
                                  <a href="pets.php" class="bg-pink-500 text-white w-full py-3 rounded-full font-medium hover:bg-pink-400 transition-colors text-center shadow-md flex items-center justify-center">
                                      <i class="fas fa-paw mr-2"></i>
                                      <span>Mes animaux</span>
                                  </a>
                    
                                  <!-- Notifications -->
                                  <a href="notifications.php" class="bg-pink-500/30 text-white w-full py-3 rounded-full font-medium hover:bg-pink-400/40 transition-colors text-center shadow-md flex items-center justify-center">
                                      <i class="fas fa-bell mr-2"></i>
                                      <span>Notifications</span>
                                      <span class="ml-2 bg-red-500 text-white text-xs rounded-full w-5 h-5 flex items-center justify-center">2</span>
                                  </a>
                    
                                  <div class="w-full h-px bg-pink-400/50 my-2"></div>
                    
                                  <a href="Header/logout.php" class="flex items-center justify-center gap-2 bg-gray-200 text-gray-700 w-full py-3 rounded-full font-medium hover:bg-gray-300 transition-colors text-center shadow-md">
                                      <i class="fas fa-sign-out-alt"></i>
                                      <span>Déconnexion</span>
                                  </a>
                              </div>
                          <?php endif; ?>
            <!-- Informations de contact en bas du menu mobile -->
            <div class="mt-auto pt-8">
                <div class="text-pink-200 text-sm text-center">
                    <p class="mb-2">Besoin d'aide ?</p>
                    <a href="mailto:contact@bubblebook.fr" class="text-white hover:text-pink-200 flex items-center justify-center mb-2">
                        <i class="fas fa-envelope mr-2"></i>
                        contact@bubblebook.fr
                    </a>
                    <p>© 2025 BubbleBook</p>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Script pour le menu burger - Correction de la boucle infinie GET -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Vérifier que les éléments existent avant d'ajouter les écouteurs d'événements
    const menuToggle = document.getElementById('menu-toggle');
    const closeMenu = document.getElementById('close-menu');
    const mobileMenu = document.getElementById('mobile-menu');
    
    if (menuToggle && mobileMenu) {
        menuToggle.addEventListener('click', function(e) {
            e.preventDefault(); // Empêcher le comportement par défaut qui pourrait causer une requête GET
            mobileMenu.classList.remove('-translate-y-full');
            mobileMenu.classList.add('translate-y-0');
            document.body.style.overflow = 'hidden'; // Empêcher le défilement de la page
        });
    }
    
    if (closeMenu && mobileMenu) {
        closeMenu.addEventListener('click', function(e) {
            e.preventDefault(); // Empêcher le comportement par défaut
            mobileMenu.classList.remove('translate-y-0');
            mobileMenu.classList.add('-translate-y-full');
            document.body.style.overflow = ''; // Réactiver le défilement de la page
        });
    }
    
    // Fermer le menu si on clique sur un lien
    if (mobileMenu) {
        const links = mobileMenu.querySelectorAll('a');
        links.forEach(link => {
            link.addEventListener('click', function() {
                // Ne pas ajouter preventDefault ici pour permettre la navigation
                mobileMenu.classList.remove('translate-y-0');
                mobileMenu.classList.add('-translate-y-full');
                document.body.style.overflow = '';
            });
        });
    }
});

// Script pour le header qui suit le scroll
window.addEventListener('scroll', function() {
    const header = document.getElementById('main-header');
    const navButtons = document.getElementById('nav-buttons');
    
    if (!header || !navButtons) return; // Vérification
    
    if (window.scrollY > 50) {
        // Quand on scrolle, ajouter un fond au header
        header.classList.add('bg-pink-500', 'shadow-md', 'py-2', 'scrolled');
        
        // Faire disparaître les boutons de navigation sur les petits écrans
        if (window.innerWidth > 768) { // Seulement sur desktop
            navButtons.style.opacity = '0';
            navButtons.style.transform = 'translateY(-20px)';
            setTimeout(() => {
                navButtons.style.display = 'none';
            }, 300);
        }
    } else {
        // Quand on est en haut, rendre le header transparent
        header.classList.remove('bg-pink-500', 'shadow-md', 'py-2', 'scrolled');
        
        // Faire réapparaître les boutons de navigation
        if (window.innerWidth > 768) { // Seulement sur desktop
            navButtons.style.display = 'flex';
            setTimeout(() => {
                navButtons.style.opacity = '1';
                navButtons.style.transform = 'translateY(0)';
            }, 10);
        }
    }
});
</script>
