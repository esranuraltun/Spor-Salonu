<?php
require_once('header.php');
$id = $_GET['id'];
$saglik = $db->prepare('select * from yazilar where id=?');
$saglik->execute(array($id));
$satirSaglik = $saglik->fetch()
?>

<!-- Banner Section Start -->
<section id="contentBanner">
        <div class="container py-4 mt-3">
            <div class="row">
                <div class="col-12 text-right">
                    <small><a href="index.php">Ana Sayfa</a> > <a href="saglik-yasam.php">Sağlık ve Yaşam</a> > <?php echo $satirSaglik['baslik'] ;?></small>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner Section End -->

  <!-- İçerik Section Start-->
  <section id="saglikcontentIcerik">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <h1 class="display-4"><?php echo $satirSaglik['baslik']; ?></h1>
                    <small class="text-muted">Yayınlanma Tarihi: <?php echo $satirSaglik['tarih'];?></small>
                    <img src="<?php echo substr($satirSaglik['foto'],3); ?>" alt="<?php echo $satirSaglik['altetiketi'];?>" class="img-fluid">
                    <p class="mt-4"> <?php echo $satirSaglik['makale'];?></p>
                </div>
                <div class="col-md-3 mt-7">
                    <h3 style="font-size: 20px;">Benzer Yazılar</h3>
                        <div class="row">
                        <?php
                        $benzerYazilar = $db->prepare('select * from yazilar order by id desc limit 3');
                        $benzerYazilar->execute();

                        if ($benzerYazilar->rowCount()) {
                            foreach ($benzerYazilar as $satirbenzerYazilar) {
                        ?>
                            <div class="col-md-6"><img src="<?php echo substr($satirbenzerYazilar['foto'], 3); ?>" alt="<?php echo $satirbenzerYazilar['altetiketi']; ?>" class="img-fluid mt-1"></div>
                            <div class="col-md-6"><a href="saglik-content.php?id=<?php echo $satirbenzerYazilar['id']; ?>"><?php echo $satirbenzerYazilar['baslik']; ?></a></div>
                        <?php
                            }
                        }
                        ?>
                    </div>
                    <div class="row mt-4">
                        <h3 style="font-size: 20px;">Bizi Takip Edin</h3>
                        <div class="col-12">
                            <a href="<?php echo $satirIletisim['facebook'];?>" target="_blank"><i class="bi bi-facebook m-2"></i></a>
                            <a href="<?php echo $satirIletisim['instagram'];?>" target="_blank"><i class="bi bi-instagram m-2"></i></a>
                            <a href="<?php echo $satirIletisim['twitter'];?>" target="_blank"><i class="bi bi-twitter m-2"></i></a>
                            <a href="<?php echo $satirIletisim['whatsapp'];?>" target="_blank"><i class="bi bi-whatsapp m-2"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- İçerik Section End-->


<?php require_once('footer.php'); ?>