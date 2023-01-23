<?php require_once('header.php'); ?>
<!-- Sayfalar List Section Start -->
<section id="sayfalarList" class="py-4">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3>Sayfalar</h3>
                <a href="sayfa-ekle.php" class="btn btn-dark">Sayfa Ekle</a>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <table class="table table-hover mt-2">
                    <thead class="table-active">
                        <tr>
                            <th>Foto</th>
                            <th>Başlık</th>
                            <th>Durum</th>
                            <th>Tarih</th>
                            <th>Kategori</th>
                            <th>Düzenle</th>
                            <th>Sil</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sorgu_sayfaList = $db -> prepare('select * from sayfalar order by id desc');
                        $sorgu_sayfaList->execute();
                        if ($sorgu_sayfaList->rowCount()) {
                            foreach ($sorgu_sayfaList as $satir_sayfaList) {
                        ?>
                                <tr>
                                    <td class="w-25"><img src="<?php echo $satir_sayfaList['banner'];?>" class="img-fluid"></td>
                                    <td style="vertical-align: middle;"><?php echo $satir_sayfaList['baslik']; ?></td>
                                    <td style="vertical-align: middle;"><?php echo $satir_sayfaList['durum']; ?></td>
                                    <td style="vertical-align: middle;"><?php echo $satir_sayfaList['tarih']; ?></td>
                                    <td style="vertical-align: middle;"><?php echo $satir_sayfaList['kategori']; ?></td>
                                    <td style="vertical-align: middle;"><a href="sayfa-duzenle.php?id=<?php echo $satir_sayfaList['id']; ?>" class="btn btn-dark">Düzenle</a></td>
                                    <td style="vertical-align: middle;"><a href="sayfa-sil.php?id=<?php echo $satir_sayfaList['id']; ?>" class="btn btn-danger">Sil</a></td>
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
<!-- Sayfalar List Section End -->
<?php require_once('footer.php'); ?>