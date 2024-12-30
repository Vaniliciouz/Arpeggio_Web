<?php
include '../config/db.php';
session_start();

class RestAPI
{
    public function getProdukGitar($id = 0)
    {
        global $pdo;

        // Query untuk mengambil data produk gitar tanpa admin_id
        $query = "
        SELECT
            produk_gitar.id,
            produk_gitar.nama,
            produk_gitar.harga,
            produk_gitar.deskripsi,
            produk_gitar.image_url,
            produk_gitar.stok
        FROM produk_gitar
        ";

        // Tambahkan kondisi untuk ID jika diberikan
        if ($id != 0) {
            $query .= " WHERE produk_gitar.id = :id LIMIT 1";
        }

        // Siapkan query menggunakan PDO
        $stmt = $pdo->prepare($query);

        // Bind parameter jika ada
        if ($id != 0) {
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        }

        // Eksekusi query
        $stmt->execute();

        // Ambil hasil query dan kembalikan sebagai array
        $response = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Format harga menjadi format rupiah
        foreach ($response as &$produk) {
            $produk['harga'] = "Rp " . number_format($produk['harga'], 0, ',', '.');
        }

        return $response; // Jangan gunakan echo
    }

    public function getProdukGitarAsJSON($id = 0)
    {
        $data = $this->getProdukGitar($id); // Panggil fungsi yang mengembalikan array
        echo json_encode($data);
    }

    public function insertProdukGitar()
    {
        global $pdo;

        // Memastikan data yang diperlukan ada
        if (!empty($_POST['nama']) && !empty($_POST['harga']) && !empty($_POST['deskripsi']) && !empty($_POST['stok']) && !empty($_FILES['image']['name'])) {
            $nama = $_POST['nama'];
            $harga = $_POST['harga'];
            $deskripsi = $_POST['deskripsi'];
            $stok = $_POST['stok'];

            // Validasi harga dan stok
            if ($harga <= 0 || $stok < 0) {
                echo json_encode(["status" => 0, "message" => "Harga dan stok harus bernilai positif."]);
                return;
            }

            // Menyusun direktori tujuan upload gambar
            $target_dir = 'assets/guitar/';
            if (!is_dir($target_dir)) {
                if (!mkdir($target_dir, 0777, true)) {
                    echo json_encode(["status" => 0, "message" => "Error: Tidak dapat membuat direktori $target_dir"]);
                    return;
                }
            }

            $target_file = $target_dir . basename($_FILES["image"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            // Validasi jenis file gambar
            $allowed_mime_types = ['image/jpeg', 'image/png', 'image/gif'];
            $file_mime_type = mime_content_type($_FILES['image']['tmp_name']);

            if (!in_array($file_mime_type, $allowed_mime_types)) {
                echo json_encode(["status" => 0, "message" => "File harus berupa gambar (JPEG, PNG, GIF)."]);
                $uploadOk = 0;
            }

            // Jika validasi gambar lulus, lanjutkan upload
            if ($uploadOk && move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                $image_url = $target_dir . basename($_FILES["image"]["name"]);

                // Persiapkan query untuk insert data ke database
                $stmt = $pdo->prepare("INSERT INTO produk_gitar (nama, harga, deskripsi, image_url, stok) VALUES (?, ?, ?, ?, ?)");

                // Eksekusi query untuk menyimpan data
                if ($stmt->execute([$nama, $harga, $deskripsi, $image_url, $stok])) {
                    echo json_encode(["status" => 1, "message" => "Produk berhasil ditambahkan."]);
                } else {
                    echo json_encode(["status" => 0, "message" => "Error: Tidak dapat menambahkan produk."]);
                }
            } else {
                echo json_encode(["status" => 0, "message" => "Terjadi kesalahan saat meng-upload file gambar."]);
            }
        } else {
            echo json_encode(["status" => 0, "message" => "Semua field harus diisi, termasuk gambar."]);
        }
    }

    public function updateProdukGitar($data)
    {
        global $pdo;
        // Validasi apakah semua data yang diperlukan telah diisi
        if (
            !empty($data['id']) &&
            !empty($data['nama']) &&
            !empty($data['harga']) &&
            isset($data['stok']) && // Stok bisa 0, maka gunakan isset
            isset($data['deskripsi']) // Deskripsi bisa kosong, maka gunakan isset
        ) {
            $id = intval($data['id']);
            $nama = $data['nama'];
            $harga = $data['harga'];
            $stok = intval($data['stok']);
            $deskripsi = $data['deskripsi'];

            // Query untuk memperbarui data
            $query = "UPDATE produk_gitar SET
                    nama = :nama,
                    harga = :harga,
                    stok = :stok,
                    deskripsi = :deskripsi
                  WHERE id = :id";
            $stmt = $pdo->prepare($query);

            // Bind parameter ke query
            $stmt->bindParam(':nama', $nama);
            $stmt->bindParam(':harga', $harga);
            $stmt->bindParam(':stok', $stok);
            $stmt->bindParam(':deskripsi', $deskripsi);
            $stmt->bindParam(':id', $id);

            // Eksekusi query dan periksa hasilnya
            if ($stmt->execute()) {
                echo json_encode(["status" => 1, "message" => "Produk berhasil diperbarui"]);
            } else {
                echo json_encode(["status" => 0, "message" => "Terjadi kesalahan pada database"]);
            }
        } else {
            // Jika data tidak lengkap, kembalikan pesan error
            echo json_encode(["status" => 0, "message" => "Semua kolom wajib diisi"]);
        }
    }

    public function deleteProdukGitar($id)
    {
        global $pdo;
        $query = "DELETE FROM produk_gitar WHERE id = :id";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {
            echo json_encode(["status" => 1, "message" => "Produk berhasil dihapus"]);
        } else {
            echo json_encode(["status" => 0, "message" => "Database error"]);
        }
    }
}
