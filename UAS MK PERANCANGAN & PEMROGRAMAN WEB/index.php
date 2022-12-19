<?php 
require 'functions.php';
$paketkuotaa = query("SELECT * FROM paketkuotaa");


if( isset($_POST["cari"]) ) {
  $paketkuotaa = cari($_POST["keyword"]);
}

?>
<!DOCTYPE html>
<html>
<head>
  <title>Halaman Admin</title>
  <link rel="stylesheet" href="uas.css">
</head>
<body>
  
<h1>Daftar Paket Kuota Telkomsel & XL</h1>

<br>
<a href="tambah.php">Tambah data Paket Kuota</a>
<br><br>

<form action="" method="post">

<input type="text" name="keyword" size="40" autofocus
placehorder="silahkan masukkan teks...." autocomplate="off">
<button type="submit" name="cari">Cari</button>

</form>

<br>
<table border="1" cellpadding="10" cellspacing="0">

<tr>
  <th>No.</th>
  <th>Aksi</th>
  <th>Gambar</th>
  <th>Nama Operator</th>
  <th>Pilihan Paket</th>
  <th>Nama Combo Paket</th>
  <th>Masa Aktif</th>
  <th>Harga</th>
</tr>

<?php $i = 1; ?>
<?php foreach($paketkuotaa as $row) : ?>
<tr>
  <td><?= $i; ?></td>
  <td>
    <a href="ubah.php?id=<?= $row["id"]; ?>">ubah</a> |
    <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="
    return confirm('yakin?');">hapus</a>
  </td>
  <td><img src="img/<?= $row["gambar"]; ?>" width="200"></td>
  <td><?= $row["namaoperator"]; ?></td>
  <td><?= $row["pilihanpaket"]; ?></td>
  <td><?= $row["namacombopaket"]; ?></td>
  <td><?= $row["masaaktif"]; ?></td>
  <td><?= $row["harga"]; ?></td>
</tr>
<?php $i++; ?>
<?php endforeach; ?>
</table>
</body>
</html>