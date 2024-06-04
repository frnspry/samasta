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
<div class="modal fade" id="menuModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Select Your Menu</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <!-- Menu Section -->
                <div class="menu-modal">
                <h5>MENU PAKET</h5>
                    <div class="menu-item-container">
                        <div class="row">
                            <div class="col-md-2">
                                <img src="../../../samasta/resource/images/Nasi ayam goreng rempah.jpg" alt="Nasi Ayam Goreng Rempah" class="img-fluid menu-item-image">
                            </div>
                            <div class="col-md-6">
                                <h6>Nasi Ayam Goreng Rempah</h6>
                                <p>Rp.28.000</p>
                            </div>
                            <div class="col-md-4 text-end">
                                <button class="btn btn-outline-secondary minus-btn">−</button>
                                <span class="quantity">0</span>
                                <button class="btn btn-outline-secondary plus-btn">+</button>
                            </div>
                        </div>
                    </div>
                    <div class="menu-item-container">
                        <div class="row">
                            <div class="col-md-2">
                                <img src="../../../samasta/resource/images/Nasi_bebek_palekko.jpg" alt="Nasi Bebek Palekko" class="img-fluid menu-item-image">
                            </div>
                            <div class="col-md-6">
                                <h6>Nasi Bebek Palekko</h6>
                                <p>Rp.38.000</p>
                            </div>
                            <div class="col-md-4 text-end">
                                <button class="btn btn-outline-secondary minus-btn">−</button>
                                <span class="quantity">0</span>
                                <button class="btn btn-outline-secondary plus-btn">+</button>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <p class="text-muted small">Availability at our other venues.</p>
            </div>
        </div>
    </div>
</div>
