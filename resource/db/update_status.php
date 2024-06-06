<?php
// Include your database connection script
require_once 'db_connect.php';

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if content type is JSON
if ($_SERVER['CONTENT_TYPE'] !== 'application/json') {
    http_response_code(400);
    echo json_encode(['error' => 'Content-Type must be application/json']);
    exit;
}

// Get the JSON input
$input = json_decode(file_get_contents('php://input'), true);

// Check if reservation ID and status are provided
if (!isset($input['reservation_id']) || !isset($input['status'])) {
    http_response_code(400);
    echo json_encode(['error' => 'Reservation ID or status is missing']);
    exit;
}

// Sanitize the input to prevent SQL injection
$reservation_id = filter_var($input['reservation_id'], FILTER_VALIDATE_INT);
$status = filter_var($input['status'], FILTER_SANITIZE_STRING);

// Validate reservation ID
if ($reservation_id === false) {
    http_response_code(400);
    echo json_encode(['error' => 'Invalid reservation ID']);
    exit;
}

// Validate status input
$valid_statuses = ['pending', 'confirmed', 'cancelled']; // Example statuses
if (!in_array($status, $valid_statuses)) {
    http_response_code(400);
    echo json_encode(['error' => 'Invalid status']);
    exit;
}

try {
    // Query to update the status of the reservation
    $sql_update_status = "UPDATE reservations SET status = :status WHERE reservation_id = :reservation_id";
    $stmt = $dbh->prepare($sql_update_status);
    $stmt->bindParam(':status', $status, PDO::PARAM_STR);
    $stmt->bindParam(':reservation_id', $reservation_id, PDO::PARAM_INT);

    // Execute the update query
    if ($stmt->execute()) {
        echo json_encode(['message' => 'Status updated successfully']);
    } else {
        http_response_code(500);
        echo json_encode(['error' => 'Error updating status']);
    }
} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode(['error' => 'Database error: ' . $e->getMessage()]);
}
?>
