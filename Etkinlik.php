<?php
include 'db_baglan.php';

class Etkinlik {
    public static function etkinlikListele($kategori_id) {
        global $conn;
        $sql = "SELECT * FROM etkinlik WHERE category_id = '$kategori_id'";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table class='table'>
                    <thead>
                        <tr>
                            <th>Başlık</th>
                            <th>Tarih</th>
                            <th>Yer</th>
                        </tr>
                    </thead>
                    <tbody>";
            // Veritabanından gelen her bir etkinlik için bir tablo satırı oluştur
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>" . $row["title"]. "</td>
                        <td>" . $row["date"]. "</td>
                        <td>" . $row["location"]. "</td>
                    </tr>";
            }
            echo "</tbody></table>";
        } else {
            echo "Henüz etkinlik bulunmamaktadır.";
        }
    }
}
?>
