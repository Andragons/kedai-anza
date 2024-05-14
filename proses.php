<?php
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $uang_bayar = floatval($_POST['uang_bayar']);
    $total_harga = 0;

    // Hitung total harga dari semua barang dalam keranjang
    foreach ($_SESSION['keranjang'] as $barang) {
        $total_harga += $barang['subtotal'];
    }

    // Hitung kembalian dan keterangan
    $kembalian = $uang_bayar - $total_harga;
    if ($kembalian < 0) {
        $keterangan = "Uang bayar kurang Rp.".abs($kembalian);
    } elseif ($kembalian > 0) {
        $keterangan = "Kembalian";
    } else {
        $keterangan = "Tidak ada kembalian";
    }

    // Set ulang array keranjang menjadi kosong
    $_SESSION['keranjang'] = array();

    // Keluarkan output
    echo json_encode(array(
        'total_harga' => $total_harga,
        'kembalian' => $kembalian,
        'keterangan' => $keterangan
    ));
}
?>
