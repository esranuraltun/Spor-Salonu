<?php require_once('header.php'); ?>
<!-- Sayfa Ekle Section Start -->
<section id="sayfaEkle" class="py-4">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3>Sayfa Ekle</h3>
                <a href="sayfalar.php" class="btn btn-dark">Tüm Sayfalar</a>
            </div>
        </div>
        <form class="form-row mt-2" enctype="multipart/form-data" method="POST">
            <div class="col-md-9">
                <div class="form-group">
                    <input type="text" name="baslik" placeholder="Sayfa Başlığını Ekle" class="form-control">
                </div>
                <div class="form-group">
                    <textarea name="icerik" placeholder="İçerik Ekle" rows="10" class="form-control"></textarea>
                    <script>
                        CKEDITOR.replace('icerik');
                    </script>
                </div>
                <div class="form-group">
                    <textarea name="meta" placeholder="Sayfa Açıklaması Ekle" rows="4" class="form-control"></textarea>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                <label><small>Banner Görseli Ekle</small></label>
                    <input type="file" name="banner">
                </div>
                <div class="form-group">
                    <label><small>Kategori Seçin</small></label>
                    <select name="kategori" class="form-control">
                        <option value="">Seçiniz</option>
                        <?php
                        $sorgu_kateList = $db->prepare('select * from kategoriler order by kate_adi asc');
                        $sorgu_kateList->execute();
                        if ($sorgu_kateList->rowCount()) {
                            foreach ($sorgu_kateList as $satir_kateList) {
                        ?>

                                <option value="<?php echo $satir_kateList['kate_adi']; ?>"><?php echo $satir_kateList['kate_adi']; ?></option>
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
              <?php
if($_POST){
    $foto = "../img/". $_FILES['banner']['name'];
    if(move_uploaded_file($_FILES['banner']['tmp_name'],$foto)){
        $sorgu_sayfaEkle = $db -> prepare('insert into sayfalar(baslik,icerik,meta,banner,kategori,tarih,durum) values(?,?,?,?,?,?,?)');
        $sorgu_sayfaEkle -> execute(array($_POST['baslik'],$_POST['icerik'],$_POST['meta'],$foto,$_POST['kategori'],$_POST['tarih'],$_POST['durum']));
        if($sorgu_sayfaEkle -> rowCount()){
            echo '<div class="alert alert-dark">Kayıt Başarılı</div><meta http-equiv="refresh" content="2; url=sayfalar.php">';
        } else{
            echo '<div class="alert alert-danger">Hata Oluştu. Tekrar Deneyiniz.</div><meta http-equiv="refresh" content="2; url=sayfalar.php">';

        }
    }
}


?>
            </div>
        </form>
    </div>
</section>
<!-- Sayfa Ekle Section End -->

<?php require_once('footer.php'); ?>
