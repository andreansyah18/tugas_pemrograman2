<?php
session_start();

// LOGIN SEDERHANA
if(isset($_POST['login'])){
    if($_POST['user']=="admin" && $_POST['pass']=="123"){
        $_SESSION['login'] = true;
    } else {
        $error = "Login gagal!";
    }
}

if(isset($_GET['logout'])){
    session_destroy();
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Pendaftaran Mahasiswa</title>
    <style>
        body{font-family: Arial;}
        table, th, td{
            border:1px solid black;
            border-collapse:collapse;
            padding:5px;
        }
    </style>
</head>
<body>

<?php if(!isset($_SESSION['login'])){ ?>
    <h2>LOGIN</h2>
    <form method="POST">
        Username: <input type="text" name="user"><br><br>
        Password: <input type="password" name="pass"><br><br>
        <button name="login">Login</button>
    </form>
    <?php if(isset($error)) echo $error; ?>

<?php } else { ?>

<a href="?logout">Logout</a>

<h2>FORM PENDAFTARAN</h2>
<form method="POST">
    Kode: <input type="text" name="kode"><br><br>
    Nama: <input type="text" name="nama"><br><br>
    Tempat Lahir: <input type="text" name="tempat"><br><br>
    Tgl Lahir: <input type="date" name="tgl"><br><br>
    JK:
    <input type="radio" name="jk" value="L">L
    <input type="radio" name="jk" value="P">P<br><br>
    Asal Sekolah: <input type="text" name="sekolah"><br><br>
    Pekerjaan Ortu: <input type="text" name="ortu"><br><br>

    Nilai MAT: <input type="number" name="mat"><br>
    Nilai ING: <input type="number" name="ing"><br>
    Nilai UMUM: <input type="number" name="umum"><br><br>

    <button name="simpan">Simpan</button>
</form>

<?php
if(isset($_POST['simpan'])){
    $data = [
        "kode"=>$_POST['kode'],
        "nama"=>$_POST['nama'],
        "tempat"=>$_POST['tempat'],
        "tgl"=>$_POST['tgl'],
        "jk"=>$_POST['jk'],
        "sekolah"=>$_POST['sekolah'],
        "ortu"=>$_POST['ortu'],
        "mat"=>$_POST['mat'],
        "ing"=>$_POST['ing'],
        "umum"=>$_POST['umum']
    ];

    $_SESSION['data'][] = $data;
}
?>

<h3>DATA PENDAFTAR</h3>
<table>
<tr>
    <th>Kode</th>
    <th>Nama</th>
    <th>Tmp</th>
    <th>JK</th>
    <th>Tgl</th>
    <th>Ortu</th>
    <th>Sekolah</th>
    <th>MAT</th>
    <th>ING</th>
    <th>UMUM</th>
    <th>Rata</th>
    <th>Keterangan</th>
</tr>

<?php
$total = 0;
$lulus = 0;
$tidak = 0;

if(isset($_SESSION['data'])){
foreach($_SESSION['data'] as $d){

    $rata = ($d['mat'] + $d['ing'] + $d['umum']) / 3;

    if($rata >= 70){
        $ket = "LULUS";
        $lulus++;
    } elseif($rata >= 60){
        $ket = "CADANGAN";
    } else {
        $ket = "TIDAK LULUS";
        $tidak++;
    }

    $total++;

    echo "<tr>
        <td>{$d['kode']}</td>
        <td>{$d['nama']}</td>
        <td>{$d['tempat']}</td>
        <td>{$d['jk']}</td>
        <td>{$d['tgl']}</td>
        <td>{$d['ortu']}</td>
        <td>{$d['sekolah']}</td>
        <td>{$d['mat']}</td>
        <td>{$d['ing']}</td>
        <td>{$d['umum']}</td>
        <td>$rata</td>
        <td>$ket</td>
    </tr>";
}
}
?>

</table>

<br>

<table>
<tr><td>Jumlah Pendaftar</td><td><?= $total ?></td></tr>
<tr><td>Jumlah Peserta Lulus</td><td><?= $lulus ?></td></tr>
<tr><td>Jumlah Tidak Lulus</td><td><?= $tidak ?></td></tr>
</table>

<?php } ?>

</body>
</html>