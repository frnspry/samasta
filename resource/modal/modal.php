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
<?php include '../db/db_connect.php'; ?>
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
                        "Nasi Ayam Goreng Rempah" => "resource/images/nasi ayam goreng rempah.jpg",
                        "Nasi Bebek Palekko" => "resource/images/nasi_bebek_palekko.jpg",
                        "Nasi Bebek Sinjay Madura" => "resource/images/Nasi bebek sinjay.jpg",
                        "Nasi Putih" => "resource/images/nasi putih.jpg",
                        "Nasi Putih Satu Bakul" => "resource/images/nasi putih satu bakul.jpg",
                        "Nasi Goreng Kampung" => "resource/images/nasi goreng kampung.jpg",
                        "Pasta Carbonara" => "resource/images/pasta carbonara.jpg",
                        "Pasta Aglio e Olio" => "resource/images/Pasta oglioolio.jpg",
                        "Pasta Mushroom Aglio e Olio" => "resource/images/Mushroom oglioolio pasta.jpg",
                        "Grilled Chicken Skewer" => "resource/images/Grilled chicken skeweer.jpg",
                        "Wagyu Saikoro Skewer" => "resource/images/Wagyo saikoro skeweer.jpg",
                        "Pisang Goreng Keju" => "resource/images/Pisang goreng keju.jpg",
                        "French Fries" => "resource/images/French fries.jpg",
                        "Beef Burger" => "resource/images/Beef burger.jpg",
                        "Chicken Burger" => "resource/images/Chicken burger.jpg",
                        "Special Lychee" => "resource/images/Special Lechy.jpg",
                        "Fantastic Mango" => "resource/images/Fantastic Mango.jpg",
                        "Cappuccino Ice" => "resource/images/Ice Capuccino.jpg",
                        "Thai Tea Ice" => "resource/images/Ice Thai tea.jpg",
                        "Chocolate Ice" => "resource/images/Ice Chocolate.jpg"
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

                            // Loop through each category and display its items
                            foreach ($categories as $category => $items) {
                                echo '<h5>' . $category . '</h5>';
                                foreach ($items as $item) {
                                    if (isset($fetchedItems[$item])) {
                                        $imagePath = isset($menuItems[$item]) ? $menuItems[$item] : 'default.jpg';
                                        echo '<div class="menu-item-container">';
                                        echo '<div class="row">';
                                        echo '<div class="col-md-2">';
                                        echo '<img src="' . $imagePath . '" alt="' . $fetchedItems[$item]['name'] . '" class="img-fluid menu-item-image">';
                                        echo '</div>';
                                        echo '<div class="col-md-6">';
                                        echo '<h6>' . $fetchedItems[$item]['name'] . '</h6>';
                                        echo '<p>Rp.' . $fetchedItems[$item]['price'] . '</p>';
                                        echo '</div>';
                                        echo '<div class="col-md-4 text-end">';
                                        echo '<button class="btn btn-outline-secondary minus-btn">−</button>';
                                        echo '<span class="quantity">0</span>';
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
            </div>
            <!-- Modal footer -->
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-dark" id="saveMenuButton">Save</button>
            </div>
        </div>
    </div>
</div>




