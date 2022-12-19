<?php
$conn = mysqli_connect("localhost", "root", "", "uas");

function query($query) {
  global $conn;
  $result = mysqli_query($conn, $query);
  $rows = [];
  while( $row = mysqli_fetch_assoc($result) ) {
    $rows[] = $row;
  }
  return $rows;
}


function tambah($_data) {
  global $conn;
  $namaoperator = htmlspecialchars($_data["namaoperator"]);
  $pilihanpaket = htmlspecialchars($_data["pilihanpaket"]);
  $namacombopaket = htmlspecialchars($_data["namacombopaket"]);
  $masaaktif = htmlspecialchars($_data["masaaktif"]);
  $harga = htmlspecialchars($_data["harga"]);

  $gambar = upload();
  if( !$gambar ) {
    return false;
  }

  $query = "INSERT INTO paketkuotaa
              VALUES
              ('', '$namaoperator', '$pilihanpaket', '$namacombopaket', '$masaaktif', '$harga', '$gambar')
              ";
  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}


function upload() {
  
  $namaFile = $_FILES['gambar']['name'];
  $ukuranFile = $_FILES['gambar']['size'];
  $error = $_FILES['gambar']['error'];
  $tmpname = $_FILES['gambar']['tmp_name'];


  if( $error === 4 ) {
    echo "<script>
            alert('pilih gambar terlebih dahulu!');
            </script>";
          return false;
  }

$ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
$ekstensiGambar = explode('.', $namaFile);
$ekstensiGambar = strtolower(end($ekstensiGambar));
if( !in_array($ekstensiGambar, $ekstensiGambarValid) ) {
  echo "<script>
          alert('yang anda upload bukan gambar!');
          </script>";
          return false;
}


if( $ukuranFile > 1000000 ) {
  echo "<script>
          alert('ukuran gambar terlalu besar!');
          </script>";
        return false;
}

$namaFileBaru = uniqid();
$namaFileBaru .= '.';
$namaFileBaru .= $ekstensiGambar;


  move_uploaded_file($tmpname, 'img/' . $namaFileBaru);

  return $namaFileBaru;
}


function hapus($id) {
  global $conn;
  mysqli_query($conn, "DELETE FROM paketkuotaa WHERE id = $id");

  return mysqli_affected_rows($conn);
}


function ubah($_data) {
  global $conn;

  $id = $_data["id"];
  $namaoperator = htmlspecialchars($_data["namaoperator"]);
  $pilihanpaket = htmlspecialchars($_data["pilihanpaket"]);
  $namacombopaket = htmlspecialchars($_data["namacombopaket"]);
  $masaaktif = htmlspecialchars($_data["masaaktif"]);
  $harga = htmlspecialchars($_data["harga"]);
  $gambar = htmlspecialchars($_data["gambar"]);


  if( $FILES['gambar']['error'] === 4 ) {
    $gambar = $gambar;
  } else {
  $gambar = upload();
  }

  $query = "UPDATE paketkuotaa SET
              namaoperator = '$namaoperator',
              pilihanpaket = '$pilihanpaket',
              namacombopaket = '$namacombopaket',
              masaaktif = '$masaaktif',
              harga = '$harga',
              gambar = '$gambar'
            WHERE id = $id
              ";

  mysqli_query($conn, $query);

  return mysqli_affected_rows($conn);
}

function cari($keyword) {
  $query = "SELECT * FROM paketkuotaa
            WHERE
            namaoperator LIKE '%$keyword%' OR
            pilihanpaket LIKE '%$keyword%' OR
            namacombopaket LIKE '%$keyword%' OR
            masaaktif LIKE '%$keyword%' OR
            harga LIKE '%$keyword%' 
            ";
  return query($query);
}

function registrasi($data) {
  global $conn;

  $username = strtolower(stripslashes($data["username"]));
  $password = mysqli_real_escape_string($conn,$data["password"]);
  $password2 = mysqli_real_escape_string($conn,$data["password2"]);

  $result = mysqli_query($conn, "SELECT username FROM userrr WHERE username = '$username'");

  if ( mysqli_fetch_assoc($result) ) {
    echo "<script>
            alert('username telah terdaftar')
          </script>";
          return false;
  }

  if ( $password !== $password2){
    echo "<script>
            alert('konfirmasi password tidak sesuai');
          </script>";

      return false;
  }
  $password = password_hash($password, PASSWORD_DEFAULT);

  mysqli_query($conn, "INSERT INTO userrr VALUES('', '$username', '$password')");

  return mysqli_affected_rows($conn);
}
?>

