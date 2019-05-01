<?php 
  require_once 'init.php';

  if (isset($_POST['register'])) {
    $nama = $db->escapeString($_POST['nama']);
    $username = $db->escapeString($_POST['username']);
    $password = $db->escapeString($_POST['password']);
    $level    = $db->escapeString($_POST['level']);
    
    $register = $auth->register($nama, $username, $password, $level);

    if ($register) header('Location: ' . BASE_URL . '/login.php');
    // $_SESSION['user'] = $user;

    // if (isset($_SESSION['user'])) {
    //   header('Location: dashboard.php');
    // } else {
    //   header('Location: login.php');
    // }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Register Inventaris</title>
  <link rel="stylesheet" href="<?= BASE_URL; ?>/assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= BASE_URL; ?>/assets/css/main.css">
</head>
<body>

  <div class="row mt-5">
    <div class="col-3 py-3 px-4 mx-auto bg-light" style="border-radius: 5px; box-shadow: 0 2px 5px rgba(0,0,0,0.1)">
      <h3 class="mb-4">Daftar Akun</h3>
      <form action="" method="POST">
        <div class="form-group">
          <label for="">Nama</label>
          <input name="nama" placeholder="Nama" class="form-control">
        </div>
        <div class="form-group">
          <label for="">Username</label>
          <input name="username" placeholder="Username" class="form-control">
        </div>
        <div class="form-group">
          <label for="">Password</label>
          <input type="password" name="password" placeholder="Password" class="form-control">
        </div>
        <div class="form-group">
          <label for="">Level</label>
          <select name="level" id="" class="form-control">
            <option value="2">Operator</option>
            <option value="3">Peminjam</option>
          </select>
        </div>
        <button type="submit" name="register" class="btn btn-block btn-primary">R E G I S T E R</button>
        <a href="<?= BASE_URL; ?>/login.php" class="d-inline-block mt-3">Sudah punya akun ?</a>
      </form>
    </div>
  </div>

  
</body>
</html>
