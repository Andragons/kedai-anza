$(document).ready(function () {
  $("#search_barang").keyup(function () {
    var search_query = $(this).val();
    $.ajax({
      type: "POST",
      url: "search_barang.php",
      data: {
        search_query: search_query,
      },
      success: function (response) {
        $("#search_result").html(response);
      },
    });
  });

  $(document).on("click", ".barang_option", function () {
    var nama_barang = $(this).text();
    $("#search_barang").val(nama_barang);
    $("#search_result").html("");
    $.ajax({
      type: "POST",
      url: "get_id_barang.php",
      data: {
        nama_barang: nama_barang,
      },
      success: function (response) {
        $("#id").val(response);
      },
    });
  });

  $(document).on("click", ".barang_option", function () {
    var nama_barang = $(this).text();
    $("#search_barang").val(nama_barang);
    $("#search_result").html("");
    $.ajax({
      type: "POST",
      url: "get_harga_barang.php",
      data: {
        nama_barang: nama_barang,
      },
      success: function (response) {
        $("#harga").val(response);
      },
    });
  });

  $("#tambah").click(function () {
    var nama_barang = $("#search_barang").val();
    var kuantiti = $("#kuantiti").val();
    var harga = $("#harga").val();
    var subtotal = kuantiti * harga;

    var data = {
      nama_barang: nama_barang,
      kuantiti: kuantiti,
      harga: harga,
      subtotal: subtotal,
    };

    $.ajax({
      type: "POST",
      url: "tambah_barang.php",
      data: data,
      success: function (response) {
        $("#keranjang_tbody").append(response); // Menambahkan data ke dalam tabel
      },
    });
  });

  $("#reset").click(function () {
    $.ajax({
      type: "POST",
      url: "reset.php",
      success: function (response) {
        $("#keranjang_tbody").html(response); // Mengosongkan tabel
        $("#uang_bayar").val("");
        $("#search_barang").val("");
        $("#total_harga").val("");
        $("#harga").val("");
        $("#kuantiti").val("1");
        $("#uang_bayar").val("");
        $("#kembalian").val("");
        $("#keterangan").val("");
      },
    });
  });

  $('#proses').click(function() {
    var uang_bayar = parseFloat($('#uang_bayar').val());

    // Periksa apakah kolom Uang Bayar kosong
    if (!uang_bayar) {
        alert("Uang bayar tidak boleh kosong!");
        return; // Berhenti eksekusi jika kolom Uang Bayar kosong
    }

    $.ajax({
        type: 'POST',
        url: 'proses.php',
        data: { uang_bayar: uang_bayar },
        dataType: 'json',
        success: function(response) {
            // Memperbarui nilai kembalian jika kurang dari 0
            var kembalian = response.kembalian < 0 ? 0 : response.kembalian;
            
            $('#total_harga').val(response.total_harga);
            $('#kembalian').val(kembalian);
            $('#keterangan').val(response.keterangan);
        }
    });
});


  $("#edit_harga").click(function () {
    var nama_barang = $("#search_barang").val();
    var harga = $("#harga").val();

    // Tampilkan popup konfirmasi
    if (
      confirm(
        "Apakah Anda yakin ingin mengupdate harga untuk barang " +
          nama_barang +
          "?"
      )
    ) {
      var new_harga = prompt(
        "Masukkan harga baru untuk barang " + nama_barang + ":",
        harga
      );
      if (new_harga !== null) {
        // Kirim data perubahan ke PHP untuk update di database
        $.ajax({
          type: "POST",
          url: "update_harga.php",
          data: { nama_barang: nama_barang, harga_baru: new_harga },
          success: function (response) {
            if (response === "success") {
              // Update harga di kolom Harga
              $("#harga").val(new_harga);
              alert("Harga berhasil diperbarui.");
            } else {
              alert("Gagal memperbarui harga. Silakan coba lagi.");
            }
          },
        });
      }
    }
  });

  
});
