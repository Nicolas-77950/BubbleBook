<?php
require_once 'database.php';

    if(isset($_SESSION['groomer_id'])) {
        $groomer_id = $_SESSION['groomer_id'];
    } else {
        header("location: login.php");
    }

try {
    $pdo = Database::getConnection();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    // Traitement du formulaire si soumis
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Mise à jour des infos du groomer
        $name = $_POST['name'];
        $first_name = $_POST['first_name'];
        $address = $_POST['address'];
        $city = $_POST['city'];
        $department = $_POST['department'];
        $siret_number = $_POST['siret_number'];

        // Mise à jour dans la table User pour le nom
        $stmt = $pdo->prepare("
            UPDATE User 
            SET name = :name, first_name = :first_name 
            WHERE groomer_id = :groomer_id
        ");
        $stmt->execute([
            'name' => $name,
            'first_name' => $first_name,
            'groomer_id' => $groomer_id
        ]);

        // Mise à jour dans la table Groomer
        $stmt = $pdo->prepare("
            UPDATE Groomer 
            SET address = :address, city = :city, department = :department, siren_number = :siret_number 
            WHERE groomer_id = :groomer_id
        ");
        $stmt->execute([
            'address' => $address,
            'city' => $city,
            'department' => $department,
            'siret_number' => $siret_number,
            'groomer_id' => $groomer_id
        ]);

        // Mise à jour des disponibilités
        $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
        foreach ($days as $day) {
            $is_closed = isset($_POST["is_closed_$day"]) ? 1 : 0;
            $morning_start = $_POST["morning_start_$day"] ?: null;
            $morning_end = $_POST["morning_end_$day"] ?: null;
            $afternoon_start = $_POST["afternoon_start_$day"] ?: null;
            $afternoon_end = $_POST["afternoon_end_$day"] ?: null;

            $stmt = $pdo->prepare("
                INSERT INTO Availability (groomer_id, day_of_week, morning_start, morning_end, afternoon_start, afternoon_end, is_closed)
                VALUES (:groomer_id, :day, :morning_start, :morning_end, :afternoon_start, :afternoon_end, :is_closed)
                ON DUPLICATE KEY UPDATE
                    morning_start = :morning_start,
                    morning_end = :morning_end,
                    afternoon_start = :afternoon_start,
                    afternoon_end = :afternoon_end,
                    is_closed = :is_closed
            ");
            $stmt->execute([
                'groomer_id' => $groomer_id,
                'day' => $day,
                'morning_start' => $morning_start,
                'morning_end' => $morning_end,
                'afternoon_start' => $afternoon_start,
                'afternoon_end' => $afternoon_end,
                'is_closed' => $is_closed
            ]);
        }
        echo "<p class='text-green-500'>Informations mises à jour avec succès !</p>";
    }

    // Récupération des infos actuelles
    $stmt = $pdo->prepare("
        SELECT 
            User.name, User.first_name, 
            Groomer.address, Groomer.city, Groomer.department, Groomer.siren_number
        FROM User 
        INNER JOIN Groomer ON User.groomer_id = Groomer.groomer_id 
        WHERE Groomer.groomer_id = :groomer_id
    ");
    $stmt->execute(['groomer_id' => $groomer_id]);
    $groomer = $stmt->fetch(PDO::FETCH_ASSOC);

    // Récupération des disponibilités
    $stmt = $pdo->prepare("
        SELECT day_of_week, morning_start, morning_end, afternoon_start, afternoon_end, is_closed 
        FROM Availability 
        WHERE groomer_id = :groomer_id
    ");
    $stmt->execute(['groomer_id' => $groomer_id]);
    $availabilities = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $availability_map = array_column($availabilities, null, 'day_of_week');

} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
    exit;
}

require_once 'Header/header.php';
?>

<div class="flex flex-col m-2 p-4 sm:p-10 max-w-4xl m-auto">
    <h1 class="text-2xl font-bold text-center mb-6">Modifier les informations du groomer</h1>

    <!-- Formulaire de modification -->
    <form method="POST" class="space-y-6">
        <!-- Informations personnelles -->
        <div class="p-4 border rounded">
            <h2 class="text-xl font-bold mb-4">Informations personnelles</h2>
            <div class="space-y-4">
                <div>
                    <label class="block font-bold">Nom</label>
                    <input type="text" name="name" value="<?php echo htmlspecialchars($groomer['name']); ?>" class="w-full p-2 border rounded" required>
                </div>
                <div>
                    <label class="block font-bold">Prénom</label>
                    <input type="text" name="first_name" value="<?php echo htmlspecialchars($groomer['first_name']); ?>" class="w-full p-2 border rounded" required>
                </div>
                <div>
                    <label class="block font-bold">Adresse</label>
                    <input type="text" name="address" value="<?php echo htmlspecialchars($groomer['address']); ?>" class="w-full p-2 border rounded" required>
                </div>
                <div>
                    <label class="block font-bold">Ville</label>
                    <input type="text" name="city" value="<?php echo htmlspecialchars($groomer['city']); ?>" class="w-full p-2 border rounded" required>
                </div>
                <div>
                    <label class="block font-bold">Département</label>
                    <input type="text" name="department" value="<?php echo htmlspecialchars($groomer['department']); ?>" class="w-full p-2 border rounded" required>
                </div>
                <div>
                    <label class="block font-bold">Numéro SIRET</label>
                    <input type="text" name="siret_number" value="<?php echo htmlspecialchars($groomer['siren_number']); ?>" class="w-full p-2 border rounded" required>
                </div>
            </div>
        </div>

        <!-- Disponibilités -->
        <div class="p-4 border rounded">
            <h2 class="text-xl font-bold mb-4">Horaires</h2>
            <?php
            $days = ['Monday' => 'Lundi', 'Tuesday' => 'Mardi', 'Wednesday' => 'Mercredi', 'Thursday' => 'Jeudi', 'Friday' => 'Vendredi', 'Saturday' => 'Samedi', 'Sunday' => 'Dimanche'];
            foreach ($days as $day_en => $day_fr) {
                $avail = $availability_map[$day_en] ?? ['morning_start' => '', 'morning_end' => '', 'afternoon_start' => '', 'afternoon_end' => '', 'is_closed' => 0];
            ?>
                <div class="mb-4">
                    <label class="block font-bold"><?php echo $day_fr; ?></label>
                    <div class="flex flex-col sm:flex-row items-center space-y-2 sm:space-y-0 sm:space-x-4">
                        <input type="checkbox" name="is_closed_<?php echo $day_en; ?>" <?php echo $avail['is_closed'] ? 'checked' : ''; ?>> Fermé
                        <input type="time" name="morning_start_<?php echo $day_en; ?>" value="<?php echo $avail['morning_start']; ?>" class="p-2 border rounded">
                        <input type="time" name="morning_end_<?php echo $day_en; ?>" value="<?php echo $avail['morning_end']; ?>" class="p-2 border rounded">
                        <input type="time" name="afternoon_start_<?php echo $day_en; ?>" value="<?php echo $avail['afternoon_start']; ?>" class="p-2 border rounded">
                        <input type="time" name="afternoon_end_<?php echo $day_en; ?>" value="<?php echo $avail['afternoon_end']; ?>" class="p-2 border rounded">
                    </div>
                </div>
            <?php } ?>
        </div>

        <button type="submit" class="w-full p-2 bg-pink-500 text-white rounded hover:bg-pink-600">Enregistrer les modifications</button>
    </form>
</div>

<?php
require_once 'Footer/footer.php';
?>