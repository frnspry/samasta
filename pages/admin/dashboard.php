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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        
        <!--Font Awesome-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"/>
        
        <!-- CSS file -->
        <link href="../../resource/css/admin.css" rel="stylesheet">

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
                            <span class="background-nav font-weight-bold ps-2">Admin</span>
                </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end drop rounded" aria-labelledby="navbarDropdownMenuAvatar">
                        <li>
                            <a class="dropdown-item list" href="#">My profile</a>
                        </li>
                        <li>
                            <a class="dropdown-item list" href="#">Settings</a>
                        </li>
                        <li>
                            <a class="dropdown-item list text-danger" href="#">Logout</a>
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
                        <a href="#submenu1"  data-bs-toggle="collapse" class="nav-link px-0 align-middle">
                            <i class="fs-4 bi-table color-menu"></i> <span class="ms-1 d-none d-sm-inline color-menu">Master Data</span></a>
                        <ul class="collapse nav flex-column ms-1" id="submenu1" data-bs-parent="#menu">
                            <li class="w-100">
                                <a href="#" class="nav-link px-0 color-menu"> <span class="d-none d-sm-inline color-menu">Item 1</span></a>
                            </li>
                            <li>
                                <a href="#" class="nav-link px-0 color-menu"> <span class="d-none d-sm-inline color-menu">Item 2</span></a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="#submenu2" data-bs-toggle="collapse" class="nav-link px-0 align-middle ">
                            <i class="fs-4 bi bi-book color-menu"></i> <span class="ms-1 d-none d-sm-inline color-menu">Buku Menu</span></a>
                        <ul class="collapse nav flex-column ms-1" id="submenu2" data-bs-parent="#menu">
                            <li class="w-100">
                                <a href="#" class="nav-link px-0 color-menu"> <span class="d-none d-sm-inline color-menu">Item 1</span></a>
                            </li>
                            <li>
                                <a href="#" class="nav-link px-0 color-menu"> <span class="d-none d-sm-inline color-menu">Item 2</span></a>
                            </li>
                        </ul>
                    </li>
                
                    <li>
                        <a href="#" class="nav-link px-0 align-middle">
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
        </div>
    </div>
</div>

    </body>
</html>