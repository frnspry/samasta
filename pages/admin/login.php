<?php
session_start();
// Memasukkan file koneksi database
require_once '../../resource/db/db_connect.php';

// Check if the user is already logged in
if(isset($_SESSION['username'])){
    header("Location: dashboard.php");
    exit;
}
?>

<!doctype html>
<html lang="en">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- CSS file -->
    <link href="../../resource/css/admin.css" rel="stylesheet">

    <!-- Script -->
    <script src="../../resource/js/db_login.js"></script>

</head>

<body>
    <div class="background-login p-5">
        <div class="container my-4 blur shadow">
            <div class="row">
                <div class="col-md-6 right-content shadow">
                </div>
                <div class="col-12 col-md-6 p-5">
                    <div class="pb-3 pt-4">
                        <h1 class="h1-login">Admin Gazebo Samasta</h1>
                    </div>
                    <div class="py-2 px-2">
                        <h3 class="h3-login">Login</h3>
                    </div>
                    <div class="px-2 pt-3">
                        <form id="login-form">
                            <div class="my-2">
                                <div class="mb-2">
                                    <label for="username">Username</label>
                                </div>
                                <input class="form-control form-control-lg" type="text" name="username" id="username"
                                    placeholder="Masukkan Username" required>
                            </div>
                            <div class="mt-3">
                                <div class="mb-2">
                                    <label for="password">Password</label>
                                </div>
                                <input class="form-control form-control-lg" type="password" name="password"
                                    id="password" placeholder="•••••••••••" required>
                            </div>
                            <div class="mt-5 text-center pb-4">
                                <input class="btn btn-dark py-2 w-75" type="submit" value="Login" name="login">
                                <div class="pt-3">
                                    <a class="text-muted text-decoration-none" href="#!">Lupa password?</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>