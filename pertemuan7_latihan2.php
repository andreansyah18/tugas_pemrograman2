<html>
<head>
<title>Penggunaan list</title>
</head>
<body>

<?php
$program = array('Bobo','Doraemon','Spiderman');
list($Majalah, $Komik, $Film) = $program;

echo "Cerpen : $Majalah <br>";
echo "Cerita Bergambar : $Komik <br>";
echo "Bioskop : $Film";
?>

</body>
</html>