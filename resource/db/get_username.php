<?php
// Mulai session
session_start();

// Buat respons JSON dengan nilai session untuk nama pengguna
$response = array('username' => $_SESSION['username']);

// Set header untuk respons JSON
header('Content-Type: application/json');

// Output respons JSON
echo json_encode($response);
?>
