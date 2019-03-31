<?php 
	include 'tool/koneksi.php';
    $halaman = 10;
  $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
  $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;

	$result = mysqli_query($connect, "SELECT * FROM denda INNER JOIN karyawan ON denda.nik=karyawan.nik WHERE TIME(jam_masuk) BETWEEN '12:01:00' AND '24:00:00' ORDER BY denda.tanggal DESC");
 $total = mysqli_num_rows($result);
$pages = ceil($total/$halaman); 

$query = mysqli_query($connect, "SELECT * FROM denda INNER JOIN karyawan ON denda.nik=karyawan.nik WHERE TIME(jam_masuk) BETWEEN '12:01:00' AND '24:00:00' ORDER BY denda.tanggal DESC LIMIT $mulai, $halaman")or die(mysql_error);
	include 'views/views_denda.php';
 ?>