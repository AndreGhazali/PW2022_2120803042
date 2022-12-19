<?php 

$alas;
$tinggi;

function luas_segitiga_sksk($alas, $tinggi) {
  $luas = 1/2 * $alas * $tinggi;
  return $luas;
} 
echo "Jawab :";
echo "</br>";
echo "</br>";
echo "Rumus Segitiga siku-siku :";
echo "</br>";
echo "</br>";
echo "1/2 * alas * tinggi";
echo "</br>";
echo "</br>";
echo "1/2 * 8 * 3";
echo "</br>";
echo "</br>";
echo " = " . luas_segitiga_sksk(8, 3);
?>