<?php 
  require_once 'init.php';
  $page = 'peminjaman';
  require_once '_templates/header.php';

  $id_user = $_SESSION['user']['id_petugas'];
  
  $data;
  if ( ($_SESSION['user']['id_level'] == 1) || ($_SESSION['user']['id_level'] == 2) ) {
    $data = $pinjam->getAllPeminjamanByStatus('Dipinjam');
  } else {
    $data = $pinjam->getPeminjamanByUserAndStatus($id_user, 'Dipinjam');    
  }


?>

<div class="card p-4">

  <h3>List Peminjaman</h3>
  <hr>

  <?php if ($data) : ?>

  <div class="list-container">
    <?php foreach ($data as $key => $row) : ?>
      <!-- Tampilkan hanya brang yang dipinjam -->
      
        <div class="d-flex list-item-container mb-2">
          <div class="col pl-3 pt-1">
            <h5 class="mb-0 "><?= $row['nama'] ?></h5>
            <span><i class="fas fa-user-circle fa-sm text-primary"></i> <?= $row['nama_petugas'] ?></span>
          </div>
          <div class="col-3 text-right pt-1 pr-3" style="border-right: 1px solid #eee">
            <small class="d-block">Tanggal Pinjam &nbsp; &nbsp; : &nbsp; <?= $row['tanggal_pinjam'] ?></small>
            <small class="d-block">Tanggal Kembali &nbsp; : &nbsp; <?= $row['tanggal_kembali'] ?></small>
          </div>
          <div class="col-2 text-left pt-1 pl-3">
            <small class="d-block font-weight-bold">Jumlah : <?= $row['jumlah_pinjam'] ?></small>
            <small class="font-weight-bold">Status : <b class="text-<?= $row['status'] == 'Kembali' ? 'primary' : 'success' ?>"><?= $row['status'] ?></b></small>
          </div>

          <?php if( ($_SESSION['user']['id_level'] == 1) || ($_SESSION['user']['id_level'] == 2) ) : ?>

            <div class="col-2 pt-1">
              <a href="<?= BASE_URL; ?>/peminjaman.kembali.php?id=<?= $row['id_peminjaman'] ?>" class="btn btn-primary btn-sm btn-block mt-2">Kembali</a>
            </div>
            
          <?php endif; ?>
        
        </div>


    <?php endforeach; ?>
  </div>

  <?php else : ?>
    <em class="text-center">Tidak ada data peminjaman !</em>
  <?php endif; ?>

</div>

<?php require_once '_templates/footer.php'; ?>