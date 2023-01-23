<?php require_once('header.php'); ?>
<!-- Yazılar Content Start -->
<section id="yaziList" class="py-4">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3>Yazılar</h3>
                <a href="yazi-ekle.php" class="btn btn-dark">Yazı Ekle</a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table table-hover mt-2">
                    <thead class="table-active">
                        <tr>
                            <th>Foto</th>
                            <th>Başlık</th>
                            <th>Tarih</th>
                            <th>Durum</th>
                            <th>Düzenle</th>
                            <th>Sil</th>
                        </tr>
                        <tbody>
<?php
$sorgu_yaziList = $db ->prepare('select * from yazilar order by id desc');
$sorgu_yaziList -> execute();
if($sorgu_yaziList -> rowCount()){
    foreach($sorgu_yaziList as $satir_yaziList){
?>
<tr>
    <td class="w-25"><img src="<?php echo $satir_yaziList['foto'];?>" alt="<?php echo $satir_yaziList['altetiketi'];?>" class="img-fluid"></td>
    <td style="vertical-align: middle;"><?php echo $satir_yaziList['baslik'];?></td>
    <td style="vertical-align: middle;"><i><?php echo $satir_yaziList['tarih'];?></i></td>
    <td style="vertical-align: middle;"><i><?php echo $satir_yaziList['durum'];?></i></td>
    <td style="vertical-align: middle;"><a href="yazi-duzenle.php?id=<?php echo $satir_yaziList['id'];?>" class="btn btn-dark">Düzenle</a></td>
    <td style="vertical-align: middle;"><a href="yazi-sil.php?id=<?php echo $satir_yaziList['id'];?>" class="btn btn-danger">Sil</a></td>
</tr>


<?php

    }
}

?>



                        </tbody>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</section>
<!-- Yazılar Content End -->
<?php require_once('footer.php') ;?>