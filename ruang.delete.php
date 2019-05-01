<?php 

  require_once 'init.php';

  $id = $_GET['id'];

  $del = $db->deleteById('ruang', $id);
  if ($del) header('Location: ruang.php');
  if (!$del) header('Location: ruang.php');