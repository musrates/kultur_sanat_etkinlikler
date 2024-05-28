<?php
// Veritabanı bağlantısını içeri aktar
include 'db_baglan.php';

// Form gönderildiğinde işlemleri yap
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $silKategoriAdi = $_POST['silKategoriAdi'];

    // İlgili kategoriye ait etkinlikleri sil
    $sql_delete_etkinlik = "DELETE FROM etkinlik WHERE category_id = $silKategoriAdi";
    if ($conn->query($sql_delete_etkinlik) === TRUE) {
        // Kategoriyi veritabanından sil
        $sql_delete_category = "DELETE FROM categories WHERE id = $silKategoriAdi";
        if ($conn->query($sql_delete_category) === TRUE) {
            echo "Kategori başarıyla silindi.";
        } else {
            echo "Hata: " . $sql_delete_category . "<br>" . $conn->error;
        }
    } else {
        echo "Hata: " . $sql_delete_etkinlik . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kategori Sil</title>
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <header>
        <!-- Navbar -->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#">Kategori Sil</a>
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
        <h2>Kategori Sil</h2>
        <form method="post" action="kategori_sil.php">
            <div class="form-group">
                <label for="silKategoriAdi">Silinecek Kategori Adı:</label>
                <select class="form-control" id="silKategoriAdi" name="silKategoriAdi">
                    <?php
                    // Kategorileri al
                    $sql = "SELECT * FROM categories";
                    $result = $conn->query($sql);
                    if ($result->num_rows > 0) {
                        while($row = $result->fetch_assoc()) {
                            echo "<option value='{$row['id']}'>{$row['name']}</option>";
                        }
                    } else {
                        echo "<option disabled>Kategori Bulunamadı</option>";
                    }
                    ?>
                </select>
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
