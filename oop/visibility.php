<?php

class produk
{
  public $judul,
    $penulis,
    $penerbit;
  protected $diskon = 0;

  private
    $harga;


  public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0)
  {
    $this->judul = $judul;
    $this->penulis = $penulis;
    $this->penerbit = $penerbit;
    $this->harga = $harga;
  }


  public function getHarga()
  {
    return $this->harga - ($this->harga * $this->diskon / 100);
  }

  public function getLabel()
  {
    return "$this->penulis, $this->penerbit";
  }

  public function getInfoLengkap()
  {
    $str = "{$this->judul} | {$this->getLabel()} (Rp. {$this->harga})";

    return $str;
  }
}

class komik extends produk
{
  public $jmlhHalaman;

  public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0, $jmlhHalaman = 0)
  {
    parent::__construct($judul, $penulis, $penerbit, $harga);

    $this->jmlhHalaman = $jmlhHalaman;
  }


  public function getInfoLengkap()
  {
    $str = "Komik : " . parent::getInfoLengkap() . " - {$this->jmlhHalaman} Halaman.";
    return $str;
  }
}

class game extends produk
{
  public $waktumain;
  public function __construct($judul = "judul", $penulis = "penulis", $penerbit = "penerbit", $harga = 0, $waktumain = 0)
  {
    parent::__construct($judul, $penulis, $penerbit, $harga);

    $this->waktuMain = $waktumain;
  }

  public function setDiskon($diskon)
  {
    $this->diskon = $diskon;
  }

  public function getInfoLengkap()
  {
    $str = "Game : " . parent::getInfoLengkap() . " ~ {$this->waktumain} Jam.";
    return $str;
  }
}

class CetakInfoProduk
{
  public function cetak(Produk $produk)
  {
    $str = "{$produk->judul} | {$produk->getLabel()} (Rp. {$produk->harga})";
    return $str;
  }
}


$produk3 = new Komik("naruto", "masashi kishimoto", "shonen jump", 30000, 100, 0);
$produk4 = new Game("uncharted", "neil druckmann", "sony computer", 250000, 50);

echo $produk3->getInfoLengkap();
echo "<br>";
echo $produk4->getInfoLengkap();
echo "<hr>";

$produk4->setDiskon(50);
echo $produk4->getHarga();
