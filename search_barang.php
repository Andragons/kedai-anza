<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $search_query = $_POST['search_query'];

    $sql = "SELECT nama_barang FROM barang WHERE nama_barang LIKE '%$search_query%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<div class='barang_option'>" . $row['nama_barang'] . "</div>";
        }
    } else {
        echo "<div class='barang_option'>Barang tidak ditemukan</div>";
    }
}
?>
