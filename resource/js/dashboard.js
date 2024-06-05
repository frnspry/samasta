const getUsername = '../../resource/db/get_username.php';

// Ambil nilai session untuk nama pengguna menggunakan Fetch API
fetch(getUsername)
    .then(response => response.json())
    .then(data => {
        // Update teks pada elemen currentUser
        var currentUserElement = document.getElementById('currentUser');
        if(currentUserElement) {
            currentUserElement.textContent = data.username;
        } else {
            console.error("Elemen dengan id 'currentUser' tidak ditemukan.");
        }
    })
    .catch(error => console.error('Error:', error));
