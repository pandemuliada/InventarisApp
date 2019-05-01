<?php 

  class Database 
  {
    protected $host   = DB_HOST,
              $user   = DB_USER,  
              $pass   = DB_PASS,  
              $dbname = DB_NAME;
    public $conn;

    public function __construct() {
      $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
      if (!$this->conn) $this->conn->connect_error();
    }

    public function escapeString($value)
    {
      return mysqli_real_escape_string($this->conn, $value);
    }

    public function query($sql)
    {
      return $this->conn->query($sql);
    }

    // FETCH ALL SELECTED DATA
    public function fetchAll($query)
    {
      $data = [];
      while ($row = $query->fetch_assoc()) {
        $data[] = $row;
      }
      return $data;
    }

    // SELECT ALL DATA FROM TABLE
    public function getAll($table)
    {
      $sql = "SELECT * FROM $table";
      $query = $this->conn->query($sql);
      $result = $this->fetchAll($query);
      return $result;
    }

    // GET ALL DATA FROM TABLE BY TABLE_ID
    public function getById($table, $id)
    {
      $sql = "SELECT * FROM $table WHERE id_$table = '$id'";
      $query = $this->conn->query($sql);  
      $result = $query->fetch_assoc();
      return $result;
    }

    // DELETE DATA
    public function deleteById($table, $id)
    {
      $sql = "DELETE FROM $table WHERE id_$table = '$id'";
      $query = $this->conn->query($sql);  
      if ($query) return true;
    }

  }
  