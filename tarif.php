<?php
// Connexion à la base de données
$host = 'bubblebook-project-db-1';
$dbname = 'bubble';
$username = 'root'; // À modifier selon votre configuration
$password = 'mariadb'; // À modifier selon votre configuration

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Récupération des services depuis la table Service
    if(isset($_GET['groomer_id'])) {
      $groomer_id = $_GET['groomer_id'];
      $stmt = $pdo->query("SELECT service_id, service_name, price_ht, duration FROM Service WHERE groomer_id = $groomer_id");
      $services = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }   
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Service de Toilettage pour Chiens</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-[#f9e7e7] min-h-screen flex justify-center items-center bg-pink-50">
    <div class="flex flex-col md:flex-row w-full max-w-4xl m-2 sm:m-4">
        <!-- Colonne de gauche : Informations et Disponibilités -->
        <div class="w-full md:w-1/2 p-4 text-center md:text-left">
        <?php
        // Préparer la requête SQL pour récupérer les informations du groomer
        $sql = "
            SELECT 
                User.name, 
                User.first_name, 
                Groomer.address, 
                Groomer.city, 
                Groomer.department,
                Groomer.siren_number,
                Groomer.address AS groomer_address,
                Groomer.city AS groomer_city,
                Groomer.department AS groomer_department
            FROM User
            INNER JOIN Groomer ON User.groomer_id = Groomer.groomer_id
            WHERE User.groomer_id = :groomer_id
        ";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['groomer_id' => $groomer_id]);

        // Récupérer les informations du groomer
        $groomer = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($groomer) {
            // Afficher les informations du groomer
            $groomer_name = $groomer['first_name'] . ' ' . $groomer['name'];
            $groomer_address = $groomer['address'] . ', ' . $groomer['city'] . ' ' . $groomer['department'];
        } else {
            // Gérer le cas où aucun groomer n'est trouvé
            $groomer_name = "Groomer non trouvé";
            $groomer_address = "Adresse non disponible";
        }
        ?>
            <h1 class="text-lg font-bold"><?php echo htmlspecialchars($groomer_name); ?></h1>
            <p class="text-base">Toiletteur pour chien</p>
            <p class="text-sm"><?php echo htmlspecialchars($groomer_address); ?></p>
            <h2 class="text-base font-bold mt-4">Disponibilités</h2>
            <ul class="text-xs sm:text-sm space-y-2">
                <li><span class="font-bold">Lundi :</span> <span class="text-pink-500">8h-12h et 14h-18h</span></li>
                <li><span class="font-bold">Mardi :</span> <span class="text-pink-500">8h-12h et 14h-18h</span></li>
                <li><span class="font-bold">Mercredi :</span> <span class="text-red-500">Fermé</span></li>
                <li><span class="font-bold">Jeudi :</span> <span class="text-pink-500">8h-12h et 14h-18h</span></li>
                <li><span class="font-bold">Vendredi :</span> <span class="text-pink-500">8h-12h et 14h-18h</span></li>
                <li><span class="font-bold">Samedi :</span> <span class="text-pink-500">8h-12h et 14h-18h</span></li>
                <li><span class="font-bold">Dimanche :</span> <span class="text-red-500">Fermé</span></li>
            </ul>
        </div>
        <!-- Colonne de droite : Section du formulaire -->
        <div class="w-full md:w-1/2 p-4">
            <div class="p-4">
                <h2 class="text-xl font-bold text-center py-2">Tarifs des bains pour chien</h2>
                <form class="mt-4 space-y-1 sm:space-y-2" method="POST" action="">
                    <select name="service_id" class="w-full p-2 border border-gray-300 text-gray-500">
                        <option value="">Sélectionnez un service</option>
                        <?php foreach ($services as $service): ?>
                            <option value="<?php echo $service['service_id']; ?>">
                                <?php 
                                echo htmlspecialchars($service['service_name']) . " - " . 
                                     number_format($service['price_ht'], 2) . "€ (" . 
                                     $service['duration'] . " min)"; 
                                ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <button type="submit" class="w-full p-2 bg-pink-500 text-white rounded hover:bg-pink-600">
                        Réserver
                    </button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>