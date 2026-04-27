<html>
<head>
<title>Penggunaan is_array</title>
</head>
<body>

<?php
$var = array(1,2,3,4,5,6,7);

if (is_array($var)) {
    echo "Variabel \$var merupakan array";
} else {
    echo "Variabel \$var bukan array";
}
?>

</body>
</html>