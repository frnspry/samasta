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

                // Set the selected date and time in the second modal
                document.getElementById('selectedDateTime').innerText = date + ', ' + guests + ' Guests, ' + time;

                // Open the second modal
                var timeModalElement = document.getElementById('timeModal');
                var timeModal = bootstrap.Modal.getOrCreateInstance(timeModalElement);
                timeModal.show();
            });

            document.getElementById('guests').addEventListener('change', function() {
                var guests = this.value;
                var tableTypeSelect = document.getElementById('table');
                var tableTypeOptions = '<option value="Meja A">Meja A</option>';

                if (guests === '1-4') {
                    tableTypeOptions = '<option value="Meja A">Meja A</option>';
                } else if (guests === '5-8') {
                    tableTypeOptions = '<option value="Meja B">Meja B</option>';
                } else if (guests === '8+') {
                    tableTypeOptions = '<option value="Meja C">Meja C</option><option value="Gazebo">Gazebo</option>';
                }

                tableTypeSelect.innerHTML = tableTypeOptions;
            });

            document.querySelectorAll('.time-slot').forEach(function(button) {
                button.addEventListener('click', function() {
                    // Close the second modal explicitly
                    var timeModalElement = document.getElementById('timeModal');
                    var timeModal = bootstrap.Modal.getInstance(timeModalElement);
                    if (timeModal) {
                        timeModal.hide();
                    }

                    var timeSlotDetails = this.innerText;
                    document.getElementById('holdingTime').innerText = "We're holding this table for: " + timeSlotDetails;

                    var menuModalElement = document.getElementById('menuModal');
                    var menuModal = bootstrap.Modal.getOrCreateInstance(menuModalElement);
                    menuModal.show();
                });
            });

            document.querySelectorAll('.plus').forEach(function(button) {
                button.addEventListener('click', function() {
                    var targetSelector = this.getAttribute('data-target');
                    var target = document.querySelector(targetSelector);
                    if (target) {
                        var count = parseInt(target.innerText);
                        count = count + 1;
                        target.innerText = count;
                    }
                });
            });

            document.querySelectorAll('.minus').forEach(function(button) {
                button.addEventListener('click', function() {
                    var targetSelector = this.getAttribute('data-target');
                    var target = document.querySelector(targetSelector);
                    if (target) {
                        var count = parseInt(target.innerText);
                        count = count - 1;
                        if (count < 0) count = 0;
                        target.innerText = count;
                    }
                });
            });
        });
});
