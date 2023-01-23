<?php require_once('header.php'); ?>

<!-- Kategori Ekle Section Start -->
<section id="kategoriler" class="py-4">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h4>Kategori Listesi</h4>
                <table class="table table-hover">
                    <thead class="table-active">
                        <tr>
                            <th>ID</th>
                            <th>Kategori Adı</th>
                            <th>Kategori Türü</th>
                            <th>Açıklama</th>
                            <th>Düzenle</th>
                            <th>Sil</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sorgu_katelist = $db->prepare('select * from kategoriler order by id desc');
                        $sorgu_katelist->execute();
                        if ($sorgu_katelist->rowCount()) {
                            foreach ($sorgu_katelist as $satir_katelist) {
                        ?>

                                <tr>
                                    <td><?php echo $satir_katelist['id']; ?></td>
                                    <td><?php echo $satir_katelist['kate_adi']; ?></td>
                                    <td><?php echo $satir_katelist['kate_turu']; ?></td>
                                    <td><?php echo $satir_katelist['aciklama']; ?></td>
                                    <td><a href="kategori-duzenle.php?id=<?php echo $satir_katelist['id']; ?>" class="btn btn-dark">Düzenle</a></td>
                                    <td><a href="kategori-sil.php?id=<?php echo $satir_katelist['id']; ?>" class="btn btn-danger">Sil</a></td>
                                </tr>

                        <?php

                            }
                        }

                        ?>



                    </tbody>
                </table>
            </div>
            <div class="col-md-4">
                <h4>Kategori Ekle</h4>
                <form method="post">
                    <div class="form-group">
                        <input type="text" name="kate_adi" placeholder="Kategori Adı" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <small><label>Kategori Türü</label></small>
                        <select name="kate_turu" class="form-control" required>
                            <option value="">Kategori Seçiniz</option>
                            <option value="altkategori">Alt Kategori</option>
                            <option value="ustkategori">Üst Kategori</option>

                        </select>
                    </div>
                    <div class="form-group">
                        <textarea name="aciklama" placeholder="Kategori Açıklaması Girin" rows="10" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="submit" value="Kaydet" class="btn btn-dark w-100">
                    </div>
                </form>
                <?php
                if ($_POST) {
                    $kate_adi = $_POST['kate_adi'];
                    $kate_turu = $_POST['kate_turu'];
                    $aciklama = $_POST['aciklama'];
                    $sorgu_kategoriler = $db->prepare('insert into kategoriler(kate_adi,kate_turu,aciklama) values(?,?,?)');
                    $sorgu_kategoriler->execute(array($kate_adi, $kate_turu, $aciklama));
                    if ($sorgu_kategoriler->rowCount()) {
                        echo '<div class="alert alert-info text-center">Kategori Eklendi</div>';
                    } else {
                        echo '<div class="alert alert-danger text-center">Hata Oluştu. Tekrar Deneyiniz</div>';
                    }
                }

                ?>
            </div>


        </div>
    </div>
</section>
<!-- Kategori Ekle Section End -->

<?php require_once('footer.php'); ?>