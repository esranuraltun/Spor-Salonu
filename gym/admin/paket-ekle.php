<?php require_once('header.php'); ?>
<!-- Paket Ekle Start -->
<section id="paketEkle" class="py-4">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3>Paket Ekle</h3>
                <a href="paketler.php" class="btn btn-dark">Tüm Paketler</a>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-12">
                <form class="form-row" enctype="multipart/form-data" method="POST">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label><i>Paket Adı</i></label>
                            <input type="text" name="baslik" placeholder="Paket Başlığı Ekle" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                        <label><i>Paket Görseli</i></label> <br>
                            <input type="file" name="foto">
                        </div>                    
                    </div>
                    <div class="col-12">
                    <div class="form-group">
                            <input type="submit" value="Kaydet" class="btn btn-dark w-100">
                        </div>
                    </div>
                       
                </form>
                <?php
                if ($_POST) {
                    $dizin = "../img/";
                    $foto = $dizin . $_FILES['foto']['name'];
                    $baslik = $_POST['baslik'];
                    if (move_uploaded_file($_FILES['foto']['tmp_name'], $foto)) {
                        $sorgu_paketekle = $db->prepare('insert into paketler(foto,baslik) values(?,?)');
                        $sorgu_paketekle->execute(array($foto, $baslik));
                        if ($sorgu_paketekle->rowCount()) {
                            echo '<div class="alert alert-success">Kayıt Başarılı</div><meta http-equiv="refresh" content="2; url=paketler.php">';
                        } else {
                            echo '<div class="alert alert-danger">Hata Oluştu</div><meta http-equiv="refresh" content="2; url=paketler.php">';
                        }
                    }
                }
                ?>
            </div>
        </div>
    </div>
</section>
<!-- Paket Ekle End -->
<?php require_once('footer.php'); ?>
