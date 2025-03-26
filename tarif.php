<?php
// Connexion à la base de données
$host = 'localhost';
$dbname = 'bubble';
$username = 'root'; // À modifier selon votre configuration
$password = ''; // À modifier selon votre configuration

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

require_once 'Header/header.php';
?>

    <div class="flex flex-col md:flex-row w-full max-w-4xl m-2 sm:m-4 p-10">
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
                Groomer.siret_number,
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
            <?php
            // Tableau des jours pour itérer dans l'ordre
            $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
            $days_fr = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche']; // Traduction en français

            // Requête pour récupérer les disponibilités du groomer
            $stmt = $pdo->prepare("
                SELECT day_of_week, morning_start, morning_end, afternoon_start, afternoon_end, is_closed
                FROM Availability
                WHERE groomer_id = :groomer_id
            ");
            $stmt->execute(['groomer_id' => $groomer_id]);
            $availabilities = $stmt->fetchAll(PDO::FETCH_ASSOC);

            // Transformer les résultats en tableau associatif pour accès rapide
            $availability_map = [];
            foreach ($availabilities as $availability) {
                $availability_map[$availability['day_of_week']] = $availability;
            }

            // Affichage dynamique pour chaque jour
            foreach ($days as $index => $day) {
                $day_fr = $days_fr[$index];
                echo '<li><span class="font-bold">' . $day_fr . ' :</span> ';
                
                if (isset($availability_map[$day])) {
                    $avail = $availability_map[$day];
                    if ($avail['is_closed']) {
                        echo '<span class="text-red-500">Fermé</span>';
                    } else {
                        $hours = '';
                        if ($avail['morning_start'] && $avail['morning_end']) {
                            $hours .= substr($avail['morning_start'], 0, 5) . '-' . substr($avail['morning_end'], 0, 5);
                        }
                        if ($avail['afternoon_start'] && $avail['afternoon_end']) {
                            $hours .= ($hours ? ' et ' : '') . substr($avail['afternoon_start'], 0, 5) . '-' . substr($avail['afternoon_end'], 0, 5);
                        }
                        echo '<span class="text-pink-500">' . $hours . '</span>';
                    }
                } else {
                    // Cas où aucune disponibilité n'est définie pour ce jour
                    echo '<span class="text-red-500">Fermé</span>';
                }
                echo '</li>';
            }
            ?>
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

<?php
    require_once 'Footer/footer.php';
?>