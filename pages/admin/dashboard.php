<?php
session_start();
// Memasukkan file koneksi database
require_once '../../resource/db/db_connect.php';

// Check if the user is already logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

// Query to fetch menu data
$sql_menu = "SELECT name, price FROM menu";
$stmt_menu = $dbh->prepare($sql_menu);
$stmt_menu->execute();
$menu_results = $stmt_menu->fetchAll(PDO::FETCH_ASSOC);

// Query to fetch reservations data
$sql_reservations = "SELECT r.reservation_id, c.name, c.phone, r.table_type, r.reservation_date, r.reservation_time, r.prices, r.status
        FROM customers c
        JOIN reservations r ON c.customer_id = r.customer_id";
$stmt = $dbh->prepare($sql_reservations);
$stmt->execute();
$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Query to fetch admins data
$sql_admins = "SELECT username, job FROM admins";
$stmt_admins = $dbh->prepare($sql_admins);
$stmt_admins->execute();
$admins_results = $stmt_admins->fetchAll(PDO::FETCH_ASSOC);
?>

<!doctype html>
<html lang="en">

<head>
    <title>Dashboard Admin - Gazebo Samasta</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Favicon -->
    <link rel="icon" href="../../resource/images/logoaja.png" type="image/x-icon">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <!--Font Awesome-->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" />

    <!-- CSS file -->
    <link href="../../resource/css/admin.css" rel="stylesheet">

    <!-- Script -->
    <script src="../../resource/js/dashboard.js"></script>
    <script src="../../resource/js/db_logout.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg py-2 background-white shadow">
        <div class="container-fluid mx-4">
            <a class="navbar-brand">
                <div class="d-flex align-items-center">
                    <img class="me-2" src="../../resource/images/logoaja.png" alt="samasta" srcset="" width="50px" height="70px">
                    <span class="background-nav text-decoration-none signika-negative font-weight-bold">Admin Gazebo Samasta</span>
                </div>
            </a>
            <div class="d-flex align-items-center">

                <a class="text-reset me-4" href="#">
                    <span class="color-icon">
                        <i class="fa-solid fa-bell fa-xl"></i>
                    </span>
                </a>

                <a class="text-reset me-4" href="#">
                    <span class="color-icon">
                        <i class="fa-solid fa-envelope fa-xl"></i>
                    </span>
                </a>

                <div class="dropdown">
                    <a class="dropdown-toggle d-flex align-items-center hidden-arrow text-decoration-none" href="#" id="navbarDropdownMenuAvatar" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <div class="d-flex align-items-center">
                            <img class="rounded-circle icon" src="../../resource/images/profile.png" alt="profile">
                            <span class="background-nav font-weight-bold ps-2" id="currentUser">Admin</span>
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end drop rounded" aria-labelledby="navbarDropdownMenuAvatar">
                        <li>
                            <a class="dropdown-item list">My profile</a>
                        </li>
                        <li>
                            <a class="dropdown-item list">Settings</a>
                        </li>
                        <li>
                            <a class="dropdown-item list text-danger" id="logout-form">Logout</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row flex-nowrap">
            <div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-light">
                <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">

                    <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" id="menu">

                        <li>
                            <a href="#" class="nav-link px-0 align-middle">
                                <i class="fs-4 bi-speedometer2 color-menu"></i> <span class="ms-1 d-none d-sm-inline color-menu">Dashboard</span> </a>
                        </li>

                        <li>
                            <a href="#masterData" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                                <i class="fs-4 bi-table color-menu"></i> <span class="ms-1 d-none d-sm-inline color-menu">Master Data</span> </a>
                        </li>

                        <li>
                            <a href="#submenu2" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                                <i class="fs-4 bi bi-book color-menu"></i> <span class="ms-1 d-none d-sm-inline color-menu">Buku Menu</span></a>
                            <ul class="collapse nav flex-column ms-1" id="submenu2" data-bs-parent="#menu">
                            </ul>
                        </li>

                        <li>
                            <a href="#listAdmin" data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                                <i class="fs-4 bi-people color-menu"></i> <span class="ms-1 d-none d-sm-inline color-menu">List Admin</span> </a>
                        </li>

                        <li>
                            <a href="#" class="nav-link px-0 align-middle">
                                <i class="fs-4 bi bi-bookmark-check color-menu"></i> <span class="ms-1 d-none d-sm-inline color-menu">Laporan</span> </a>
                        </li>

                    </ul>
                    <hr>
                </div>
            </div>
            <div class="col py-3">
                <h3>Selamat Datang</h3>
                <p class="lead">
                    Dashboard Admin Gazebo Samasta</p>

                <!-- Master Data Section -->
                <div class="collapse" id="masterData">
                    <h3>Master Data</h3>
                    <div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Phone</th>
                                    <th>Tipe Meja</th>
                                    <th>Tgl Reservasi</th>
                                    <th>Waktu Reservasi</th>
                                    <th>Biaya</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($results)) {
                                    // Menampilkan data tiap baris
                                    foreach ($results as $row) {
                                        echo "<tr id='data-reservation' data-toggle='modal' data-target='#reservationModal' data-reservation-id='" . $row['reservation_id'] . "'>
                                                <td>" . $row["name"] . "</td>
                                                <td>" . $row["phone"] . "</td>
                                                <td>" . $row["table_type"] . "</td>
                                                <td>" . $row["reservation_date"] . "</td>
                                                <td>" . $row["reservation_time"] . "</td>
                                                <td>Rp. " . number_format($row["prices"]) . "</td>
                                                <td>" . $row["status"] . "</td>
                                            </tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='7'>Tidak ada data ditemukan</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Buku Menu Section -->
                <div class="collapse" id="submenu2">
                    <h3>Buku Menu</h3>
                    <div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Nama Menu</th>
                                    <th>Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($menu_results as $menu) {
                                    echo "<tr>
                                            <td>" . $menu['name'] . "</td>
                                            <td>Rp. " . number_format($menu['price']) . "</td>
                                        </tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- List Admin Section -->
                <div class="collapse" id="listAdmin">
                    <h3>List Admin</h3>
                    <div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Username</th>
                                    <th>Job</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($admins_results as $admin) {
                                    echo "<tr>
                                            <td>" . $admin['username'] . "</td>
                                            <td>" . $admin['job'] . "</td>
                                        </tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="d-grid gap-2">
                        <button id="createAdminButton" class="btn btn-dark btn-block" disabled>Create Admin Account</button>
                        <button id="deleteAdminButton" class="btn btn-dark btn-block" disabled>Delete Admin Account</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Reservation Modal -->
    <div class="modal fade" id="reservationModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="reservationModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="reservationModalLabel">Reservation Details</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Reservation details will be loaded dynamically here -->
                </div>
                <div class="modal-footer">
                    <div class="container text-center">
                        <div class="row">
                            <div class="col-9">
                                <div class="form-group">
                                    <select id="statusSelect" class="form-control">
                                        <option value="pending">Pending</option>
                                        <option value="confirmed">Confirmed</option>
                                        <option value="cancelled">Cancelled</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-3">
                                <button id="closeButton" type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                                <button id="saveButton" type="button" class="btn btn-primary">Simpan</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Create Admin Modal -->
    <div class="modal fade" id="createAdminModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="createAdminModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="createAdminModalLabel">Create Admin</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="login-form">
                        <div class="my-2">
                            <div class="mb-2">
                                <label for="username">Username</label>
                            </div>
                            <input class="form-control form-control-lg" type="text" name="username" id="username" placeholder="Masukkan Username" required>
                        </div>
                        <div class="mt-3">
                            <div class="mb-2">
                                <label for="password">Password</label>
                            </div>
                            <input class="form-control form-control-lg" type="password" name="password" id="password" placeholder="•••••••••••" required>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <div class="">
                        <button id="closeButton" type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                        <button id="createButton" type="button" class="btn btn-primary">Create</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Delete Admin Modal -->
    <div class="modal fade" id="deleteAdminModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteAdminModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="deleteAdminModalLabel">Delete Admin</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <select id="adminUsernameSelect" class="form-control">
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="">
                        <button id="closeButton" type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                        <button id="deleteButton" type="button" class="btn btn-primary">Hapus</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>