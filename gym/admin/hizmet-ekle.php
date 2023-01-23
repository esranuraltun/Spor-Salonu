<?php require_once('header.php'); ?>

<!-- Sayfa Ekle Section Start -->
<section id="hizmetEkle" class="py-3">
    <div class="container">
        <div class="row">
        <div class="col-12">
                <h3>Hizmet Ekle</h3>
                <a href="hizmetler.php" class="btn btn-dark">Tüm Hizmetler</a>
            </div>
        </div>
       <div class="row mt-2">
        <div class="col-12">
        <form class="form-row" enctype="multipart/form-data" method="POST">
            <div class="col-md-9">
                <div class="form-group">
                    <input type="text" name="baslik" placeholder="Hizmet Başlığını Girin" class="form-control">
                </div>
                <div class="form-group">
                    <textarea name="icerik" placeholder="İçerik Girin" rows="10" class="form-control"></textarea>
                    <script>
                        CKEDITOR.replace('icerik');
                    </script>
                </div>
                <div class="form-group">
                    <textarea name="meta" placeholder="Hizmet açıklamasını girin (Max. 160 Karakter)" rows="2" class="form-control"></textarea>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label for="banner"></label>
                    <input type="file" name="banner" id="banner">
                </div>
                <div class="form-group">
                    <input type="text" name="altetiketi" placeholder="Görsel Açıklamasını Girin" class="form-control">
                </div>
                <div class="form-group">
                    <label><small>Yayın Tarihi</small></label>
                    <input type="date" name="tarih" class="form-control">
                </div>
                <div class="form-group">
                    <label><small>Yayın Durumu</small></label>
                    <select name="durum" class="form-control">
                        <option value="">Seçiniz</option>
                        <option value="taslak">Taslak</option>
                        <option value="yayinlandi">Yayınlandı</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="submit" value="Kaydet" class="btn btn-dark w-100">
                </div>
                <?php
                if ($_POST) {
                    $baslik = $_POST['baslik'];
                    $icerik = $_POST['icerik'];
                    $tarih = $_POST['tarih'];
                    $durum = $_POST['durum'];
                    $meta = $_POST['meta'];
                    $altetiketi = $_POST['altetiketi'];
                    $banner = '../img/' . $_FILES['banner']['name'];

                    if (move_uploaded_file($_FILES['banner']['tmp_name'], $banner)) {
                        $hizmetEkle = $db->prepare('insert into hizmetler(baslik,icerik,tarih,durum,meta,altetiketi,banner) values(?,?,?,?,?,?,?)');
                        $hizmetEkle->execute(array($baslik, $icerik, $tarih, $durum, $meta, $altetiketi, $banner));

                        if ($hizmetEkle->rowCount()) {
                            echo '<div class="alert alert-success text-center">Kayıt Başarılı</div>';
                        } else {
                            echo '<div class="alert alert-danger text-center">Hata Oluştu</div>';
                        }
                    }
                }
                ?>
            </div>
        </form>
        </div>
       </div>
    </div>
</section>
<!-- Sayfa Ekle Section End -->

<?php require_once('footer.php'); ?>