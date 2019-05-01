<?php 
  require_once 'init.php';

  $page = 'anggota';
  require_once '_templates/header.php';

  $data = $db->getAll('petugas');
  
?>

<div class="card p-4">

  
  <h3>Data Anggota</h3>
  <hr>

  <?php if ($data) : ?>
  <div class="list-container">

    
    <?php foreach ($data as $key => $row) : ?>
    <div class="d-flex list-item-container mb-2">
      <div class="col pt-1">
        <p class="mb-0"><?= $row['nama_petugas'] ?></p>
      </div>
      <div class="col text-right pt-1">
        <small class="font-weight-bold"> 
          <?php 
            if ($row['id_level'] == 1) {
              echo 'Admin';
            } else if ($row['id_level'] == 2) {
              echo 'Operator';
            } else {
              echo 'Peminjam';
            }
          ?>
        </small>
      </div>
      <div class="col-1">
        <a href="<?= BASE_URL; ?>/anggota.delete.php?id=<?= $row['id_petugas'] ?>" class="btn btn-sm btn-round btn-outline-danger d-block" onclick="return confirm('Apakah anda yakin ingin menghapus data ini ?')"><i class="fas fa-trash"></i></a>
      </div>
    </div>
    <?php endforeach; ?>

    
  </div>
  <?php else : ?>
    <em class="text-center">Tidak ada data barang !</em>
  <?php endif; ?>

</div>

<?php require_once '_templates/footer.php'; ?>