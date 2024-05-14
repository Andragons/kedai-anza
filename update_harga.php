<?php
session_start();

include 'koneksi.php'; // Sisipkan file koneksi

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_barang = $_POST['nama_barang'];
    $harga_baru = $_POST['harga_baru'];

    // Lakukan proses untuk memperbarui harga di database
    $sql = "UPDATE barang SET harga = ? WHERE nama_barang = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ds", $harga_baru, $nama_barang);

    if ($stmt->execute()) {
        // Jika proses berhasil, kirim kembali respons 'success'
        echo 'success';
    } else {
        // Jika terjadi kesalahan, kirim respons 'error'
        echo 'error';
    }
    
    $stmt->close();
} else {
    // Jika request bukan POST, kirim respons 'error'
    echo 'error';
}

// Tutup koneksi tidak diperlukan di sini karena koneksi sudah tertutup otomatis di koneksi.php
?>
