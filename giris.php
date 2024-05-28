<?php
// Oturumu başlat
session_start();

// Eğer kullanıcı zaten giriş yapmışsa, ana sayfaya yönlendir
if (isset($_SESSION['username'])) {
    header("Location: ana_sayfa.php");
    exit();
}

// Veritabanı bağlantısını içeri aktar
include 'db_baglan.php';

// Formdan gelen verileri al
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Kullanıcı adı ve şifreyi kontrol et
        $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Kullanıcı adı ve şifre doğruysa oturum değişkenlerini ayarla
            $_SESSION['username'] = $username;
            header('Location: ana_sayfa.php');
            exit();
        } else {
            // Yanlış kullanıcı adı veya şifre durumunda hata mesajı göster
            $error_message = "Yanlış kullanıcı adı veya şifre.";
        }
    } else {
        // Kullanıcı adı veya şifre alanlarının doldurulmadığı durumda hata mesajı göster
        $error_message = "Kullanıcı adı ve şifre alanları doldurulmalıdır.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giriş Yap</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Giriş Yap</div>
                    <div class="card-body">
                        <?php if (isset($error_message)) : ?>
                            <div class="alert alert-danger"><?php echo $error_message; ?></div>
                        <?php endif; ?>
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                            <div class="form-group">
                                <label for="username">Kullanıcı Adı:</label>
                                <input type="text" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Şifre:</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Giriş Yap</button>
                        </form>
                        <div class="mt-3 text-center">
                            Henüz üye değil misiniz? <a href="kayit.php">Kayıt Ol</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
