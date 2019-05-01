<?php 
  require 'init.php';

  $data = $pinjam->getAllPeminjaman();
  $no = 1;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="<?= BASE_URL; ?>/assets/css/bootstrap.min.css">
  <title>Laporan Inventaris</title>
</head>
<body>

  <section class="container-fluid">

    <h1 class="text-center mt-4 mb-5">Laporan Peminjaman Barang Inventaris</h1>
    
    <table class="table table-striped">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama Barang</th>
          <th>Jumlah Pinjam</th>
          <th>Peminjam</th>
          <th>Status</th>
          <th>Tanggal Pinjam</th>
          <th>Tanggal Kembali</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($data as $key => $row) : ?>
        <tr>
          <td><?= $no++ ?></td>
          <td><?= $row['nama'] ?></td>
          <td><?= $row['jumlah_pinjam'] ?></td>
          <td><?= $row['nama_petugas'] ?></td>
          <td class="font-weight-bold text-<?= $row['status'] == 'Kembali' ? 'primary' : 'success' ?>"><?= $row['status'] ?></td>
          <td><?= $row['tanggal_pinjam'] ?></td>
          <td><?= $row['tanggal_kembali'] ?></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

  </section>

  <script>
    window.print();
  </script>

</body>
</html>
