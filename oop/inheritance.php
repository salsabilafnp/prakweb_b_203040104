<?php

class produk
{
  public $judul,
    $penulis,
    $penerbit,
    $harga,
    $jmlhHalaman,
    $waktumain;

  public function __construct($judul = "judul", $penulis = "penulis", $penerbit  = "penerbit", $harga = 0, $jmlhHalaman = 0, $waktumain = 0)
  {
    $this->judul = $judul;
    $this->penulis = $penulis;
    $this->penerbit = $penerbit;
    $this->harga = $harga;
    $this->jmlhHalaman = $jmlhHalaman;
    $this->waktumain = $waktumain;
  }

  public function getLabels()
  {
    return "$this->penulis, $this->penerbit,";
  }

  public function getInfoLengkap()
  {
    $str = " {$this->judul} | {$this->getLabels()} (Rp . {$this->harga})";
    return $str;
  }
}

class komik extends produk
{
  public function getInfoLengkap()
  {
    $str = "Komik : {$this->judul} | {$this->getLabels()} (Rp . {$this->harga} - {$this->jmlhHalaman} Halaman.)";
    return $str;
  }
}

class game extends produk
{
  public function getInfoLengkap()
  {
    $str = "Game : {$this->judul} | {$this->getLabels()} (Rp . {$this->harga} - {$this->waktumain} Jam.)";
    return $str;
  }
}

class infoProduk
{
  public function cetak(Produk $produk)
  {
    $str = "{$produk->judul} | {$produk->getLabels()}  (Rp . {$produk->harga}) | ";
    return $str;
  }
}

$produk3 = new komik("naruto", "masashi kishimoto", "shonen jump", 30000, 100, 0, "komik");
$produk4 = new game("uncharted", "neil druckman", "sony computer", 250000, 0, 50, "game");

echo $produk3->getInfoLengkap();
echo "<br>";
echo $produk4->getInfoLengkap();
