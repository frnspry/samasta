<!-- The First Modal -->
<div class="modal fade" id="myModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Gazebo Samasta</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div class="logo text-center" style="width: 100%;">
                    <img id="logoOnIndex" src="https://i.ibb.co.com/Q9L6N7P/logonobgblack.png" alt="Quay Logo" class="mb-4" style="max-width: 100%; height: auto;">
                </div>
                <form class="bookingForm" id="bookingForm">
                    <div class="form-group">
                        <label for="date">Tanggal</label>
                        <input type="date" class="form-control" id="date" min="<?php echo date('Y-m-d'); ?>">
                    </div>
                    <div class="form-group">
                        <label for="guests">Jumlah Tamu</label>
                        <select class="form-control" id="guests">
                            <option value="1-4 Orang">1-4 Orang</option>
                            <option value="5-8 Orang">5-8 Orang</option>
                            <option value="8+ Orang">8+ Orang</option>
                        </select>
                    </div>
                    <div class="form-group" id="tableType">
                        <label for="table">Jenis Meja</label>
                        <select class="form-control" id="table">
                            <option value="A">A</option>

                        </select>
                    </div>
                    <div class="form-group">
                        <label for="time">Time</label>
                        <input type="time" class="form-control" id="time" min="16:00" max="20:00">
                    </div>
                </form>
                <div class="d-grid">
                    <button type="button" class="btn btn-dark btn-block" id="searchButton" disabled>Search</button>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <p class="text-muted small">Powered by SEAL</p>
            </div>
        </div>
    </div>
</div>

<!-- The Second Modal -->
<?php include '../db/db_connect.php'; ?>
<div class="modal fade" id="menuModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="btn btn-back" aria-label="Back" data-bs-target="#myModal" data-bs-toggle="modal">
                    <i class="fa-solid fa-chevron-left"></i>
                </button>
                <h4 class="modal-title">Select Your Menu</h4>
                <button type="button" class="btn btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <!-- Menu Section -->
                <div class="menu-modal">
                    <?php
                    // Define the categories and their respective items
                    $categories = [
                        "MENU PAKET" => ["Nasi Ayam Goreng Rempah", "Nasi Bebek Palekko", "Nasi Bebek Sinjay Madura"],
                        "MENU NASI" => ["Nasi Putih", "Nasi Putih Satu Bakul", "Nasi Goreng Kampung"],
                        "MENU PASTA" => ["Pasta Carbonara", "Pasta Aglio e Olio", "Pasta Mushroom Aglio e Olio"],
                        "MENU MEAT" => ["Grilled Chicken Skewer", "Wagyu Saikoro Skewer"],
                        "MENU SNACK" => ["Pisang Goreng Keju", "French Fries", "Beef Burger", "Chicken Burger"],
                        "MENU MINUMAN" => ["Special Lychee", "Fantastic Mango", "Cappuccino Ice", "Thai Tea Ice", "Chocolate Ice"]
                    ];

                    // Define the images
                    $menuItems = [
                        "Nasi Ayam Goreng Rempah" => ["resource/images/Nasi ayam goreng rempah.jpg", "../../resource/images/Nasi ayam goreng rempah.jpg"],
                        "Nasi Bebek Palekko" => ["resource/images/Nasi_bebek_palekko.jpg", "../../resource/images/Nasi_bebek_palekko.jpg"],
                        "Nasi Bebek Sinjay Madura" => ["resource/images/Nasi bebek sinjay.jpg", "../../resource/images/Nasi bebek sinjay.jpg"],
                        "Nasi Putih" => ["resource/images/Nasi putih.jpg", "../../resource/images/Nasi putih.jpg"],
                        "Nasi Putih Satu Bakul" => ["resource/images/Nasi putih satu bakul.jpg", "../../resource/images/Nasi putih satu bakul.jpg"],
                        "Nasi Goreng Kampung" => ["resource/images/Nasi goreng kampung.jpg", "../../resource/images/Nasi goreng kampung.jpg"],
                        "Pasta Carbonara" => ["resource/images/Pasta carbonara.jpg", "../../resource/images/Pasta carbonara.jpg"],
                        "Pasta Aglio e Olio" => ["resource/images/Pasta oglioolio.jpg", "../../resource/images/Pasta oglioolio.jpg"],
                        "Pasta Mushroom Aglio e Olio" => ["resource/images/Mushroom oglioolio pasta.jpg", "../../resource/images/Mushroom oglioolio pasta.jpg"],
                        "Grilled Chicken Skewer" => ["resource/images/Grilled chicken skeweer.jpg", "../../resource/images/Grilled chicken skeweer.jpg"],
                        "Wagyu Saikoro Skewer" => ["resource/images/Wagyo saikoro skeweer.jpg", "../../resource/images/Wagyo saikoro skeweer.jpg"],
                        "Pisang Goreng Keju" => ["resource/images/Pisang goreng keju.jpg", "../../resource/images/Pisang goreng keju.jpg"],
                        "French Fries" => ["resource/images/French fries.jpg", "../../resource/images/French fries.jpg"],
                        "Beef Burger" => ["resource/images/Beef burger.jpg", "../../resource/images/Beef burger.jpg"],
                        "Chicken Burger" => ["resource/images/Chicken burger.jpg", "../../resource/images/Chicken burger.jpg"],
                        "Special Lychee" => ["resource/images/Special Lechy.jpg", "../../resource/images/Special Lechy.jpg"],
                        "Fantastic Mango" => ["resource/images/Fantastic Mango.jpg", "../../resource/images/Fantastic Mango.jpg"],
                        "Cappuccino Ice" => ["resource/images/Ice Capuccino.jpg", "../../resource/images/Ice Capuccino.jpg"],
                        "Thai Tea Ice" => ["resource/images/Ice Thai tea.jpg", "../..//resource/images/Ice Thai tea.jpg"],
                        "Chocolate Ice" => ["resource/images/Ice Chocolate.jpg", "../../resource/images/Ice Chocolate.jpg"]
                    ];

                    try {
                        // Fetch the menu items from the database
                        $stmt = $dbh->query("SELECT name, price FROM menu");

                        if ($stmt->rowCount() > 0) {
                            // Store fetched menu items in an associative array
                            $fetchedItems = [];
                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                $fetchedItems[$row['name']] = $row;
                            }

                            // Determine which image path to use based on whether the current page is index.php
                            $input = json_decode(file_get_contents('php://input'), true);
                            $currentPHPFile = $input['namaFilePHP'];
                            $imageIndex = $currentPHPFile === 'index.php' ? 0 : 1;

                            // Loop through each category and display its items
                            foreach ($categories as $category => $items) {
                                echo '<h5 class="category">' . $category . '</h5>';
                                foreach ($items as $item) {
                                    if (isset($fetchedItems[$item])) {
                                        $imagePath = isset($menuItems[$item]) ? $menuItems[$item][$imageIndex] : 'default.jpg';
                                        echo '<div class="menu-item-container">';
                                        echo '<div class="row">';
                                        echo '<div class="col-md-2">';
                                        echo '<img src="' . $imagePath . '" alt="' . $fetchedItems[$item]['name'] . '" class="img-fluid menu-item-image">';
                                        echo '</div>';
                                        echo '<div class="col-md-6">';
                                        echo '<h6>' . $fetchedItems[$item]['name'] . '</h6>';
                                        echo '<p>Rp.' . number_format($fetchedItems[$item]['price']) . '</p>';
                                        echo '</div>';
                                        echo '<div class="col-md-4 text-end">';
                                        echo '<button class="btn btn-outline-secondary minus-btn">−</button>';
                                        echo '<span class="quantity" data-quantity="0">0</span>';
                                        echo '<button class="btn btn-outline-secondary plus-btn">+</button>';
                                        echo '</div>';
                                        echo '</div>';
                                        echo '</div>';
                                    }
                                }
                            }
                        } else {
                            echo "0 results";
                        }
                    } catch (PDOException $e) {
                        echo "Query failed: " . $e->getMessage();
                    }
                    ?>
                </div>
                <div class="d-grid gap-2">
                    <p class="total-price">Rp.0</p>
                    <button type="button" class="btn btn-dark btn-block" id="lanjutButton" disabled>Lanjut</button>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <p class="text-muted small">Powered by SEAL</p>
            </div>
        </div>
    </div>
</div>

<!-- Third Modal -->
<div class="modal fade" id="paymentModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="btn btn-back" aria-label="Back" data-bs-target="#menuModal" data-bs-toggle="modal">
                    <i class="fa-solid fa-chevron-left"></i>
                </button>
                <h4 class="modal-title">Pembayaran</h4>
                <button type="button" class="btn btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <h4 class="text-center fw-bold">Informasi Diri</h4>
                <form id="paymentForm">
                    <div class="my-2">
                        <div class="mb-2">
                            <label for="name">Nama</label>
                        </div>
                        <input class="form-control form-control-lg" type="text" name="name" id="name" placeholder="Masukkan Nama Anda" required>
                    </div>
                    <div class="my-2">
                        <div class="mb-2">
                            <label for="email">Email</label>
                        </div>
                        <input class="form-control form-control-lg" type="text" name="email" id="email" placeholder="Masukkan Email Anda" required>
                    </div>
                    <div class="my-2">
                        <div class="mb-2">
                            <label for="phone">Nomor HP</label>
                        </div>
                        <input class="form-control form-control-lg" type="text" name="phone" id="phone" placeholder="Masukkan Nomor HP Anda" maxlength="13" required>
                    </div>
                    <div class="my-2">
                        <div class="mb-2">
                            <label for="no_rekening">Nomor Rekening</label>
                        </div>
                        <input class="form-control form-control-lg" type="text" name="no_rekening" id="no_rekening" placeholder="Masukkan No Rekening Anda" maxlength="16" required>
                    </div>
                </form>
                <h4 class="text-center fw-bold">Summary</h4>
                <h5>Tanggal</h5>
                <p id="reservationDate">date</p>
                <h5>Waktu</h5>
                <p id="reservationTime">time</p>
                <h5>Jumlah Tamu</h5>
                <p id="reservationGuests">guest</p>
                <h5>Jenis Meja</h5>
                <p id="reservationTable">table</p>
                <h5>Pesanan</h5>
                <div id="reservationOrders" class="order-list"></div>
                <h5>Total Harga</h5>
                <p id="reservationPrices">prices</p>
                <div class="d-grid">
                    <button type="button" class="btn btn-dark btn-block" id="selesaiButton" disabled>Selesai</button>
                </div>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <p class="text-muted small">Powered by SEAL</p>
            </div>
        </div>
    </div>
</div>

<!-- Four Modal -->
<div class="modal fade" id="successModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title">Success</h4>
            </div>
            <!-- Modal body -->
            <div class="modal-body">
                <div class="modal-print">
                    <div class="text-center">
                        <i class="fas fa-check-circle fa-5x text-success"></i>
                        <h1 class="mt-3"> Pembayaran Berhasil </h1>
                    </div>
                    <div class="container-fluid">
                        <div class="row mt-4">
                            <div class="col-md-6">
                                <h5>Invoice</h5>
                                <p id="successInvoice">invoice</p>
                                <h5>Nama</h5>
                                <p id="successName">nama</p>
                                <h5>Email</h5>
                                <p id="successEmail">email</p>
                                <h5>Nomor HP</h5>
                                <p id="successPhone">nomor hp</p>
                            </div>
                            <div class="col-md-6">
                                <h5><i class="fa-regular fa-calendar"></i> Tanggal</h5>
                                <p id="successReservationDate">date</p>
                                <h5><i class="far fa-clock"></i> Waktu</h5>
                                <p id="successReservationTime">time</p>
                                <h5><i class="fas fa-user"></i> Jumlah Tamu</h5>
                                <p id="successReservationGuests">guest</p>
                                <h5><i class="fas fa-chair"></i> Jenis Meja</h5>
                                <p id="successReservationTable">table</p>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-12">
                                <h5><i class="fas fa-hamburger"></i> List Pesanan</h5>
                                <div id="successOrderList"></div>
                                <h5><i class="fas fa-money-bill"></i> Total Harga</h5>
                                <p id="successReservationPrices">prices</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-grid gap-2">
                    <button id="downloadPDFButton" type="button" class="btn btn-primary">Download as PDF</button>
                    <button type="button" class="btn btn-dark btn-block" id="homeButton">Home</button>
                </div>
                <!-- hide no_rekening value -->
                <p id="successRekening" style="display: none;"></p>
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <p class="text-muted small">Powered by SEAL</p>
            </div>
        </div>
    </div>
</div>