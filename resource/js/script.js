const fetchmenu = '../../resource/db/fetch_menu.php';
const modalurl = '../../resource/modal/modal.php';
const fetchreservation = '../../resource/db/db_reservation.php';
const indexPage = 'index.php';

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

                // Validation
                if (!date || !guests || !table || !time) {
                    alert('Tolong isi tanggal dan waktu reservasi!');
                    return; // Stop further execution if validation fails
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

                // Enable or disable lanjutButton based on the orderList
                document.getElementById('lanjutButton').disabled = orderList.length === 0;
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

                if (guests === '1-4 Orang') {
                    tableSelect.innerHTML += '<option value="A">A</option>';
                } else if (guests === '5-8 Orang') {
                    tableSelect.innerHTML += '<option value="B">B</option>';
                } else if (guests === '8+ Orang') {
                    tableSelect.innerHTML += '<option value="C">C</option>';
                    tableSelect.innerHTML += '<option value="Gazebo">Gazebo</option>';
                }
            });

            // Attach event listeners after the modals are loaded
            document.getElementById('lanjutButton').addEventListener('click', function () {
                // Validation
                if (orderList.length === 0) {
                    alert('Tolong isi pesanan anda!');
                    return; // Stop further execution if validation fails
                }

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

            function toggleSelesaiButton() {
                let name = document.getElementById('name').value;
                let email = document.getElementById('email').value;
                let phone = document.getElementById('phone').value;
                let noRekening = document.getElementById('no_rekening').value;

                selesaiButton.disabled = !(name && email && phone && noRekening);
            }

            document.getElementById('name').addEventListener('change', toggleSelesaiButton);
            document.getElementById('email').addEventListener('change', toggleSelesaiButton);
            document.getElementById('phone').addEventListener('change', toggleSelesaiButton);
            document.getElementById('no_rekening').addEventListener('change', toggleSelesaiButton);

            function toggleSelesaiButton() {
                let name = document.getElementById('name').value;
                let email = document.getElementById('email').value;
                let phone = document.getElementById('phone').value;
                let noRekening = document.getElementById('no_rekening').value;

                selesaiButton.disabled = !(name && email && phone && noRekening);
            }

            document.getElementById('selesaiButton').addEventListener('click', function () {
                let name = document.getElementById('name').value;
                let email = document.getElementById('email').value;
                let phone = document.getElementById('phone').value;
                let noRekening = document.getElementById('no_rekening').value;

                // Validation
                if (!name || !email || !phone || !noRekening) {
                    alert('Tolong isi semua kolom yang disediakan!');
                    return; // Stop further execution if validation fails
                }

                // Nama hanya boleh berisi huruf
                const lettersOnly = name.replace(/[^a-zA-Z\s]/g, '');
                if (name !== lettersOnly) {
                    alert('Nama hanya boleh berisi huruf!');
                    return; // Stop further execution if validation fails
                }

                // Nomor HP hanya boleh berisi angka dan maksimal 13 digit
                const numbersOnlyPhone = phone.replace(/[^0-9]/g, '');
                if (phone !== numbersOnlyPhone) {
                    alert('Nomor HP hanya boleh berisi angka!');
                    return; // Stop further execution if validation fails
                } else if (numbersOnlyPhone.length > 13) {
                    alert('Nomor HP maksimal 13 digit!');
                    return; // Stop further execution if validation fails
                }

                // Nomor Rekening hanya boleh berisi angka dan maksimal 16 digit
                const numbersOnlyRekening = noRekening.replace(/[^0-9]/g, '');
                if (noRekening !== numbersOnlyRekening) {
                    alert('Nomor Rekening hanya boleh berisi angka!');
                    return; // Stop further execution if validation fails
                } else if (numbersOnlyRekening.length > 16) {
                    alert('Nomor Rekening maksimal 16 digit!');
                    return; // Stop further execution if validation fails
                }

                // Close the second modal explicitly
                const paymentModalElement = document.getElementById('paymentModal');
                const paymentModal = bootstrap.Modal.getInstance(paymentModalElement);

                if (paymentModal) {
                    paymentModal.hide();
                }

                // Open the third modal
                const successModalElement = document.getElementById('successModal');
                const successModal = bootstrap.Modal.getOrCreateInstance(successModalElement);
                const successOrderList = document.getElementById('successOrderList');
                successModal.show();

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
                let datee = date;
                let timee = time;
                document.getElementById('successReservationGuests').textContent = guests;
                document.getElementById('successReservationTable').textContent = table;
                let prices = document.getElementById('reservationPrices').textContent;
                document.getElementById('successReservationPrices').textContent = prices;
                let pricess = removeSymbols(document.getElementById('reservationPrices').textContent);

                // Fungsi untuk menghapus tanda hubung dan simbol dari string
                function removeSymbols(str) {
                    // Removes Rp., commas, and any non-digit characters
                    return str.replace(/[Rp.,]/g, '').replace(/[^0-9]/g, '');
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

                // Prepare data for POST request to Database Handler
                let postHandlerData = new FormData();
                postHandlerData.append('name', name);
                postHandlerData.append('email', email);
                postHandlerData.append('phone', phone);
                postHandlerData.append('no_rekening', noRekening);
                postHandlerData.append('reservation_date', datee);
                postHandlerData.append('reservation_time', timee);
                postHandlerData.append('peoples', guests);
                postHandlerData.append('table_type', table);
                postHandlerData.append('prices', pricess);
                postHandlerData.append('invoice', invoice);

                // Append orderList to postHandlerData
                orderList.forEach((item, index) => {
                    postHandlerData.append(`order_items[${index}][menu_id]`, item.id);
                    postHandlerData.append(`order_items[${index}][quantity]`, item.quantity);
                });

                fetch(fetchreservation, {
                    method: 'POST',
                    body: postHandlerData
                })
                    .then(response => response.text()) // Adjust based on the PHP response type
                    .then(data => {
                        autoDownloadReceipt();
                    })
                    .catch(error => {
                        console.error('Error:', error); // Handle error
                        alert('An error occurred while submitting the reservation.');
                    });
            });

            function autoDownloadReceipt() {
                // Initialize jsPDF
                const jsPDF = window.jspdf.jsPDF;
                const doc = new jsPDF('p', 'pt', 'a4'); // A4 size with portrait orientation
                const scale = window.devicePixelRatio * 2; // Increase scale for higher resolution

                // Capture modal content as image using html2canvas with increased scale
                html2canvas(document.querySelector('.modal-print'), { scale: scale }).then(canvas => {
                    const imgData = canvas.toDataURL('image/png');

                    // Add image to PDF with increased quality
                    const pdfWidth = doc.internal.pageSize.getWidth();
                    const pdfHeight = (canvas.height * pdfWidth) / canvas.width;
                    doc.addImage(imgData, 'PNG', 0, 0, pdfWidth, pdfHeight, '', 'FAST');

                    // Add text below the image
                    const text = "Silahkan tunjukkan receipt ini kepada kasir pada saat reservasi";
                    const textWidth = doc.getStringUnitWidth(text) * doc.internal.getFontSize() / doc.internal.scaleFactor;
                    const textHeight = doc.internal.getLineHeight();
                    doc.text(text, (pdfWidth - textWidth) / 2, pdfHeight + textHeight + 10); // Adjust position as needed

                    // Save PDF
                    doc.save('reservation_details.pdf');
                });
            };

            document.getElementById('homeButton').addEventListener('click', function () {
                window.location.href = indexPage;
            });
        });
    $(document).ready(function () {
        // Memunculkan atau menyembunyikan tombol berdasarkan posisi scroll
        $(window).scroll(function () {
            if ($(this).scrollTop() > 100) {
                $('#btnTop').fadeIn();
            } else {
                $('#btnTop').fadeOut();
            }
        });

        // Menggulir kembali ke atas ketika tombol ditekan
        $('#btnTop').click(function () {
            $('html, body').scrollTop(0); // Menggulir langsung ke atas tanpa animasi
            return false;
        });
    });

    // Event.php handler
    // document.getElementById('consent').addEventListener('change', function() {
    //     document.getElementById('submitButton').disabled = !this.checked;
    // });

    // document.getElementById('submitButton').addEventListener('click', function(){
    //     // Validation
    //     if (!document.getElementById('consent').checked) {
    //         alert('Tolong Setujui untuk mengizinkan Samasta menyimpan dan memproses data pribadi anda!');
    //         return; // Stop further execution if validation fails
    //     }
    // });

});