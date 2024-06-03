document.addEventListener('DOMContentLoaded', function() {
    // Load modal.html into #modalContainer
    fetch('resource/modal/modal.php')
        .then(response => response.text())
        .then(data => {
            document.getElementById('modalContainer').innerHTML = data;

            // Attach event listeners after the modals are loaded
            document.getElementById('searchButton').addEventListener('click', function() {
                // Get the selected date, guests, and time
                var date = document.getElementById('date').value;
                var guests = document.getElementById('guests').value;
                var time = document.getElementById('time').value;

                // Validate time range (16:00 - 20:00)
                var selectedTime = new Date('1970-01-01T' + time + ':00Z');
                var startTime = new Date('1970-01-01T16:00:00Z');
                var endTime = new Date('1970-01-01T20:00:00Z');

                if (selectedTime < startTime || selectedTime > endTime) {
                    // Display an error message or handle the case where time is out of range
                    alert('Please select a time between 16:00 and 20:00.');
                    return;
                }

                // Close the first modal
                var myModal = new bootstrap.Modal(document.getElementById('myModal'));
                myModal.hide();

                // Set the selected date and time in the second modal
                document.getElementById('selectedDateTime').innerText = date + ', ' + guests + ' Guests, ' + time;

                // Open the second modal
                var timeModal = new bootstrap.Modal(document.getElementById('timeModal'));
                timeModal.show();
            });

            // Handle change event on guests select
            document.getElementById('guests').addEventListener('change', function() {
                var guests = this.value;

                // Update table type options based on number of guests
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
                    // Close the second modal
                    var timeModal = new bootstrap.Modal(document.getElementById('timeModal'));
                    timeModal.hide();

                    // Get the selected time slot details
                    var timeSlotDetails = this.innerText;

                    // Set the holding time in the third modal
                    document.getElementById('holdingTime').innerText = "We're holding this table for: " + timeSlotDetails;

                    // Open the third modal
                    var menuModal = new bootstrap.Modal(document.getElementById('menuModal'));
                    menuModal.show();
                });
            });

            // Event listener for plus button
            document.querySelectorAll('.plus').forEach(function(button) {
                button.addEventListener('click', function() {
                    var target = document.querySelector(this.getAttribute('data-target'));
                    var count = target.innerText;
                    count = parseInt(count) + 1;
                    target.innerText = count;
                });
            });

            // Event listener for minus button
            document.querySelectorAll('.minus').forEach(function(button) {
                button.addEventListener('click', function() {
                    var target = document.querySelector(this.getAttribute('data-target'));
                    var count = target.innerText;
                    count = parseInt(count) - 1;
                    if(count < 0) count = 0;
                    target.innerText = count;
                });
            });
            
        });
});
