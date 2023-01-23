<?php
session_start();
require_once('baglan.php');
require_once('function.php');
?>
<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Css Files -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>

<body>
    <header>
        <section id="menu" class="py-3">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <nav class="navbar navbar-expand-lg navbar-light">
                            <a class="navbar-brand" href="index.php">
                                <h4 class="display-4"><?php echo $satirIletisim['ad'];?></h4>
                            </a>
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                                <ul class="navbar-nav mx-auto">
                                    <li class="nav-item active">
                                        <a class="nav-link" href="index.php">Anasayfa <span class="sr-only">(current)</span></a>
                                    </li>
                                    <li class="nav-item mx-5">
                                        <a class="nav-link" href="kulubumuz.php">Kulübümüz</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="saglik-yasam.php">Sağlık ve Yaşam</a>
                                    </li>
                                    <li class="nav-item dropdown mx-5">
                                        <a class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-expanded="false">
                                            Hizmetler
                                        </a>
                                        <div class="dropdown-menu">
                                            <?php
                                            $menu = $db->prepare('select * from hizmetler where durum=? order by baslik asc');
                                            $menu->execute(array('yayinlandi'));
                                            if ($menu->rowCount()) {
                                                foreach ($menu as $satirMenu) {
                                            ?>
                                                    <a class="dropdown-item" href="hizmetler.php?id=<?php echo $satirMenu['id']; ?>"><?php echo $satirMenu['baslik']; ?></a>

                                            <?php
                                                }
                                            }

                                            ?>
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="uyelik.php">Üyelik</a>
                                    </li>
                                    <li class="nav-item mx-5">
                                        <a class="nav-link" href="iletisim.php">İletişim</a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </section>
    </header>