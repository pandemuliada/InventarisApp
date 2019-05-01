<?php 
  require_once 'init.php';

  $id = $_GET['id'];
  
  // $sql = "UPDATE peminjaman SET status = 'Kembali', jumlah_pinjam = 0 WHERE id_peminjaman = $id";
  $sql = "UPDATE peminjaman SET status = 'Kembali' WHERE id_peminjaman = $id";
  $kembali = $db->query($sql);

  if ($kembali) header('Location: peminjaman.php');