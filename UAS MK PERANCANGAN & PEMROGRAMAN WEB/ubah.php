<?php 
require 'functions.php';


$id = $_GET["id"];


$pkt = query("SELECT * FROM paketkuotaa WHERE id = $id")[0];

if ( isset($_POST["submit"]) ) {


if( ubah($_POST) > 0 ) {
  echo "
  <script>
    alert('data berhasil diubah!');
    document.location.href = 'index.php';
  </script>  
  ";
} else {
  echo "
  <script>
    alert('data gagal diubah!');
    document.location.href = 'index.php';
  </script>  
  ";
}
  
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Ubah data Paket Kuota</title>
  <link rel="stylesheet" href="uas.css">
</head>
<body>

  <h1>Ubah data Paket Kuota</h1>
  <div class="wrapper">
    <div class="contact-form">
      <div class="input-fields">
  <form action="" method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $pkt["id"]; ?>">
    <input type="hidden" name="gambar" value="<?= $pkt["gambar"]; ?>">
    <div class="items">
        <label for="namaoperator">Nama Operator : </label>
        <input type="text" name="namaoperator" id="namaoperator" required
        value="<?= $pkt["namaoperator"]; ?>">
        </div>
        <div class="items">
        <label for="pilihanpaket">Pilihan Paket : </label>
        <input type="text" name="pilihanpaket" id="pilihanpaket" required
        value="<?= $pkt["pilihanpaket"]; ?>">
        </div>
        <div class="items">
      <label for="namacombopaket">Nama Combo Paket : </label>
        <input type="text" name="namacombopaket" id="namacombopaket" required
        value="<?= $pkt["namacombopaket"]; ?>">
        </div>
        <div class="items">
      <label for="masaaktif">Masa Aktif : </label>
        <input type="text" name="masaaktif" id="masaaktif" required
        value="<?= $pkt["masaaktif"]; ?>">
        </div>
        <div class="items">
      <label for="harga">Harga : </label>
        <input type="text" name="harga" id="harga" required
        value="<?= $pkt["harga"]; ?>">
        </div>
        <div class="items">
      <label for="gambar">gambar : </label> <br>
      <img src="img/<?= $pkt['gambar']; ?>" width="40"> <br>
        <input type="file" name="gambar" id="gambar">
        </div>

        <button type="submit" name="submit">Ubah Data!</button>

  </form>
  </div>
  </div>
</div>
</body>
</html>