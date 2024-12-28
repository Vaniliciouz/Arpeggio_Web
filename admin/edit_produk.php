<?php
include '../config/db.php';
session_start();

// Check if 'id' is present in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Retrieve the product details to edit
    $stmt = $pdo->prepare("SELECT * FROM produk_gitar WHERE id = ?");
    $stmt->execute([$id]);
    $produk = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Get updated values from form
        $nama = $_POST['nama'];
        $harga = $_POST['harga'];
        $deskripsi = $_POST['deskripsi'];
        $stok = $_POST['stok'];

        // Update product information
        $update_stmt = $pdo->prepare("UPDATE produk_gitar SET nama = ?, harga = ?, deskripsi = ?, stok = ? WHERE id = ?");
        $update_stmt->execute([$nama, $harga, $deskripsi, $stok, $id]);

        // Redirect to the product list page after successful update
        header("Location: index.php");
        exit();
    }
} else {
    // If no 'id' parameter is passed, redirect to the product list page
    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk</title>
</head>
<body>
    <h1>Edit Produk</h1>
    <?php if ($produk): ?>
        <form action="edit_produk.php?id=<?= htmlspecialchars($produk['id']) ?>" method="POST">
            <label for="nama">Nama:</label>
            <input type="text" id="nama" name="nama" value="<?= htmlspecialchars($produk['nama']) ?>" required><br><br>
            
            <label for="harga">Harga:</label>
            <input type="number" id="harga" name="harga" value="<?= htmlspecialchars($produk['harga']) ?>" required><br><br>
            
            <label for="deskripsi">Deskripsi:</label>
            <textarea id="deskripsi" name="deskripsi" required><?= htmlspecialchars($produk['deskripsi']) ?></textarea><br><br>
            
            <label for="stok">Stok:</label>
            <input type="number" id="stok" name="stok" value="<?= htmlspecialchars($produk['stok']) ?>" required><br><br>
            
            <button type="submit">Update</button>
        </form>
    <?php else: ?>
        <p>Produk tidak ditemukan.</p>
    <?php endif; ?>
</body>
</html>
