<?php
// Koneksi ke database
function koneksi()
{
  $conn = mysqli_connect("localhost", "root", "");
  mysqli_select_db($conn, "prakweb_2022_b_203040104");

  return $conn;
}

// Query
function query($sql)
{
  $conn = koneksi();
  $result = mysqli_query($conn, $sql);
  // pembuatan array assoc
  // jika hasilnya hanya 1 data
  if (mysqli_num_rows($result) == 1) {
    return mysqli_fetch_assoc($result);
  }

  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }

  return $rows;
}

// Upload
function upload()
{
  $nama_file = $_FILES['picture']['name'];
  $tipe_file = $_FILES['picture']['type'];
  $ukuran_file = $_FILES['picture']['size'];
  $error = $_FILES['picture']['error'];
  $tmp_file = $_FILES['picture']['tmp_name'];

  // cek tidak ada gambar dipilih
  if ($error == 4) {
    //echo "<script>
    //        alert('pilih gambar terlebih dahulu');
    //      </script>";
    return 'blank.png';
  }

  // cek ekstensi file
  $daftar_gambar = ['jpg', 'jpeg', 'png'];
  $ekstensi_file = explode('.', $nama_file);
  // ambil ekstensi
  $ekstensi_file = strtolower(end($ekstensi_file));
  // cek ekstensi sesuai dengan daftar
  if (!in_array($ekstensi_file, $daftar_gambar)) {
    echo "<script>
            alert('File salah, silakan pilih ulang!');
          </script>";
    return false;
  }

  // cek type file
  if ($tipe_file != 'image/jpeg' && $tipe_file != 'image/png') {
    echo "<script>
            alert('File salah, silakan pilih ulang!');
          </script>";
    return false;
  }

  // cek ukuran file
  // maksimal 5Mb = 5000000
  if ($ukuran_file > 5000000) {
    echo "<script>
            alert('ukuran file terlalu besar!');
          </script>";
    return false;
  }

  // lolos pengecekan, siap upload file
  // generate nama file baru
  $nama_file_baru = uniqid();
  $nama_file_baru .= '.';
  $nama_file_baru .= $ekstensi_file;
  // upload file ke folder img
  move_uploaded_file($tmp_file, '../../img/' . $nama_file_baru);

  return $nama_file_baru;
}

// Tambah
function tambah($data)
{
  $conn = koneksi();

  $id = htmlspecialchars($data['id']);
  $judul_buku = htmlspecialchars($data['judul_buku']);
  $genre = htmlspecialchars($data['genre']);
  $pengarang = htmlspecialchars($data['pengarang']);
  $penerbit = htmlspecialchars($data['penerbit']);
  $tahun_terbit = htmlspecialchars($data['tahun_terbit']);
  //$gambar = htmlspecialchars($data['gambar']);

  // upload gambar
  $gambar = upload();

  if (!$gambar) {
    return false;
  }

  $query = "INSERT INTO buku VALUES ('$id', '$judul_buku', '$genre', '$pengarang', '$penerbit', '$tahun_terbit', '$gambar')";

  mysqli_query($conn, $query) or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}

// Hapus
function hapus($id)
{
  $conn = koneksi();

  // menghapus gambar di folder img
  $books = query("SELECT * FROM buku WHERE id = '$id'");
  if ($books['picture'] != 'blank.png') {
    unlink('../../img/' . $books['gambar']);
  }

  mysqli_query($conn, "DELETE FROM buku WHERE id = '$id'") or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}

// Ubah atau Edit
function ubah($data)
{
  $conn = koneksi();

  $id = htmlspecialchars($data['id']);
  $judul_buku = htmlspecialchars($data['judul_buku']);
  $genre = htmlspecialchars($data['genre']);
  $pengarang = htmlspecialchars($data['pengarang']);
  $penerbit = htmlspecialchars($data['penerbit']);
  $tahun_terbit = htmlspecialchars($data['tahun_terbit']);
  $gambar_lama = htmlspecialchars($data['gambar_lama']);

  $gambar = upload();
  if (!$gambar) {
    return false;
  }

  if ($gambar == 'blank.png') {
    $gambar = $gambar_lama;
  }

  $query = "UPDATE buku SET 
              gambar = '$gambar',
              judul_buku = '$judul_buku',
              genre = '$genre',
              pengarang = '$pengarang',
              penerbit = '$penerbit',
              tahun_terbit = '$tahun_terbit'
              WHERE id = '$id';";

  mysqli_query($conn, $query) or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}

// cari
function cari($keyword)
{
  $conn = koneksi();

  $query = "SELECT * FROM buku
            WHERE judul_buku LIKE '%$keyword%' OR
            genre LIKE '%$keyword%' OR
            pengarang LIKE '%$keyword%' OR
            penerbit LIKE '%$keyword%'
            OR tahun_terbit LIKE '%$keyword%'";

  $result = mysqli_query($conn, $query);

  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }

  return $rows;
}
