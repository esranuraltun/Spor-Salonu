<?php
require_once('header.php');
$id = $_GET['id'];
$sorgu_sayfaSil = $db->prepare('delete from sayfalar where id =?');
$sorgu_sayfaSil->execute(array($id));
if ($sorgu_sayfaSil->rowCount()) {
    echo '<div class ="text-center alert alert-dark">Sayfa Silindi.</div><meta http-equiv="refresh" content="2; url=sayfalar.php">';
} else {
    echo '<div class ="text-center alert alert-danger">Hata Oluştu. Tekrar Deneyiniz.</div><meta http-equiv="refresh" content="2; url=sayfalar.php">';
}
require_once('footer.php');
?>