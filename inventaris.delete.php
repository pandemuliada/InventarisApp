<?php
  require_once 'init.php';

  $id = $_GET['id'];
  
  $del = $db->deleteById('inventaris', $id);
  if ($del) {
    header('Location: inventaris.php');
  } else {
    header('Location: inventaris.php');
  }