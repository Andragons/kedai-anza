<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplikasi Kasir</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container">
        <h2 class="my-4">Aplikasi Kasir</h2>

        <?php
        // Include koneksi database
        include 'koneksi.php';

        // Jika form disubmit
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nama = $_POST['kategori'];

            $sql = "INSERT INTO kategori (nama) VALUES ('$nama')";

            if (mysqli_query($conn, $sql)) {
                echo '<script>alert("Kategori berhasil ditambahkan!"); window.location.href = "index.php";</script>';
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
        }
        ?>

        <form method="post" action="" class="mb-5">
            <div class="mb-3">
                <label for="kategori" class="form-label">Tambah Kategori:</label>
                <input type="text" class="form-control" id="kategori" name="kategori" autocomplete="off" required>
            </div>
            <button type="submit" class="btn btn-success" id="insert">Tambah Kategori</button>
        </form>
        <a href="index.php" class="text-decoration-none btn btn-primary">Kembali</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="script.js"></script>
</body>

</html>
