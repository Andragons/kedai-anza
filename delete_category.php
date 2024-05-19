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
      $id_kategori = $_POST['id'];
      $query = "DELETE FROM kategori WHERE id = $id_kategori";

      if (mysqli_query($conn, $query)) {
        echo '<script>alert("Kategori berhasil dihapus!!"); window.location.href = "index.php";</script>';
        exit();
      } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
      }
    }
    ?>

    <h2 class="my-4">Aplikasi Kasir</h2>
    <form method="post" action="" class="mb-5">
      <div class="mb-3">
        <label for="kategori" class="form-label">Kategori:</label>
        <select class="form-control" id="kategori" name="kategori" required>
          <option value="" disabled selected>Pilih Kategori</option>
          <?php
          // Query untuk mendapatkan kategori
          $sql = "SELECT id, nama FROM kategori";
          $result = mysqli_query($conn, $sql);

          if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
              echo '<option value="' . $row['id'] . '">' . $row['nama'] . '</option>';
            }
          }
          ?>
        </select>
      </div>
      <div class="mb-3">
        <label for="id" class="form-label">ID:</label>
        <input type="text" class="form-control" id="id" name="id" readonly />
      </div>
      <button type="submit" class="btn btn-danger" id="delete">Delete</button>
    </form>
    <a href="index.php" class="text-decoration-none btn btn-primary">Kembali</a>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    document.getElementById('kategori').addEventListener('change', function () {
      var selectedOption = this.options[this.selectedIndex];
      document.getElementById('id').value = selectedOption.value;
    });
  </script>
</body>

</html>
