<html>
<head>
<title>Perhitungan Sederhana</title>
</head>

<body>

<h2>Perhitungan Nilai</h2>

<?php
$nilai1 = 80;
$nilai2 = 90;
$rata = ($nilai1 + $nilai2) / 2;

echo "Nilai 1 = $nilai1 <br>";
echo "Nilai 2 = $nilai2 <br>";
echo "Rata-rata = $rata <br>";

if ($rata >= 75) {
    echo "Keterangan: LULUS";
} else {
    echo "Keterangan: TIDAK LULUS";
}
?>

</body>
</html>