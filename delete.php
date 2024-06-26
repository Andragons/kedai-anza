<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Aplikasi Kasir</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
</head>

<body>
  <div class="container">
    <?php
    // Koneksi ke database
    include 'koneksi.php';
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $id_barang = $_POST['id'];
      $query = "DELETE FROM barang WHERE id = $id_barang";

      if (mysqli_query($conn, $query)) {
        echo '<script>alert("Barang berhasil dihapus!!"); window.location.href = "index.php";</script>';
        exit();
      } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
    }
    ?>

    <h2 class="my-4">Aplikasi Kasir</h2>
    <form method="post" action="" class="mb-5">
      <div class="mb-3">
        <label for="search_barang" class="form-label">Search Nama Barang:</label>
        <input type="text" class="form-control" id="search_barang" name="search_barang" autocomplete="off" />
        <div id="search_result"></div>
      </div>
      <div class="mb-3">
        <label for="id" class="form-label">ID:</label>
        <input type="text" class="form-control" id="id" name="id" />
      </div>
      <button type="submit" class="btn btn-danger" id="delete">Delete</button>
    </form>
    <a href="index.php" class="text-decoration-none btn btn-primary">Kembali</a>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="script.js"></script>
</body>

</html>