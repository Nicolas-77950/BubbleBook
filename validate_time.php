<?php
require_once 'database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $booking_id = $_POST['booking_id'];
    $action = $_POST['action'];

    try {
        // Connexion à la base de données
        $pdo = Database::getConnection();
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if ($action === 'accept') {
            // Accepter une réservation en attente
            $stmt = $pdo->prepare("UPDATE Booking SET is_valdated = 1 WHERE booking_id = :booking_id");
            $stmt->execute(['booking_id' => $booking_id]);
            $message = "Réservation acceptée avec succès.";
            $message_type = "success";
        } elseif ($action === 'reject') {
            // Refuser une réservation en attente (suppression)
            $stmt = $pdo->prepare("DELETE FROM Booking WHERE booking_id = :booking_id");
            $stmt->execute(['booking_id' => $booking_id]);
            $message = "Réservation refusée.";
            $message_type = "error";
        } elseif ($action === 'done') {
            // Marquer un rendez-vous comme terminé (is_valdated = 1, is_done = 1)
            $stmt = $pdo->prepare("UPDATE Booking SET is_valdated = 1, is_done = 1 WHERE booking_id = :booking_id");
            $stmt->execute(['booking_id' => $booking_id]);
            $message = "Rendez-vous marqué comme passé.";
            $message_type = "success";
        } elseif ($action === 'cancel') {
            // Annuler un rendez-vous (is_valdated = 1, is_done = 0)
            $stmt = $pdo->prepare("UPDATE Booking SET is_valdated = 1, is_done = 0 WHERE booking_id = :booking_id");
            $stmt->execute(['booking_id' => $booking_id]);
            $message = "Rendez-vous annulé.";
            $message_type = "success";
        }

        // Redirection vers manage_time.php avec un paramètre pour le message
        header("Location: manage_time.php?groomer_id=" . $_GET['groomer_id'] . "&message=" . urlencode($message) . "&type=" . $message_type);
        exit;
    } catch (PDOException $e) {
        // En cas d'erreur, rediriger avec un message d'erreur
        header("Location: manage_time.php?groomer_id=" . $_GET['groomer_id'] . "&message=" . urlencode("Erreur : " . $e->getMessage()) . "&type=error");
        exit;
    }
}
?>