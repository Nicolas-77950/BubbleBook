<?php 

require_once "Header/header.php"; 

  if (session_status() === PHP_SESSION_NONE) {session_start();}

  //if (!empty($_SESSION)) {header("Location: /index.php");}

?>

<body class="min-h-screen flex flex-col">
  <main class="bg-pink-100 flex-grow flex justify-center items-center p-16">
    <form method="POST" id="inscriptionForm" class="bg-white p-8 rounded-lg shadow-md w-96 space-y-4">
      <h1 class="text-3xl font-bold text-center text-gray-900">Inscription</h1>

      <div id="error-message" class="hidden bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4"></div>
      <div id="success-message" class="hidden bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4"></div>

      <div>
        <label class="flex items-center">
          <input type="checkbox" id="is_groomer" class="form-checkbox text-pink-500 h-4 w-4" name="is_groomer">
          <span class="ml-2 text-gray-700">Vous êtes toiletteur ?</span>
        </label>
      </div>

      <div id="groomer-fields" style="opacity: 0; max-height: 0; overflow: hidden; transition: opacity 0.3s ease-in-out, max-height 0.3s ease-in-out;">
        <input 
          name="groomer_name"
          type="text" 
          placeholder="Nom du Salon de Toilettage*"
          class="w-full bg-pink-100 border border-pink-300 rounded-lg px-4 py-2 focus:outline-none focus:border-pink-400 placeholder-black mb-3"
        >
        <input 
          name="siret_number"
          type="text" 
          placeholder="Numéro SIRET*" 
          class="w-full bg-pink-100 border border-pink-300 rounded-lg px-4 py-2 focus:outline-none focus:border-pink-400 placeholder-black mb-3"
        >
        <input 
          name="address"
          type="text" 
          placeholder="Adresse*" 
          class="w-full bg-pink-100 border border-pink-300 rounded-lg px-4 py-2 focus:outline-none focus:border-pink-400 placeholder-black mb-3"
        >

        <select name="department" id="department" class="w-full bg-pink-100 border border-pink-300 rounded-lg px-4 py-2 focus:outline-none focus:border-pink-400 placeholder-black mb-3">
            <option value="">Sélectionnez un département*</option>
        </select>

        <select name="city" id="city" class="w-full bg-pink-100 border border-pink-300 rounded-lg px-4 py-2 focus:outline-none focus:border-pink-400 placeholder-black mb-3" disabled>
            <option value="">Sélectionnez d'abord un département*</option>
        </select>
      </div>

      <input 
        name="email"
        type="email" 
        placeholder="Saisissez votre adresse mail*" 
        class="w-full bg-pink-200 border border-pink-300 rounded-lg px-4 py-2 focus:outline-none focus:border-pink-400 placeholder-black"
        required
      >
      <input
        name="name" 
        type="text" 
        placeholder="Saisissez votre prénom*" 
        class="w-full bg-pink-100 border border-pink-300 rounded-lg px-4 py-2 focus:outline-none focus:border-pink-400 placeholder-black"
        required
      >
      <input 
        name="first_name"
        type="text" 
        placeholder="Saisissez votre nom*" 
        class="w-full bg-pink-200 border border-pink-300 rounded-lg px-4 py-2 focus:outline-none focus:border-pink-400 placeholder-black"
        required
      >
      <input 
        type="password" 
        name="password"
        id="password"
        placeholder="Saisissez votre mot de passe*" 
        class="w-full bg-pink-100 border border-pink-300 rounded-lg px-4 py-2 focus:outline-none focus:border-pink-400 placeholder-black"
        required
      >
      <input 
        type="password"
        name="confirm_password" 
        placeholder="Confirmez votre mot de passe*" 
        class="w-full bg-pink-200 border border-pink-300 rounded-lg px-4 py-2 focus:outline-none focus:border-pink-400 placeholder-black"
        required
      >
      <button 
        type="submit" 
        class="w-full bg-pink-600 text-white rounded-full px-4 py-2 hover:bg-pink-600"
      >
        S'inscrire
      </button>

      <div class="w-full bg-gray-200 rounded-full h-2.5 mt-2">
        <div id="password-strength-bar" class="h-2.5 rounded-full" style="width: 0%;"></div>
      </div>

      <div id="password-strength-text" class="text-sm mt-1"></div>
    </form>
  </main>

  <!-- Scripts JavaScript -->
  <script src="Register/register.js"></script>
  <script src="Register/password.js"></script>
  <script src="Register/groomer.js"></script>
  <script src="Register/geoApi.js"></script>
</body>

<?php require_once "Footer/footer.php"; ?>