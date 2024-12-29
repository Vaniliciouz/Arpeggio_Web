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

if (!$produk) {
    echo "Produk tidak ditemukan.";
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['beli'])) {
    if ($produk['stok'] > 0) {
        $new_stok = $produk['stok'] - 1;
        $update_stok = $pdo->prepare("UPDATE produk_gitar SET stok = ? WHERE id = ?");
        $update_stok->execute([$new_stok, $produk_id]);
        $produk['stok'] = $new_stok; // Update the local variable
        $message = "Berhasil membeli produk!";
    } else {
        $message = "Stok habis!";
    }
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Detail Produk</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 42px;
            padding: 2px;
            background-color: #f4f4f4;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .container {
            max-width: 800px;
            width: 100%;
            background-color: #ffffff;
            padding: 20px 10px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        .produk-info table {
            border-collapse: collapse;
            padding-inline: 2%;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .produk-info th,
        .produk-info td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }
        .produk-info th {
            background-color: #f8f9fa;
            color: #333;
        }
        .produk-info td {
            background-color: #f9f9f9;
        }
        .produk-info img {
            max-width: 40%;
            height: auto;
            border-radius: 8px;
            margin-bottom: 15px;
        }
        .produk-info h1 {
            font-size: 40px;
            font-weight: 800;
            margin: 10px 15%;
            color: #FEA508;
         }
         .button-container {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
            padding-inline: 2%;
        }
        .back-button,
        .beli-button {
            padding: 15px 30px;
            border-radius: 6px;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            border: none;
        }
        .beli-button {
            background-color: #28a745;
            color: #ffffff;
        }
        .beli-button:hover {
            background-color: #218838;
        }
        .back-button {
            background-color: #6c757d;
            color: #ffffff;
        }
        .back-button:hover {
            background-color: #5a6268;
        }
        .message {
            margin-top: 20px;
            text-align: center;
            padding: 10px;
            font-weight: bold;
            color: #28a745;
            background-color: #e9f7ef;
            border: 1px solid #28a745;
            border-radius: 4px;
        }
        @media (max-width: 768px) {
            .container {
                padding: 15px 20px;
            }

            .produk-info h1 {
                font-size: 1.5em;
            }

            .back-button,
            .beli-button {
                font-size: 14px;
                padding: 8px 16px;
            }
        }
    </style>
</head>
<body>
<div class="container">
    <div class="produk-info">
        <h1><?=htmlspecialchars($produk['nama'])?></h1>
        <img src="/Arpeggio_Web/<?=htmlspecialchars($produk['image_url'])?>" alt="<?=$produk['nama']?>">
        <table>
                <tr>
                    <th>Harga</th>
                    <td>Rp <?=number_format($produk['harga'], 0, ',', '.')?></td>
                </tr>
                <tr>
                    <th>Deskripsi</th>
                    <td><?=htmlspecialchars($produk['deskripsi'])?></td>
                </tr>
                <tr>
                    <th>Stok</th>
                    <td><?=htmlspecialchars($produk['stok'])?></td>
                </tr>
            </table>
    </div>
    <form method="POST">
    <div class="button-container">
            <button type="button" class="back-button" onclick="window.location.href='index.php';">Kembali ke Menu Utama</button>
            <button type="submit" name="beli" class="beli-button">Beli</button>
        </div>
    </form>
    <?php if (isset($message)): ?>
        <div class="message"><?=htmlspecialchars($message)?></div>
    <?php endif;?>
</div>
</body>
</html>
