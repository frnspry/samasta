const getUsername = '../../resource/db/get_username.php';
const getReservationDetails = '../../resource/db/get_reservation_details.php?id='

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

    document.addEventListener("DOMContentLoaded", function () {
        // Function to format numbers with commas
        function number_format(number) {
        return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        }

        var reservationRows = document.querySelectorAll("#masterData table tbody tr");
        reservationRows.forEach(function (row) {
            row.addEventListener("click", function () {
                let dataReservation = this;
                let reservationId = dataReservation.getAttribute('data-reservation-id');
    
                fetch(getReservationDetails + reservationId)
                    .then(function (response) {
                        return response.json();
                    })
                    .then(function (data) {
                        // Update modal content with reservation details
                        var modalBody = document.querySelector("#reservationModal .modal-body");
                        modalBody.innerHTML = `
                            <h5>Reservation Details</h5>
                            <p>ID: ${data.reservation_id}</p>
                            <p>Name: ${data.name}</p>
                            <p>Email: ${data.email}</p>
                            <p>Phone: ${data.phone}</p>
                            <p>No Rekening: ${data.no_rekening}</p>
                            <p>Table ID: ${data.table_id}</p>
                            <p>Tanggal Reservasi: ${data.reservation_date}</p>
                            <p>Waktu Reservasi: ${data.reservation_time}</p>
                            <p>Biaya: Rp. ${number_format(data.prices)}</p>
                            <p>Status: ${data.status}</p>
                        `;
    
                        // Show the modal
                        var reservationModalElement = document.getElementById('reservationModal');
                        var reservationModal = bootstrap.Modal.getOrCreateInstance(reservationModalElement);
                        reservationModal.show();
                    })
                    .catch(function (error) {
                        console.error("Error fetching reservation details: ", error);
                    });
            });
        });
    });
    