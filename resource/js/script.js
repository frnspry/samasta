const fetchmenu = '../../resource/db/fetch_menu.php'
const modalurl = '../../resource/modal/modal.php'

var orderList = [];
var totalPrice = 0;

document.addEventListener('DOMContentLoaded', function() {
    fetch(modalurl)
        .then(response => response.text())
        .then(data => {
            document.getElementById('modalContainer').innerHTML = data;

            // Set the minimum date to tomorrow
            var dateInput = document.getElementById('date');
            var today = new Date();
            var tomorrow = new Date(today);
            tomorrow.setDate(tomorrow.getDate() + 1);
            var yyyy = tomorrow.getFullYear();
            var mm = String(tomorrow.getMonth() + 1).padStart(2, '0');
            var dd = String(tomorrow.getDate()).padStart(2, '0');
            var minDate = yyyy + '-' + mm + '-' + dd;
            dateInput.setAttribute('min', minDate);

            // Disable search button by default
            var searchButton = document.getElementById('searchButton');
            searchButton.disabled = true;

            // Attach event listeners after the modals are loaded
            document.getElementById('searchButton').addEventListener('click', function() {
                var date = document.getElementById('date').value;
                var guests = document.getElementById('guests').value;
                var time = document.getElementById('time').value;

                var selectedTime = new Date('1970-01-01T' + time + ':00Z');
                var startTime = new Date('1970-01-01T16:00:00Z');
                var endTime = new Date('1970-01-01T20:00:00Z');

                if (selectedTime < startTime || selectedTime > endTime) {
                    alert('Please select a time between 16:00 and 20:00.');
                    return;
                }

                // Close the first modal explicitly
                var myModalElement = document.getElementById('myModal');
                var myModal = bootstrap.Modal.getInstance(myModalElement);
                if (myModal) {
                    myModal.hide();
                }

                // Open the second modal
                var menuModalElement = document.getElementById('menuModal');
                var menuModal = bootstrap.Modal.getOrCreateInstance(menuModalElement);
                menuModal.show();

            });

            // Event listener for date, guests, table, and time inputs
            dateInput.addEventListener('input', toggleSearchButton);
            document.getElementById('guests').addEventListener('change', toggleSearchButton);
            document.getElementById('table').addEventListener('change', toggleSearchButton);
            document.getElementById('time').addEventListener('input', toggleSearchButton);

            function toggleSearchButton() {
                var date = document.getElementById('date').value;
                var guests = document.getElementById('guests').value;
                var table = document.getElementById('table').value;
                var time = document.getElementById('time').value;

                if (date && guests && table && time) {
                    searchButton.disabled = false;
                } else {
                    searchButton.disabled = true;
                }

                // Summary
                document.getElementById('reservationDate').textContent = date;
                document.getElementById('reservationTime').textContent = time;
                document.getElementById('reservationGuests').textContent = guests;
                document.getElementById('reservationTable').textContent = table;
            }

            // // JavaScript to handle increment and decrement buttons
            // document.querySelectorAll('.menu-item-container').forEach(function(container) {
            //     var quantityElement = container.querySelector('.quantity');
            //     var minusButton = container.querySelector('.minus-btn');
            //     var plusButton = container.querySelector('.plus-btn');

            //     minusButton.addEventListener('click', function() {
            //         var quantity = parseInt(quantityElement.textContent);
            //         if (quantity > 0) {
            //             quantity--;
            //             quantityElement.textContent = quantity;
            //         }
            //     });

            //     plusButton.addEventListener('click', function() {
            //         var quantity = parseInt(quantityElement.textContent);
            //         quantity++;
            //         quantityElement.textContent = quantity;
            //     });
            // });

            function number_format(number) {
                return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            }

            function renderOrderList() {
                var orderListContainer = document.querySelector('.order-list');
                var totalPriceElement = document.querySelector('.total-price');
                var newTotalPrice = totalPrice * 1000;

                // Kosongkan konten sebelum menampilkan ulang
                orderListContainer.innerHTML = '';

                // Tampilkan setiap item dalam daftar belanja
                orderList.forEach(function (item) {
                    var listItem = document.createElement('li');
                    listItem.textContent = `${item.name} x ${item.quantity}`;
                    orderListContainer.appendChild(listItem);
                });

                // Tampilkan total harga
                totalPriceElement.textContent = `Rp.${number_format(newTotalPrice)}`;

                // Tampilkan total harga di summary
                document.getElementById('reservationPrices').textContent = totalPriceElement.textContent;
            }

            // JavaScript untuk menambahkan item ke daftar belanja dan menghitung total harga
            document.querySelectorAll('.menu-item-container').forEach(function (container) {
                var quantityElement = container.querySelector('.quantity');
                var minusButton = container.querySelector('.minus-btn');
                var plusButton = container.querySelector('.plus-btn');
                var itemName = container.querySelector('h6').textContent;
                var itemPrice = parseInt(container.querySelector('p').textContent.replace('Rp.', ''));

                minusButton.addEventListener('click', function () {
                    var quantity = parseInt(quantityElement.textContent);
                    if (quantity > 0) {
                        quantity--;
                        quantityElement.textContent = quantity;

                        // Cari item di dalam daftar belanja
                        var index = orderList.findIndex(item => item.name === itemName);
                        if (index !== -1) {
                            // Kurangi jumlah item dari daftar belanja
                            orderList[index].quantity--;
                            if (orderList[index].quantity === 0) {
                                // Hapus item jika jumlahnya menjadi 0
                                orderList.splice(index, 1);
                            }
                        }
                        // Kurangi total harga
                        totalPrice -= itemPrice;
                        // Tampilkan ulang daftar belanja dan total harga
                        renderOrderList();
                    }
                });

                plusButton.addEventListener('click', function () {
                    var quantity = parseInt(quantityElement.textContent);
                    quantity++;
                    quantityElement.textContent = quantity;

                    // Tambahkan item ke dalam daftar belanja
                    var index = orderList.findIndex(item => item.name === itemName);
                    if (index !== -1) {
                        // Jika item sudah ada di dalam daftar belanja, tambahkan jumlahnya
                        orderList[index].quantity++;
                    } else {
                        // Jika item belum ada di dalam daftar belanja, tambahkan sebagai item baru
                        orderList.push({ name: itemName, quantity: 1 });
                    }
                    // Tambahkan harga item ke total harga
                    totalPrice += itemPrice;
                    // Tampilkan ulang daftar belanja dan total harga
                    renderOrderList();
                });
            });

            // Update table options based on guests selection
            document.getElementById('guests').addEventListener('change', function() {
                var guests = this.value;
                var tableSelect = document.getElementById('table');
                tableSelect.innerHTML = '';

                if (guests === '1-4') {
                    tableSelect.innerHTML += '<option value="Meja A">Meja A</option>';
                } else if (guests === '5-8') {
                    tableSelect.innerHTML += '<option value="Meja B">Meja B</option>';
                } else if (guests === '8+') {
                    tableSelect.innerHTML += '<option value="Meja C">Meja C</option>';
                    tableSelect.innerHTML += '<option value="Gazebo">Gazebo</option>';
                }
            });

            // Attach event listeners after the modals are loaded
            document.getElementById('lanjutButton').addEventListener('click', function() {
                // Close the second modal explicitly
                var menuModalElement = document.getElementById('menuModal');
                var menuModal = bootstrap.Modal.getInstance(menuModalElement);
                if (menuModal) {
                    menuModal.hide();
                }

                // Open the third modal
                var paymentModalElement = document.getElementById('paymentModal');
                var paymentModal = bootstrap.Modal.getOrCreateInstance(paymentModalElement);
                paymentModal.show();

            });
        });
});
