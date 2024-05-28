<?php
session_start(); // Kullanıcı oturumu başlat

// Veritabanı bağlantısını içeri aktar
include 'db_baglan.php';

// Tüm kategorileri veritabanından al
$sql = "SELECT * FROM categories";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kültür ve Sanat Etkinlikleri</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <header>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#">Ana Sayfa</a>
            <!-- Navbar links -->
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <?php
                    // Kullanıcı giriş yapmışsa çıkış bağlantısını göster
                    if (isset($_SESSION['username'])) {
                        echo '<li class="nav-item"><a class="nav-link" href="cikis.php">Çıkış</a></li>';
                        echo '<li class="nav-item"><a class="nav-link" href="kategori_ekle.php">Kategori Ekle</a></li>';
                        echo '<li class="nav-item"><a class="nav-link" href="kategori_sil.php">Kategori Sil</a></li>';
                    } else {
                        // Kullanıcı giriş yapmamışsa giriş ve kayıt bağlantılarını göster
                        echo '<li class="nav-item"><a class="nav-link" href="giris.php">Giriş Yap</a></li>';
                        echo '<li class="nav-item"><a class="nav-link" href="kayit.php">Kayıt Ol</a></li>';
                    }
                    ?>
                </ul>
            </div>
        </nav>
    </header>

    <div class="container mt-5">
        <h2>Kategoriler</h2>
        <div class="row">
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    ?>
                    <div class="col-md-4">
                        <div class="card mb-4">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row['name']; ?></h5>
                                <a href="etkinlik_listele.php?kategori_id=<?php echo $row['id']; ?>" class="btn btn-primary">Etkinlikleri Gör</a>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo "<p class='text-center'>Henüz kategori bulunmamaktadır.</p>";
            }
            ?>
        </div>
    </div>

    <!-- Bootstrap ve jQuery JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
