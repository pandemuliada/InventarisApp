<?php

  class Peminjaman extends Database
  {
    private $table = 'peminjaman';

    public function __construct() {
      parent::__construct();
    }

    public function addPeminjaman($value)
    {
      $sql = "INSERT INTO $this->table (id_inventaris, id_petugas, status, jumlah_pinjam, tanggal_pinjam, tanggal_kembali)
              VALUES ('$value[0]', '$value[1]', '$value[2]', '$value[3]', '$value[4]', '$value[5]')";
      $query = $this->conn->query($sql);
      if ($sql) return true;
    }

    public function deletePeminjaman($id)
    {
      $sql = "DELETE FROM peminjaman WHERE id_$this->table = '$id'";
      $query = $this->conn->query($sql);
      if ($query) return true;
    }

    public function getAllPeminjaman()
    {
      $sql = "SELECT * FROM $this->table 
              JOIN petugas ON $this->table.id_petugas = petugas.id_petugas
              JOIN inventaris ON $this->table.id_inventaris = inventaris.id_inventaris";
      $query = $this->conn->query($sql);
      $result = $this->fetchAll($query);
      return $result;
    }

    public function getAllPeminjamanByStatus($status)
    {
      $sql = "SELECT * FROM $this->table 
      JOIN petugas ON $this->table.id_petugas = petugas.id_petugas
      JOIN inventaris ON $this->table.id_inventaris = inventaris.id_inventaris
      WHERE status = '$status'";
      $query = $this->conn->query($sql);
      $result = $this->fetchAll($query);
      return $result;
    }

    public function getPeminjamanByUserAndStatus($id_user, $status)
    {
      $sql = "SELECT * FROM $this->table 
              JOIN petugas ON $this->table.id_petugas = petugas.id_petugas
              JOIN inventaris ON $this->table.id_inventaris = inventaris.id_inventaris
              WHERE peminjaman.id_petugas = '$id_user' AND peminjaman.status = '$status'";
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
  