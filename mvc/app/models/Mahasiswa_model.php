<?php

class Mahasiswa_model
{
  private $dbh; // database handler
  private $stmt;

  public function __construct()
  {
    // data source name, koneksi ke sql
    $dsn = 'mysql:host=localhost;dbname=prakweb_2022_b_203040104';

    try {
      $this->dbh = new PDO($dsn, 'root', '');
    } catch (PDOException $e) {
      die($e->getMessage());
    }
  }

  public function getAllMahasiswa()
  {
    $this->stmt = $this->dbh->prepare('SELECT * from mahasiswa');
    $this->stmt->execute();
    return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
  }
}
