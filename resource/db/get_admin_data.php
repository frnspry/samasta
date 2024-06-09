<?php
// Mulai session
session_start();

// Include your database connection script
require_once 'db_connect.php';

$sql = "SELECT username, job FROM admins";
$stmt = $dbh->prepare($sql);
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($results);
?>
