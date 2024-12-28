<?php
include '../config/db.php';
session_start();

// Pastikan admin sudah login
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

// Pastikan parameter ID menu ada
if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit();
}

$produk_id = $_GET['id'];

// Ambil informasi menu sebelum dihapus
$stmt_produk = $pdo->prepare("SELECT * FROM produk_gitar WHERE id = ?");
$stmt_produk->execute([$produk_id]);
$produk = $stmt_produk->fetch(PDO::FETCH_ASSOC);

// Jika menu tidak ditemukan, redirect ke halaman index
if (!$produk) {
    header("Location: index.php");
    exit();
}

// Hapus menu dari database
$stmt_delete = $pdo->prepare("DELETE FROM produk_gitar WHERE id = ?");
$stmt_delete->execute([$produk_id]);

// Redirect kembali ke halaman index
header("Location: index.php");
exit();
?>
