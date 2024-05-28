<?php
// Veritabanı bağlantısını içeri aktar
include 'db_baglan.php';

// Formdan gelen verileri al
$username = $_POST['username'];
$password = $_POST['password'];

// Kullanıcı adı ve şifreyi denetle
$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = $conn->query($sql);

// Kullanıcı doğrulama
if ($result->num_rows > 0) {
    // Kullanıcı girişi başarılı, ana sayfaya yönlendir
    header("Location: ana_sayfa.php");
} else {
    // Kullanıcı girişi başarısız, giriş sayfasına geri dön
    header("Location: giris.php");
}

// Veritabanı bağlantısını kapat
$conn->close();
?>
