<?php 
  require_once "Header/header_vitrine.php";
?>

<body class="bg-pink-100 min-h-screen flex flex-col">
  <div class="relative h-[600px] bg-cover bg-center w-full" style="background-image: url('Header/image.png')">
    <div class="absolute inset-0 bg-black bg-opacity-40"></div>
    
    <div class="h-24 relative z-10"></div>
    
    <div class="relative z-10 flex flex-col items-center justify-center h-[400px] text-white text-center px-4">
      <h1 class="text-4xl md:text-5xl font-bold mb-4 drop-shadow-lg">Trouvez le toiletteur idéal pour votre animal</h1>
      <p class="text-xl md:text-2xl mb-8 max-w-2xl drop-shadow-lg">Prenez rendez-vous en quelques clics avec les meilleurs professionnels près de chez vous</p>
    </div>
    
    <div class="relative z-10 absolute bottom-10 left-0 right-0 mx-auto max-w-4xl bg-white rounded-full shadow-lg p-4 flex flex-wrap justify-center items-center gap-4">
      <div class="flex items-center space-x-2">
        <h3 class="text-lg font-bold text-gray-900">Département</h3>
        <button class="bg-pink-100 border border-pink-300 rounded-full px-3 py-2 hover:bg-pink-200 transition-colors">
          <i class="fas fa-chevron-down text-pink-600"></i>
        </button>
      </div>

      <div class="flex items-center space-x-2">
        <h3 class="text-lg font-bold text-gray-900">Ville</h3>
        <button class="bg-pink-100 border border-pink-300 rounded-full px-3 py-2 hover:bg-pink-200 transition-colors">
          <i class="fas fa-chevron-down text-pink-600"></i>
        </button>
      </div>

      <div class="flex items-center space-x-2">
        <h3 class="text-lg font-bold text-gray-900">Animal</h3>
        <button class="bg-pink-100 border border-pink-300 rounded-full px-3 py-2 hover:bg-pink-200 transition-colors">
          <i class="fas fa-chevron-down text-pink-600"></i>
        </button>
      </div>

      <div class="flex items-center space-x-2">
        <h3 class="text-lg font-bold text-gray-900">Race</h3>
        <button class="bg-pink-100 border border-pink-300 rounded-full px-3 py-2 hover:bg-pink-200 transition-colors">
          <i class="fas fa-chevron-down text-pink-600"></i>
        </button>
      </div>

      <button class="bg-pink-600 text-white rounded-full px-6 py-2 hover:bg-pink-700 transition-colors">
        Rechercher
      </button>
    </div>
  </div>

  <!-- Section À propos -->
  <section class="py-16 bg-white">
    <div class="container mx-auto px-4">
      <h2 class="text-3xl font-bold text-center text-gray-900 mb-8">Bienvenue sur BubbleBook</h2>
      <div class="max-w-3xl mx-auto text-center">
        <p class="text-lg text-gray-700 mb-6">
          BubbleBook est la première plateforme qui vous permet de trouver facilement un toiletteur professionnel 
          pour votre animal de compagnie. Que vous ayez un chien, un chat ou tout autre animal, nous vous 
          connectons avec les meilleurs toiletteurs près de chez vous.
        </p>
        <div class="flex justify-center">
          <a href="inscription.php" class="bg-pink-600 text-white px-6 py-3 rounded-full font-medium hover:bg-pink-700 transition-colors">
            Créer un compte gratuitement
          </a>
        </div>
      </div>
    </div>
  </section>
</body>

    <section class="py-16 bg-pink-50">
      <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center text-gray-900 mb-12">Pourquoi choisir BubbleBook ?</h2>
      
        <div class="grid md:grid-cols-3 gap-8">
          <div class="bg-white p-6 rounded-lg shadow-md text-center">
            <div class="w-16 h-16 bg-pink-100 rounded-full flex items-center justify-center mx-auto mb-4">
              <i class="fas fa-search text-pink-600 text-2xl"></i>
            </div>
            <h3 class="text-xl font-bold text-gray-900 mb-2">Recherche facile</h3>
            <p class="text-gray-700">Trouvez rapidement un toiletteur qualifié près de chez vous grâce à notre moteur de recherche intuitif.</p>
          </div>
        
          <div class="bg-white p-6 rounded-lg shadow-md text-center">
            <div class="w-16 h-16 bg-pink-100 rounded-full flex items-center justify-center mx-auto mb-4">
              <i class="fas fa-calendar-alt text-pink-600 text-2xl"></i>
            </div>
            <h3 class="text-xl font-bold text-gray-900 mb-2">Prise de rendez-vous</h3>
            <p class="text-gray-700">Réservez votre créneau en quelques clics et gérez facilement vos rendez-vous.</p>
          </div>
        
          <div class="bg-white p-6 rounded-lg shadow-md text-center">
            <div class="w-16 h-16 bg-pink-100 rounded-full flex items-center justify-center mx-auto mb-4">
              <i class="fas fa-star text-pink-600 text-2xl"></i>
            </div>
            <h3 class="text-xl font-bold text-gray-900 mb-2">Professionnels vérifiés</h3>
            <p class="text-gray-700">Tous nos toiletteurs sont des professionnels qualifiés avec des avis vérifiés.</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Section Témoignages -->
    <section class="py-16 bg-white">
      <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center text-gray-900 mb-12">Ce que nos utilisateurs disent</h2>
      
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
          <div class="bg-pink-50 p-6 rounded-lg">
            <div class="flex items-center mb-4">
              <div class="w-12 h-12 bg-pink-200 rounded-full mr-4"></div>
              <div>
                <h4 class="font-bold text-gray-900">Sophie Martin</h4>
                <div class="flex text-yellow-400">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                </div>
              </div>
            </div>
            <p class="text-gray-700">"J'ai trouvé une toiletteuse formidable pour mon Bichon grâce à BubbleBook. Le service était impeccable et mon chien était magnifique après sa séance !"</p>
          </div>
        
          <div class="bg-pink-50 p-6 rounded-lg">
            <div class="flex items-center mb-4">
              <div class="w-12 h-12 bg-pink-200 rounded-full mr-4"></div>
              <div>
                <h4 class="font-bold text-gray-900">Thomas Dubois</h4>
                <div class="flex text-yellow-400">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star-half-alt"></i>
                </div>
              </div>
            </div>
            <p class="text-gray-700">"Application très pratique ! J'ai pu réserver un rendez-vous pour mon chat en quelques minutes. Je recommande vivement BubbleBook à tous les propriétaires d'animaux."</p>
          </div>
        
          <div class="bg-pink-50 p-6 rounded-lg">
            <div class="flex items-center mb-4">
              <div class="w-12 h-12 bg-pink-200 rounded-full mr-4"></div>
              <div>
                <h4 class="font-bold text-gray-900">Marie Leroy</h4>
                <div class="flex text-yellow-400">
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                  <i class="fas fa-star"></i>
                </div>
              </div>
            </div>
            <p class="text-gray-700">"En tant que toiletteuse professionnelle, BubbleBook m'a permis d'augmenter ma clientèle de 30% en seulement deux mois. Une plateforme incontournable !"</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Section Articles -->
    <section class="py-16 bg-pink-50">
      <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center text-gray-900 mb-12">Actualités et conseils</h2>
      
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
          <div class="bg-white rounded-lg overflow-hidden shadow-md">
            <div class="h-48 bg-pink-200"></div>
            <div class="p-6">
              <h3 class="text-xl font-bold text-gray-900 mb-2">Comment bien préparer son animal pour une séance de toilettage</h3>
              <p class="text-gray-700 mb-4">Découvrez nos conseils pour que la séance de toilettage se passe au mieux pour votre compagnon à quatre pattes.</p>
              <a href="#" class="text-pink-600 font-medium hover:text-pink-700">Lire l'article →</a>
            </div>
          </div>
        
          <div class="bg-white rounded-lg overflow-hidden shadow-md">
            <div class="h-48 bg-pink-200"></div>
            <div class="p-6">
              <h3 class="text-xl font-bold text-gray-900 mb-2">Les tendances du toilettage pour l'été 2025</h3>
              <p class="text-gray-700 mb-4">Les coupes et soins qui feront sensation cet été pour garder votre animal au frais et stylé.</p>
              <a href="#" class="text-pink-600 font-medium hover:text-pink-700">Lire l'article →</a>
            </div>
          </div>
        
          <div class="bg-white rounded-lg overflow-hidden shadow-md">
            <div class="h-48 bg-pink-200"></div>
            <div class="p-6">
              <h3 class="text-xl font-bold text-gray-900 mb-2">BubbleBook s'agrandit : désormais disponible dans 15 départements</h3>
              <p class="text-gray-700 mb-4">Notre réseau de toiletteurs s'étend pour vous offrir toujours plus de choix près de chez vous.</p>
              <a href="#" class="text-pink-600 font-medium hover:text-pink-700">Lire l'article →</a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Section CTA -->
    <section class="py-16 bg-white text-white">
      <div class="container mx-auto px-4 text-center">
        <h2 class="text-3xl text-black font-bold mb-6">Prêt à trouver le toiletteur idéal pour votre animal ?</h2>
        <p class="text-xl text-gray-700 mb-8 max-w-2xl mx-auto">Rejoignez des milliers de propriétaires d'animaux satisfaits et prenez rendez-vous dès aujourd'hui.</p>
        <div class="flex flex-wrap justify-center gap-4">
          <a href="inscription.php" class="bg-pink-600 text-white px-8 py-3 rounded-full font-medium hover:bg-pink-700 transition-colors">
            S'inscrire
          </a>
          <a href="connexion.php" class="bg-pink-600 text-white px-8 py-3 rounded-full font-medium hover:bg-pink-700 transition-colors">
            Se connecter
          </a>
        </div>
      </div>
    </section>

    <!-- Section Toiletteurs -->
    <section class="py-16 bg-white">
      <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center text-gray-900 mb-4">Vous êtes toiletteur ?</h2>
        <p class="text-center text-lg text-gray-700 mb-8 max-w-2xl mx-auto">
          Rejoignez notre plateforme et développez votre clientèle. BubbleBook vous aide à gérer vos rendez-vous et à vous faire connaître.
        </p>
        <div class="text-center">
          <a href="#" class="bg-pink-600 text-white px-8 py-3 rounded-full font-medium hover:bg-pink-700 transition-colors">
            Devenir partenaire
          </a>
        </div>
      </div>
    </section>
</body>

<?php 
    require_once "Footer/footer.php";
?>