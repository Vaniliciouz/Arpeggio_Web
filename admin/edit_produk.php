<?php
include '../config/db.php';
session_start();

// Check if the admin is logged in
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

// Check if 'id' is present in the URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Retrieve the product details to edit
    $stmt = $pdo->prepare("SELECT * FROM produk_gitar WHERE id = ?");
    $stmt->execute([$id]);
    $produk = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$produk) {
        echo "Produk tidak ditemukan.";
        exit();
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Get updated values from form
        $nama = $_POST['nama'];
        $harga = $_POST['harga'];
        $deskripsi = $_POST['deskripsi'];
        $stok = $_POST['stok'];
        $image_url = $produk['image_url']; // Default to current image

        // Validate inputs
        if ($harga <= 0 || $stok < 0) {
            echo "Harga dan stok harus bernilai positif.";
            exit();
        }

        // Check if a new image was uploaded
        if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
            $target_dir = "../assets/guitar/";
            if (!is_dir($target_dir)) {
                mkdir($target_dir, 0777, true);
            }

            $target_file = $target_dir . basename($_FILES["image"]["name"]);
            $uploadOk = 1;

            // Validate image file
            $allowed_mime_types = ['image/jpeg', 'image/png', 'image/gif'];
            $file_mime_type = mime_content_type($_FILES['image']['tmp_name']);

            if (!in_array($file_mime_type, $allowed_mime_types)) {
                echo "File harus berupa gambar (JPEG, PNG, GIF).";
                $uploadOk = 0;
            }

            if ($uploadOk && move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                $image_url = 'assets/guitar/' . basename($_FILES["image"]["name"]);
            } else {
                echo "Sorry, there was an error uploading your file.";
                exit();
            }
        }

        // Update product information
        $update_stmt = $pdo->prepare("UPDATE produk_gitar SET nama = ?, harga = ?, deskripsi = ?, stok = ?, image_url = ? WHERE id = ?");
        $update_stmt->execute([$nama, $harga, $deskripsi, $stok, $image_url, $id]);

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
    <link rel="stylesheet" type="text/css" href="style.css">
    <script>
        function previewImage(event) {
            const preview = document.getElementById('preview');
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                };
                reader.readAsDataURL(file);
            } else {
                preview.src = "";
                preview.style.display = 'none';
            }
        }
    </script>
</head>
<body>
    <form class="input-form" method="post" enctype="multipart/form-data">
        <h1>Edit Produk</h1>
        Nama:<br>
        <input type="text" name="nama" value="<?= htmlspecialchars($produk['nama']) ?>" required><br>
        Harga:<br>
        <input type="number" name="harga" value="<?= htmlspecialchars($produk['harga']) ?>" required><br>
        Deskripsi:<br>
        <textarea name="deskripsi" required><?= htmlspecialchars($produk['deskripsi']) ?></textarea><br>
        Image:<br>
        <img src="../<?= htmlspecialchars($produk['image_url']) ?>" id="preview" alt="Current Image" style="max-width: 200px; max-height: 200px;"><br>
        <input type="file" name="image" onchange="previewImage(event)"><br>
        Stok:<br>
        <input type="number" name="stok" value="<?= htmlspecialchars($produk['stok']) ?>" required><br>
        <div class="space-between">
            <a class="cancel-button" href="index.php">Kembali</a>
            <button class="submit-button" type="submit">Simpan Perubahan</button>
        </div>
    </form>
</body>
</html>
