<?php require_once('header.php'); 
$uyelik = $db -> prepare('select * from ayarlar order by id desc limit 1');
$uyelik -> execute();
$satirUyelik = $uyelik->fetch();
?>
 <!-- Banner Section Start -->
 <section id="uyelikBanner" style="background-image:url('<?php echo substr($satirUyelik['uyelikBanner'], 3); ?>') ;">
        <div class="container py-20">
            <div class="row">
                <div class="col-12 text-white">
                    <h1 class="display-4">Üyelik</h1>
                    <small><a href="index.php" class="text-white">Ana Sayfa</a> > Üyelik</small>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner Section End -->
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
    <!-- İçerik Section Start -->
    <section id="uyelikIcerik">
        <div class="container mt-4">
            <div class="row">
            <?php
            $uyelikList = $db->prepare('select * from paketler order by id desc');
            $uyelikList->execute();

            if ($uyelikList->rowCount()) {
                foreach ($uyelikList as $satiruyelikList) {
            ?>
                <div class="col-md-6">
                    <div class="card"><img src="<?php echo substr($satiruyelikList['foto'],3); ?>" class="img-fluid" alt="Gym">
                        <div class="card-body">
                            <h2><?php echo $satiruyelikList['baslik']; ?></h2>
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


<?php require_once('footer.php'); ?>