<?php


ob_start();
session_start();
include "inc/dbconnect.php";
include "functions.php"; ?>
<?php

sessionkontrol();  // Oturum Kontrolü



$kullanicisor=$db->prepare("SELECT * FROM kullanicilar WHERE kullanici_mail = :mail");
$kullanicisor->execute(array(
    'mail' => $_SESSION['kullanici_mail']
));

$kullanici=$kullanicisor->fetch(PDO::FETCH_ASSOC);


?>
<?php
$ayarlarsor=$db->prepare("SELECT * FROM ayarlar");
$ayarlarsor->execute(array(0));
$ayarlar=$ayarlarsor->fetch(PDO::FETCH_ASSOC);
?>
<!doctype html>
<html lang="tr">
 
<head>
    <meta charset="UTF-8">
    <meta name="description" content="<?php echo $ayarlar['site_aciklama'] ?>">
    <meta name="keywords" content="<?php echo $ayarlar['site_anahtar_kelimeler'] ?>">
    <meta name="author" content="<?php echo $ayarlar['site_sahip'] ?>">
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="assets/sweetalert2/sweetalert2.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
    <link href="assets/vendor/fonts/circular-std/style.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/libs/css/style.css">
    <link rel="stylesheet" href="assets/vendor/fonts/fontawesome/css/fontawesome-all.css">
    <link rel="stylesheet" href="assets/vendor/charts/chartist-bundle/chartist.css">
    <link rel="stylesheet" href="assets/vendor/charts/morris-bundle/morris.css">
    <link rel="stylesheet" href="assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css">
    <link rel="stylesheet" href="assets/vendor/charts/c3charts/c3.css">
    <link rel="stylesheet" href="assets/vendor/fonts/flag-icon-css/flag-icon.min.css">
    <title><?php echo $ayarlar['site_sahip'] ?> | Yönetim Paneli</title>
</head>

<body>
    <!-- ============================================================== -->
    <!-- main wrapper -->
    <!-- ============================================================== -->
    <div class="dashboard-main-wrapper">
        <!-- ============================================================== -->
        <!-- navbar -->
        <!-- ============================================================== -->
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">

                <a class="navbar-brand" href="index.php"><?php echo $ayarlar['site_sahip']; ?></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">

                        
                        
                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="<?php echo $kullanici['kullanici_resim'] ?>" alt="" class="user-avatar-md rounded-circle"></a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown" aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info">
                                    <h5 class="mb-0 text-white nav-user-name"><?php echo $kullanici['kullanici_isim']; ?></h5>
                                    <!-- <span class="status"></span><span class="ml-2">Available</span> -->
                                </div>
                                <a class="dropdown-item" href="profil.php"><i class="fas fa-user mr-2"></i>Profil</a>
                                <a class="dropdown-item" href="ayarlar.php"><i class="fas fa-cog mr-2"></i>Ayarlar</a>
                                <a class="dropdown-item" href="cikis.php"><i class="fas fa-power-off mr-2"></i>Çıkış Yap</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- ============================================================== -->
        <!-- end navbar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- left sidebar -->
        <!-- ============================================================== -->
        <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                SİTE GÖRÜNÜMÜ
                            </li>
                            
                            
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-1" aria-controls="submenu-1"><i class="fas fa-fw fa-bars"></i>Menü</a>
                                <div id="submenu-1" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="menu-ekle.php">Ürün Ekle</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="menu.php">Tüm Ürünler</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false" data-target="#submenu-2" aria-controls="submenu-2"><i class="fas fa-fw fa-bars"></i>Kategori</a>
                                <div id="submenu-2" class="collapse submenu" style="">
                                    <ul class="nav flex-column">
                                        <li class="nav-item">
                                            <a class="nav-link" href="kat-ekle.php">Kategori Ekle</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="kategori.php">Tüm Kategoriler</a>
                                        </li>
                                    </ul>
                                </div>
                            </li>

                                                     



                            <li class="nav-divider">
                                GENEL
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="ayarlar.php" aria-expanded="false"><i class="fas fa-fw fa-cog"></i>Ayarlar</a>
                            </li>




                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end left sidebar -->
        <!-- ============================================================== -->