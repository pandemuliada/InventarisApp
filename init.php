<?php 
  require_once 'config/config.php';
  
  // Check session already STARTED or NOT
  if ( session_status() == PHP_SESSION_NONE ) session_start();  

  // Load all class
  spl_autoload_register(function ($class) {
    require_once 'class/' . $class . '.php';
  });

  $db = new Database();
  $auth = new Authentication();
  $invent = new Inventaris();
  $pinjam = new Peminjaman();

?>