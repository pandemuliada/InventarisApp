<?php 
  require_once 'init.php';

  $page = 'inventaris';
  require_once '_templates/header.php';

  if (isset($_POST['submit'])) {
    $nama = $db->escapeString($_POST['nama']);
    $kode = $db->escapeString($_POST['kode']);
    $ket = $db->escapeString($_POST['ket']);
    
    $sql = "INSERT INTO jenis (nama_jenis, kode_jenis, keterangan) VALUES ('$nama', '$kode', '$ket')";
    $add = $db->query($sql);

    if ($add) header('Location: jenis.php');

  }

?>

<div class="card p-4">
  <h3 class="mb-4">Tambah Jenis</h3>
    <form action="" method="POST">
      <div class="row">

        <div class="col-12">
          <!-- Nama Jenis -->
          <div class="form-group">
            <label for="nama">Nama Jenis</label>
            <input name="nama" type="text" placeholder="Nama Jenis" class="form-control" autofocus>
          </div>
          <!-- Kode Jenis -->
          <div class="form-group">
            <label for="kode">Kode Jenis</label>
            <input name="kode" type="text" placeholder="Kode Jenis" class="form-control">
          </div>
          <!-- Keterangan Inventaris -->
          <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <input name="keterangan" type="text" placeholder="Keterangan Jenis" class="form-control">
          </div>
        </div>
      </div>
      <div class="d-flex">
        <button type="submit" class="btn btn-primary mr-2 ml-auto" name="submit">Tambah</button>
        <a href="<?= BASE_URL; ?>/jenis.php" class="btn btn-outline-danger">Batal</a>
      </div>
    </form>


</div>

<?php require_once '_templates/footer.php' ?>