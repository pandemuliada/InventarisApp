<?php

  class Authentication extends Database
  {
    private $table = 'petugas';

    public function __construct() {
      parent::__construct();
      if (!isset($_SESSION['user'])) {
        $_SESSION['user'] = 'something';
        header('Location: ' . BASE_URL . '/login.php');
      }
    }

    public function register($nama, $username, $password, $level)
    {
      $sql = "INSERT INTO $this->table (nama_petugas, username, password, id_level) VALUES ('$nama', '$username', '$password', '$level')";
      $query = $this->conn->query($sql);
      if ($query) return true;
    }

    public function login($username, $password, $level)
    {
      $sql = "SELECT * FROM $this->table WHERE username = '$username' AND password = '$password' AND id_level = '$level'";
      $query = $this->conn->query($sql);
      $result = $query->fetch_assoc();
      if ($result) return $result;
    }
  }
  