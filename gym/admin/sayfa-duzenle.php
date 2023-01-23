<?php
require_once('header.php');
$id = $_GET['id'];
$sorgu_sayfaDuzenle = $db->prepare('select * from sayfalar where id=?');
$sorgu_sayfaDuzenle->execute(array($id));
$satir_sayfaDuzenle = $sorgu_sayfaDuzenle->fetch();
?>
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
                    <input type="text" name="baslik" value="<?php echo $satir_sayfaDuzenle['baslik']; ?>" class="form-control">
                </div>
                <div class="form-group">
                    <textarea name="icerik" rows="10" class="form-control"><?php echo $satir_sayfaDuzenle['icerik']; ?></textarea>
                    <script>
                        CKEDITOR.replace('icerik');
                    </script>
                </div>
                <div class="form-group">
                    <textarea name="meta" rows="4" class="form-control"><?php echo $satir_sayfaDuzenle['meta']; ?></textarea>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <img src="<?php echo $satir_sayfaDuzenle['banner']; ?>" class="img-fluid mb-2">
                    <input type="file" name="banner">
                </div>
                <div class="form-group">
                    <label><small>Kategori Seçin - <i><?php echo $satir_sayfaDuzenle['kategori']; ?></i></small></label>
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
                    <input type="date" name="tarih" class="form-control" value="<?php echo $satir_sayfaDuzenle['tarih']; ?>">
                </div>
                <div class="form-group">
                    <label><small>Yayın Durumu - <i><?php echo $satir_sayfaDuzenle['durum']; ?></i></small></label>
                    <select name="durum" class="form-control">
                        <option value="">Seçiniz</option>
                        <option value="yayinlandi">Yayınlandı</option>
                        <option value="taslak">Taslak</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="submit" value="Düzenle" class="btn btn-dark w-100">
                </div>
                <?php
                if ($_POST) {
                    $foto = "../img/" . $_FILES['banner']['name'];
                    if (move_uploaded_file($_FILES['banner']['tmp_name'], $foto)) {
                        $sorgu_sayfaDuzenle = $db->prepare('update sayfalar set banner=?, baslik=?, icerik=?, meta=?, durum=?, tarih=?, kategori=? where id=?');
                        $sorgu_sayfaDuzenle->execute(array($foto, $_POST['baslik'], $_POST['icerik'], $_POST['meta'], $_POST['durum'], $_POST['tarih'], $_POST['kategori'], $id));
                        if($sorgu_sayfaDuzenle -> rowCount()){
                            echo '<div class="alert alert-dark">Kayıt Güncellenmiştir.</div><meta http-equiv="refresh" content="2; url=sayfalar">';
                        } else{
                            echo '<div class="alert alert-danger">Hata Oluştu. Tekrar Deneyiniz.</div><meta http-equiv="refresh" content="2; url=sayfalar">';
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
