<?php 
  require_once 'init.php';
  $page = 'inventaris';
  require_once '_templates/header.php';
  $id = $_GET['id'];

  $data = $invent->getInventarisById($id);

  $id_peminjam = $_SESSION['user']['id_petugas'];
    
  if (isset($_POST['submit'])) {
    $values = [
      $id,
      $_SESSION['user']['id_petugas'],
      'Dipinjam',
      $_POST['jumlah'],
      date('Y-m-d', strtotime($_POST['tanggal_pinjam'])),
      date('Y-m-d', strtotime($_POST['tanggal_kembali']))
    ];

    var_dump($id_peminjam);

    $add = $pinjam->addPeminjaman($values);

    if ($add) header('Location: peminjaman.php');
  }

?>

<div class="card p-4">
  <h3 class="mb-4">Pinjam Barang</h3>
    <form action="" method="POST">
      <div class="row">

        <div class="col-6">
          <!-- Nama Inventaris -->
          <div class="form-group">
            <label for="nama">Nama Barang</label>
            <input name="nama" type="text" value="<?= $data['nama'] ?>" class="form-control" readonly>
          </div>
          <div class="form-group">
            <label for="jumlah">Jumlah Pinjam</label>
            <input name="jumlah" type="text" placeholder="Jumlah pinjam" class="form-control">
          </div>

        </div>
        <div class="col-6">

          <!-- Tanggal Pinjam -->
          <div class="form-group">
            <label for="tanggal">Tanggal Pinjam</label>
            <input name="tanggal_pinjam" type="date" class="form-control">
          </div>
          <!-- Tanggal Kembali -->
          <div class="form-group">
            <label for="tanggal">Tanggal Kembali</label>
            <input name="tanggal_kembali" type="date" class="form-control">
          </div>

        </div>
      </div>
      <div class="d-flex">
        <button type="submit" class="btn btn-primary mr-2 ml-auto" name="submit">Pinjam</button>
        <a href="<?= BASE_URL; ?>/inventaris.php" class="btn btn-outline-danger">Batal</a>
      </div>
    </form>


</div>




<?php require_once '_templates/footer.php' ?>