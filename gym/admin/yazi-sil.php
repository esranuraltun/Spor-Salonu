<?php
 require_once('header.php');
 $id = $_GET['id'];
 $sorgu_yaziSil = $db -> prepare('delete from yazilar where id=?');
 $sorgu_yaziSil ->execute(array($id));
 if($sorgu_yaziSil-> rowCount()){
    echo '<div class ="text-center alert alert-dark">Yazı Silindi.</div><meta http-equiv="refresh" content="2; url=yazilar.php">';
 } else '<div class ="text-center alert alert-danger">Hata Oluştu. Tekrar Deneyiniz.</div><meta http-equiv="refresh" content="2; url=yazilar.php">';
 
  require_once('footer.php') ;
  ?>
  