<?php
header('Content-Type: application/json'); // Set header agar aplikasi menerima JSON

include '../config/db.php';
session_start(); // Memulai sesi untuk menyimpan data session

// Cek apakah permintaan adalah POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = md5($_POST['password']); // Enkripsi password dengan MD5 (sesuaikan dengan logika Anda sebelumnya)

    // Mencari admin dengan username dan password
    $stmt = $pdo->prepare("SELECT * FROM admins WHERE username = ? AND password = ?");
    $stmt->execute([$username, $password]);
    $admin = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($admin) {
        // Jika login berhasil, simpan admin_id dalam sesi
        $_SESSION['admin_id'] = $admin['id']; // Menyimpan admin_id di sesi

        // Kirimkan response JSON dengan status success
        echo json_encode([
            'success' => true,
            'message' => 'Login successful',
            'admin' => [
                'username' => $admin['username'],
                'id' => $admin['id'],
            ],
        ]);
    } else {
        // Jika login gagal, kirimkan response JSON dengan status error
        echo json_encode([
            'success' => false,
            'message' => 'Invalid username or password',
        ]);
    }
} else {
    // Jika bukan metode POST, kirimkan error method
    echo json_encode([
        'success' => false,
        'message' => 'Invalid request method',
    ]);
}
