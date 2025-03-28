<footer class="bg-gradient-to-r from-pink-500 to-pink-600 text-white py-16">
    <div class="container mx-auto px-4">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10 mb-12">
            <div>
                <div class="flex items-center space-x-2 mb-4">
                    <img src="Header/logo.png" alt="Logo BubbleBook" class="h-10">
                    <h3 class="text-xl font-bold">BubbleBook</h3>
                </div>
                <p class="text-pink-100 mb-4">La première plateforme qui connecte les propriétaires d'animaux avec des toiletteurs professionnels près de chez eux.</p>
                <div class="flex space-x-4">
                    <a href="https://github.com/Nicolas-77950/BubbleBook" target="_blank" rel="noopener noreferrer" class="text-white hover:text-pink-200 transition duration-300">
                        <i class="fab fa-github fa-lg"></i>
                    </a>
                    <a href="https://www.linkedin.com/in/amandine-guisy-b8190b330/" target="_blank" rel="noopener noreferrer" class="text-white hover:text-pink-200 transition duration-300">
                        <i class="fab fa-linkedin-in fa-lg"></i>
                    </a>
                    <a href="#" class="text-white hover:text-pink-200 transition duration-300">
                        <i class="fab fa-facebook-f fa-lg"></i>
                    </a>
                    <a href="#" class="text-white hover:text-pink-200 transition duration-300">
                        <i class="fab fa-instagram fa-lg"></i>
                    </a>
                </div>
            </div>
            
            <!-- Liens rapides -->
            <div>
                <h4 class="text-lg font-semibold mb-4 border-b border-pink-400 pb-2">Liens rapides</h4>
                <ul class="space-y-2">
                    <li><a href="index.php" class="text-pink-100 hover:text-white transition duration-300">Accueil</a></li>
                    <li><a href="#" class="text-pink-100 hover:text-white transition duration-300">Rechercher un toiletteur</a></li>
                    <li><a href="#" class="text-pink-100 hover:text-white transition duration-300">Comment ça marche</a></li>
                    <li><a href="#" class="text-pink-100 hover:text-white transition duration-300">Blog</a></li>
                    <li><a href="#" class="text-pink-100 hover:text-white transition duration-300">À propos</a></li>
                </ul>
            </div>
            
            <!-- Informations légales -->
            <div>
                <h4 class="text-lg font-semibold mb-4 border-b border-pink-400 pb-2">Informations légales</h4>
                <ul class="space-y-2">
                    <li><a href="#" class="text-pink-100 hover:text-white transition duration-300">Conditions générales</a></li>
                    <li><a href="#" class="text-pink-100 hover:text-white transition duration-300">Politique de confidentialité</a></li>
                    <li><a href="#" class="text-pink-100 hover:text-white transition duration-300">Mentions légales</a></li>
                    <li><a href="#" class="text-pink-100 hover:text-white transition duration-300">Cookies</a></li>
                </ul>
            </div>
            
            <!-- Contact -->
            <div>
                <h4 class="text-lg font-semibold mb-4 border-b border-pink-400 pb-2">Contact</h4>
                <ul class="space-y-2">
                    <li class="flex items-center space-x-2">
                        <i class="fas fa-envelope text-pink-200"></i>
                        <a href="mailto:contact@bubblebook.fr" class="text-pink-100 hover:text-white transition duration-300">contact@bubblebook.fr</a>
                    </li>
                    <li class="flex items-center space-x-2">
                        <i class="fas fa-phone text-pink-200"></i>
                        <a href="tel:+33123456789" class="text-pink-100 hover:text-white transition duration-300">01 23 45 67 89</a>
                    </li>
                    <li class="flex items-center space-x-2">
                        <i class="fas fa-map-marker-alt text-pink-200"></i>
                        <span class="text-pink-100">Paris, France</span>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Section Notre équipe -->
        <div class="mb-12">
            <h3 class="text-xl font-bold text-center mb-8">Notre équipe</h3>
            
            <style>
                .member-avatar {
                    position: relative;
                    width: 6rem;
                    height: 6rem;
                    border-radius: 50%;
                    background-color: rgb(251, 207, 232);
                    border: 4px solid white;
                    box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
                    overflow: hidden;
                }
                
                .member-avatar img {
                    width: 100%;
                    height: 100%;
                    object-fit: cover;
                }
                
                .member-avatar::before {
                    content: attr(data-initials);
                    position: absolute;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    font-size: 1.5rem;
                    font-weight: bold;
                    color: #db2777;
                    background-color: rgb(251, 207, 232);
                }
                
                .member-avatar img[src] {
                    position: relative;
                    z-index: 1;
                }
            </style>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="flex flex-col items-center transform transition-all duration-300 hover:-translate-y-2">
                    <div class="member-avatar mb-4" data-initials="N">
                        <img src="Footer/membre1.jpg" alt="Photo de Nicolas" class="w-full h-full object-cover">
                    </div>
                    <h4 class="font-bold">Nicolas</h4>
                    <p class="text-pink-200 text-sm">Développeur Web</p>
                    <div class="flex mt-2 space-x-2">
                        <a href="https://github.com/Nicolas-77950" target="_blank" rel="noopener noreferrer" class="text-white hover:text-pink-200 transition duration-300">
                            <i class="fab fa-github"></i>
                        </a>
                        <a href="#" target="_blank" rel="noopener noreferrer" class="text-white hover:text-pink-200 transition duration-300">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </div>
                
                <div class="flex flex-col items-center transform transition-all duration-300 hover:-translate-y-2">
                    <div class="member-avatar mb-4" data-initials="A">
                        <img src="Footer/membre2.jpg" alt="Photo d'Amandine" class="w-full h-full object-cover">
                    </div>
                    <h4 class="font-bold">Amandine</h4>
                    <p class="text-pink-200 text-sm">Développeur Web</p>
                    <div class="flex mt-2 space-x-2">
                        <a href="#" target="_blank" rel="noopener noreferrer" class="text-white hover:text-pink-200 transition duration-300">
                            <i class="fab fa-github"></i>
                        </a>
                        <a href="https://www.linkedin.com/in/amandine-guisy-b8190b330/" target="_blank" rel="noopener noreferrer" class="text-white hover:text-pink-200 transition duration-300">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </div>
                
                <div class="flex flex-col items-center transform transition-all duration-300 hover:-translate-y-2">
                    <div class="member-avatar mb-4" data-initials="M">
                        <img src="Footer/membre3.jpg" alt="Photo de Maxence" class="w-full h-full object-cover">
                    </div>
                    <h4 class="font-bold">Maxence</h4>
                    <p class="text-pink-200 text-sm">Développeur Web</p>
                    <div class="flex mt-2 space-x-2">
                        <a href="#" target="_blank" rel="noopener noreferrer" class="text-white hover:text-pink-200 transition duration-300">
                            <i class="fab fa-github"></i>
                        </a>
                        <a href="#" target="_blank" rel="noopener noreferrer" class="text-white hover:text-pink-200 transition duration-300">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </div>
                
                <div class="flex flex-col items-center transform transition-all duration-300 hover:-translate-y-2">
                    <div class="member-avatar mb-4" data-initials="D">
                        <img src="Footer/membre4.jpg" alt="Photo de Damien" class="w-full h-full object-cover">
                    </div>
                    <h4 class="font-bold">Damien</h4>
                    <p class="text-pink-200 text-sm">Développeur Web</p>
                    <div class="flex mt-2 space-x-2">
                        <a href="#" target="_blank" rel="noopener noreferrer" class="text-white hover:text-pink-200 transition duration-300">
                            <i class="fab fa-github"></i>
                        </a>
                        <a href="#" target="_blank" rel="noopener noreferrer" class="text-white hover:text-pink-200 transition duration-300">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Copyright et liens sociaux -->
        <div class="text-center border-t border-pink-400 pt-8">
            <p class="text-sm mb-4">© 2025 BubbleBook. Tous droits réservés.</p>
            <div class="flex justify-center space-x-6">
                <a href="https://github.com/Nicolas-77950/BubbleBook" target="_blank" rel="noopener noreferrer" class="text-white hover:text-pink-200 transition duration-300">
                    <i class="fab fa-github fa-lg"></i>
                </a>
                <a href="https://www.linkedin.com/in/amandine-guisy-b8190b330/" target="_blank" rel="noopener noreferrer" class="text-white hover:text-pink-200 transition duration-300">
                    <i class="fab fa-linkedin-in fa-lg"></i>
                </a>
                <a href="#" class="text-white hover:text-pink-200 transition duration-300">
                    <i class="fab fa-facebook-f fa-lg"></i>
                </a>
                <a href="#" class="text-white hover:text-pink-200 transition duration-300">
                    <i class="fab fa-instagram fa-lg"></i>
                </a>
            </div>
        </div>
    </div>
</footer>
</html>
