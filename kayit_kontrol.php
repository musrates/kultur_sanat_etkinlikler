<?php
// Veritabanı bağlantısını içeri aktar
include 'db_baglan.php';

// Formdan gelen verileri al
$username = $_POST['username'];
$password = $_POST['password'];
$email = $_POST['email'];

// Kullanıcı adı veya e-posta adresinin daha önce kullanılıp kullanılmadığını kontrol et
$sql = "SELECT * FROM users WHERE username='$username' OR email='$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Kullanıcı adı veya e-posta zaten mevcut ise hata mesajı göster
    echo "<p class='alert alert-danger'>Kullanıcı adı veya e-posta adresi zaten kullanılmaktadır. Lütfen farklı bir kullanıcı adı veya e-posta adresi deneyin.</p>";
} else {
    // Kullanıcıyı veritabanına ekle
    $sql_insert = "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email')";
    if ($conn->query($sql_insert) === TRUE) {
        echo "<p class='alert alert-success'>Kayıt başarıyla tamamlandı. Şimdi giriş yapabilirsiniz.</p>";
        // Kayıt başarılıysa giriş sayfasına yönlendir
        header("Location: giris.php");
    } else {
        echo "<p class='alert alert-danger'>Kayıt sırasında bir hata oluştu. Lütfen daha sonra tekrar deneyin.</p>";
    }
}

// Veritabanı bağlantısını kapat
$conn->close();
?>
