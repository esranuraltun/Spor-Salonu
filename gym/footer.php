 <!-- Footer Section Start -->
 <footer>
        <section id="footer">
            <div class="container mt-4">
                <div class="row">
                    <div class="col-md-3">
                        <small><?php echo $satirIletisim['tanitim'] ;?></small>
                    </div>
                    <div class="col-md-3">
                        <a href="kulubumuz.php"> <i class="bi bi-dot"><small>Kulübümüz</small></i></a><br>
                        <a href="saglik-yaşam.php"><i class="bi bi-dot"><small>Sağlık ve Yaşam</small></i></a><br>
                        <?php
                          $menu = $db->prepare('select * from hizmetler where durum=? order by baslik asc');
                          $menu->execute(array('yayinlandi'));
                                     if ($menu->rowCount()) {
                                      foreach ($menu as $satirMenu) {
                                        ?>
                                      <a href="hizmetler.php?id=<?php echo $satirMenu['id']; ?>"><i class="bi bi-dot"><small><?php echo $satirMenu['baslik']; ?></small></i> <br></a>

                          <?php
                                      }
                                       }

                          ?>

                        <a href="uyelik.php"><i class="bi bi-dot"><small>Üyelik</small></i></a><br>
                        <a href="iletisim.php"><i class="bi bi-dot"><small>İletişim</small></i></a>
                    </div>
                    <div class="col-md-3">
                        <a href="<?php echo $satirIletisim['facebook'];?>" target="_blank"><i class="bi bi-facebook"><small> Facebook</small></i></a><br>
                        <a href="<?php echo $satirIletisim['instagram'];?>" target="_blank"><i class="bi bi-instagram"><small> İnstagram</small></i></a><br>
                        <a href="<?php echo $satirIletisim['twitter'];?>" target="_blank"><i class="bi bi-twitter"><small> Twitter</small></i></a><br>
                        <a href="<?php echo $satirIletisim['whatsapp'];?>" target="_blank"><i class="bi bi-whatsapp"><small> WhatApp</small></i></a>
                    </div>
                    <div class="col-md-3">
                    <i class="bi bi-telephone-fill"></i> <?php echo $satirIletisim['telefon'];?><br>
                    <i class="bi bi-envelope"></i> <?php echo $satirIletisim['email'];?><br>
                    <a><i class="bi bi-shield-exclamation"></i><small> Gizlilik Sözleşmesi</small></a><br>
                    <a><i class="bi bi-shield-exclamation"></i><small> Kişisel Verilerin Korunumu</small></a> 
                    </div>
                </div>
            </div>
        </section>
    </footer>
    <!-- Footer Section End -->


  <!-- Js Files (Jquery -> Popper -> Bootstrap Js) -->
  <script src="js/jquery.slim.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
</body>

</html>