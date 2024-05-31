<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Modal Example</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .menu-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .menu-item img {
            width: 50px;
            height: 50px;
            object-fit: cover;
            margin-right: 10px;
        }
        .menu-item span {
            flex-grow: 1;
        }
    </style>
</head>
<body>
    <div class="container mt-3">
        <h2>Bootstrap Modal Example</h2>
        <!-- Button to Open the Modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
            Open Modal
        </button>
    </div>

    <!-- The First Modal -->
    <div class="modal fade" id="myModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Quay Restaurant</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="text-center">
                        <img src="https://via.placeholder.com/150" alt="Quay Logo" class="mb-4">
                    </div>
                    <form id="bookingForm">
                        <div class="form-group">
                            <label for="date">Date</label>
                            <input type="date" class="form-control" id="date">
                        </div>
                        <div class="form-group">
                            <label for="guests">Guests</label>
                            <input type="number" class="form-control" id="guests" value="2" min="1">
                        </div>
                        <div class="form-group">
                            <label for="time">Time</label>
                            <input type="time" class="form-control" id="time">
                        </div>
                        <button type="button" class="btn btn-primary btn-block" id="searchButton">Search</button>
                    </form>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <p class="text-muted small">Powered by SEVENROOMS</p>
                </div>
            </div>
        </div>
    </div>

    <!-- The Second Modal -->
    <div class="modal fade" id="timeModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Select a time at Quay Restaurant</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="text-center">
                        <p id="selectedDateTime"></p>
                    </div>
                    <div class="row">
                        <div class="col-6 col-md-4 mb-3">
                            <button type="button" class="btn btn-primary btn-block time-slot">12:15<br>Lunch - six- or eight-course dining</button>
                        </div>
                        <div class="col-6 col-md-4 mb-3">
                            <button type="button" class="btn btn-primary btn-block time-slot">12:15<br>Quay to Lunch - four-course dining</button>
                        </div>
                        <!-- Add more time slots as needed -->
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <p class="text-muted small">Availability at our other venues.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- The Third Modal -->
    <div class="modal fade" id="menuModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Upgrade your reservation</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="text-center">
                        <p id="holdingTime"></p>
                    </div>
                    <div class="menu-additions">
                        <h5>Menu additions</h5>
                        <div class="menu-item mb-3">
                            <img src="resource/images/Nasi putih.jpg" alt="Beluga Caviar">
                            <span>Beluga caviar course</span>
                            <div>
                                <button type="button" class="btn btn-secondary btn-sm minus" data-target="#belugaCount">-</button>
                                <span id="belugaCount">0</span>
                                <button type="button" class="btn btn-secondary btn-sm plus" data-target="#belugaCount">+</button>
                            </div>
                        </div>
                        <!-- Add more menu items as needed -->
                    </div>
                    <div class="dining-options">
                        <h5>Dining Options</h5>
                        <div class="menu-item mb-3">
                            <img src="https://via.placeholder.com/50" alt="BYO">
                            <span>Dust Off Your Bottles with BYO at Quay</span>
                            <div>
                                <button type="button" class="btn btn-secondary btn-sm minus" data-target="#byoCount">-</button>
                                <span id="byoCount">0</span>
                                <button type="button" class="btn btn-secondary btn-sm plus" data-target="#byoCount">+</button>
                            </div>
                        </div>
                        <!-- Add more dining options as needed -->
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <p class="text-muted small">Pre-order Champagne by the glass.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery and Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        $(document).ready(function(){
            $("#searchButton").click(function(){
                // Close the first modal
                $('#myModal').modal('hide');

                // Get the selected date, guests, and time
                var date = $('#date').val();
                var guests = $('#guests').val();
                var time = $('#time').val();

                // Set the selected date and time in the second modal
                $('#selectedDateTime').text(date + ', ' + guests + ' Guests, ' + time);

                // Open the second modal
                $('#timeModal').modal('show');
            });

            $(".time-slot").click(function(){
                // Close the second modal
                $('#timeModal').modal('hide');

                // Get the selected time slot details
                var timeSlotDetails = $(this).text();

                // Set the holding time in the third modal
                $('#holdingTime').text("We're holding this table for: " + timeSlotDetails);

                // Open the third modal
                $('#menuModal').modal('show');
            });

            // Event listener for plus button
            $(".plus").click(function(){
                var target = $(this).data('target');
                var count = $(target).text();
                count = parseInt(count) + 1;
                $(target).text(count);
            });

            // Event listener for minus button
            $(".minus").click(function(){
                var target = $(this).data('target');
                var count = $(target).text();
                count = parseInt(count) - 1;
                if(count < 0) count = 0;
                $(target).text(count);
            });
        });
    </script>
</body>
</html>
