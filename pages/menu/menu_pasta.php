<!doctype html>
<html lang="en">

<head>
    <title>Menu - Gazebo Samasta</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Favicon -->
    <link rel="icon" href="../../resource/images/logoaja.png" type="image/x-icon">

    <!-- Font Awesome Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- CSS file -->
    <link href="../../resource/css/style.css" rel="stylesheet">
    <!-- JS file -->
    <script src="../../resource/js/script.js"></script>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>

</head>

<body>
    <header>
        <nav class="navbar navbar-dark bg-dark" id="nav">
            <div class="container-fluid">
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">

                    <span class="navbar-toggler-icon"></span>
                </button>
                <a class="navbar-brand" href="../../index.php">
                    <img src="../../resource/images/logoaja.png" alt="Logo" width="30" height="30" class="d-inline-block align-text-top">
                    Samasta
                </a>
                <a class="btn btn-outline-light" data-bs-toggle="modal" data-bs-target="#myModal">Buat Reservasi</a>
            </div>
        </nav>
        <div id="modalContainer"></div>

        <div class="offcanvas offcanvas-start bg-light text-dark" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
            <div class="offcanvas-header">
                <button type="button" class="btn-close btn-close-dark" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item">
                        <a class="nav-link" href="../../index.php">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="menu_paket.php">Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="" data-bs-toggle="modal" data-bs-target="#myModal">Reservasi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../event/event.php">Acara</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../event/event.php#wedding">Pernikahan</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>

    <!--container-fluid-2-->
    <div class="container-fluid-2">
        <div class="left-side-1">
            <div class="container-fluid-2-content">
                <h2>MENU</h2>
                <p>Nikmati berbagai macam menu makanan dan minuman menarik di Gazebo Samasta!</p>
                <div class="read-more">
                    <a class="btn btn-outline-dark" href="#menu-links">Lihat Menu</a>
                </div>
            </div>
        </div>
        <div class="right-side-1">
        </div>
    </div>

    <div class="menu-links" id="menu-links">
        <a href="menu_paket.php#menu-links">MENU PAKET</a>
        <a href="menu_nasi.php#menu-links">MENU NASI</a>
        <a href="menu_pasta.php#menu-links">MENU PASTA</a>
        <a href="menu_meat.php#menu-links">MENU MEAT</a>
        <a href="menu_snack.php#menu-links">MENU SNACK</a>
        <a href="menu_minuman.php#menu-links">MENU MINUMAN</a>
    </div>

    <div class="container menu-section">
        <h1>MENU PASTA</h1>
        <div class="menu-item">
            <img src="../../resource/images/Pasta carbonara.jpg" alt="Pasta Carbonara">
            <h2>Pasta Carbonara</h2>
            <p>Hidangan Italia klasik yang creamy, pasta dilumuri dengan saus carbonara dan taburan lada hitam.</p>
            <h5>Rp.38.000</h5>
        </div>
        <div class="menu-item">
            <img src="../../resource/images/Pasta oglioolio.jpg" alt="Pasta Aglio e Olio">
            <h2>Pasta Aglio e Olio</h2>
            <p>Hidangan pasta italia yang dilumuri dengan saus otentik dan ditaburi dengan peterseli segar.</p>
            <h5>Rp.38.000</h5>
        </div>
        <div class="menu-item">
            <img src="../../resource/images/Mushroom oglioolio pasta.jpg" alt="Pasta Mushroom Aglio e Olio">
            <h2>Pasta Mushroom Aglio e Olio</h2>
            <p>Pasta italia yang dilumuri dengan saus otentik dan dicampur dengan jamur tumis yang gurih.</p>
            <h5>Rp.38.000</h5>
        </div>
    </div>

    <!--container-fluid-4-->
    <div class="container-fluid-4">
        <div class="row">
            <div class="col-md-6 left-side-3">
                <h2>TERUS PANTAU HAL TERBARU DI GAZEBO SAMASTA</h2>
                <p>Ikuti terus berita terkini dan update dari Gazebo Samasta.</p>
            </div>
            <div class="col-md-6 right-side-3">
                <form action="blablabla.php" method="POST">
                    <div class="row">
                        <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="Nama Depan*" required>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="Nama Belakang*" required>
                        </div>
                    </div>
                    <input type="email" class="form-control" placeholder="Email*" required>
                    <div class="form-group">
                        <label for="birthday">Hari Ulang Tahun*</label>
                        <input type="date" id="birthday" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="anniversary">Tanggal Anniversary</label>
                        <input type="date" id="anniversary" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-outline-dark">Sign Up</button>
                </form>
            </div>
        </div>
    </div>

    <!--container-fluid-5-->
    <div class="container-fluid-5">
        <div class="row">
            <div class="col-md-4 left-side-4">
                <h2>MEDIA SOSIAL</h2>
                <div class="social-icons">
                    <a href="#"><img src="../../resource/images/instagram.png" alt="Instagram"></a>
                    <a href="#"><img src="../../resource/images/twitter.png" alt="Twitter"></a>
                    <a href="#"><img src="../../resource/images/facebook.png" alt="Facebook"></a>
                </div>
                <h2>LOKASI</h2>
                <p>JI. Perintis kemerdekaan Baru KM.09, Kota Makassar, Sulawesi Selatan.</p>
                <h2>JAM OPERASIONAL</h2>
                <p>16:00 to 22:00 WITA</p>
            </div>
            <div class="col-md-4 middle-side-4">
                <h2>RESERVASI</h2>
                <a class="btn btn-outline-dark" href="#">Buat Reservasi</a>
                <div class="phone-number">
                    <img src="../../resource/images/phone.png" alt="Phone" class="phone-icon"> 021 9291828
                </div>
            </div>
            <div class="col-md-4 right-side-4">
                <img src="../../resource/images/logonobgblack.png" alt="Logo Samasta">
            </div>
        </div>
    </div>

    </main>

    <footer class="footer">
        <div class="container">
            <p class="text-center mb-0">Gazebo Samasta 2024. All Right Reserved.</p>
        </div>
    </footer>

    <!-- Tombol Top Down -->
    <a href="#" class="btn btn-dark btn-floating" id="btnTop"><i class="fas fa-arrow-up"></i></a>

    <!-- Membutuhkan script jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Bootstrap JavaScript Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>