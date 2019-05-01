<?php 

  require_once 'init.php';

  $id = $_GET['id'];

  $delete = $db->deleteById('jenis', $id);
  if ($delete) header('Location: jenis.php');
