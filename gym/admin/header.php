<?php
session_start();

if (!isset($_SESSION['kullanici'])) {
    die('Giriş Yetkiniz Yoktur.');
}

require_once('baglan.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Css Files -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <!-- CKEditor 4 CDN -->
    <script src="https://cdn.ckeditor.com/4.20.1/full/ckeditor.js"></script>
    <title>Document</title>
</head>

<body>
    <!-- Header Section Start -->
    <section id="adminMenu">
        <div class="container-fluid">
            <div class="row" style="height:100vh;">
                <div class="col-md-2" style="background-image: url(../img/arkaplan-dolgu-1500x844.webp);">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><b>Admin Paneli</b></li>
                        <li class="list-group-item"><a href="dashboard.php" style="color: #393939;">Dashboard</a></li>
                        <li class="list-group-item"><a href="kategoriler.php" style="color: #393939;">Kategoriler</a></li>
                        <li class="list-group-item"><a href="sayfalar.php" style="color: #393939;">Sayfalar</a></li>
                        <li class="list-group-item"><a href="yazilar.php" style="color: #393939;">Yazılar</a></li>
                        <li class="list-group-item"><a href="hizmetler.php" style="color: #393939;">Hizmetler</a></li>
                        <li class="list-group-item"><a href="kulubumuz.php" style="color: #393939;">Kulübümüz</a></li>
                        <li class="list-group-item"><a href="paketler.php" style="color: #393939;">Paketler</a></li>
                        <li class="list-group-item"><a href="ayarlar.php" style="color: #393939;">Ayarlar</a></li>
                        <li class="list-group-item"><a href="logout.php" style="color: #393939;">Güvenli Çıkış</a></li>
                    </ul>
                </div>
                <div class="col-md-10">


         