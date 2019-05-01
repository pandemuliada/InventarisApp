<?php 
  session_start();
  // unset($_SESSION['user']);
  session_unset('user');
  session_destroy();

  header('Location: login.php');

?>