<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_barang = $_POST['nama_barang'];

    $sql = "SELECT harga FROM barang WHERE nama_barang = '$nama_barang'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo $row['harga'];
    } else {
        echo "";
    }
}
?>
