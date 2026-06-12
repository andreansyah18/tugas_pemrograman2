<!DOCTYPE html>
<html>
<head>
    <title>Error Handling</title>
</head>
<body>

<form method="post">
    Masukkan Angka:
    <input type="text" name="angka">
    <input type="submit" value="Proses">
</form>

<?php

if(isset($_POST['angka']))
{
    $angka = $_POST['angka'];

    if(!is_numeric($angka))
    {
        echo "<h3 style='color:red'>ERROR: Input harus berupa angka!</h3>";
    }
    elseif($angka < 0)
    {
        echo "<h3 style='color:red'>ERROR: Angka tidak boleh negatif!</h3>";
    }
    else
    {
        echo "<h3 style='color:green'>Input valid: $angka</h3>";
    }
}

?>

</body>
</html>