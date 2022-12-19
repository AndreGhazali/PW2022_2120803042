<?php 

$id = $_GET['id'];

$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'uas';

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error){
    die("Connection failed: " . $conn->connect_error);
}

$bk = "SELECT * FROM paketkuotaa Where id = '$id'";

$hasil = $conn->query($bk);

$row = $hasil->fetch_assoc();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <title>Halaman Detail</title>
    <style>
        .header {
            background-color: #afeeee;
            text-align: center;
            padding: 20px;
        }
        nav {
            overflow: hidden;
            background-color: #6495ed;
        }
        nav a {
            float: left;
            display: block;
            color: #f2f2f2;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }
        nav a:hover {
            background-color: #ddd;
            color: black;
        }
        p {
            text-align: center;
            font-size: medium;
            font-family: Arial, Helvetica, sans-serif;
            font-weight: bold;
        }
        .image {
            text-align: center;
        }
        .isi {
            text-align: center;
            font-family: Arial, Helvetica, sans-serif;
            font-size: large;
            font-weight: bold;
            padding-bottom: 15px;
        }
    </style>
</head>
<body>
    <header>
        <h1 class="header">Daftar Paket</h1>
        <nav>
            <a href="user.php">Home</a>
        </nav>
    </header>
    <article>
    
        <p>Detail Paket</p>
        <br/>
       
        <div class="image">
            <img src="img/<?= $row['gambar']; ?>" alt="" width="350">
        </div>

        <h1 class="isi"><?= $row['namaoperator']; ?></h1>

        <div>
            <p>Pilihan Paket : <?= $row['pilihanpaket']; ?></p>
            <p>Nama combo Paket : <?= $row['namacombopaket']; ?></p>
            <p>Masa Aktif : <?= $row['masaaktif']; ?></p>
        </div>
            
    </article>

</body>
</html>