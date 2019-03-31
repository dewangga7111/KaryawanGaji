<?php 
	include 'tool/koneksi.php';
    $halaman = 10;
  $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
  $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;

	$result = mysqli_query($connect, "SELECT * FROM kasbon 
INNER JOIN karyawan ON kasbon.nik=karyawan.nik ");
    
 $total = mysqli_num_rows($result);
$pages = ceil($total/$halaman); 

$query = mysqli_query($connect, "SELECT * FROM kasbon 
INNER JOIN karyawan ON kasbon.nik=karyawan.nik  LIMIT $mulai, $halaman")or die(mysql_error);
	include 'views/views_kasbon.php';
 ?>