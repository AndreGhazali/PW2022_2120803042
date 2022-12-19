<?php 
    $angka = [76, 56, 79, 88, 74, 97, 39, 48, 57];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Perulangan While</title>
</head>
<body>
    <?php 
     echo "</br>";
     echo "Pengulangan menggunakan While : </br>";
  $i = 0;
  while ($i < count($angka)) {
    echo $angka[$i]."<br>";
    $i++;
        }
    ?>
</body>
</html