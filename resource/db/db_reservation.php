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

// Sanitize the input to prevent SQL injection
$status = $input['status'];
$status = $input['status'];
$status = $input['status'];
$status = $input['status'];
$status = $input['status'];
$status = $input['status'];
$status = $input['status'];
$status = $input['status'];
$status = $input['status'];
$status = $input['status'];
$status = $input['status'];

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
