<?php
session_start();

if (!isset($_SESSION["username"])) {
  header("location: login.php");
  exit;
}

require 'functions.php';

if (isset($_POST["tambah"])) {
  if (tambah($_POST) > 0) {
    echo "<script>
            alert('Data Berhasil ditambahkan!');
            document.location.href = 'admin.php';
          </script>";
  } else {
    echo "<script>
            alert('Data Gagal ditambahkan!');
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
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/icons/font/bootstrap-icons.css">
  <title>Cheval's - Add Item</title>
</head>

<body class="bg-main">

  <!-- Add -->
  <div class="container my-5">
    <div class="row justify-content-center">
      <div class="card col-sm-10 col-md-8">
        <div class="card-body">
          <h4 class="card-title text-center">Add Item on Chevals</h4>
          <form action="" method="POST" enctype="multipart/form-data">
            <div class="mb-2">
              <label for="name" class="col-form-label">Name</label>
              <input type="text" name="name" class="form-control" placeholder="Write Name of Item" required autofocus>
            </div>
            <div class="mb-2">
              <label for="color" class="col-form-label">Color</label>
              <textarea type="color" name="color" class="form-control" placeholder="Write The Available Color of Item" required></textarea>
            </div>
            <div class="mb-2">
              <label for="stok" class="col-form-label">Stock of Item</label>
              <input type="text" type="stok" name="stok" class="form-control" placeholder="How Many Items are Available?" required>
              <p class="ms-2 text-muted">Write in numbers</p>
            </div>
            <div class="mb-2">
              <label for="price" class="col-form-label">Price</label>
              <input type="text" type="price" name="price" class="form-control" placeholder="Write The Price of Item" required>
            </div>
            <div class="mb-2">
              <label for="picture" class="col-form-label">Picture</label>
              <input type="file" name="picture" class="form-control picture" placeholder="Write Picture Name of Item" onchange="previewImage()">
              <img src="../assets/img/blank.png" width="150" class="mt-3 d-block img-preview">
            </div>
            <div class="mb-3">
              <label for="category" class="col-form-label">Category</label>
              <select class="form-select" name="category" required>
                <option disabled selected>Select the Category</option>
                <option value="Casual">Casual</option>
                <option value="Canvas">Canvas</option>
                <option value="Runshoes">Runshoes</option>
                <option value="Sport">Sport</option>
              </select>
            </div>
            <!-- Add & Back -->
            <button type="submit" name="tambah" class="btn btn-primary">Add</button>
            <a href="../php/admin.php" class="mx-3 link-secondary">Back</a>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Script -->
  <script src="../assets/js/script.js"></script>
  <script src="../assets/js/jquery-3.5.1.js"></script>
  <script src="../assets/js/bootstrap.bundle.min.js"></script>
</body>

</html>