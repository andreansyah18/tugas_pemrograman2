<?php
session_start();
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

<h2>FORM PENDAFTARAN</h2>

<form method="POST">
    Kode: <input type="text" name="kode" required><br><br>
    Nama: <input type="text" name="nama" required><br><br>
    Tempat Lahir: <input type="text" name="tempat"><br><br>
    Tgl Lahir: <input type="date" name="tgl"><br><br>

    JK:
    <input type="radio" name="jk" value="L">L
    <input type="radio" name="jk" value="P">P<br><br>

    Asal Sekolah: <input type="text" name="sekolah"><br><br>
    Pekerjaan Ortu: <input type="text" name="ortu"><br><br>

    Nilai MAT: <input type="number" name="mat" required><br>
    Nilai ING: <input type="number" name="ing" required><br>
    Nilai UMUM: <input type="number" name="umum" required><br><br>

    <button name="simpan">Simpan</button>
</form>

<hr>

<?php
if(isset($_POST['simpan'])){
    $data = [
        "kode"=>$_POST['kode'],
        "nama"=>$_POST['nama'],
        "tempat"=>$_POST['tempat'],
        "tgl"=>$_POST['tgl'],
        "jk"=>$_POST['jk'] ?? '',
        "sekolah"=>$_POST['sekolah'],
        "ortu"=>$_POST['ortu'],
        "mat"=>(int)$_POST['mat'],
        "ing"=>(int)$_POST['ing'],
        "umum"=>(int)$_POST['umum']
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

if(!empty($_SESSION['data'])){
foreach($_SESSION['data'] as $d){

    // Pastikan angka (anti error)
    $mat = (int)$d['mat'];
    $ing = (int)$d['ing'];
    $umum = (int)$d['umum'];

    $rata = ($mat + $ing + $umum) / 3;

    if($rata >= 70){
        $ket = "LULUS";
        $lulus++;
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
        <td>$mat</td>
        <td>$ing</td>
        <td>$umum</td>
        <td>".number_format($rata,2)."</td>
        <td>$ket</td>
    </tr>";
}
}
?>

</table>

<br>

<table>
<tr><td>Jumlah Pendaftar</td><td><?= $total ?></td></tr>
<tr><td>Jumlah Lulus</td><td><?= $lulus ?></td></tr>
<tr><td>Jumlah Tidak Lulus</td><td><?= $tidak ?></td></tr>
</table>

</body>
</html>