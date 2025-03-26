<?php
// Connexion à la base de données
$host = 'localhost';
$dbname = 'bubble';
$username = 'root'; // À modifier selon votre configuration
$password = ''; // À modifier selon votre configuration

try {
    $pdo = Database::getConnection();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Traitement de la soumission du formulaire
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $service_id = $_POST['service_id'];
        $reservation_date = $_POST['reservation_date'];
        $reservation_time = $_POST['reservation_time'];

        $reservation_datetime = $reservation_date . ' ' . $reservation_time;

        $stmt = $pdo->prepare("
            INSERT INTO Booking (service_id, user_id, reservation_date, is_done, is_valdated)
            VALUES (:service_id, :user_id, :reservation_date, 0, 0)
        ");
        $stmt->execute([
            'service_id' => $service_id,
            'user_id' => $user_id,
            'reservation_date' => $reservation_datetime
        ]);

        echo "<p class='text-green-500 text-center'>Réservation effectuée avec succès ! En attente de validation par le toiletteur.</p>";
    }

    // Récupération des services
    if (isset($_GET['groomer_id'])) {
        $groomer_id = $_GET['groomer_id'];
        $stmt = $pdo->query("SELECT service_id, service_name, price_ht, duration FROM Service WHERE groomer_id = $groomer_id");
        $services = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
    exit;
}


?>

<div class="flex flex-col md:flex-row w-full max-w-4xl m-2 sm:m-4 p-10">
    <!-- Colonne de gauche : Informations et Disponibilités -->
    <div class="w-full md:w-1/2 p-4 text-center md:text-left">
        <?php
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
        $groomer = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($groomer) {
            $groomer_name = $groomer['first_name'] . ' ' . $groomer['name'];
            $groomer_address = $groomer['address'] . ', ' . $groomer['city'] . ' ' . $groomer['department'];
        } else {
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
            $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
            $days_fr = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];

            $stmt = $pdo->prepare("
                SELECT day_of_week, morning_start, morning_end, afternoon_start, afternoon_end, is_closed
                FROM Availability
                WHERE groomer_id = :groomer_id
            ");
            $stmt->execute(['groomer_id' => $groomer_id]);
            $availabilities = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $availability_map = [];
            foreach ($availabilities as $availability) {
                $availability_map[$availability['day_of_week']] = $availability;
            }

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
                <select name="service_id" class="w-full p-2 border border-gray-300 text-gray-500" required>
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
                <input type="date" name="reservation_date" class="w-full p-2 border border-gray-300" required>
                <input type="time" name="reservation_time" class="w-full p-2 border border-gray-300" required>
                <button type="submit" class="w-full p-2 bg-pink-500 text-white rounded hover:bg-pink-600">
                    Réserver
                </button>
            </form>
        </div>
    </div>
</div>

<?php
require_once 'Footer/footer.php';
?>