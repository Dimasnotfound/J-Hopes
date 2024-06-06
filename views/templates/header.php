<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman
        <?= $data['judul']; ?>
    </title>
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/bootstrap.css">
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/<?= $data['css']; ?>.css">
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- lightgallery css cdn link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery-js/1.4.0/css/lightgallery.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" charset="utf-8"></script>

    <link rel="stylesheet" href="<?= BASEURL; ?>/css/<?= $data['css']; ?>.css">
    <link rel="stylesheet" href="<?= BASEURL; ?>/css/header.css">



</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand me-auto" href="<?= BASEURL; ?>"><img
                    src="<?= BASEURL; ?>/img/client/Beranda/logo.png" alt="Logo"></a>
            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
                aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel"><img
                            src="<?= BASEURL; ?>/img/client/Beranda/logo.png" alt="Logo"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-center flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" aria-current="page" href="<?= BASEURL; ?>/?controller=Home"
                                style="font-size:1.5rem; font-weight: 600;">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" href="<?= BASEURL; ?>?controller=About"
                                style="font-size:1.5rem; font-weight: 600;">Tentang Kami</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" href="<?= BASEURL; ?>?controller=Cari"
                                style="font-size:1.5rem; font-weight: 600;">Cari Panti</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" href="<?= BASEURL; ?>?controller=Kabar"
                                style="font-size:1.5rem; font-weight: 600;">Kabar Panti</a>
                        </li>
                        <?php
                        if (session_status() == PHP_SESSION_NONE) {
                            session_start();
                        }?>

                        <?php if (isset($_SESSION['user_name'])): ?>
                        <?php if (isset($_SESSION['user_status']) && $_SESSION['user_status'] === 'admin'): ?>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" href="<?= BASEURL; ?>?controller=Profile"
                                style="font-size: 1.5rem; font-weight: 600;">Admin Profile</a>
                        </li>
                        <?php else: ?>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" href="<?= BASEURL; ?>?controller=Profile"
                                style="font-size: 1.5rem; font-weight: 600;">ProfileUser</a>
                        </li>
                        <?php endif; ?>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
            <?php
            if (session_status() == PHP_SESSION_NONE) {
                session_start();
            }?>

            <!-- Jika sudah login, tampilkan nama pengguna -->
            <?php if (isset($_SESSION['user_name'])): ?>
            <a href="#" class="login-button" onclick="confirmLogout()">Logout</a>
            <?php else: ?>
            <!-- Tampilkan tombol login jika belum login -->
            <a href="<?= BASEURL; ?>?controller=SignIn" class="login-button">Login</a>
            <?php endif; ?>

            <!-- <a href="?controller=Signin" class="login-button">Login</a> -->
            <button class="navbar-toggler pe-0" type="button" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>