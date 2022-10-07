<?php

class produk
{
  public $judul,
    $penulis,
    $penerbit,
    $harga;

  public function __construct($judul = "judul", $penulis = "penulis", $penerbit  = "penerbit", $harga = 0)
  {
    $this->judul = $judul;
    $this->penulis = $penulis;
    $this->penerbit = $penerbit;
    $this->harga = $harga;
  }


  public function getLabels()
  {
    return "$this->penulis, $this->penerbit,";
  }
}


// $produk1 = new produk();
// $produk1->judul = "naruto";
// var_dump($produk1);

// $produk2 = new produk();
// $produk2->judul ="uncharted";
// $produk2->tambahProperty = "hahahah";
// var_dump($produk2);

$produk3 = new produk("naruto", "masashi kishimoto", "shonen jump", 30000);
$produk4 = new produk("uncharted", "neil druckman", "sony computer", 250000);
$produk5 = new produk("dragonball");

echo "komik : " . $produk3->getLabels();
echo "<br>";
echo "game : " . $produk4->getLabels();
var_dump($produk5);
