<?php
// Koneksi ke database
include 'koneksi.php';

$id_barang = $_POST['id'];
$query = "DELETE FROM barang WHERE id = $id_barang";

if (mysqli_query($conn, $query)) {
    echo '<script>alert("Barang berhasil dihapus!!"); window.location.href = "index.php";</script>';
    exit();
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

mysqli_close($conn);
?>
