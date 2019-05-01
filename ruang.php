<?php 
  require_once 'init.php';

  $page = 'inventaris';
  require_once '_templates/header.php';

  $data = $db->getAll('ruang');
  
?>

<div class="card p-4">

  
  <h3>List Inventaris</h3>
  <ul class="tab-container mt-3 d-flex">
    <li class="tab-item"><a href="<?= BASE_URL; ?>/inventaris.php" class="tab-link">Barang</a></li>
    <li class="tab-item"><a href="<?= BASE_URL; ?>/jenis.php" class="tab-link">Jenis</a></li>
    <li class="tab-item"><a href="<?= BASE_URL; ?>/ruang.php" class="tab-link active">Ruang</a></li>
  </ul>
  <hr style="margin-top: -11px;">
  
  <?php if ($_SESSION['user']['id_level'] == 1) : ?>
  <div class="d-flex">
    <a href="<?= BASE_URL; ?>/ruang.tambah.php" class="btn btn-primary btn btn-sm btn-round d-inline-block mb-3 ml-auto px-3">+ Tambah Ruang</a>
  </div>
  <?php endif; ?>

  <?php if ($data) : ?>
  <div class="list-container">

    
    <?php foreach ($data as $key => $row) : ?>
    <div class="d-flex list-item-container mb-2">
      <div class="list-item-toolbox">
        <a onclick=" return confirm('Apakah anda yakin ingin menghapus datanya ?')" href="<?= BASE_URL; ?>/ruang.delete.php?id=<?= $row['id_ruang'] ?>" class="btn btn-sm text-danger pt-3"><i class="fas fa-trash"></i></a>
      </div>
      <div class="col pl-3 pt-1">
        <p class="mb-0"><?= $row['nama_ruang'] ?></p>
        <small>Kode Ruang : <b><?= $row['kode_ruang'] ?></b></small>
      </div>
    </div>
    <?php endforeach; ?>

    
  </div>
  <?php else : ?>
    <em class="text-center">Tidak ada data ruang !</em>
  <?php endif; ?>

</div>

<?php require_once '_templates/footer.php'; ?>