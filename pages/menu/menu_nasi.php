<!doctype html>
<html lang="en">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
            crossorigin="anonymous"
        >
        
        <!-- CSS file -->
        <link href="../../resource/css/style.css" rel="stylesheet">
        
    </head>

    <body>
        <header>
            <nav class="navbar navbar-dark bg-dark" id="nav">
                    <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">

                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <a class="navbar-brand" href="#">
                            <img src="../../resource/images/logoaja.png" alt="Logo" width="30" height="30" class="d-inline-block align-text-top">
                            Samasta
                        </a>
                        <a class="btn btn-outline-light" href="#">Make Reservation</a>
                    </div>
            </nav>

            <div class="offcanvas offcanvas-start bg-light text-dark" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <button type="button" class="btn-close btn-close-dark" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Menu</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Reservations</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Events</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Weddings</a>
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
                        <a class="btn btn-outline-dark" href="#">View Menu</a>
                    </div>
                </div>
            </div>
            <div class="right-side-1">
            </div>
        </div>

        <div class="menu-links">
            <a href="#paket">MENU PAKET</a>
            <a href="#nasi">MENU NASI</a>
            <a href="#pasta">MENU PASTA</a>
            <a href="#meat">MENU MEAT</a>
            <a href="#snack">MENU SNACK</a>
            <a href="#minuman">MENU MINUMAN</a>
        </div>

        <div class="container menu-section">
            <h1>MENU NASI</h1>
            <div class="menu-item">
                <img src="../../resource/images/Nasi putih.jpg" alt="Nasi Putih">
                <h2>Nasi Putih</h2>
                <p>Nasi putih yang dimasak dengan sempurna, menghasilkan tekstur pulen dan harum. Cocok sebagai pendamping berbagai hidangan utama.</p>
                <h5>Rp.8.000</h5>
            </div>
            <div class="menu-item">
                <img src="../../resource/images/Nasi putih satu bakul.jpg" alt="Nasi Putih Satu Bakul">
                <h2>Nasi Putih Satu Bakul</h2>
                <p>Satu bakul nasi putih yang pulen, mencukupi untuk dinikmati bersama hidangan utama dengan keluarga atau teman-teman.</p>
                <h5>Rp.25.000</h5>
            </div>
            <div class="menu-item">
                <img src="../../resource/images/Nasi goreng kampung.jpg" alt="Nasi Goreng Kampung">
                <h2>Nasi Goreng Kampung</h2>
                <p>Hidangan klasik yang memikat dengan cita rasa yang autentik dan disajikan dengan hidangan pelengkap lainnya.</p>
                <h5>Rp.35.000</h5>
            </div>
        </div>

        <!--container-fluid-4-->
        <div class="container-fluid-4">
            <div class="row">
                <div class="col-md-6 left-side-3">
                    <h2>KEEP UP TO DATE WITH GAZEBO SAMASTA</h2>
                    <p>Stay informed with the latest news and updates from Gazebo Samasta.</p>
                </div>
                <div class="col-md-6 right-side-3">
                    <form action="blablabla.php" method="POST">
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="First Name*" required>
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="Last Name*" required>
                            </div>
                        </div>
                        <input type="email" class="form-control" placeholder="Email*" required>
                        <div class="form-group">
                            <label for="birthday">Birthday*</label>
                            <input type="date" id="birthday" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="anniversary">Anniversary Date</label>
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
                    <h2>SOCIAL</h2>
                    <div class="social-icons">
                        <a href="#"><img src="../../resource/images/instagram.png" alt="Instagram"></a>
                        <a href="#"><img src="../../resource/images/twitter.png" alt="Twitter"></a>
                        <a href="#"><img src="../../resource/images/facebook.png" alt="Facebook"></a>
                    </div>
                    <h2>LOCATION</h2>
                    <p>JI. Perintis kemerdekaan Baru KM.09, Kota Makassar, Sulawesi Selatan.</p>
                    <h2>OPENING HOURS</h2>
                    <p>16:00 to 22:00 WITA</p>
                </div>
                <div class="col-md-4 middle-side-4">
                    <h2>RESERVATIONS</h2>
                    <a class="btn btn-outline-dark" href="#">Make Reservation</a>
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

        <!-- Bootstrap JavaScript Libraries -->
        <script
                src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
                integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
                crossorigin="anonymous"
            ></script>

            <script
                src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
                crossorigin="anonymous">
            </script>
    </body>
</html>

