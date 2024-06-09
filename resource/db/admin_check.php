<?php
// Start session
session_start();

// Include your database connection script
require_once 'db_connect.php';

// Sanitize the input to prevent SQL injection
$admin_username = $_SESSION['username']; // Since you're only using the username here, no need for an array

// Query to fetch job details for the provided admin username
$sql_job = "SELECT job FROM admins WHERE username = :admin_username";
$stmt = $dbh->prepare($sql_job);
$stmt->bindParam(':admin_username', $admin_username); // Bind the parameter to avoid SQL injection
$stmt->execute();
$result = $stmt->fetch(PDO::FETCH_ASSOC);

// Output job details as JSON (You can customize this based on your requirement)
echo json_encode($result);
?>
