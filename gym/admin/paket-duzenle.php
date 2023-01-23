<?php
require_once('header.php');
$id = $_GET['id'];
$sorgu_paketDuzenle = $db->prepare('select * from paketler where id=?');
$sorgu_paketDuzenle->execute(array($id));
$satir_paketDuzenle= $sorgu_paketDuzenle->fetch();
?>
<!-- Hizmet Ekle Section Start -->
<section id="paketDuzenle" class="py-4">
    <div class="container">
        <div class="row">
        <div class="col-12">
                <h3>Paket Düzenle</h3>
                <a href="paketler.php" class="btn btn-dark">Tüm Paketler</a>
            </div>
        </div>
        <form class="form-row mt-2" enctype="multipart/form-data" method="POST">
            <div class="col-12">
                <div class="form-group">
                <label><i>Paket Adı</i></label>
                    <input type="text" name="baslik" value="<?php echo $satir_paketDuzenle['baslik']; ?>" class="form-control">
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <label><i>Paket Görseli</i></label>
                    <img src="<?php echo $satir_paketDuzenle['foto'] ?>" alt="" class="w-100">
                    <input type="file" name="foto" id="foto" class="mt-2">
                </div>
              <div class="col-12">
              <div class="form-group">
                    <input type="submit" value="Kaydet" class="btn btn-dark w-100">
                </div>

              </div>
                <?php
                if ($_POST) {
                    $foto = '../img/' . $_FILES['foto']['name'];
                    $baslik = $_POST['baslik'];
                    if (move_uploaded_file($_FILES['foto']['tmp_name'], $foto)) {
                        $sorgu_paketDuzenle = $db->prepare('update paketler set foto=?, baslik=? where id=?');
                        $sorgu_paketDuzenle->execute(array($id,$foto,$baslik));
                        if ($sorgu_paketDuzenle -> rowCount()) {
                            echo '<div class="alert alert-dark">Kayıt Güncellenmiştir.</div><meta http-equiv="refresh" content="2; url=paketler.php">';
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
<!-- Paket Ekle Section End -->

<?php require_once('footer.php'); ?>