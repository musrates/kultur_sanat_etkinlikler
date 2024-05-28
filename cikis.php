<?php
// Oturumu başlat
session_start();

// Oturumu sonlandır
session_destroy();

// Kullanıcıyı ana sayfaya yönlendir
header("Location: ana_sayfa.php");
exit;
?>
