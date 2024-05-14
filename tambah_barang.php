<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_barang = $_POST['nama_barang'];
    $kuantiti = $_POST['kuantiti'];
    $harga = $_POST['harga'];
    $subtotal = $_POST['subtotal'];

    $barang = array(
        'nama_barang' => $nama_barang,
        'kuantiti' => $kuantiti,
        'harga' => $harga,
        'subtotal' => $subtotal
    );

    $_SESSION['keranjang'][] = $barang;

    // Mengambil index terakhir dari array
    $index = count($_SESSION['keranjang']) - 1;
    // Menampilkan data baru yang ditambahkan ke dalam tabel
    echo "<tr>";
    echo "<td>".($index + 1)."</td>";
    echo "<td>".$nama_barang."</td>";
    echo "<td>".$kuantiti."</td>";
    echo "<td>".$harga."</td>";
    echo "<td>".$subtotal."</td>";
    echo "<td><button type='button' class='btn btn-danger btn-sm hapus_barang'>Hapus</button></td>";
    echo "</tr>";
}
?>
