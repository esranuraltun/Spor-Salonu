<?php
require_once('header.php');
$saglik = $db -> prepare('select * from ayarlar order by id desc limit 1');
$saglik -> execute();
$satirSaglik = $saglik->fetch();
?>
<!-- Banner Section Start -->
<section id="yasamBanner" style="background-image:url('<?php echo substr($satirSaglik['saglikBanner'], 3); ?>') ;">
        <div class="container py-20">
            <div class="row">
                <div class="col-12 text-white">
                    <h1 class="display-4">Sağlık ve Yaşam</h1>
                    <small><a href="saglik-content.php" class="text-white">Ana Sayfa</a> > Sağlık ve Yaşam</small>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner Section End -->
    <!-- İçerik Section Start -->
       <section id="yasamIcerik">
        <div class="container mt-4">
            <div class="row">
            <?php
            $saglikList = $db->prepare('select * from yazilar order by id desc');
            $saglikList->execute();

            if ($saglikList->rowCount()) {
                foreach ($saglikList as $satirsaglikList) {
            ?>
                <div class="col-md-6">
                       <div class="row m-4">
                       <div class="col-md-6">
                        <a href="saglik-content.php?id=<?php echo $satirsaglikList['id']; ?>">
                          <img src="<?php echo substr($satirsaglikList['foto'],3); ?>" alt="<?php echo $satirsaglikList['altetiketi']; ?>" class="img-fluid">
                        </div>
                        <div class="col-md-6"><a href="saglik-content.php"><i><?php echo $satirsaglikList['baslik'];?></i></a><br>
                            <small class="text-muted"><?php echo $satirsaglikList['tarih']; ?></small> <br>
                           <small><?php echo $satirsaglikList['meta']; ?></small>
                        </div>
                       </div>
                        </div>
                   
                    <?php
                }
            }
            ?>
        </div>
    </section>
    <!-- İçerik Section End -->
    <?php require_once('footer.php'); ?>