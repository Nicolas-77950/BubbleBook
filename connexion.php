<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>BubbleBook - Connexion</title>
  <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-pink-100 min-h-screen flex flex-col">
  <!-- Bandeau supérieur -->
  <div class="relative h-40 bg-cover bg-center w-full" style="background-image: url('image.png')">
    <div class="absolute top-4 left-4 flex items-center">
      <!-- Logo avant BubbleBook -->
      <img src="logo.png" alt="Logo" class="h-8 w-8 mr-2">
      <div class="rounded-full text-black p-2 text-sm font-bold">BubbleBook</div>
    </div>
    <div class="absolute top-4 right-4 flex space-x-4">
      <button class="bg-pink-500 text-white rounded-full px-4 py-2 text-sm">Se connecter</button>
      <button class="bg-pink-500 text-white rounded-full px-4 py-2 text-sm">Gérer mes RDV</button>
    </div>
  </div>
  <!-- Contenu principal avec bloc de connexion centré -->
  <div class="flex-grow flex justify-center items-center">
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