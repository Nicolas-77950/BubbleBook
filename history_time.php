<?php
require_once 'database.php';
require_once 'Header/header.php';

if(!isset($_SESSION['groomer_id'])) {
    $groomer_id = $_SESSION['groomer_id'];
} else {
    header("location: login.php");
}

try {
    // Connexion à la base de données
    $pdo = Database::getConnection();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Récupérer l'historique des rendez-vous acceptés (is_valdated = 1)
    $stmt_history = $pdo->prepare("
        SELECT Booking.booking_id, Service.service_name, User.name, User.first_name, Booking.reservation_date, Booking.is_done
        FROM Booking
        INNER JOIN Service ON Booking.service_id = Service.service_id
        INNER JOIN User ON Booking.user_id = User.user_id
        WHERE Service.groomer_id = :groomer_id AND Booking.is_valdated = 1
        ORDER BY Booking.reservation_date DESC
    ");
    $stmt_history->execute(['groomer_id' => $groomer_id]);
    $history_bookings = $stmt_history->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
    exit;
}
?>

<!-- Conteneur principal qui occupe toute la hauteur -->
<div class="flex flex-col min-h-screen">
    <!-- Contenu principal qui prend tout l'espace restant -->
    <main class="flex-grow flex flex-col items-center">
        <!-- Titre de la page -->
        <h1 class="text-3xl font-bold text-center py-10 mt-10">Historique des rendez-vous acceptés</h1>

        <!-- Conteneur du tableau avec défilement horizontal sur petits écrans -->
        <div class="w-full max-w-4xl mx-auto px-4 mb-10 overflow-x-auto">
            <table class="w-full border-collapse">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="p-2 border text-left text-sm md:text-base">Service</th>
                        <th class="p-2 border text-left text-sm md:text-base">Client</th>
                        <th class="p-2 border text-left text-sm md:text-base">Date et heure</th>
                        <th class="p-2 border text-left text-sm md:text-base">Statut</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($history_bookings)): ?>
                        <tr>
                            <td colspan="4" class="p-2 border text-center text-sm md:text-base">Aucun rendez-vous dans l'historique.</td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($history_bookings as $booking): ?>
                        <tr class="<?php echo $booking['is_done'] ? 'bg-green-100' : 'bg-red-100'; ?>">
                            <td class="p-2 border text-sm md:text-base"><?php echo htmlspecialchars($booking['service_name']); ?></td>
                            <td class="p-2 border text-sm md:text-base"><?php echo htmlspecialchars($booking['first_name'] . ' ' . $booking['name']); ?></td>
                            <td class="p-2 border text-sm md:text-base"><?php echo htmlspecialchars($booking['reservation_date']); ?></td>
                            <td class="p-2 border text-sm md:text-base">
                                <?php echo $booking['is_done'] ? 'Passé' : 'Annulé'; ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </main>

    <!-- Footer poussé en bas -->
    <?php require_once 'Footer/footer.php'; ?>
</div>
