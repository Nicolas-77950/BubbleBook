<?php
require_once 'database.php';
require_once 'Header/header.php';

session_start();
if(isset($_SESSION['groomer_id'])) {
    $groomer_id = $_SESSION['groomer_id'];
} else {
    ?>
    <script>
        window.location.href = "login.php";
    </script>
    <?php
}

try {
    // Connexion à la base de données
    $pdo = Database::getConnection();
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Récupérer les réservations en attente (is_valdated = 0)
    $stmt_pending = $pdo->prepare("
        SELECT Booking.booking_id, Service.service_name, User.name, User.first_name, Booking.reservation_date
        FROM Booking
        INNER JOIN Service ON Booking.service_id = Service.service_id
        INNER JOIN User ON Booking.user_id = User.user_id
        WHERE Service.groomer_id = :groomer_id AND Booking.is_valdated = 0
    ");
    $stmt_pending->execute(['groomer_id' => $groomer_id]);
    $pending_bookings = $stmt_pending->fetchAll(PDO::FETCH_ASSOC);

    // Récupérer les rendez-vous acceptés (is_valdated = 1 et is_done = 0)
    $stmt_accepted = $pdo->prepare("
        SELECT Booking.booking_id, Service.service_name, User.name, User.first_name, Booking.reservation_date
        FROM Booking
        INNER JOIN Service ON Booking.service_id = Service.service_id
        INNER JOIN User ON Booking.user_id = User.user_id
        WHERE Service.groomer_id = :groomer_id AND Booking.is_valdated = 1 AND Booking.is_done = 0
    ");
    $stmt_accepted->execute(['groomer_id' => $groomer_id]);
    $accepted_bookings = $stmt_accepted->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Erreur de connexion : " . $e->getMessage();
    exit;
}
?>

<!-- Afficher le message de confirmation ou d'erreur s'il existe -->
<?php if (isset($_GET['message'])): ?>
    <p class="text-center <?php echo $_GET['type'] === 'success' ? 'text-green-500' : 'text-red-500'; ?>">
        <?php echo htmlspecialchars(urldecode($_GET['message'])); ?>
    </p>
<?php endif; ?>

<!-- Premier tableau : Réservations en attente -->
<h2 class="text-xl font-bold text-center py-4">Réservations en attente</h2>
<table class="w-full max-w-4xl mx-auto border-collapse mb-8">
    <thead>
        <tr class="bg-gray-200">
            <th class="p-2 border">Service</th>
            <th class="p-2 border">Client</th>
            <th class="p-2 border">Date et heure</th>
            <th class="p-2 border">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php if (empty($pending_bookings)): ?>
            <tr>
                <td colspan="4" class="p-2 border text-center">Aucune réservation en attente.</td>
            </tr>
        <?php else: ?>
            <?php foreach ($pending_bookings as $booking): ?>
            <tr>
                <td class="p-2 border"><?php echo htmlspecialchars($booking['service_name']); ?></td>
                <td class="p-2 border"><?php echo htmlspecialchars($booking['first_name'] . ' ' . $booking['name']); ?></td>
                <td class="p-2 border"><?php echo htmlspecialchars($booking['reservation_date']); ?></td>
                <td class="p-2 border">
                    <form method="POST" action="validate_time.php?groomer_id=<?php echo $groomer_id; ?>" class="flex space-x-2 justify-center">
                        <input type="hidden" name="booking_id" value="<?php echo $booking['booking_id']; ?>">
                        <button type="submit" name="action" value="accept" class="p-1 bg-green-500 text-white rounded hover:bg-green-600">Accepter</button>
                        <button type="submit" name="action" value="reject" class="p-1 bg-red-500 text-white rounded hover:bg-red-600">Refuser</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>

<!-- Deuxième tableau : Rendez-vous acceptés -->
<h2 class="text-xl font-bold text-center py-4">Rendez-vous acceptés</h2>
<table class="w-full max-w-4xl mx-auto border-collapse">
    <thead>
        <tr class="bg-gray-200">
            <th class="p-2 border">Service</th>
            <th class="p-2 border">Client</th>
            <th class="p-2 border">Date et heure</th>
            <th class="p-2 border">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php if (empty($accepted_bookings)): ?>
            <tr>
                <td colspan="4" class="p-2 border text-center">Aucun rendez-vous accepté pour le moment.</td>
            </tr>
        <?php else: ?>
            <?php foreach ($accepted_bookings as $booking): ?>
            <tr>
                <td class="p-2 border"><?php echo htmlspecialchars($booking['service_name']); ?></td>
                <td class="p-2 border"><?php echo htmlspecialchars($booking['first_name'] . ' ' . $booking['name']); ?></td>
                <td class="p-2 border"><?php echo htmlspecialchars($booking['reservation_date']); ?></td>
                <td class="p-2 border">
                    <form method="POST" action="validate_time.php?groomer_id=<?php echo $groomer_id; ?>" class="flex space-x-2 justify-center">
                        <input type="hidden" name="booking_id" value="<?php echo $booking['booking_id']; ?>">
                        <button type="submit" name="action" value="done" class="p-1 bg-blue-500 text-white rounded hover:bg-blue-600">Passé</button>
                        <button type="submit" name="action" value="cancel" class="p-1 bg-red-500 text-white rounded hover:bg-red-600">Annuler</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>

<?php
require_once 'Footer/footer.php';
?>