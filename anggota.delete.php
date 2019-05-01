<?php 
  require_once 'init.php';

  $id = $_GET['id'];
  
  // $sql = "UPDATE peminjaman SET status = 'Kembali', jumlah_pinjam = 0 WHERE id_peminjaman = $id";
  $delete = $db->deleteById('petugas', $id);

  if ($delete) header('Location: anggota.php');