
<!-- The First Modal -->
<div class="modal fade" id="myModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Quay Restaurant</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div class="text-center">
                    <img src="https://via.placeholder.com/150" alt="Quay Logo" class="mb-4">
                </div>
                <form id="bookingForm">
                    <div class="form-group">
                        <label for="date">Date</label>
                        <input type="date" class="form-control" id="date" min="<?php echo date('Y-m-d'); ?>">
                    </div>
                    <div class="form-group">
                        <label for="guests">Jumlah Tamu</label>
                        <select class="form-control" id="guests">
                            <option value="1-4">1-4 Orang</option>
                            <option value="5-8">5-8 Orang</option>
                            <option value="8+">8+ Orang</option>
                        </select>
                    </div>
                    <div class="form-group" id="tableType">
                        <label for="table">Jenis Meja</label>
                        <select class="form-control" id="table">
                            <option value="Meja A">Meja A</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="time">Time</label>
                        <input type="time" class="form-control" id="time" min="16:00" max="20:00">
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
<div class="modal fade" id="timeModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Select a time at Quay Restaurant</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
