<?php
require_once('header.php');
$id = $_GET['id'];
$hizmet = $db->prepare('select * from hizmetler where id=?');
$hizmet->execute(array($id));
$satirHizmet = $hizmet->fetch();
?>

<!-- Banner Section Start -->
<section id="hizmetBanner" class="py-20" style="background-image:url('<?php echo substr($satirHizmet["banner"], 3); ?>') ; background-size: cover; background-position: center center; background-repeat: no-repeat;">
    <div class="container">
        <div class="row">
            <div class="col-12 text-left text-white">
                <h1 class="display-4"><?php echo $satirHizmet['baslik']; ?></h1>
                <small><a href="index.php" class="text-white">Ana Sayfa</a> > <?php echo $satirHizmet['baslik'] ; ?></small>
            </div>
        </div>
    </div>
</section>
<!-- Banner Section End -->

<!-- Content Section Start -->
<section id="content" class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-12 text-justify">
                <?php echo $satirHizmet['icerik']; ?>
            </div>
        </div>
    </div>
</section>
<!-- Content Section End -->

<?php require_once('footer.php'); ?>