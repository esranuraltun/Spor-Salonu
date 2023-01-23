<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Css Files -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">


    <title>Admin Paneli Giriş</title>
</head>

<body>
    <!-- Login section Start -->
    <section id="login">
           <div class="container">
            <div class="row" style="height: 75vh;">
                <div class="col-6 text-center m-auto">
                    <h1 class="display-4">Lets Fit Login</h1>
                    <form method="post" class="mt-4">
                        <div class="form-group">
                            <input type="text" name="kullanici" placeholder="Kullanıcı Adınız" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="password" name="sifre" placeholder="Şifreniz" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Giriş Yap" class="btn btn-dark w-100">
                        </div>
                    </form>
                    <?php
                    if ($_POST) {
                        $kullanici = $_POST['kullanici'];
                        $sifre = $_POST['sifre'];

                        if ($kullanici == 'Admin' && $sifre == 123) {
                            $_SESSION['kullanici'] = $kullanici;
                            echo '<div class="alert alert-dark">Kullanıcı adı ve şifre doğru. Lütfen bekleyiniz.</div> <meta http-equiv="refresh" content="2; url=dashboard.php">';
                        } else {
                            echo '<div class="alert alert-danger">Kullanıcı adı veya şifre yanlış. Tekrar deneyiniz.</div>';
                        }
                    }
                    ?>

                </div>
            </div>
        </div>
        <!--Waves Container-->
        <div>
            <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
                <defs>
                    <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
                </defs>
                <g class="parallax">
                    <use xlink:href="#gentle-wave" x="48" y="0" fill="rgba(255,255,255,0.7" />
                    <use xlink:href="#gentle-wave" x="48" y="3" fill="rgba(255,255,255,0.5)" />
                    <use xlink:href="#gentle-wave" x="48" y="5" fill="rgba(255,255,255,0.3)" />
                    <use xlink:href="#gentle-wave" x="48" y="7" fill="#fff" />
                </g>
            </svg>
        </div>
        <!--Waves end-->
    </section>
    <!-- Login section End -->



    <!-- Js Files (Jquery -> Popper -> Bootstrap Js) -->
    <script src="../js/jquery.slim.min.js"></script>
    <script src="../js/popper.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>

</html>