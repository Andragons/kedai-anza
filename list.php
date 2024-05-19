<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Barang</title>
  <!-- Bootstrap CSS -->
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
</head>

<body>
  <div class="container mt-4">
    <?php
    include 'koneksi.php';

    // Query untuk mendapatkan kategori dan barang
    $sql_kategori = "SELECT id, nama FROM kategori";
    $result_kategori = $conn->query($sql_kategori);

    if ($result_kategori->num_rows > 0) {
      // Iterasi melalui setiap kategori
      while ($row_kategori = $result_kategori->fetch_assoc()) {
        $kategori_id = $row_kategori['id'];
        $kategori_nama = $row_kategori['nama'];

        echo "<h2 class='mt-4 text-center'>{$kategori_nama}</h2>";
        echo "<table class='table table-striped table-bordered'>
                        <thead class='thead-dark'>
                            <tr>
                                <th>No</th>
                                <th>Barang</th>
                                <th>Harga</th>
                            </tr>
                        </thead>
                        <tbody>";

        // Query untuk mendapatkan barang berdasarkan kategori_id
        $sql_barang = "SELECT nama_barang, harga FROM barang WHERE kategori_id = $kategori_id";
        $result_barang = $conn->query($sql_barang);

        if ($result_barang->num_rows > 0) {
          $no = 1;
          // Iterasi melalui setiap barang
          while ($row_barang = $result_barang->fetch_assoc()) {
            echo "<tr>
                                <td>{$no}</td>
                                <td>{$row_barang['nama_barang']}</td>
                                <td>{$row_barang['harga']}</td>
                              </tr>";
            $no++;
          }
        } else {
          echo "<tr><td colspan='3'>Tidak ada data</td></tr>";
        }
        echo "</tbody></table>";
      }
    } else {
      echo "Tidak ada kategori ditemukan.";
    }

    ?>
  </div>
  <!-- Bootstrap JS dan jQuery -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>