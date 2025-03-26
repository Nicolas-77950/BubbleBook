<?php 
  require_once "Header/header_vitrine.php";
?>

<body class="bg-gray-50 min-h-screen flex flex-col">
  <div class="relative h-[645px] bg-cover bg-center w-full" style="background-image: url('Header/image.png')">
  <div class="absolute inset-0 bg-gradient-to-b from-black/50 to-pink-900/30"></div>
  <div class="pt-28"></div>
  
  <div class="relative z-10 flex flex-col items-center justify-center h-[400px] text-white text-center px-4 mt-6 animate-fadeIn">
    <h1 class="text-4xl md:text-6xl font-bold mb-6 drop-shadow-lg leading-tight">
      Trouvez le <span class="text-pink-200">toiletteur idéal</span> pour votre animal
    </h1>
    <p class="text-xl md:text-2xl mb-10 max-w-2xl drop-shadow-lg font-light">
      Prenez rendez-vous en quelques clics avec les meilleurs professionnels près de chez vous
    </p>
  </div>
  
  <!-- Remplacer la barre de recherche par un gros bouton de recherche -->
  <div class="relative z-10 absolute -bottom-8 left-0 right-0 mx-auto max-w-4xl">
    <a href="research.php" class="flex items-center justify-center bg-white rounded-xl shadow-2xl p-6 text-xl font-bold text-gray-800 hover:bg-pink-50 transition-all duration-300 transform hover:scale-105">
      <i class="fas fa-search text-pink-500 text-2xl mr-4"></i>
      Rechercher un toiletteur
      <i class="fas fa-arrow-right text-pink-500 ml-4"></i>
    </a>
  </div>
</div>

  <!-- Section À propos -->
  <section class="py-24 bg-white">
    <div class="container mx-auto px-4">
      <h2 class="text-3xl md:text-4xl font-bold text-center text-gray-900 mb-4">Bienvenue sur BubbleBook</h2>
      <div class="w-20 h-1 bg-pink-500 mx-auto mb-10 rounded-full"></div>
      <div class="max-w-3xl mx-auto text-center">
        <p class="text-lg text-gray-700 mb-8 leading-relaxed">
          BubbleBook est la première plateforme qui vous permet de trouver facilement un toiletteur professionnel 
          pour votre animal de compagnie. Que vous ayez un chien, un chat ou tout autre animal, nous vous 
          connectons avec les meilleurs toiletteurs près de chez vous.
        </p>
        <div class="flex justify-center">
          <a href="register.php" class="bg-pink-500 text-white px-8 py-3 rounded-full font-medium hover:bg-pink-600 transition-all duration-300 transform hover:scale-105 shadow-md">
            Créer un compte gratuitement
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- Section Avantages -->
  <section class="py-20 bg-pink-50">
    <div class="container mx-auto px-4">
      <h2 class="text-3xl md:text-4xl font-bold text-center text-gray-900 mb-4">Pourquoi choisir BubbleBook ?</h2>
      <div class="w-20 h-1 bg-pink-500 mx-auto mb-16 rounded-full"></div>
      
      <div class="grid md:grid-cols-3 gap-10">
        <div class="bg-white p-8 rounded-xl shadow-md text-center transform transition-all duration-300 hover:-translate-y-2 hover:shadow-lg">
          <div class="w-20 h-20 bg-pink-100 rounded-full flex items-center justify-center mx-auto mb-6">
            <i class="fas fa-search text-pink-500 text-2xl"></i>
          </div>
          <h3 class="text-xl font-bold text-gray-900 mb-4">Recherche facile</h3>
          <p class="text-gray-700">Trouvez rapidement un toiletteur qualifié près de chez vous grâce à notre moteur de recherche intuitif.</p>
        </div>
        
        <div class="bg-white p-8 rounded-xl shadow-md text-center transform transition-all duration-300 hover:-translate-y-2 hover:shadow-lg">
          <div class="w-20 h-20 bg-pink-100 rounded-full flex items-center justify-center mx-auto mb-6">
            <i class="fas fa-calendar-alt text-pink-500 text-2xl"></i>
          </div>
          <h3 class="text-xl font-bold text-gray-900 mb-4">Prise de rendez-vous</h3>
          <p class="text-gray-700">Réservez votre créneau en quelques clics et gérez facilement vos rendez-vous depuis votre espace personnel.</p>
        </div>
        
        <div class="bg-white p-8 rounded-xl shadow-md text-center transform transition-all duration-300 hover:-translate-y-2 hover:shadow-lg">
          <div class="w-20 h-20 bg-pink-100 rounded-full flex items-center justify-center mx-auto mb-6">
            <i class="fas fa-star text-pink-500 text-2xl"></i>
          </div>
          <h3 class="text-xl font-bold text-gray-900 mb-4">Professionnels vérifiés</h3>
          <p class="text-gray-700">Tous nos toiletteurs sont des professionnels qualifiés avec des avis vérifiés pour vous garantir un service de qualité.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Section Témoignages -->
  <section class="py-20 bg-white">
    <div class="container mx-auto px-4">
      <h2 class="text-3xl md:text-4xl font-bold text-center text-gray-900 mb-4">Ce que nos utilisateurs disent</h2>
      <div class="w-20 h-1 bg-pink-500 mx-auto mb-16 rounded-full"></div>
      
      <div class="grid md:grid-cols-3 gap-8">
        <div class="bg-pink-50 p-8 rounded-xl shadow-md relative">
          <div class="absolute -top-10 left-1/2 transform -translate-x-1/2">
            <div class="w-20 h-20 bg-pink-200 rounded-full overflow-hidden border-4 border-white shadow-md">
              <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Sophie Martin" class="w-full h-full object-cover">
            </div>
          </div>
          <div class="pt-12 text-center mb-4">
            <h4 class="font-bold text-gray-900 text-lg">Sophie Martin</h4>
            <div class="flex justify-center text-yellow-400 my-2">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
          </div>
          <p class="text-gray-700 italic">"J'ai trouvé une toiletteuse formidable pour mon Bichon grâce à BubbleBook. Le service était impeccable et mon chien était magnifique après sa séance !"</p>
        </div>
        
        <div class="bg-pink-50 p-8 rounded-xl shadow-md relative">
          <div class="absolute -top-10 left-1/2 transform -translate-x-1/2">
            <div class="w-20 h-20 bg-pink-200 rounded-full overflow-hidden border-4 border-white shadow-md">
              <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Thomas Dubois" class="w-full h-full object-cover">
            </div>
          </div>
          <div class="pt-12 text-center mb-4">
            <h4 class="font-bold text-gray-900 text-lg">Thomas Dubois</h4>
            <div class="flex justify-center text-yellow-400 my-2">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star-half-alt"></i>
            </div>
          </div>
          <p class="text-gray-700 italic">"Application très pratique ! J'ai pu réserver un rendez-vous pour mon chat en quelques minutes. Je recommande vivement BubbleBook à tous les propriétaires d'animaux."</p>
        </div>
        
        <div class="bg-pink-50 p-8 rounded-xl shadow-md relative">
          <div class="absolute -top-10 left-1/2 transform -translate-x-1/2">
            <div class="w-20 h-20 bg-pink-200 rounded-full overflow-hidden border-4 border-white shadow-md">
              <img src="https://randomuser.me/api/portraits/women/68.jpg" alt="Marie Leroy" class="w-full h-full object-cover">
            </div>
          </div>
          <div class="pt-12 text-center mb-4">
            <h4 class="font-bold text-gray-900 text-lg">Marie Leroy</h4>
            <div class="flex justify-center text-yellow-400 my-2">
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
              <i class="fas fa-star"></i>
            </div>
          </div>
          <p class="text-gray-700 italic">"En tant que toiletteuse professionnelle, BubbleBook m'a permis d'augmenter ma clientèle de 30% en seulement deux mois. Une plateforme incontournable !"</p>
        </div>
      </div>
    </div>
  </section>

    <!-- Section Articles -->
    <section class="py-20 bg-pink-50">
    <div class="container mx-auto px-4">
      <h2 class="text-3xl md:text-4xl font-bold text-center text-gray-900 mb-4">Actualités et conseils</h2>
      <div class="w-20 h-1 bg-pink-500 mx-auto mb-16 rounded-full"></div>
      
      <div class="grid md:grid-cols-3 gap-8">
        <div class="bg-white rounded-xl overflow-hidden shadow-md transform transition-all duration-300 hover:-translate-y-2 hover:shadow-lg">
          <div class="h-56 bg-pink-200 relative overflow-hidden">
            <img src="https://images.unsplash.com/photo-1583337130417-3346a1be7dee?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Chien chez le toiletteur" class="w-full h-full object-cover">
          </div>
          <div class="p-6">
            <h3 class="text-xl font-bold text-gray-900 mb-3">Comment bien préparer son animal pour une séance de toilettage</h3>
            <p class="text-gray-700 mb-4">Découvrez nos conseils pour que la séance de toilettage se passe au mieux pour votre compagnon à quatre pattes.</p>
            <a href="#" class="inline-flex items-center text-pink-500 font-medium hover:text-pink-600 transition-colors">
              Lire l'article 
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
              </svg>
            </a>
          </div>
        </div>
      
        <div class="bg-white rounded-xl overflow-hidden shadow-md transform transition-all duration-300 hover:-translate-y-2 hover:shadow-lg">
          <div class="h-56 bg-pink-200 relative overflow-hidden">
            <img src="https://images.unsplash.com/photo-1516734212186-a967f81ad0d7?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Chat toiletté" class="w-full h-full object-cover">
          </div>
          <div class="p-6">
            <h3 class="text-xl font-bold text-gray-900 mb-3">Les tendances du toilettage pour l'été 2025</h3>
            <p class="text-gray-700 mb-4">Les coupes et soins qui feront sensation cet été pour garder votre animal au frais et stylé.</p>
            <a href="#" class="inline-flex items-center text-pink-500 font-medium hover:text-pink-600 transition-colors">
              Lire l'article 
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
              </svg>
            </a>
          </div>
        </div>
      
        <div class="bg-white rounded-xl overflow-hidden shadow-md transform transition-all duration-300 hover:-translate-y-2 hover:shadow-lg">
          <div class="h-56 bg-pink-200 relative overflow-hidden">
            <img src="https://images.unsplash.com/photo-1596492784531-6e6eb5ea9993?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Salon de toilettage" class="w-full h-full object-cover">
          </div>
          <div class="p-6">
            <h3 class="text-xl font-bold text-gray-900 mb-3">BubbleBook s'agrandit : désormais disponible dans 15 départements</h3>
            <p class="text-gray-700 mb-4">Notre réseau de toiletteurs s'étend pour vous offrir toujours plus de choix près de chez vous.</p>
            <a href="#" class="inline-flex items-center text-pink-500 font-medium hover:text-pink-600 transition-colors">
              Lire l'article 
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
              </svg>
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Section CTA -->
  <section class="py-20 bg-gradient-to-r from-pink-500 to-pink-600 text-white">
    <div class="container mx-auto px-4 text-center">
      <h2 class="text-3xl md:text-4xl font-bold mb-6">Prêt à trouver le toiletteur idéal pour votre animal ?</h2>
      <p class="text-xl mb-10 max-w-2xl mx-auto">Rejoignez des milliers de propriétaires d'animaux satisfaits et prenez rendez-vous dès aujourd'hui.</p>
      <div class="flex flex-wrap justify-center gap-6">
        <a href="register.php" class="bg-white text-pink-500 px-8 py-3 rounded-full font-medium hover:bg-pink-100 transition-all duration-300 transform hover:scale-105 shadow-lg">
          S'inscrire
        </a>
        <a href="login.php" class="bg-transparent border-2 border-white text-white px-8 py-3 rounded-full font-medium hover:bg-white hover:text-pink-500 transition-all duration-300 transform hover:scale-105">
          Se connecter
        </a>
      </div>
    </div>
  </section>

  <!-- Section Toiletteurs-->
  <section class="py-20 bg-white">
    <div class="container mx-auto px-4">
      <div class="max-w-3xl mx-auto text-center">
        <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Vous êtes toiletteur ?</h2>
        <div class="w-20 h-1 bg-pink-500 mx-auto mb-8 rounded-full"></div>
        <p class="text-lg text-gray-700 mb-10 leading-relaxed">
          Rejoignez notre plateforme et développez votre clientèle. BubbleBook vous aide à gérer vos rendez-vous, à vous faire connaître et à fidéliser vos clients.
        </p>
        <div class="flex justify-center">
          <a href="register.php" class="bg-pink-500 text-white px-10 py-4 rounded-full font-medium hover:bg-pink-600 transition-all duration-300 transform hover:scale-105 shadow-md text-lg">
            Créez votre compte 
          </a>
        </div>
      </div>
    </div>
  </section>

  <!-- Section statistiques -->
  <section class="py-16 bg-pink-50">
    <div class="container mx-auto px-4">
      <div class="grid md:grid-cols-4 gap-8 text-center">
        <div class="p-6">
          <div class="text-4xl font-bold text-pink-500 mb-2">500+</div>
          <p class="text-gray-700">Toiletteurs partenaires</p>
        </div>
        <div class="p-6">
          <div class="text-4xl font-bold text-pink-500 mb-2">15k+</div>
          <p class="text-gray-700">Clients satisfaits</p>
        </div>
        <div class="p-6">
          <div class="text-4xl font-bold text-pink-500 mb-2">30k+</div>
          <p class="text-gray-700">Rendez-vous réservés</p>
        </div>
        <div class="p-6">
          <div class="text-4xl font-bold text-pink-500 mb-2">15</div>
          <p class="text-gray-700">Départements couverts</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Section FAQ -->
  <section class="py-20 bg-white">
    <div class="container mx-auto px-4">
      <h2 class="text-3xl md:text-4xl font-bold text-center text-gray-900 mb-4">Questions fréquentes</h2>
      <div class="w-20 h-1 bg-pink-500 mx-auto mb-16 rounded-full"></div>
      
      <div class="max-w-3xl mx-auto">
        <div class="mb-6 border-b border-gray-200 pb-6">
          <h3 class="text-xl font-bold text-gray-900 mb-2">Comment fonctionne BubbleBook ?</h3>
          <p class="text-gray-700">BubbleBook vous permet de trouver et réserver un toiletteur pour votre animal en quelques clics. Recherchez par localisation, consultez les profils et avis, puis réservez directement en ligne.</p>
        </div>
        
        <div class="mb-6 border-b border-gray-200 pb-6">
          <h3 class="text-xl font-bold text-gray-900 mb-2">Combien coûte l'utilisation de BubbleBook ?</h3>
          <p class="text-gray-700">L'inscription et la recherche sur BubbleBook sont totalement gratuites pour les propriétaires d'animaux. Vous ne payez que la prestation de toilettage directement au professionnel.</p>
        </div>
        
        <div class="mb-6 border-b border-gray-200 pb-6">
          <h3 class="text-xl font-bold text-gray-900 mb-2">Comment devenir toiletteur partenaire ?</h3>
          <p class="text-gray-700">Si vous êtes un toiletteur professionnel, vous pouvez rejoindre notre plateforme en créant un compte professionnel. Nous vérifierons vos qualifications avant de valider votre profil.</p>
        </div>
        
        <div class="mb-6">
          <h3 class="text-xl font-bold text-gray-900 mb-2">Puis-je annuler ou modifier mon rendez-vous ?</h3>
          <p class="text-gray-700">Oui, vous pouvez annuler ou modifier votre rendez-vous jusqu'à 24 heures avant l'heure prévue sans frais. Passé ce délai, des frais d'annulation peuvent s'appliquer selon la politique du toiletteur.</p>
        </div>
      </div>
    </div>
  </section>

  <button id="back-to-top" class="fixed bottom-8 right-8 bg-pink-500 text-white w-12 h-12 rounded-full flex items-center justify-center shadow-lg opacity-0 invisible transition-all duration-300 hover:bg-pink-600">
    <i class="fas fa-arrow-up"></i>
  </button>

  <script>
    const backToTopButton = document.getElementById('back-to-top');
    
    window.addEventListener('scroll', () => {
      if (window.scrollY > 300) {
        backToTopButton.classList.remove('opacity-0', 'invisible');
        backToTopButton.classList.add('opacity-100', 'visible');
      } else {
        backToTopButton.classList.remove('opacity-100', 'visible');
        backToTopButton.classList.add('opacity-0', 'invisible');
      }
    });
    
    backToTopButton.addEventListener('click', () => {
      window.scrollTo({
        top: 0,
        behavior: 'smooth'
      });
    });
  </script>
</body>

<?php 
  require_once "Footer/footer_vitrine.php";
?>

