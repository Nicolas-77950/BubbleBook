<?php 
  require_once "Header/header.php";
?>

<body class="bg-pink-100 min-h-screen flex flex-col">
  <!-- Contenu principal avec bloc de connexion centré -->
  <div class="flex-grow flex justify-center items-center p-36 bg-pink-100">
    <div class="bg-white rounded-lg shadow-md p-8 w-96">
      <h1 class="text-3xl font-bold text-center text-gray-900">Connexion</h1>
      <form class="mt-4 space-y-4">
        <input type="email" placeholder="Email" class="w-full bg-pink-50 border border-pink-300 rounded-lg px-4 py-2 focus:border-pink-500 focus:outline-none">
        <input type="password" placeholder="Mot de passe" class="w-full bg-pink-50 border border-pink-300 rounded-lg px-4 py-2 focus:border-pink-500 focus:outline-none">
      </form>
      <p class="mt-4 text-center text-gray-600">Aucun compte ? <a href="#" class="text-pink-500 hover:text-pink-600">Inscription</a></p>
    </div>
  </div>
</body>
</html>