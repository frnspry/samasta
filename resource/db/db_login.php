<?php
session_start();

// Memasukkan file koneksi database
require_once 'db_connect.php';

// Check if the database connection is successful
if (!$dbh) {
    http_response_code(500); // Internal Server Error
    echo "Koneksi database gagal";
    exit;
}

// Ambil username dan password dari permintaan POST
$username = isset($_POST['username']) ? $_POST['username'] : null;
$password = isset($_POST['password']) ? $_POST['password'] : null;

// Lakukan query untuk mencocokkan username dan password
if ($username && $password) {
    $stmt = $dbh->prepare("SELECT * FROM admins WHERE username = :username AND password = :password");
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->execute();

    // Periksa apakah ada baris yang cocok
    if ($stmt->rowCount() > 0) {
        // Login berhasil, set session username
        $_SESSION['username'] = $username;
        http_response_code(200);
        echo "Login berhasil";
    } else {
        // Login gagal, kirim respons dengan status 401 Unauthorized
        http_response_code(401);
        echo "Login gagal. Periksa kembali username dan password Anda.";
    }
} else {
    // Jika tidak ada username atau password yang diberikan
    http_response_code(400); // Bad Request
    echo "Username dan password harus diisi";
}

// Menutup koneksi database
$dbh = null;
?>
