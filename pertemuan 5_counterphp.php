<html>
<head>
<title>Contoh Counter</title>
</head>
<body>

<?php
$nama_file = "counter.dat";

if (file_exists($nama_file)) {
    $berkas = fopen($nama_file, "r");
    $pencacah = (int) trim(fgets($berkas));
    $pencacah++;
    fclose($berkas);
} else {
    $pencacah = 1;
}

// simpan pencacah
$berkas = fopen($nama_file, "w");
fputs($berkas, $pencacah);
fclose($berkas);

// tampilkan
echo "Anda pengunjung ke-$pencacah <br>";
?>

</body>
</html>