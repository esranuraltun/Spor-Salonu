<?php require_once('header.php');?>

 <!-- Banner Section Start -->
 <section id="iletisimBanner" style="background-image:url('<?php echo substr($satirIletisim['iletisimBanner'], 3); ?>') ;">
        <div class="container py-20">
            <div class="row">
                <div class="col-12 text-white">
                    <h1 class="display-4">İletişim</h1>
                    <small><a href="index.php" class="text-white">Ana Sayfa</a> > İletişim</small>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner Section End -->
     <!-- İçerik Section Start -->
    <section id="iletisimIcerik">
        <div class="container py-5">
            <div class="row mt-4">
                <div class="col-12 text-center">
                    <h4 class="display-4">İletişim Bilgileri</h4>
                </div>
            </div>
            <div class="row text-center mt-2">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                        <i class="bi bi-telephone" style="font-size: 35px;"></i> <br>
                        <b>Telefon</b> <br>
                            <a href="tel:+9<?php echo $satirIletisim['telefon']; ?>" class="text-decoration-none"><i><?php echo $satirIletisim['telefon'];?></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                        <i class="bi bi-envelope" style="font-size: 35px;"></i> <br>  
                        <b>E-Posta</b> <br>  
                        <a href="mailto:<?php echo $satirIletisim['email'];?>" class="text-decoration-none"><i><?php echo $satirIletisim['email']; ?></i>
                                
                            </a></div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                        <i class="bi bi-geo-alt" style="font-size: 35px;"></i><br>
                        <b>Konum</b> <br>
                            <?php echo $satirIletisim['adres'];?>
                            </a></div>
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
                <div class="col-md-4"> <a class="btn btn-dark">Abone Ol</a> </div>
            </div>
        </div>
    </section>
    <!-- İnfo Section End -->
     <!-- İletişim Form Section Start -->
     <section id="iletisimForm" class="bg-dark">
        <div class="container mt-4">
            <div class="row text-white text-center">
                <div class="col-12">
                    <h4 class="display-4">Bize Ulaşın</h4>
                </div>
            </div>
            <div class="row p-4 mt-2">
                <div class="col-md-6">
                    <form method="POST" class="form">
                        <div class="form-group">
                            <input type="text" name="ad" placeholder="Ad Soyad" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="tel" name="telefon" placeholder="Telefon" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" placeholder="E-Posta" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="text" name="konu" placeholder="Konu" class="form-control">
                        </div>
                    </form>
                </div>
                <div class="col-md-6">
                   <form method="POST" class="form">
                        <div class="form-group">
                            <textarea name="mesajiniz" placeholder="Mesajınız" rows="6" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                        <input type="submit" value="Gönder" class="btn btn-dark w-100">
                        </div>
                        </form>

                </div>
            </div>
        </div>
    </section>
    <!-- İletişim Form Section End -->


<?php require_once('footer.php'); ?>