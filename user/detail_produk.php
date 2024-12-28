<?php
include '../config/db.php';

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit();
}

$produk_id = $_GET['id'];

if (empty($produk_id)) {
    header("Location: index.php");
    exit();
}

$stmt_produk = $pdo->prepare("SELECT * FROM produk_gitar WHERE id = ?");
$stmt_produk->execute([$produk_id]);
$produk = $stmt_produk->fetch(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html>
<head>
    <title>Detail Produk</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .menu-info img {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
            margin-bottom: 10px;
        }
        .menu-info p {
            margin: 5px 0;
        }
        .ulasan {
            border-top: 1px solid #ddd;
            padding-top: 20px;
            margin-top: 20px;
        }
        .ulasan h3 {
            margin-bottom: 10px;
        }
        .ulasan .ulasan-item {
            margin-bottom: 10px;
        }
        .ulasan .nama {
            font-weight: bold;
        }
        .back-link {
            display: block;
            margin-top: 20px;
            text-align: center;
            color: #007bff;
            text-decoration: none;
        }
        .back-link:hover {
            text-decoration: underline;
        }
        form {
            margin-top: 20px;
        }
        form label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        form input[type="number"],
        form input[type="text"],
        form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }
        form button {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            font-family: Arial, sans-serif;
            transition: background-color 0.3s ease;
        }
        form button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="menu-info">
        <h1><?=htmlspecialchars($produk['nama'])?></h1>
        <img src="<?=base_image_url . $produk['image_url']?>" alt="<?=$produk['nama']?>">
        <p><strong>Harga:</strong> <?=htmlspecialchars($produk['harga'])?></p>
        <p><strong>Deskripsi:</strong> <?=htmlspecialchars($produk['deskripsi'])?></p>
        <p><strong>Stok:</strong> <?=htmlspecialchars($produk['stok']) ? 'Tersedia' : 'Kosong'?></p>
    </div>
    <a href="index.php" class="back-link">Kembali ke Menu Utama</a>
</div>
</body>
</html>
