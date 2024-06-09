const getUsername = '../../resource/db/get_username.php';
const getReservationDetails = '../../resource/db/get_reservation_details.php?id='
const getReservationOrder = '../../resource/db/get_reservation_order.php?id='
const updateStatus = '../../resource/db/update_status.php'
const adminCheck = '../../resource/db/admin_check.php'
const insertAdminData = '../../resource/db/insert_admin_data.php'
const getAdminData = '../../resource/db/get_admin_data.php'
const deleteAdminData = '../../resource/db/delete_admin_data.php'

// Ambil nilai session untuk nama pengguna menggunakan Fetch API
fetch(getUsername)
    .then(response => response.json())
    .then(data => {
        // Update teks pada elemen currentUser
        var currentUserElement = document.getElementById('currentUser');
        if (currentUserElement) {
            currentUserElement.textContent = data.username;
        } else {
            console.error("Elemen dengan id 'currentUser' tidak ditemukan.");
        }
    })
    .catch(error => console.error('Error:', error));

document.addEventListener("DOMContentLoaded", function () {
    let reservationId = null;

    // Function to format numbers with commas
    function number_format(number) {
        return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    }

    var reservationRows = document.querySelectorAll("#masterData table tbody tr");
    reservationRows.forEach(function (row) {
        row.addEventListener("click", function () {
            // Remove 'let' to update the outer reservationId variable
            reservationId = this.getAttribute('data-reservation-id');

            fetch(getReservationDetails + reservationId)
                .then(response => response.json())
                .then(data => {
                    // Update modal content with reservation details
                    var modalBody = document.querySelector("#reservationModal .modal-body");
                    modalBody.innerHTML = `
                                <h5>Reservation Details</h5>
                                <p>Invoice : ${data.invoice}</p>
                                <p>Name : ${data.name}</p>
                                <p>Email : ${data.email}</p>
                                <p>Phone : ${data.phone}</p>
                                <p>Tipe Meja : ${data.table_type}</p>
                                <p>No Rekening : ${data.no_rekening}</p>
                                <p>Tanggal Reservasi : ${data.reservation_date}</p>
                                <p>Waktu Reservasi : ${data.reservation_time}</p>
                                <p>Biaya : Rp. ${number_format(data.prices)}</p>
                                <p>Status : ${data.status}</p>
                                <h5>Pesanan</h5>
                                <div class="order-list"></div>
                            `;

                    // Call renderOrderList to fetch and display order items
                    renderOrderList(reservationId);

                    // Show the modal
                    var reservationModalElement = document.getElementById('reservationModal');
                    var reservationModal = bootstrap.Modal.getOrCreateInstance(reservationModalElement);
                    reservationModal.show();
                })
                .catch(error => console.error("Error fetching reservation details: ", error));

            function renderOrderList(reservationId) {
                // Fetch order items based on reservation ID
                fetch(getReservationOrder + reservationId)
                    .then(response => response.json())
                    .then(data => {
                        const orderListContainer = document.querySelector('.order-list');
                        // Clear content before re-rendering
                        orderListContainer.innerHTML = '';

                        // Check if data is an array or a single item
                        if (Array.isArray(data)) {
                            // Data is an array of items
                            data.forEach(item => {
                                // Create a list item for each order item
                                const listItem = document.createElement('li');
                                listItem.textContent = `${item.name} x ${item.quantity}`;
                                orderListContainer.appendChild(listItem);
                            });
                        } else {
                            // Data is a single item
                            const listItem = document.createElement('li');
                            listItem.textContent = `${data.name} x ${data.quantity}`;
                            orderListContainer.appendChild(listItem);
                        }
                    })
                    .catch(error => console.error("Error fetching order items: ", error));
            }
        });
    });

    // Function to handle status update
    document.getElementById('saveButton').addEventListener('click', function () {
        const status = document.getElementById('statusSelect').value;
        if (!reservationId) {
            console.error("Reservation ID is null. Cannot update status.");
            return;
        }
        fetch(updateStatus, {
            method: 'POST',
            body: JSON.stringify({ status: status, reservation_id: reservationId }),
            headers: {
                'Content-Type': 'application/json'
            }
        })
            .then(response => {
                // Reload the page or update the UI as needed
                location.reload();
            })
            .catch(error => console.error('Error:', error));
    });

    // Admin Management
    fetch(adminCheck)
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            const createAdminButton = document.getElementById('createAdminButton');
            const deleteAdminButton = document.getElementById('deleteAdminButton');

            createAdminButton.disabled = (data.job !== 'owner');
            deleteAdminButton.disabled = (data.job !== 'owner');

            createAdminButton.addEventListener('click', function () {
                if (data.job !== 'owner') {
                    alert('Anda Bukan Owner!');
                    return;
                }

                // Show the modal
                var createAdminModalElement = document.getElementById('createAdminModal');
                var createAdminModal = bootstrap.Modal.getOrCreateInstance(createAdminModalElement);
                createAdminModal.show();

                document.getElementById('createButton').addEventListener('click', function () {
                    var formData = {
                        username: document.getElementById('username').value,
                        password: document.getElementById('password').value
                    };

                    fetch(insertAdminData, {
                        method: 'POST',
                        body: JSON.stringify(formData)
                    })
                        .then(response => response.json())
                        .then(data => {
                            // Reload the page or update the UI as needed
                            location.reload();
                        })
                        .catch(error => {
                            console.error('Error:', error);
                        });
                });
            });

            deleteAdminButton.addEventListener('click', function () {
                if (data.job !== 'owner') {
                    alert('Anda Bukan Owner!');
                    return;
                }

                // Show the modal
                var deleteAdminModalElement = document.getElementById('deleteAdminModal');
                var deleteAdminModal = bootstrap.Modal.getOrCreateInstance(deleteAdminModalElement);
                deleteAdminModal.show();

                fetch(getAdminData)
                    .then(response => {
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(data => {
                        // Populate the select element with usernames excluding the current user
                        var select = document.getElementById('adminUsernameSelect');
                        data.forEach(function (user) {
                            if (user.job !== 'owner') {
                                var option = document.createElement('option');
                                option.textContent = user.username;
                                select.appendChild(option);
                            }
                        });
                    })
                    .catch(error => {
                        console.error('There was a problem with the fetch operation:', error);
                    });

                document.getElementById('deleteButton').addEventListener('click', function () {
                    var adminUsername = document.getElementById('adminUsernameSelect').value;
                    fetch(deleteAdminData, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify({ username: adminUsername }),
                    })
                        .then(response => response.json())
                        .then(data => {
                            // Reload the page or update the UI as needed
                            location.reload();
                        })
                        .catch(error => {
                            console.error('Error:', error);
                        });
                });
            });
        })
        .catch(error => {
            console.error('Error fetching data:', error);
        });
});
