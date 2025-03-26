<?php
require_once 'database.php';

function getLog($user_id) {
    $db = Database::getConnection();
    $current_date = date('Y-m-d H:i:s');

    try {
        $bookings_query = $db->prepare("
            SELECT 
                b.booking_id,
                b.reservation_date,
                b.is_valdated,
                s.service_name,
                g.groomer_name
            FROM 
                Booking b
            JOIN 
                Service s ON b.service_id = s.service_id
            JOIN 
                Groomer g ON s.groomer_id = g.groomer_id
            WHERE 
                b.user_id = ? 
                AND b.reservation_date < ?
                AND b.is_valdated = 1
            ORDER BY 
                b.reservation_date ASC
        ");

        $bookings_query->execute([$user_id, $current_date]);
        return $bookings_query->fetchAll(PDO::FETCH_ASSOC);
    } finally {
        Database::closeConnection(); // in each case that will close the connexion with the db
    }
}