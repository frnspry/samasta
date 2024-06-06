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
$sql_reservations = "SELECT r.reservation_id, c.name, c.email, c.phone, c.no_rekening, r.table_id, r.reservation_date, r.reservation_time, r.prices, r.status
        FROM customers c
        JOIN reservations r ON c.customer_id = r.customer_id
        WHERE r.reservation_id = :reservation_id";
$stmt = $dbh->prepare($sql_reservations);
$stmt->bindParam(':reservation_id', $reservation_id, PDO::PARAM_INT);
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);

// Check if reservation exists
if (!$result) {
    echo "Reservation not found";
    exit;
}

// Output reservation details as JSON (You can customize this based on your requirement)
echo json_encode($result);
?>
