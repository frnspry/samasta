const url = '../../resource/db/db_login.php';
const dashboardPage = '../../pages/admin/dashboard.php';

document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('login-form').addEventListener('submit', function(e) {
        e.preventDefault();
        const formData = new FormData(this);
        
        fetch(url, {
            method: 'POST',
            body: formData
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Login gagal. Periksa kembali username dan password Anda.');
            }
            return response.text();
        })
        .then(data => {
            // Check if login is successful
            if (data === "Login berhasil") {
                // Redirect to the dashboard
                window.location.href = dashboardPage;
            } else {
                // Display error message if login fails
                alert('Login gagal. Periksa kembali username dan password Anda.');
            }
        })
        .catch(error => {
            // Handle fetch error
            alert('Terjadi kesalahan: ' + error.message);
        });
    });
});
