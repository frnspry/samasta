<?php
// Include your database connection script
require_once 'db_connect.php';

// Check if reservation ID is provided
if (!isset($_GET['id'])) {
    echo "Reservation ID is missing";
    exit;
}

// Sanitize the input to prevent SQL injection
$reservation_id = intval($_GET['id']);

// Query to fetch reservation details for the provided reservation ID
$sql_reservations = "SELECT m.name, oi.quantity
                    FROM order_items oi
                    JOIN reservations r ON oi.reservation_id = r.reservation_id
                    JOIN menu m ON oi.menu_id = m.menu_id
                    WHERE r.reservation_id = :reservation_id";
$stmt = $dbh->prepare($sql_reservations);
$stmt->bindParam(':reservation_id', $reservation_id, PDO::PARAM_INT);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC); // Fetch all rows as an array

// Check if reservation exists
if (!$result) {
    echo "Reservation not found";
    exit;
}

// Output reservation details as JSON
echo json_encode($result);
?>
