<?php require_once('header.php'); ?>


<!-- Hakkımızda Ayarlar Section Start -->
<section id="hakkimizdaAyar" class="py-3">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h3>Kulübümüz</h3>
            </div>
        </div>
        <form method="post" class="form-row" enctype="multipart/form-data">
            <div class="col-md-9">
                <div class="form-group">
                    <label for="bannerGorsel"><small>Kulübümüz Banner</small></label>
                    <input type="file" name="bannerGorsel" id="bannerGorsel">
                </div>
                <div class="form-group">
                    <input type="text" name="baslik" placeholder="Sayfa Başlığı Ekle" class="form-control">
                </div>
                <div class="form-group">
                    <textarea name="icerik" placeholder="Tanıtım Yazısı Ekle" rows="10" class="form-control"></textarea>
                    <script>
                        CKEDITOR.replace('icerik');
                    </script>
                </div>
                <div class="form-group">
                    <textarea name="meta" placeholder="Kısa Açıklama Girin" rows="4" class="form-control"></textarea>
                </div>
            </div>
            <div class="col-md-3">
                <h4>Kulüpler</h4>
                <div class="form-group">
                    <label for="kulupGorsel1"></label>
                    <input type="file" name="kulupGorsel1" id="kulupGorsel1">
                </div>
                <div class="form-group">
                    <label for="kulupGorsel2"></label>
                    <input type="file" name="kulupGorsel2" id="kulupGorsel2">
                </div>
                <div class="form-group">
                    <label for="kulupGorsel3"></label>
                    <input type="file" name="kulupGorsel3" id="kulupGorsel3">
                </div>
                <h4>Eğitmenler</h4>
                <div class="form-group">
                    <label for="egitmenGorsel1"></label>
                    <input type="file" name="egitmenGorsel1" id="egitmenGorsel1">
                </div>
                <div class="form-group">
                    <label for="egitmenGorsel2"></label>
                    <input type="file" name="egitmenGorsel2" id="egitmenGorsel2">
                </div>
                <div class="form-group">
                    <label for="egitmenGorsel3"></label>
                    <input type="file" name="egitmenGorsel3" id="egitmenGorsel3">
                </div>
                <div class="form-group">
                    <label for="egitmenGorsel4"></label>
                    <input type="file" name="egitmenGorsel4" id="egitmenGorsel4">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-dark w-100">Kaydet</button>
                </div>

                <?php

                if ($_POST) {
                    $bannerGorsel = '../img/' . $_FILES['bannerGorsel']['name'];
                    $baslik = $_POST['baslik'];
                    $icerik = $_POST['icerik'];
                    $meta = $_POST['meta'];
                    $kulupGorsel1 = '../img/' . $_FILES['kulupGorsel1']['name'];
                    $kulupGorsel2 = '../img/' . $_FILES['kulupGorsel2']['name'];
                    $kulupGorsel3 = '../img/' . $_FILES['kulupGorsel3']['name'];
                    $egitmenGorsel1 = '../img/' . $_FILES['egitmenGorsel1']['name'];
                    $egitmenGorsel2 = '../img/' . $_FILES['egitmenGorsel2']['name'];
                    $egitmenGorsel3 = '../img/' . $_FILES['egitmenGorsel3']['name'];
                    $egitmenGorsel4 = '../img/' . $_FILES['egitmenGorsel4']['name'];

                    if (move_uploaded_file($_FILES['bannerGorsel']['tmp_name'],$bannerGorsel) && move_uploaded_file($_FILES['kulupGorsel1']['tmp_name'],$kulupGorsel1) && move_uploaded_file($_FILES['kulupGorsel2']['tmp_name'],$kulupGorsel2) && move_uploaded_file($_FILES['kulupGorsel3']['tmp_name'],$kulupGorsel3) && move_uploaded_file($_FILES['egitmenGorsel1']['tmp_name'],$egitmenGorsel1) && move_uploaded_file($_FILES['egitmenGorsel2']['tmp_name'],$egitmenGorsel2) && move_uploaded_file($_FILES['egitmenGorsel3']['tmp_name'],$egitmenGorsel3) && move_uploaded_file($_FILES['egitmenGorsel4']['tmp_name'],$egitmenGorsel4)) {
                        $kulübümüzKaydet = $db->prepare('insert into kulubumuz(bannerGorsel,baslik,icerik,meta,kulupGorsel1,kulupGorsel2,kulupGorsel3,egitmenGorsel1,egitmenGorsel2,egitmenGorsel3,egitmenGorsel4) values(?,?,?,?,?,?,?,?,?,?,?)');
                        $kulübümüzKaydet->execute(array($bannerGorsel, $baslik, $icerik, $meta, $kulupGorsel1, $kulupGorsel2, $kulupGorsel3, $egitmenGorsel1, $egitmenGorsel2, $egitmenGorsel3, $egitmenGorsel4));

                        if ($kulübümüzKaydet->rowCount()) {
                            echo '<div class="alert alert-dark text-center">Kayıt Başarılı</div>';
                        } else {
                            echo '<div class="alert alert-danger text-center">Hata Oluştu</div>';
                        }
                    }
                }
                ?>



            </div>
        </form>
    </div>
</section>
<!-- Hakkımızda Ayarlar Section End -->


<?php require_once('footer.php'); ?>