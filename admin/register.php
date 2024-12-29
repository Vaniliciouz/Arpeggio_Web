<?php
include '../config/db.php';
session_start();

if (isset($_SESSION['admin'])) {
    $admin_id = $_SESSION['admin']['id'];
    $username = $_SESSION['admin']['username'];

    $stmt = $pdo->prepare("SELECT * FROM admins WHERE username = ? AND id = ?");
    $stmt->execute([$username, $admin_id]);
    $admin = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($admin) {
        header("Location: index.php");
        exit();
    }
}

// Menghandle form registrasi
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $nama = $_POST['nama'];
    $password = md5($_POST['password']);

    // Cek apakah username sudah ada
    $stmt = $pdo->prepare("SELECT * FROM admins WHERE username = ?");
    $stmt->execute([$username]);
    $existingUser = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($existingUser) {
        // Jika username sudah ada, kirimkan respons error
        echo json_encode([
            "success" => false,
            "message" => "Username sudah terdaftar."
        ]);
        exit();
    }

    // Jika username belum ada, lanjutkan proses registrasi
    $adminId = 'admin-' . time();
    $stmt = $pdo->prepare("INSERT INTO admins (id, username, nama, password) VALUES (?, ?, ?, ?)");
    if ($stmt->execute([$adminId, $username, $nama, $password])) {
        // Registrasi berhasil
        echo json_encode([
            "success" => true,
            "message" => "Registrasi berhasil!"
        ]);
    } else {
        // Error saat memasukkan data
        echo json_encode([
            "success" => false,
            "message" => "Error: Gagal melakukan registrasi."
        ]);
    }
}
?>
