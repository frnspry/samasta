const fetchmenu = '../../resource/db/fetch_menu.php';
const modalurl = '../../resource/modal/modal.php';

let orderList = [];
let totalPrice = 0;
let date, time, guests, table;
let menuData = [];

document.addEventListener('DOMContentLoaded', function () {
    fetch(modalurl)
        .then(response => response.text())
        .then(data => {
            document.getElementById('modalContainer').innerHTML = data;

            // Fetch the menu data
            fetch(fetchmenu)
                .then(response => response.json())
                .then(data => {
                    menuData = data;
                });

            // Set the minimum date to tomorrow
            const dateInput = document.getElementById('date');
            const today = new Date();
            const tomorrow = new Date(today);
            tomorrow.setDate(tomorrow.getDate() + 1);
            const minDate = tomorrow.toISOString().split('T')[0];
            dateInput.min = minDate;

            // Disable search button by default
            const searchButton = document.getElementById('searchButton');
            searchButton.disabled = true;

            // Attach event listeners after the modals are loaded
            document.getElementById('searchButton').addEventListener('click', function () {
                time = document.getElementById('time').value;

                const selectedTime = new Date('1970-01-01T' + time + ':00Z');
                const startTime = new Date('1970-01-01T16:00:00Z');
                const endTime = new Date('1970-01-01T20:00:00Z');

                if (selectedTime < startTime || selectedTime > endTime) {
                    alert('Please select a time between 16:00 and 20:00.');
                    return;
                }

                // Close the first modal explicitly
                const myModalElement = document.getElementById('myModal');
                const myModal = bootstrap.Modal.getInstance(myModalElement);
                if (myModal) {
                    myModal.hide();
                }

                // Open the second modal
                const menuModalElement = document.getElementById('menuModal');
                const menuModal = bootstrap.Modal.getOrCreateInstance(menuModalElement);
                menuModal.show();
            });

            // Event listener for date, guests, table, and time inputs
            dateInput.addEventListener('input', toggleSearchButton);
            document.getElementById('guests').addEventListener('change', toggleSearchButton);
            document.getElementById('table').addEventListener('change', toggleSearchButton);
            document.getElementById('time').addEventListener('input', toggleSearchButton);

            function toggleSearchButton() {
                date = document.getElementById('date').value;
                guests = document.getElementById('guests').value;
                table = document.getElementById('table').value;
                time = document.getElementById('time').value;

                searchButton.disabled = !(date && guests && table && time);

                // Summary
                document.getElementById('reservationDate').textContent = date;
                document.getElementById('reservationTime').textContent = time;
                document.getElementById('reservationGuests').textContent = guests;
                document.getElementById('reservationTable').textContent = table;
            }

            function number_format(number) {
                return number.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            }

            function renderOrderList() {
                const orderListContainer = document.querySelector('.order-list');
                const totalPriceElement = document.querySelector('.total-price');
                const newTotalPrice = totalPrice * 1000;

                // Clear content before re-rendering
                orderListContainer.innerHTML = '';

                // Display each item in the order list
                orderList.forEach(item => {
                    const listItem = document.createElement('li');
                    listItem.textContent = `${item.name} x ${item.quantity}`;
                    orderListContainer.appendChild(listItem);
                });

                // Display total price
                totalPriceElement.textContent = `Rp.${number_format(newTotalPrice)}`;

                // Display total price in summary
                document.getElementById('reservationPrices').textContent = totalPriceElement.textContent;
            }

            // JavaScript to add item to order list and calculate total price
            document.querySelectorAll('.menu-item-container').forEach(container => {
                const quantityElement = container.querySelector('.quantity');
                const minusButton = container.querySelector('.minus-btn');
                const plusButton = container.querySelector('.plus-btn');
                const itemName = container.querySelector('h6').textContent;
                const itemPrice = parseInt(container.querySelector('p').textContent.replace('Rp.', ''));

                minusButton.addEventListener('click', () => {
                    let quantity = parseInt(quantityElement.textContent);
                    if (quantity > 0) {
                        quantity--;
                        quantityElement.textContent = quantity;

                        const index = orderList.findIndex(item => item.name === itemName);
                        if (index !== -1) {
                            orderList[index].quantity--;
                            if (orderList[index].quantity === 0) {
                                orderList.splice(index, 1);
                            }
                        }
                        totalPrice -= itemPrice;
                        renderOrderList();
                    }
                });

                plusButton.addEventListener('click', () => {
                    let quantity = parseInt(quantityElement.textContent);
                    quantity++;
                    quantityElement.textContent = quantity;

                    const index = orderList.findIndex(item => item.name === itemName);
                    if (index !== -1) {
                        orderList[index].quantity++;
                    } else {
                        const menuItem = menuData.find(menuItem => menuItem.name === itemName);
                        if (menuItem) {
                            orderList.push({ id: menuItem.menu_id, name: itemName, quantity: 1 });
                            console.log(`Added to orderList: id: ${menuItem.menu_id}, name: ${itemName}, quantity: 1`);
                        } else {
                            console.error('Menu item not found');
                        }
                    }
                    totalPrice += itemPrice;
                    renderOrderList();
                });
            });

            // Update table options based on guests selection
            document.getElementById('guests').addEventListener('change', function () {
                guests = this.value;
                const tableSelect = document.getElementById('table');
                tableSelect.innerHTML = '';

                if (guests === '1-4') {
                    tableSelect.innerHTML += '<option value="A">A</option>';
                } else if (guests === '5-8') {
                    tableSelect.innerHTML += '<option value="B">B</option>';
                } else if (guests === '8+') {
                    tableSelect.innerHTML += '<option value="C">C</option>';
                    tableSelect.innerHTML += '<option value="Gazebo">Gazebo</option>';
                }
            });

            // Attach event listeners after the modals are loaded
            document.getElementById('lanjutButton').addEventListener('click', function () {
                // Close the second modal explicitly
                const menuModalElement = document.getElementById('menuModal');
                const menuModal = bootstrap.Modal.getInstance(menuModalElement);
                if (menuModal) {
                    menuModal.hide();
                }

                // Open the third modal
                const paymentModalElement = document.getElementById('paymentModal');
                const paymentModal = bootstrap.Modal.getOrCreateInstance(paymentModalElement);
                paymentModal.show();
            });

            // Attach event listeners after the modals are loaded
            document.getElementById('selesaiButton').addEventListener('click', function () {
                // Close the second modal explicitly
                const paymentModalElement = document.getElementById('paymentModal');
                const paymentModal = bootstrap.Modal.getInstance(paymentModalElement);

                let name = document.getElementById('name').value;
                let email = document.getElementById('email').value;
                let phone = document.getElementById('phone').value;
                let noRekening = document.getElementById('no_rekening').value;

                if (paymentModal) {
                    paymentModal.hide();
                }

                // Open the third modal
                const successModalElement = document.getElementById('successModal');
                const successModal = bootstrap.Modal.getOrCreateInstance(successModalElement);
                const successOrderList = document.getElementById('successOrderList');

                orderList.forEach(item => {
                    const listItem = document.createElement('li');
                    listItem.textContent = `${item.name} x ${item.quantity}`;
                    successOrderList.appendChild(listItem);
                });

                document.getElementById('successName').textContent = name;
                document.getElementById('successEmail').textContent = email;
                document.getElementById('successPhone').textContent = phone;
                document.getElementById('successRekening').textContent = noRekening;

                document.getElementById('successReservationDate').textContent = date;
                document.getElementById('successReservationTime').textContent = time;
                document.getElementById('successReservationGuests').textContent = guests;
                document.getElementById('successReservationTable').textContent = table;
                document.getElementById('successReservationPrices').textContent = document.getElementById('reservationPrices').textContent;

                // Fungsi untuk menghapus tanda hubung dan simbol dari string
                function removeSymbols(str) {
                    return str.replace(/[^0-9]/g, '');
                }
                // Fungsi untuk mengacak string
                function shuffleString(str) {
                    const array = str.split('');
                    for (let i = array.length - 1; i > 0; i--) {
                        const j = Math.floor(Math.random() * (i + 1));
                        [array[i], array[j]] = [array[j], array[i]];
                    }
                    return array.join('');
                }

                // Hapus tanda hubung dan simbol dari tanggal dan waktu
                const cleanDate = removeSymbols(date);
                const cleanTime = removeSymbols(time);
                // Gabungkan tanggal dan waktu menjadi satu string
                const dateTimeString = cleanDate + cleanTime;
                // Acak string tanggal dan waktu
                const randomizedDateTime = shuffleString(dateTimeString);
                // Gunakan string yang telah diacak untuk faktur
                const invoice = 'INV-' + randomizedDateTime;

                document.getElementById('successInvoice').textContent = invoice;

                successModal.show();
            });
        });
});
