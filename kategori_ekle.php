<?php
session_start();
include 'db_baglan.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kategori_adi = $_POST['kategori_adi'];
    $kategori_aciklama = $_POST['kategori_aciklama']; // Açıklama ekleme kısmı

    // Veritabanına kategori ekleme
    $sql = "INSERT INTO categories (name, description) VALUES ('$kategori_adi', '$kategori_aciklama')";

    if ($conn->query($sql) === TRUE) {
        echo "Kategori başarıyla eklendi.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategori Ekle</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <header>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#">Kategori Ekle</a>
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
        <h2>Yeni Kategori Ekle</h2>
        <form method="post">
            <div class="form-group">
                <label for="kategoriAdi">Kategori Adı:</label>
                <input type="text" class="form-control" id="kategoriAdi" name="kategori_adi" required>
            </div>
            <div class="form-group">
                <label for="kategoriAciklama">Açıklama:</label>
                <textarea class="form-control" id="kategoriAciklama" name="kategori_aciklama" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Kaydet</button>
        </form>
    </div>

    <!-- Bootstrap ve jQuery JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
