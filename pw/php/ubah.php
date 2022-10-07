<?php

// jika tidak ada id di url
if (!isset($_GET['id'])) {
  header("Location: admin.php");
  exit;
}

require 'functions.php';

$id = $_GET['id'];

$books = query("SELECT * FROM buku WHERE id = '$id'");

if (isset($_POST['ubah'])) {
  if (ubah($_POST) > 0) {
    echo "<script>
            alert('Data Berhasil diubah!');
            document.location.href = 'admin.php';
          </script>";
  } else {
    echo "<script>
            alert('Data Gagal diubah!');
            document.location.href = 'admin.php';
          </script>";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- CSS -->
  <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="../../assets/css/style.css">
  <link rel="stylesheet" href="../../assets/icons/font/bootstrap-icons.css">
  <title>Pesona Store - Ubah</title>
</head>

<body class="bg-main">

  <!-- Edit -->
  <div class="container my-5">
    <div class="row justify-content-center">
      <div class="card col-sm-10 col-md-8">
        <div class="card-body">
          <h4 class="card-title text-center">Ubah Data - Pesona's Store</h4>
          <form action="" method="POST" enctype="multipart/form-data">
            <div class="mb-2">
              <input type="hidden" name="id" class="form-control" placeholder="Kode Buku" required autofocus value="<?= $books['id']; ?>">
            </div>
            <div class="mb-2">
              <label for="judul_buku" class="col-form-label">Judul Buku</label>
              <input type="text" name="judul_buku" class="form-control" placeholder="Judul Buku" required autofocus value="<?= $books['judul_buku']; ?>">
            </div>
            <div class="mb-2">
              <label for="genre" class="col-form-label">Genre</label>
              <input type="text" name="genre" class="form-control" placeholder="Genre Buku" required autofocus value="<?= $books['genre']; ?>">
            </div>
            <div class="mb-2">
              <label for="pengarang" class="col-form-label">Pengarang</label>
              <input type="text" name="pengarang" class="form-control" placeholder="Pengarang Buku" required autofocus value="<?= $books['pengarang']; ?>">
            </div>
            <div class="mb-2">
              <label for="penerbit" class="col-form-label">Penerbit</label>
              <input type="text" name="penerbit" class="form-control" placeholder="Penerbit Buku" required autofocus value="<?= $books['penerbit']; ?>">
            </div>
            <div class="mb-2">
              <label for="tahun_terbit" class="col-form-label">Tahun Terbit</label>
              <input type="text" name="tahun_terbit" class="form-control" placeholder="Tahun Terbit" required autofocus value="<?= $books['tahun_terbit']; ?>">
            </div>
            <div class="mb-2">
              <input type="hidden" name="gambar_lama" value="<?= $books['gambar']; ?>">
              <label for="gambar" class="col-form-label">Picture</label>
              <input type="file" name="gambar" class="form-control picture" placeholder="Unggah Gambar" onchange="previewImage()">
              <img src="../../img/<?= $books['gambar']; ?>" width="150" class="mt-3 d-block img-preview">
            </div>
            <!-- Edit & Back -->
            <button type="submit" name="ubah" class="btn btn-primary">Ubah</button>
            <a href="admin.php" class="mx-3 text-secondary">Back</a>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Script -->
  <script src="../../assets/js/script.js"></script>
  <script src="../../assets/js/jquery-3.5.1.js"></script>
  <script src="../../assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>