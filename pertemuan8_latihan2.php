<html>
<head><title>Contoh Penggunaan UDF</title></head>
<body>

<form method="post">
Masukkan Bilangan Pertama : <br>
<input type="text" name="A"><br>

Masukkan Bilangan Kedua : <br>
<input type="text" name="B"><br>

<input type="submit" value="hitung">
</form>

<?php
if (isset($_POST['A']) && isset($_POST['B'])) {

    $A = $_POST["A"];
    $B = $_POST["B"];

    function jumlah($A,$B) {
        return $A + $B;
    }

    function kurang($A,$B) {
        return $A - $B;
    }

    function kali($A,$B) {
        return $A * $B;
    }

    function bagi($A,$B) {
        return $A / $B;
    }

    echo "<br>";
    echo "Bilangan Pertama : $A<br>";
    echo "Bilangan Kedua : $B<br><br>";

    echo "Hasil Penjumlahan 2 buah bilangan <br>";
    printf("Penjumlahan antara : %d + %d = %d<br><br>", $A, $B, jumlah($A,$B));

    echo "Hasil Pengurangan 2 buah bilangan <br>";
    printf("Pengurangan antara : %d - %d = %d<br><br>", $A, $B, kurang($A,$B));

    echo "Hasil Perkalian 2 buah bilangan <br>";
    printf("Perkalian antara : %d * %d = %d<br><br>", $A, $B, kali($A,$B));

    echo "Hasil Pembagian 2 buah bilangan <br>";
    printf("Pembagian antara : %d / %d = %d<br><br>", $A, $B, bagi($A,$B));
}
?>

</body>
</html>