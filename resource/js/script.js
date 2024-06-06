const fetchmenu = '../../resource/db/fetch_menu.php'

document.addEventListener('DOMContentLoaded', function() {
    fetch('resource/modal/modal.php')
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
            }

            // JavaScript to handle increment and decrement buttons
            document.querySelectorAll('.menu-item-container').forEach(function(container) {
                var quantityElement = container.querySelector('.quantity');
                var minusButton = container.querySelector('.minus-btn');
                var plusButton = container.querySelector('.plus-btn');

                minusButton.addEventListener('click', function() {
                    var quantity = parseInt(quantityElement.textContent);
                    if (quantity > 0) {
                        quantity--;
                        quantityElement.textContent = quantity;
                    }
                });

                plusButton.addEventListener('click', function() {
                    var quantity = parseInt(quantityElement.textContent);
                    quantity++;
                    quantityElement.textContent = quantity;
                });
            });

            // Fetch menu items
            fetch(fetchmenu)
                .then(response => response.json())
                .then(data => {
                    const menuModal = document.querySelector('.menu-modal');
                    data.forEach(item => {
                        const menuItemContainer = document.createElement('div');
                        menuItemContainer.classList.add('menu-item-container');
                        menuItemContainer.innerHTML = `
                            <div class="row">
                                <div class="col-md-2">
                                    <img src="${item.image_path}" alt="${item.name}" class="img-fluid menu-item-image">
                                </div>
                                <div class="col-md-6">
                                    <h6>${item.name}</h6>
                                    <p>Rp.${item.price}</p>
                                </div>
                                <div class="col-md-4 text-end">
                                    <button class="btn btn-outline-secondary minus-btn">−</button>
                                    <span class="quantity">0</span>
                                    <button class="btn btn-outline-secondary plus-btn">+</button>
                                </div>
                            </div>`;
                        menuModal.appendChild(menuItemContainer);
                    });

                    // JavaScript to handle increment and decrement buttons
                    document.querySelectorAll('.minus-btn').forEach(function(btn) {
                        btn.addEventListener('click', function() {
                            var quantityElement = this.nextElementSibling;
                            var quantity = parseInt(quantityElement.textContent);
                            if (quantity > 0) {
                                quantityElement.textContent = quantity - 1;
                            }
                        });
                    });

                    document.querySelectorAll('.plus-btn').forEach(function(btn) {
                        btn.addEventListener('click', function() {
                            var quantityElement = this.previousElementSibling;
                            var quantity = parseInt(quantityElement.textContent);
                            quantityElement.textContent = quantity + 1;
                        });
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
