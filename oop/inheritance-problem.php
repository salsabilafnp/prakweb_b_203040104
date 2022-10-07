<?php

class produk
{
  public $judul,
    $penulis,
    $penerbit,
    $harga,
    $jmlhHalaman,
    $waktumain,
    $tipe;


  public function __construct($judul = "judul", $penulis = "penulis", $penerbit  = "penerbit", $harga = 0, $jmlhHalaman = 0, $waktumain = 0, $tipe)
  {
    $this->judul = $judul;
    $this->penulis = $penulis;
    $this->penerbit = $penerbit;
    $this->harga = $harga;
    $this->jmlhHalaman = $jmlhHalaman;
    $this->waktumain = $waktumain;
    $this->tipe = $tipe;
  }

  public function getLabels()
  {
    return "$this->penulis, $this->penerbit,";
  }

  public function getInfoLengkap()
  {
    $str = "{$this->tipe} : {$this->judul} | {$this->getLabels()} (Rp . {$this->harga})";
    if ($this->tipe == "komik") {
      $str .= "- {$this->jmlhHalaman} Halaman.";
    } else if ($this->tipe == "game") {
      $str .= "- {$this->waktumain} Jam.";
    }
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

$produk3 = new produk("naruto", "masashi kishimoto", "shonen jump", 30000, 100, 0, "komik");
$produk4 = new produk("uncharted", "neil druckman", "sony computer", 250000, 0, 50, "game");

echo $produk3->getInfoLengkap();
echo "<br>";
echo $produk4->getInfoLengkap();
