<?php 
	include 'tool/koneksi.php';
    $halaman = 10;
  $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
  $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;

$nik = $_GET['nik'];
$id_kasbon = $_GET['id_kasbon'];
	$result = mysqli_query($connect, "SELECT * FROM bayar 
INNER JOIN kasbon ON kasbon.id_kasbon=bayar.id_kasbon
INNER JOIN karyawan ON karyawan.`nik`=bayar.`nik` ");
    
 $total = mysqli_num_rows($result);
$pages = ceil($total/$halaman); 

$query = mysqli_query($connect, "SELECT * FROM bayar 
INNER JOIN kasbon ON kasbon.id_kasbon=bayar.id_kasbon
INNER JOIN karyawan ON karyawan.`nik`=bayar.`nik`
WHERE bayar.id_kasbon='$id_kasbon' AND bayar.nik='$nik' LIMIT $mulai, $halaman")or die(mysql_error);
	include 'views/views_riwayat.php';
 ?>