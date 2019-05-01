<?php 
  require_once 'init.php';
  $page = 'inventaris';
  require_once '_templates/header.php';

  $id = $_GET['id'];
  $data = $invent->getInventarisById($id);
  
  $list_jenis = $db->getAll('jenis');
  $list_ruang = $db->getAll('ruang');


  if (isset($_POST['submit'])) {
    $id_update = $_POST['id'];

    $values = [
      $db->escapeString($_POST['nama']),
      $_POST['kondisi'],
      $db->escapeString($_POST['keterangan']),
      $_POST['jumlah'],
      $_POST['jenis'],
      date('Y-m-d', strtotime($_POST['tanggal'])),
      $_POST['ruang'],
      $db->escapeString($_POST['kode']),
      $_SESSION['user']['id_petugas']
    ];

    $update = $invent->updateInventaris($values, $id_update);

    if ($update) header('Location: inventaris.php');
  }



?>

<div class="card p-4">
  <h3 class="mb-4">Edit Barang</h3>
    <form action="" method="POST">
      <div class="row">

        <div class="col-6">
          <!-- ID INVENTARIS -->
          <input name="id" type="hidden" class="form-control" value="<?= $data['id_inventaris'] ?>">
          <!-- Nama Inventaris -->
          <div class="form-group">
            <label for="nama">Nama Inventaris</label>
            <input name="nama" type="text" placeholder="Nama Barang" class="form-control" value="<?= $data['nama'] ?>">
          </div>
          <!-- Kode Barang -->
          <div class="form-group">
            <label for="kode">Kode Barang</label>
            <input name="kode" type="text" placeholder="Kode Barang" class="form-control" value="<?= $data['kode_inventaris'] ?>">
          </div>
          <!-- Keteragan -->
          <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <input name="keterangan" type="text" placeholder="Keterangan Barang" class="form-control" value="<?= $data['keterangan'] ?>">
          </div>
          <!-- Kondisi -->
          <div class="form-group">
            <label>Kondisi</label>
            <select name="kondisi" class="form-control">
              <option value="Baik">Baik</option>
              <option value="Kurang Baik">Kurang Baik</option>
            </select>
          </div>
        </div>
        <div class="col-6">

          <!-- Jenis -->
          <div class="form-group">
            <label for="jenis">Jenis</label>
            <select name="jenis" id="" class="form-control">
              <?php foreach ($list_jenis as $jenis) : ?>
                <option value="<?= $jenis['id_jenis'] ?>"><?= $jenis['nama_jenis'] ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <!-- Ruang -->
          <div class="form-group">
            <label for="ruang">Ruang</label>
            <select name="ruang" id="" class="form-control">
              <?php foreach ($list_ruang as $ruang) : ?>
                <option value="<?= $ruang['id_ruang'] ?>"><?= $ruang['nama_ruang'] ?></option>
              <?php endforeach; ?>
            </select>
          </div>
          <!-- Jumlah -->
          <div class="form-group">
            <label for="jumlah">Jumlah</label>
            <input name="jumlah" type="number" placeholder="Jumlah Barang" class="form-control" value="<?= $data['jumlah'] ?>">
          </div>
          <!-- Tanggal Register -->
          <div class="form-group">
            <label for="tanggal">Tanggal Register</label>
            <input name="tanggal" type="date" class="form-control" value="<?= date('Y-m-d', strtotime($data['tanggal_register'] ))?>">
          </div>

        </div>
      </div>
      <div class="d-flex">
        <button type="submit" class="btn btn-primary mr-2 ml-auto" name="submit">Update</button>
        <a href="<?= BASE_URL; ?>/inventaris.php" class="btn btn-outline-danger">Batal</a>
      </div>
    </form>


</div>

<?php require_once '_templates/footer.php'; ?>