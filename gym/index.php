<?php
require_once('header.php'); 
$anasayfaBanner = $db->prepare('select * from ayarlar order by id desc limit 1');
$anasayfaBanner->execute();
$satirBanner = $anasayfaBanner->fetch();
?>

<!-- Index Banner Section Start -->
<section id="indexBanner" class="py-25" style="background-image:url('<?php echo substr($satirBanner['anasayfaBanner'], 1); ?>') ; background-size: cover; background-position: center center; background-repeat: no-repeat;">
    <div class="container">
       <div class="row">
        <div class="col-12">    
        </div>
       </div>
    </div>
</section>
<!-- Index Banner Section End -->

  <!-- İçerik Section Start -->
  <section id="indexIcerik" class="py-5 mt-4 bg-dark">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center text-white">
                    <h2>Hizmetler</h2>
                </div>
            </div>
            <div class="row mt-2">
            <?php
            $hizmetler = $db->prepare('select * from hizmetler order by baslik desc limit 3');
            $hizmetler->execute();

            if ($hizmetler->rowCount()) {
                foreach ($hizmetler as $satirHizmet) {
            ?>
                    <div class="col-md-4">
                        <div class="card">
                        <div class="card-body text-center">
                          <a href="hizmetler.php?id=<?php echo $satirHizmet['id']; ?>"><img src="<?php echo substr($satirHizmet['banner'], 3); ?>" alt="<?php echo $satirHizmet['altetiketi']; ?>" class="img-fluid"></a>
                                <i style="font-size: 20px;"><a href="hizmetler.php?id=<?php echo $satirHizmet['id']; ?>"><?php echo $satirHizmet['baslik']; ?></a></i>
                                
                            </div>
                        </div>
                    </div>
            <?php
                }
            }
            ?>
  
            </div>
        </div>
    </section>
    <!-- İçerik Section End -->

 <!-- İnfo Section Start -->
 <section id="Info">
        <div class="container">
            <div class="row mt-4 py-5 text-center">
                <div class="col-md-4">
                    <h3>E-Bülten için Abone Ol</h3>
                </div>
                <div class="col-md-4">
                    <form method="post">
                        <div class="form-group">
                            <input type="email" name="email" placeholder="E-Mail Adresiniz" class="form-control">
                        </div>
                    </form>
                </div>
                <div class="col-md-4"> <a class="btn btn-dark">Abone Ol</a> </div>
            </div>
        </div>
    </section>
     <!-- İnfo Section End -->
    <!--İçerik 2 Section Start  -->
    <section id="indexhaberTanitim" class="py-5 mt-4 bg-dark">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center text-white">
                    <h2>Sağlık ve Yaşam</h2>
                </div>
            </div>
            <div class="row mt-2">
            <?php
            $yasam = $db->prepare('select * from yazilar order by baslik asc limit 4');
            $yasam->execute();

            if ($yasam->rowCount()) {
                foreach ($yasam as $satirYasam) {
            ?>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                        <img src="<?php echo substr($satirYasam['foto'], 3); ?>" alt="<?php echo $satirYasam['altetiketi']; ?>" class="img-fluid">
                                <a href="saglik-content.php?id=<?php echo $satirYasam['id']; ?>"><i><?php echo $satirYasam['baslik']; ?></i></a>
                        </div>
                    </div>
                </div>
                <?php
                }
            }
            ?>
            </div>
        </div>
    </section>
    <!--İçerik 2 Section End  -->
<?php require_once('footer.php'); ?>  