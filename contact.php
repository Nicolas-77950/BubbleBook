<?php
require 'vendor/autoload.php';

use Resend\Client;

// Charger les variables d'environnement
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $message = htmlspecialchars($_POST['message']);

    // Validation des données
    if (empty($name) || empty($email) || empty($message)) {
        $error = "Tous les champs sont obligatoires.";
    } elseif (!$email) {
        $error = "Adresse e-mail invalide.";
    } else {
        // Initialiser le client Resend
        $resend = new Client($_ENV['RESEND_API_KEY']);

        try {
            $response = $resend->emails->send([
                'from' => 'onboarding@resend.dev',
                'to' => ['kkprout2006@gmail.com'], 
                'subject' => 'Nouveau message depuis le formulaire de contact',
                'html' => "<p><strong>Nom :</strong> $name</p><p><strong>E-mail :</strong> $email</p><p><strong>Message :</strong> $message</p>"
            ]);

            $success = true;
        } catch (Exception $e) {
            $error = "Erreur lors de l'envoi du message : " . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Contact</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="max-w-md mx-auto mt-10 p-6 bg-white rounded-lg shadow-md">
        <h2 class="text-2xl font-bold mb-6 text-center">Formulaire de Contact</h2>
        <?php
        if (isset($success) && $success) {
            echo "<p class='text-green-600 text-center mb-4'>Merci ! Votre message a été envoyé avec succès.</p>";
        } elseif (isset($error)) {
            echo "<p class='text-red-600 text-center mb-4'>$error</p>";
        }
        ?>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="space-y-4">
            <div>
                <label for="name" class="block text-sm font-medium text-gray-700">Nom :</label>
                <input type="text" id="name" name="name" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">E-mail :</label>
                <input type="email" id="email" name="email" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            <div>
                <label for="message" class="block text-sm font-medium text-gray-700">Message :</label>
                <textarea id="message" name="message" rows="5" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"></textarea>
            </div>
            <button type="submit" class="w-full bg-indigo-600 text-white py-2 px-4 rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition duration-300 ease-in-out transform hover:-translate-y-1">Envoyer</button>
        </form>
    </div>
</body>
</html> 