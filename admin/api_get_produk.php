<?php
// Konfigurasi database
include '../config/db.php';

// Atur header untuk mengembalikan JSON
header('Content-Type: application/json');

try {
    // Query untuk mengambil data produk yang diperlukan
    $stmt = $pdo->prepare("
        SELECT produk_gitar.nama, produk_gitar.harga, produk_gitar.deskripsi, produk_gitar.image_url, produk_gitar.stok, admins.nama AS admin_name
        FROM produk_gitar
        JOIN admins ON produk_gitar.admin_id = admins.id
    ");
    $stmt->execute();

    // Ambil hasil query sebagai array
    $produk_gitar = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Kembalikan data sebagai JSON
    echo json_encode($produk_gitar, JSON_PRETTY_PRINT);

} catch (Exception $e) {
    // Tangani error jika terjadi masalah
    echo json_encode(['error' => 'Gagal mengambil data: ' . $e->getMessage()]);
}

exit();
