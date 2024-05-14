<?php
$servername = "localhost";
$username = "root"; // ganti dengan username MySQL Anda
$password = ""; // ganti dengan password MySQL Anda
$database = "warung";

// Buat koneksi
$conn = new mysqli($servername, $username, $password, $database);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
