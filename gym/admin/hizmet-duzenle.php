<?php
require_once('header.php');
$id = $_GET['id'];
$sorgu_hizmetDuzenle = $db->prepare('select * from hizmetler where id=?');
$sorgu_hizmetDuzenle->execute(array($id));
$satir_hizmetDuzenle = $sorgu_hizmetDuzenle->fetch();
?>
<!-- Hizmet Ekle Section Start -->
<section id="hizmetDuzenle" class="py-4">
    <div class="container">
        <div class="row">
        <div class="col-12">
                <h3>Hizmet Düzenle</h3>
                <a href="hizmetler.php" class="btn btn-dark">Tüm Hizmetler</a>
            </div>
        </div>
        <form class="form-row mt-2" enctype="multipart/form-data" method="POST">
            <div class="col-md-9">
                <div class="form-group">
                    <input type="text" name="baslik" value="<?php echo $satir_hizmetDuzenle['baslik'];?>" class="form-control">
                </div>
                <div class="form-group">
                    <textarea name="icerik" rows="10" class="form-control"><?php echo $satir_hizmetDuzenle['icerik'];?></textarea>
                    <script>
                        CKEDITOR.replace('icerik');
                    </script>
                </div>
                <div class="form-group">
                    <textarea name="meta" rows="2" class="form-control"><?php echo $satir_hizmetDuzenle['meta'];?></textarea>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <img src="<?php echo $satir_hizmetDuzenle['banner'] ?>" alt="" class="img-fluid">
                    <input type="file" name="banner" id="banner">
                </div>
                <div class="form-group">
                    <input type="text" name="altetiketi" value="<?php echo $satir_hizmetDuzenle['altetiketi']; ?>" class="form-control">
                </div>
                <div class="form-group">
                    <label><small>Yayın Tarihi</small></label>
                    <input type="date" name="tarih" class="form-control" value="<?php echo $satir_hizmetDuzenle['tarih']; ?>">
                </div>
                <div class="form-group">
                    <label><small>Yayın Durumu - <?php echo $satir_hizmetDuzenle['durum']; ?></small></label>
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
                    $meta = $_POST['meta'];
                    $banner = '../img/' . $_FILES['banner']['name'];
                    $altetiketi = $_POST['altetiketi'];
                    $tarih = $_POST['tarih'];
                    $durum = $_POST['durum'];

                    if (move_uploaded_file($_FILES['banner']['tmp_name'], $banner)) {
                        $sorgu_hizmetDuzenle = $db->prepare('update hizmetler set baslik=?, icerik=?,tarih=?, durum=?, meta=?, altetiketi=?, banner=? where id=?');
                        $sorgu_hizmetDuzenle->execute(array($baslik, $icerik, $tarih, $durum, $meta, $altetiketi, $banner, $id));

                        if ($sorgu_hizmetDuzenle->rowCount()) {
                            echo '<div class="alert alert-dark">Kayıt Güncellenmiştir.</div><meta http-equiv="refresh" content="2; url=hizmetler.php">';
                        } else {
                            echo '<div class="alert alert-danger">Hata Oluştu</div>';
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