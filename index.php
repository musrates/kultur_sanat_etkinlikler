<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ana Sayfa</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa; /* Arka plan rengi */
            color: #333; /* Metin rengi */
        }
        .navbar-brand, .nav-link {
            color: #333 !important; /* Menü metin rengi */
        }
        .container {
            text-align: center;
            margin-top: 100px;
        }
        h1 {
            color: #007bff; /* Başlık rengi */
        }
        p {
            font-size: 18px;
        }
        @media (max-width: 768px) {
            .container {
                margin-top: 50px;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Kültür ve Sanat Portalı</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="giris.php">Giriş Yap</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="kayit.php">Kayıt Ol</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <h1>Hoş Geldiniz!</h1>
        <p>Kültür ve sanat etkinliklerine dair bilgileri bulabileceğiniz portalımıza hoş geldiniz. Üye girişi yaparak etkinlikleri inceleyebilirsiniz.</p>
    </div>

    <!-- Bootstrap JS ve jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Özel JavaScript kodları buraya gelebilir -->
</body>
</html>
