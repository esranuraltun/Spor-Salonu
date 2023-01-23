<?php
// <!-- Ayarlar Select Start-->
$iletisim = $db -> prepare('select * from ayarlar order by id desc limit 1');
$iletisim -> execute();
$satirIletisim = $iletisim -> fetch();
// <!-- Ayarlar Select End-->
?>
