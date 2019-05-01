<?php

  class Inventaris extends Database
  {
    private $table = 'inventaris';

    public function __construct() {
      parent::__construct();
    }

    public function addInventaris($value)
    {
      $sql = "INSERT INTO $this->table (nama, kondisi, keterangan, jumlah, id_jenis, tanggal_register, id_ruang, kode_inventaris, id_petugas)
              VALUES ('$value[0]', '$value[1]', '$value[2]', '$value[3]', '$value[4]', '$value[5]', '$value[6]', '$value[7]', '$value[8]')";
      $query = $this->conn->query($sql);
      if ($query) return true;
    }

    public function updateInventaris($value, $id)
    {
      $sql = "UPDATE $this->table SET
              nama = '$value[0]', 
              kondisi = '$value[1]', 
              keterangan = '$value[2]', 
              jumlah = '$value[3]', 
              id_jenis = '$value[4]', 
              tanggal_register = '$value[5]', 
              id_ruang = '$value[6]', 
              kode_inventaris = '$value[7]', 
              id_petugas = '$value[8]' 
              WHERE id_$this->table = '$id'
              ";
      $query = $this->conn->query($sql);
      if ($query) return true;
    }

    public function getAllInventaris()
    {
      $sql = "SELECT * FROM $this->table 
              JOIN petugas ON $this->table.id_petugas = petugas.id_petugas
              JOIN jenis ON $this->table.id_jenis = jenis.id_jenis
              JOIN ruang ON $this->table.id_ruang = ruang.id_ruang";
      $query = $this->conn->query($sql);
      $result = $this->fetchAll($query);
      return $result;
    }


    public function getInventarisById($id)
    {
      $sql = "SELECT * FROM $this->table
              JOIN petugas ON $this->table.id_petugas = petugas.id_petugas
              JOIN jenis ON $this->table.id_jenis = jenis.id_jenis
              JOIN ruang ON $this->table.id_ruang = ruang.id_ruang
              WHERE id_inventaris = '$id'";
      $query = $this->conn->query($sql);
      $result = $query->fetch_assoc();
      return $result;
    }
  }
  