<?php
session_start();
include 'db_baglan.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kategori_adi = $_POST['kategori_adi'];
    
    // Resim dosyasını yükleme
    $resim_yolu = 'kategori_images/' . basename($_FILES['resim']['name']);
    if (move_uploaded_file($_FILES['resim']['tmp_name'], $resim_yolu)) {
        // Resim başarıyla yüklendi, veritabanına ekleme işlemi yapabilirsiniz
        $sql = "INSERT INTO kategoriler (kategori_adi, resim_yolu) VALUES ('$kategori_adi', '$resim_yolu')";
        if ($conn->query($sql) === TRUE) {
            echo "Kategori başarıyla eklendi.";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        // Resim yüklenemedi
        echo "Resim yüklenirken bir hata oluştu.";
    }
}
?>
