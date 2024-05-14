<?php
include 'koneksi.php';

$barang = $_POST['barang'];
$harga = $_POST['harga'];

$sql = "INSERT INTO barang (nama_barang, harga) VALUES ('$barang', '$harga')";

if(mysqli_query($conn, $sql)) {
    mysqli_close($conn);
    echo '<script>alert("Barang berhasil ditambahkan!"); window.location.href = "index.php";</script>';
    exit();
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
