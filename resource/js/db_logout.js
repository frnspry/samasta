const url = '../../resource/db/db_logout.php';
const loginPage = '../../pages/admin/login.php';

document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('logout-form').addEventListener('click', function(e) {
        e.preventDefault();

        console.log('tombol ditekan');

        fetch(url, {
            method: 'POST',
            credentials: 'same-origin' // Untuk mengirim cookie (misalnya session) ke server
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Logout gagal.');
            }
            return response.text();
        })
        .then(data => {
            // Periksa apakah logout berhasil
            if (data === "Logout berhasil") {
                // Redirect ke halaman login
                window.location.href = loginPage;
            } else {
                // Tampilkan pesan kesalahan jika logout gagal
                alert('Logout gagal.');
            }
        })
        .catch(error => {
            // Tangani error fetch
            alert('Terjadi kesalahan: ' + error.message);
        });
    });
});
