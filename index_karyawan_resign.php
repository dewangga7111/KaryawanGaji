<?php 
	include 'tool/koneksi.php';
    $halaman = 10;
  $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
  $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
	$result = mysqli_query($connect, "SELECT * FROM karyawan");
 $total = mysqli_num_rows($result);
$pages = ceil($total/$halaman); 
$query = mysqli_query($connect, "SELECT * FROM karyawan WHERE status='resign' LIMIT $mulai, $halaman")or die(mysql_error);
	include 'views/views_karyawan_resign.php';
 ?>