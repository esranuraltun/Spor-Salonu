<?php 
require_once('header.php'); 
$id = $_GET['id'];
$sorgu_katesil = $db -> prepare('delete from kategoriler where id=?');
$sorgu_katesil -> execute(array($id));

if($sorgu_katesil -> rowCount()){
    echo '<div class="alert alert-dark">Kayıt Silinmiştir</div><meta http-equiv="refresh" content="3; url=kategoriler.php">';
} else{
    echo '<div class="alert alert-danger">Hata Oluştu. Tekrar deneyiniz.</div><meta http-equiv="refresh" content="3; url=kategoriler.php">';
}



require_once('footer.php') ;
?>
