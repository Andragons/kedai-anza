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
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="mb-3">
                <label for="search_barang" class="form-label">Search Nama Barang:</label>
                <input type="text" class="form-control" id="search_barang" name="search_barang" autocomplete="off">
                <div id="search_result"></div>
            </div>
            <div class="mb-3">
                <label for="kuantiti" class="form-label">Kuantiti:</label>
                <input type="number" class="form-control" id="kuantiti" name="kuantiti" min="1" value="1">
            </div>
            <div class="mb-3">
                <label for="harga" class="form-label">Harga:</label>
                <input type="text" class="form-control" id="harga" name="harga">
            </div>
            <div class="mb-3">
                <label for="uang_bayar" class="form-label">Uang Bayar:</label>
                <input type="text" class="form-control" id="uang_bayar" name="uang_bayar">
            </div>
            <button type="button" class="btn btn-primary" id="tambah">Keranjang</button>
            <button type="button" class="btn btn-success" id="proses">Proses</button>
            <button type="button" class="btn btn-danger" id="reset">Reset</button>
            <button type="button" class="btn btn-warning" id="edit_harga">Edit</button>
            <a href="insert.html"><button type="button" class="btn btn-success" id="insert">+</button></a>
            

        </form>
        <div id="output" class="mt-4">
            <h4>Keranjang Belanja:</h4>
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Barang</th>
                        <th>Kuantiti</th>
                        <th>Satuan</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody id="keranjang_tbody">
                    <!-- Daftar barang akan ditampilkan di sini -->
                </tbody>
            </table>
        </div>
        <div id="output" class="mt-4"></div>
        <div class="mt-4">
            <h4>Hasil Perhitungan:</h4>
            <form>
                <div class="mb-3">
                    <label for="total_harga" class="form-label">Total Harga:</label>
                    <input type="text" class="form-control" id="total_harga" readonly>
                </div>
                <div class="mb-3">
                    <label for="kembalian" class="form-label">Kembalian:</label>
                    <input type="text" class="form-control" id="kembalian" readonly>
                </div>
                <div class="mb-3">
                    <label for="keterangan" class="form-label">Keterangan:</label>
                    <input type="text" class="form-control" id="keterangan" readonly>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="script.js"></script>
</body>

</html>