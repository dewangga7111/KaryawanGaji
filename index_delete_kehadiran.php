<?php 
	include 'tool/koneksi.php';
    $halaman = 10;
  $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
  $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
	$result = mysqli_query($connect, "SELECT * FROM kehadiran 
INNER JOIN karyawan ON kehadiran.nik=karyawan.nik ORDER BY kehadiran.`tanggal` DESC");
 $total = mysqli_num_rows($result);
$pages = ceil($total/$halaman); 

$query = mysqli_query($connect, "SELECT * FROM kehadiran 
INNER JOIN karyawan ON kehadiran.nik=karyawan.nik ORDER BY kehadiran.`tanggal` DESC LIMIT $mulai, $halaman")or die(mysql_error);
	include 'views/views_delete_kehadiran.php';
 ?>