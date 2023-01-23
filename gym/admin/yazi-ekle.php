<?php require_once('header.php'); ?>
<!-- Yazı Ekle Start -->
<section id="yaziEkle" class="py-4">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3>Yazı Ekle</h3>
                <a href="yazilar.php" class="btn btn-dark">Tüm Yazılar</a>
            </div>
        </div>
        <div class="row mt-2">
            <div class="col-12">
                <form class="form-row" enctype="multipart/form-data" method="POST">
                    <div class="col-md-9">
                        <div class="form-group">
                            <input type="text" name="baslik" placeholder="Yazı Başlığı Ekle" class="form-control">
                        </div>
                        <div class="form-group">
                            <textarea name="makale" placeholder="Yazı Ekle" rows="9" class="form-control"></textarea>
                            <script>
                                CKEDITOR.replace('makale');
                            </script>
                        </div>
                        <div class="form-group">
                            <textarea name="meta" placeholder="Sayfa Açıklaması Ekle" rows="4" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <input type="file" name="gorsel">
                        </div>
                        <div class="form-group">
                            <input type="text" name="altetiketi" placeholder="Görsel Alt Etiketi Ekle" class="form-control">
                        </div>
                        <div class="form-group">
                            <label><small>Kategori Seçiniz</small></label>
                            <select name="kategori" class="form-control">
                                <option value="">Seçiniz</option>
                                <?php
                                $sorgu_katelist = $db->prepare('select * from kategoriler order by kate_adi asc');
                                $sorgu_katelist->execute();
                                if ($sorgu_katelist->rowCount()) {
                                    foreach ($sorgu_katelist as $satir_katelist) {
                                ?>
                                        <option value="<?php echo $satir_katelist['kate_turu']; ?>"> <?php echo $satir_katelist['kate_adi']; ?></option>
                                <?php
                                    }
                                }

                                ?>

                            </select>
                        </div>
                        <div class="form-group">
                            <label><small>Yayın Tarihi</small></label>
                            <input type="date" name="tarih" class="form-control">
                        </div>
                        <div class="form-group">
                            <label><small>Yayın Durumu</small></label>
                            <select name="durum" class="form-control">
                                <option value="">Seçiniz</option>
                                <option value="yayinlandi">Yayınlandı</option>
                                <option value="taslak">Taslak</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Kaydet" class="btn btn-dark w-100">
                        </div>
                    </div>
                </form>
                <?php
                if ($_POST) {
                    $baslik = $_POST['baslik'];
                    $makale = $_POST['makale'];
                    $meta = $_POST['meta'];
                    $dizin = "../img/";
                    $foto = $dizin . $_FILES['gorsel']['name'];
                    $altetiketi = $_POST['altetiketi'];
                    $kategori = $_POST['kategori'];
                    $tarih = $_POST['tarih'];
                    $durum = $_POST['durum'];

                    if (move_uploaded_file($_FILES['gorsel']['tmp_name'], $foto)) {
                        $sorgu_yaziekle = $db->prepare('insert into yazilar(baslik,makale,meta,foto,altetiketi,kategori,tarih,durum) values(?,?,?,?,?,?,?,?)');
                        $sorgu_yaziekle->execute(array($baslik, $makale, $meta, $foto, $altetiketi, $kategori, $tarih, $durum));

                        if ($sorgu_yaziekle->rowCount()) {
                            echo '<div class="alert alert-success">Kayıt Başarılı</div>';
                        } else {
                            echo '<div class="alert alert-danger">Hata Oluştu</div>';
                        }
                    }
                }
                ?>

            </div>
        </div>

    </div>
</section>
<!-- Yazı Ekle End -->
<?php require_once('footer.php'); ?>