<?php
// Veritabanı bağlantısını içeri aktar
include 'db_baglan.php';

// Form gönderildiğinde işlemleri yap
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $silEtkinlikAdi = $_POST['silEtkinlikAdi'];

    // Etkinliği veritabanından sil
    $sql = "DELETE FROM etkinlik WHERE title = '$silEtkinlikAdi'";
    if ($conn->query($sql) === TRUE) {
        echo "Etkinlik başarıyla silindi.";
    } else {
        echo "Hata: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Etkinlik Sil</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <header>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#">Etkinlik Sil</a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="ana_sayfa.php">Ana Sayfa</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <div class="container mt-5">
        <h2>Etkinlik Sil</h2>
        <form method="post" action="etkinlik_sil.php">
            <div class="form-group">
                <label for="silEtkinlikAdi">Silinecek Etkinlik Başlığı:</label>
                <input type="text" class="form-control" id="silEtkinlikAdi" name="silEtkinlikAdi" required>
            </div>
            <button type="submit" class="btn btn-danger">Sil</button>
        </form>
    </div>

    <!-- Bootstrap ve jQuery JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
