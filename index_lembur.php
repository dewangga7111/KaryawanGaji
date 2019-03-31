<?php 
	include 'tool/koneksi.php';
    $halaman = 10;
  $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
  $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
$result3 = mysqli_query($connect, "SELECT * FROM karyawan ");
	$result = mysqli_query($connect, "SELECT * FROM karyawan ");
    
 $total = mysqli_num_rows($result);
$pages = ceil($total/$halaman); 

$query = mysqli_query($connect, "SELECT * FROM lembur INNER JOIN karyawan ON lembur.nik=karyawan.nik WHERE lembur.tanggal = NOW() ORDER BY lembur.tanggal DESC LIMIT $mulai, $halaman")or die(mysql_error);
	include 'views/views_lembur.php';
 ?>