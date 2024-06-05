<?php
// Mulai session
session_start();

// Hapus semua variabel sesi
session_unset();

// Hancurkan sesi
session_destroy();

http_response_code(200);
echo "Logout berhasil";

?>
