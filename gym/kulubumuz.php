<?php
require_once('header.php');
$kulubumuz = $db -> prepare('select * from kulubumuz order by id desc limit 1');
$kulubumuz -> execute();
$satirKulubumuz = $kulubumuz->fetch();
?>
 <!-- Banner Section Start -->
 <section id="kulubumuzBanner" style="background-image:url('<?php echo substr($satirKulubumuz["bannerGorsel"], 3); ?>') ; background-size: cover; background-position: center center; background-repeat: no-repeat;">
        <div class="container py-20">
            <div class="row">
                <div class="col-12 text-white">
                    <h1 class="display-4">Kulübümüz</h1>
                    <small><a href="index.html" class="text-white">Ana Sayfa</a> > <?php echo $satirKulubumuz['baslik']; ?></small>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner Section End -->
     <!-- İçerik Section Start -->
     <section id="kulubumuzIcerik" class="py-5 mt-4 bg-dark">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center text-white">
                <h2>Kulüplerimiz</h2>
                </div>
                <div class="col-md-4">
                    <div class="card"><img src="<?php echo substr($satirKulubumuz['kulupGorsel1'], 3); ?>" alt="" class="img-fluid">
                        <div class="card-body">
                    <b>Kadıköy</b>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card"><img src="<?php echo substr($satirKulubumuz['kulupGorsel2'], 3); ?>" alt="" class="img-fluid">
                        <div class="card-body">
                    <b>Beşiktaş</b>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card"><img src="<?php echo substr($satirKulubumuz['kulupGorsel3'], 3); ?>" alt="" class="img-fluid">
                        <div class="card-body">
                    <b>Beşiktaş</b>
                        </div>
                    </div>
                </div>
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
                    <form method="get">
                        <div class="form-group">
                            <input type="email" name="email" placeholder="E-Mail Adresiniz" class="form-control">
                        </div>
                    </form>
                </div>
                <div class="col-md-4"> <a href="" class="btn btn-dark">Abone Ol</a> </div>
            </div>
        </div>
    </section>
    <!-- İnfo Section End -->
    <!-- Eğitmenlerimiz Section Start -->
    <section id="egitmenlerimiz" class="py-5 mt-4 bg-dark">
        <div class="container">
            <div class="row mt-4">
                <div class="col-12 text-center text-white">
                    <h2>Eğitmenlerimiz</h2>
                </div>
                <div class="col-md-3"><img src="<?php echo substr($satirKulubumuz['egitmenGorsel1'], 3); ?>" alt="Gym Eğitmen" class="img-fluid" style=" border-radius: 40%;">
                </div>
                <div class="col-md-3"><img src="<?php echo substr($satirKulubumuz['egitmenGorsel2'], 3); ?>" alt="Gym Eğitmen" class="img-fluid" style=" border-radius: 40%;"></div>
                <div class="col-md-3"><img src="<?php echo substr($satirKulubumuz['egitmenGorsel3'], 3); ?>" alt="Gym Eğitmen" class="img-fluid" style=" border-radius: 40%;">
                </div>
                <div class="col-md-3"><img src="<?php echo substr($satirKulubumuz['egitmenGorsel4'], 3); ?>" alt="Gym Eğitmen" class="img-fluid" style=" border-radius: 40%;">
                </div>
            
        </div>
    </section>
    <!-- Eğitmenlerimiz Section End -->
<?php require_once('footer.php'); ?>