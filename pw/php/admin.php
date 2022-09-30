<?php
session_start();

if (!isset($_SESSION["username"])) {
  header("location: login.php");
  exit;
}

require 'functions.php';

$shoes = query("SELECT * FROM cheval");

// ketika tombol cari ditekan
if (isset($_POST['cari'])) {
  $shoes = cari($_POST['keyword']);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- CSS -->
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/icons/font/bootstrap-icons.css">
  <title>Cheval's - Admin Page</title>
</head>

<body>

  <!-- Navbar -->
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-main mx-auto">
    <div class="container">
      <a href="../php/admin.php" class="fw-bold fst-italic align-middle navbar-brand">CHEVAL</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
        <ul class="navbar-nav">
          <a href="../shoe.php" class="nav-item nav-link page-scroll">
            <button type="button" class="btn btn-2"><i class="bi bi bi-people-fill"></i> User Page</button>
          </a>
          <a href="../php/logout.php" class="nav-item nav-link page-scroll">
            <button type="button" class="btn btn-1"><i class="bi bi-box-arrow-right"></i> Logout</button>
          </a>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Admin -->
  <section id="admin" class="my-5 container justify-content-center">
    <h1 class="text-center display-5 fw-bold mb-3">Cheval's Database</h1>

    <!-- Action Bar -->
    <form action="" method="POST" class="mb-3">
      <!-- Searching -->
      <input type="text" name="keyword" size="30" placeholder="masukkan keyword pencarian..." autocomplete="off" autofocus>
      <button type="submit" name="cari" class="btn btn-secondary">Search</button>
      <!-- add -->
      <a href="../php/tambah.php" class="btn btn-primary float-sm-end"><i class="bi bi-plus-circle"></i> Add Item</a>
    </form>

    <!-- tabel database -->
    <table class="table table-sm align-middle table-bordered table-striped table-hover text-center">
      <thead>
        <th scope="col">No.</th>
        <th scope="col">Opsi</th>
        <th scope="col">Picture</th>
        <th scope="col">Name</th>
        <th scope="col">Available Color</th>
        <th scope="col">Stocks</th>
        <th scope="col">Price</th>
        <th scope="col">Category</th>
      </thead>

      <!-- Tampilan Pencarian -->
      <?php if (empty($shoes)) : ?>
        <tr>
          <td colspan="7">
            <h1 style="color: red;">Data tidak ditemukan</h1>
          </td>
        </tr>
      <?php endif; ?>

      <?php $no = 1; ?>
      <?php foreach ($shoes as $shoe) : ?>
        <tbody>
          <td><?= $no; ?></td>
          <td class="text-center col-1">
            <!-- button edit -->
            <a href="ubah.php?id=<?= $shoe['id']; ?>" class="btn btn-sm btn-outline-primary m-1"><i class="bi bi-pencil-square d-md-block d-sm-none"></i> Edit</a>
            <!-- button delete -->
            <a href="hapus.php?id=<?= $shoe['id']; ?>" class="delete btn btn-sm btn-outline-danger" onclick="return confirm('Delete This?')"><i class="bi bi-trash d-md-block d-sm-none"></i> Delete</a>
          </td>
          <td class="col-3">
            <img class="m-1" src="../assets/img/<?= $shoe["picture"]; ?>" width="50%">
          </td>
          <td class="fw-bold text-uppercase col-2"><?= $shoe["name"]; ?></td>
          <td class="col-2"><?= $shoe["color"]; ?></td>
          <?php if ($shoe['stok'] > 0) : ?>
            <td class="fw-bold"><?= $shoe["stok"]; ?></td>
          <?php elseif ($shoe['stok'] < 1) : ?>
            <td class="col-1 text-danger fw-bold">OUT OF STOCK</td>
          <?php endif; ?>
          <td class="fst-italic"><?= $shoe["price"]; ?></td>
          <td class="fw-bold text-secondary"><?= $shoe["category"]; ?></td>
        </tbody>
        <?php $no++; ?>
      <?php endforeach; ?>
    </table>
  </section>

  <!-- Script -->
  <script src="../assets/js/script.js"></script>
  <script src="../assets/js/jquery-3.5.1.js"></script>
  <script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>