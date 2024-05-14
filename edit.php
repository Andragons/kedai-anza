<?php
include 'koneksi.php';

// Ambil nama barang dari parameter URL
$nama_barang = urldecode($_GET['nama_barang']);

// Query untuk mengambil data barang berdasarkan nama barang
$sql = "SELECT * FROM barang WHERE nama_barang = '$nama_barang'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $nama_barang = $row['nama_barang'];
    $harga = $row['harga'];
} else {
    echo "Barang tidak ditemukan";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Harga Barang</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2 class="my-4">Edit Harga Barang</h2>
        <form action="update.php" method="post">
            <div class="mb-3">
                <label for="nama_barang" class="form-label">Nama Barang:</label>
                <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="<?php echo $nama_barang; ?>" readonly>
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">Harga:</label>
                <input type="text" class="form-control" id="harga" name="harga" value="<?php echo $harga; ?>">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
