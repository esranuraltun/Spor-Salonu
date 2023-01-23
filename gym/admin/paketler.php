<?php
require_once('header.php');

if ($_GET) {
    $id = $_GET['id'];
    $paketSil = $db->prepare('delete from paketler where id=?');
    $paketSil->execute(array($id));

    if ($paketSil->rowCount()) {
        echo '<meta http-equiv="refresh" content="0; url=paketler.php">';
    } else {
        echo '<meta http-equiv="refresh" content="0; url=paketler.php">';
    }
}
?>
<!-- Paketler Section Start -->
<section id="paketlerList" class="py-4">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3>Paketler</h3>
                <a href="paket-ekle.php" class="btn btn-dark">Paket Ekle</a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table table-hover mt-2">
                    <thead class="table-active">
                        <tr>
                            <th>Foto</th>
                            <th>Başlık</th>
                            <th>Düzenle</th>
                            <th>Sil</th>
                        </tr>
                    </thead>
                    <tbody>
      <?php
      $paketList = $db->prepare('select * from paketler order by id desc');
      $paketList->execute();
     if ($paketList->rowCount()) {
      foreach ($paketList as $satirPaket) {
    ?>
       <tr>
       <td class="w-25" style="vertical-align: middle;"><img src="<?php echo $satirPaket['foto']; ?>" class="w-100"></td>
       <td style="vertical-align: middle;"><?php echo $satirPaket['baslik']; ?></td>
       <td style="vertical-align: middle;"><a href="paket-duzenle.php?id=<?php echo $satirPaket['id']; ?>" class="btn btn-dark">Düzenle</a></td>
       <td style="vertical-align: middle;"><a href="paketler.php?id=<?php echo $satirPaket['id']; ?>" class="btn btn-danger">Sil</a></td>
             </tr>
     <?php
                  }
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>
<!-- Paketler List Section End -->

<?php require_once('footer.php'); ?>