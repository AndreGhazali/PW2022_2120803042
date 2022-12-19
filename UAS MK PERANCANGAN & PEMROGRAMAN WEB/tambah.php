<?php 
require 'functions.php';


if ( isset($_POST["submit"]) ) {


if( tambah($_POST) > 0 ) {
  echo "
  <script>
    alert('data berhasil ditambahkan!');
    document.location.href = 'index.php';
  </script>  
  ";
} else {
  echo "
  <script>
    alert('data gagal ditambahkan!');
    document.location.href = 'index.php';
  </script>  
  ";
}
  
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Tambah data</title>
  <link rel="stylesheet" href="uas.css">
</head>
<body>

  <h1>Tambah data Paket Kuota</h1>
  <div class="wrapper">
    <div class="contact-form">
      <div class="input-fields">
  <form action="" method="post" enctype="multipart/form-data">
      <div class="items">
        <label for="namaoperator">Nama Operator : </label>
        <input type="text" name="namaoperator" id="namaoperator" required>
      </div>
      <div class="items">
        <label for="pilihanpaket">Pilihan Paket : </label>
        <input type="text" name="pilihanpaket" id="pilihanpaket" required>
      </div>
      <div class="items">
      <label for="namacombopaket">Nama Combo Paket : </label>
        <input type="text" name="namacombopaket" id="namacombopaket" required>
      </div>
      <div class="items">
      <label for="masaaktif">Masa Aktif : </label>
        <input type="text" name="masaaktif" id="masaaktif" required>
      </div>
      <div class="items">
      <label for="harga">Harga : </label>
        <input type="text" name="harga" id="harga" required>
      </div>
      <div>
      <label for="gambar">Gambar : </label>
        <input type="file" name="gambar" id="gambar" >
     </div> 
        <button type="submit" name="submit">Tambah Data!</button>

  </form>
  </div>
  </div>
</div>
</body>
</html>