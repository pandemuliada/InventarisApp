<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="<?= BASE_URL; ?>/assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= BASE_URL; ?>/assets/css/main.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
    integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <title>Inventaris</title>
</head>
<body>

  <section class="">
    <div class="row no-gutters">
      <!-- LEFT PANEl -->
      <section class="col-2 bg-light text-left" id="left-panel">
        <div class="container ml-4 pt-4">
          <h2 class="mb-5"><a href="<?= BASE_URL; ?>/index.php">Inventaris</a></h2>
          <ul class="sidenav">
            <li class="sidenav-item">
              <a class="sidenav-link <?= $page == "dashboard" ? "active" : ""  ?>" href="<?= BASE_URL; ?>/dashboard.php">Dashboard</a>
            </li>
            <li class="sidenav-item">
              <a class="sidenav-link <?= $page == "inventaris" ? "active" : ""  ?>" href="<?= BASE_URL; ?>/inventaris.php">Inventaris</a>
            </li>
            <li class="sidenav-item">
              <a class="sidenav-link <?= $page == "peminjaman" ? "active" : ""  ?>" href="<?= BASE_URL; ?>/peminjaman.php">Peminjaman</a>
            </li>
            <li class="sidenav-item">
              <a class="sidenav-link <?= $page == "pengembalian" ? "active" : ""  ?>" href="<?= BASE_URL; ?>/pengembalian.php">Pengembalian</a>
            </li>
            <?php if ($_SESSION['user']['id_level'] == 1) : ?>
            <li class="sidenav-item">
              <a class="sidenav-link <?= $page == "anggota" ? "active" : ""  ?>" href="<?= BASE_URL; ?>/anggota.php">Anggota</a>
            </li>
            <li class="sidenav-item">
              <a class="sidenav-link" href="<?= BASE_URL; ?>/laporan.php" target="_blank">Laporan</a>
            </li>
            <?php endif; ?> 
            <li class="sidenav-item">
              <a class="sidenav-link" href="<?= BASE_URL; ?>/logout.php" onclick="return confirm('Apakah anda yakin untuk keluar ?')">Logout</a>
            </li>
          </ul>
        </div>
      </section>

      <!-- RIGHT PANEL -->
      <div class="col-10 mt-4" id="right-panel">
        <!-- TOPNAV -->
        <div class="row no-gutters mb-5 px-5">
          <div class="col-7">
            <!-- <form action="get">
              <div class="form-group mt-1">
                <input type="text" placeholder="Cari Barang" class="form-control form-control px-3">
              </div>
            </form> -->
          </div>
          <div class="col text-right" style="margin-top: 5px;">
            <img src="<?= BASE_URL; ?>/assets/img/avatar.jpg" class="rounded-circle" width="40px" alt="">
            <span class="ml-2"><?= $_SESSION['user']['nama_petugas'] ?></span>
          </div>
        </div>
        <!-- END TOPNAV -->

        <!-- MAIN CONTENT -->
        <div class="mx-5">