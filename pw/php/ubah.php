<?php

// jika tidak ada id di url
if (!isset($_GET['id'])) {
  header("Location: admin.php");
  exit;
}

require 'functions.php';

$id = $_GET['id'];

$books = query("SELECT * FROM cheval WHERE id = $id");

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
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/icons/font/bootstrap-icons.css">
  <title>Pesona Store - Edit Item</title>
</head>

<body class="bg-main">

  <!-- Edit -->
  <div class="container my-5">
    <div class="row justify-content-center">
      <div class="card col-sm-10 col-md-8">
        <div class="card-body">
          <h4 class="card-title text-center">Edit Item on Pesona Store</h4>
          <form action="" method="POST" enctype="multipart/form-data">
            <div class="mb-2">
              <label for="name" class="col-form-label">Name</label>
              <input type="text" name="name" class="form-control" placeholder="Write Name of Item" required autofocus value="<?= $books['name']; ?>">
            </div>
            <div class="mb-2">
              <label for="name" class="col-form-label">Name</label>
              <input type="text" name="name" class="form-control" placeholder="Write Name of Item" required autofocus value="<?= $books['name']; ?>">
            </div>
            <div class="mb-2">
              <label for="color" class="col-form-label">Color</label>
              <textarea type="color" name="color" class="form-control" placeholder="Write The Available Color of Item" required><?= $books['color']; ?></textarea>
            </div>
            <div class="mb-2">
              <label for="stok" class="col-form-label">Stock of Item</label>
              <input type="text" type="stok" name="stok" class="form-control" placeholder="How Many Items are Available?" required value="<?= $books['stok']; ?>">
              <p class="ms-2 text-muted">Write in numbers</p>
            </div>
            <div class="mb-2">
              <label for="price" class="col-form-label">Price</label>
              <input type="text" type="price" name="price" class="form-control" placeholder="Write The Price of Item" required value="<?= $books['price']; ?>">
            </div>
            <div class="mb-2">
              <input type="hidden" name="picture_old" value="<?= $books['picture']; ?>">
              <label for="picture" class="col-form-label">Picture</label>
              <input type="file" name="picture" class="form-control picture" placeholder="Write Picture Name of Item" onchange="previewImage()">
              <img src="../assets/img/<?= $books['picture']; ?>" width="150" class="mt-3 d-block img-preview">
            </div>
            <div class="mb-3">
              <label for="category" class="col-form-label">Category</label>
              <select class="form-select" name="category" required value="<?= $books['category']; ?>">
                <option disabled>Select the Category</option>
                <option value="Casual">Casual</option>
                <option value="Canvas">Canvas</option>
                <option value="Runshoes">Runshoes</option>
                <option value="Sport">Sport</option>
              </select>
            </div>
            <!-- Edit & Back -->
            <button type="submit" name="ubah" class="btn btn-primary">Edit</button>
            <a href="../php/admin.php" class="mx-3 text-secondary">Back</a>
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