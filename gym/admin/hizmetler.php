<?php
require_once('header.php');

if ($_GET) {
    $id = $_GET['id'];
    $hizmetSil = $db->prepare('delete from hizmetler where id=?');
    $hizmetSil->execute(array($id));

    if ($hizmetSil->rowCount()) {
        echo '<meta http-equiv="refresh" content="0; url=hizmetler.php">';
    } else {
        echo '<meta http-equiv="refresh" content="0; url=hizmetler.php">';
    }
}
?>
<!-- Hizmetler List Section Start -->
<section id="hizmetlerList" class="py-4">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3>Hizmetler</h3>
                <a href="hizmet-ekle.php" class="btn btn-dark">Hizmet Ekle</a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table table-hover mt-2">
                    <thead class="table-active">
                        <tr>
                            <th>ID</th>
                            <th>Foto</th>
                            <th>Başlık</th>
                            <th>Tarih</th>
                            <th>Durum</th>
                            <th>Düzenle</th>
                            <th>Sil</th>
                        </tr>
                    </thead>
                    <tbody>
      <?php
      $hizmetList = $db->prepare('select * from hizmetler order by id desc');
      $hizmetList->execute();

     if ($hizmetList->rowCount()) {
      foreach ($hizmetList as $satirHizmet) {
    ?>
       <tr>
       <td><?php echo $satirHizmet['id']; ?></td>
       <td class="w-25" style="vertical-align: middle;"><img src="<?php echo $satirHizmet['banner']; ?>" class="w-100"></td>
       <td style="vertical-align: middle;"><?php echo $satirHizmet['baslik']; ?></td>
       <td style="vertical-align: middle;"><?php echo $satirHizmet['tarih']; ?></td>
       <td style="vertical-align: middle;"><?php echo $satirHizmet['durum']; ?></td>
       <td style="vertical-align: middle;"><a href="hizmet-duzenle.php?id=<?php echo $satirHizmet['id']; ?>" class="btn btn-dark">Düzenle</a></td>
       <td style="vertical-align: middle;"><a href="hizmetler.php?id=<?php echo $satirHizmet['id']; ?>" class="btn btn-danger">Sil</a></td>
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
<!-- Hizmetler List Section End -->

<?php require_once('footer.php'); ?>