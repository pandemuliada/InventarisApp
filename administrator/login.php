<?php 
  require_once '../init.php';

  if (isset($_POST['login'])) {
    $username = $db->escapeString($_POST['username']);
    $password = $db->escapeString($_POST['password']);
    $level    = $db->escapeString(1);
    
    $user = $auth->login($username, $password, $level);

    $_SESSION['user'] = $user;

    if (isset($_SESSION['user'])) {
      header('Location: ' . BASE_URL . '/dashboard.php');
    } else {
      header('Location: login.php');
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Login Inventaris</title>
  <link rel="stylesheet" href="<?= BASE_URL; ?>/assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= BASE_URL; ?>/assets/css/main.css">
</head>
<body>

  <div class="row mt-5">
    <div class="col-3 py-3 px-4 mx-auto bg-light" style="border-radius: 5px; box-shadow: 0 2px 5px rgba(0,0,0,0.1)">
      <h3 class="mb-4">Login Admin Inventaris</h3>
      <form action="" method="POST">
        <div class="form-group">
          <label for="">Username</label>
          <input name="username" placeholder="Username" class="form-control">
        </div>
        <div class="form-group">
          <label for="">Password</label>
          <input type="password" name="password" placeholder="Password" class="form-control">
        </div>
        <button type="submit" name="login" class="btn btn-block btn-primary">L O G I N</button>
      </form>
    </div>
  </div>

  
</body>
</html>
