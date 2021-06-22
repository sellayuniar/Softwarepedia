<?php
session_start(); //mengaktifkan session php
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../style.css">  <!-- menyisipkan file css -->
    <link rel="stylesheet" href="../glyphicons.css">  <!-- menyisipkan file glyphicons.css  -->
    <link rel="shortcut icon" href="/image/logo.ico">  <!-- menyisipkan gambar log -->
    <title>Softwarepedia</title>  <!-- judul halaman website -->
</head>

<body>
    <header>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark shadow-sm bg-info">  <!-- membuat navigasi berwarna biru muda-->
            <div class="container">  <!--untuk menampung tampilan booststrap  -->
            	 <!-- logo -->
            	<div class="oswald">  <!-- untuk memanggil font -->
                <a class="navbar-brand" href="/index.php" style="width:20px;height:35px;font-size:30px">  <img src="/image/logo.png"> Softwarepedia  </a>  <!-- untuk membuat nama website dan gambar logo pada bagian navigasi -->
                </div>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">  <!-- membuat button menu jika tampilan layar mengecil -->
                    <span class="navbar-toggler-icon"></span>
                </button>
             
                <div class="collapse navbar-collapse" id="navbarNav">  <!-- untuk menempatkan menu pada navbar  -->
                    <ul class="nav nav-pills nav-fill ms-auto">  <!--  membuat list-->
                        <!-- Cari -->
                        <form class="d-flex" action="proses_cari.php" method="post">  <!-- membuat form dengan method post. ketika disubmit akan mengeksekusi file proses_cari.php -->
                            <input class="form-control me-2" type="text" placeholder="masukan keyword.." name="keyword" autocomplete="off"  style="width:170px;">  <!--membuat input type text  -->
                            <button class="btn btn-outline-light" type="submit" name="cari">Cari</button>  <!-- membuat button dengan nama cari -->
                        </form>
                        <!-- Home -->
                        <li class="nav-item">  <!--membuat list  -->
                        <div class="oswald">  <!-- memanggil font -->
                            <a class="nav-link text-white" aria-current="page" href="/index.php"> <i class="bi bi-house-door-fill"> </i>Home </a>  <!--membuat menu home  -->
                        </div>
                        </li>
                        <!-- Rating -->
                        <li class="nav-item">
                        <div class="oswald">
                            <a class="nav-link text-white" href="../pages/rating.php"> <i class="bi bi-star-fill"></i> Rating</a>  <!-- membuat menu rating -->
                        </div>
                        </li>
                        <!-- Windows PC -->
                        <li class="nav-item">
                        <div class="oswald">
                            <a class="nav-link text-white" href="../pages/windows.php"> <i class="bi bi-laptop-fill"></i> Windows PC</a>  <!--membuat menu windows  -->
                        </div>
                        </li>
                        <!-- Android -->
                        <li class="nav-item">
                        <div class="oswald">
                            <a class="nav-link text-white" href="../pages/android.php"> <i class="bi bi-phone-fill"></i> Andoid</a>  <!-- membuat menu android -->
                        </li>
                        <!-- IOS -->
                        <li class="nav-item">
                        <div class="oswald">
                            <a class="nav-link text-white" href="../pages/ios.php"> <i class="bi bi-phone-fill"></i> IOS</a>  <!--membuat menu ios  -->
                        </div>
                        </li>
                       
                        
                        <?php
                        if (isset($_SESSION['status'])) { //jika pengguna sudah login
                        ?>
                            <li class="nav-item dropdown">  <!--membuat dropdown  -->
                            <div class="oswald">  <!-- memanggil font -->
                                <a class="nav-link text-white dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"> <i class="bi bi-person-circle"></i>   <?php echo ucfirst($_SESSION['username']); ?></a> <!--menampikan username pengguna-->
                                <ul class="dropdown-menu"> <!-- membuat menu dropdown-->
                                    <li><a class="dropdown-item" href="/pages/pengajuan_artikel.php"> <i class="bi bi-file-earmark-fill"></i> Pengajuan Artikel</a></li>  <!-- membuat menu dropdown pengajuan artikel -->
                                    <li><a class="dropdown-item" href="/logout.php"><i class="bi bi-box-arrow-right"></i>Logout</a></li>  <!-- membuat menu dropdown logout -->
                                </ul>
                        </div>
                        </li>

                        <?php
                        } else { //jika tidak
                        ?>
                            <li class="nav-item dropdown">  <!-- membuat dropdown -->
                            <div class="oswald">  <!-- memanggil font -->
                                <a class="nav-link text-white dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false"> <i class="bi bi-person-circle"></i> Login</a>  <!-- menampilkan menu login  -->
                                <ul class="dropdown-menu">  <!-- membuat menu dropdown -->
                                    <li><a class="dropdown-item" href="/admin/login_admin.php"> <i class="bi bi-person-circle"></i> Login Admin</a></li>  <!-- menu dropdown login admin -->
                                    <li><a class="dropdown-item" href="/pengguna/login_pengguna.php"><i class="bi bi-person-circle"></i> Login Pengguna</a></li>  <!-- menu dropdown login pengguna -->
                                    <li><a class="dropdown-item" href="/register.php/"> <i class="bi bi-person-circle"></i> Register</a></li>  <!-- menu dropdown register -->
                                </ul>
                            </div>
                            </li>
                        <?php
                        }
                        ?>

                    </ul>
                     
                </div>
            </div>
        </nav>
    </header>