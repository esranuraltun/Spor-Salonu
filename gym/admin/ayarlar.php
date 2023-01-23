<?php require_once('header.php');?>
<!-- Info Section Start -->
<section id="info" class="py-5">
    <div class="container">
        <form class="form-row" method="POST" enctype="multipart/form-data">
            <div class="col-12">
                <h4>İletişim Bilgileri</h4>
                <div class="form-group">
                    <input type="text" name="ad" placeholder="Site Adı" class="form-control">
                </div>
                <div class="form-group">
                    <input type="tel" name="telefon" placeholder="Telefon Numarası" class="form-control">
                </div>
                <div class="form-group">
                    <input type="email" name="email" placeholder="E-Posta Adresi" class="form-control">
                </div>
                <div class="form-group">
                    <input type="text" name="adres" placeholder="Adres" class="form-control">
                </div>
            </div>
            <div class="col-12 mt-2">
                <h4>Sosyal Medya Adresleri</h4>
                <div class="form-group">
                    <input type="url" name="facebook" placeholder="Facebook" class="form-control">
                </div>
                <div class="form-group">
                    <input type="url" name="instagram" placeholder="Instagram" class="form-control">
                </div>
                <div class="form-group">
                    <input type="url" name="twitter" placeholder="Twitter" class="form-control">
                </div>
                <div class="form-group">
                    <input type="url" name="whatsapp" placeholder="Whatsapp" class="form-control">
                </div>
            </div>
            <div class="col-12">
                <div class="form-group">
                    <h4>Site Tanıtım Yazısı</h4>
                    <textarea name="tanitim" id="tanitim" class="form-control" rows="4"></textarea>
                </div>
                <div class="row">
                    <div class="col-12 mt-2">
                        <h4>Sayfa Başlığı Görseli</h4>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="anasayfaBanner"><i>Anasayfa Banner</i></label>
                            <input type="file" name="anasayfaBanner" id="anasayfaBanner">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="saglikBanner"><i>Sağlık ve Yaşam Banner</i></label>
                            <input type="file" name="saglikBanner" id="saglikBanner">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="uyelikBanner"><i>Üyelik Banner</i></label>
                            <input type="file" name="uyelikBanner" id="uyelikBanner">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="iletisimBanner"><i>İletişim Banner</i></label>
                            <input type="file" name="iletisimBanner" id="iletisimBanner">
                        </div>
                    </div>
                </div>
                <div class="form-group mt-2">
                    <input type="submit" value="Kaydet" class="btn btn-dark w-100">
                </div>
        </form>
        <div class="row">
            <div class="col-12">
                <?php
                if ($_POST) {
                    $ad = $_POST['ad'];
                    $telefon = $_POST['telefon'];
                    $email = $_POST['email'];
                    $adres = $_POST['adres'];
                    $facebook = $_POST['facebook'];
                    $instagram = $_POST['instagram'];
                    $twitter = $_POST['twitter'];
                    $whatsapp = $_POST['whatsapp'];
                    $tanitim = $_POST['tanitim'];
                    $dizin = '../img/';
                    $anasayfaBanner = $dizin . $_FILES['anasayfaBanner']['name'];
                    $saglikBanner = $dizin . $_FILES['saglikBanner']['name'];
                    $uyelikBanner = $dizin . $_FILES['uyelikBanner']['name'];
                    $iletisimBanner = $dizin . $_FILES['iletisimBanner']['name'];
                    if (move_uploaded_file($_FILES['anasayfaBanner']['tmp_name'], $anasayfaBanner) && move_uploaded_file($_FILES['saglikBanner']['tmp_name'], $saglikBanner) && move_uploaded_file($_FILES['uyelikBanner']['tmp_name'], $uyelikBanner) && move_uploaded_file($_FILES['iletisimBanner']['tmp_name'], $iletisimBanner)) {
                        $sorgu_ayarlar = $db -> prepare('insert into ayarlar(ad,telefon,email,adres,facebook,instagram,twitter,whatsapp,tanitim,anasayfaBanner,saglikBanner,uyelikBanner,iletisimBanner) values(?,?,?,?,?,?,?,?,?,?,?,?,?)');
                        $sorgu_ayarlar->execute(array($id, $ad, $telefon, $email, $adres, $facebook, $instagram, $twitter, $whatsapp, $tanitim, $anasayfaBanner, $saglikBanner, $uyelikBanner, $iletisimBanner));

                        if ($sorgu_ayarlar -> rowCount()) {
                            echo '<div class="alert alert-dark">Ayarlar Başarıyla Kaydedildi</div>';
                        } else {
                            echo '<div class="alert alert-danger">Hata Oluştu. Lütfen Tekrar Deneyin</div>';
                        }
                    }
                }
                ?>
            </div>
        </div>
    </div>
</section>
<!-- Info Section End -->


<?php require_once('footer.php'); ?>