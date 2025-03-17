<?php require_once "Header/header.php";?>

<body class="min-h-screen flex flex-col">
  <!-- Section Principale -->
  <main class="bg-pink-100 flex-grow flex justify-center items-center p-16">
    <form method="POST" id="inscriptionForm" class="bg-white p-8 rounded-lg shadow-md w-96 space-y-4">
      <h1 class="text-3xl font-bold text-center text-gray-900">Inscription</h1>
      <div>
        <label class="flex items-center">
          <input type="checkbox" class="form-checkbox text-pink-500 h-4 w-4" name="is_groomer">
          <span class="ml-2 text-gray-700">Vous êtes toiletteur ?</span>
        </label>
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
    </form>
  </main>
  <script src="register.js"></script>
</body>

<?php require_once "Footer/footer.php"; ?>