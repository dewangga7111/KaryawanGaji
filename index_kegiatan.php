<?php 
	include 'tool/koneksi.php';
    $halaman = 10;
  $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
  $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
$result2 = mysqli_query($connect, "SELECT * FROM karyawan ");
	$result = mysqli_query($connect, "SELECT * FROM kegiatan INNER JOIN karyawan ON kegiatan.nik=karyawan.nik ORDER BY kegiatan.tgl_mulai DESC");
 $total = mysqli_num_rows($result);
$pages = ceil($total/$halaman); 

$query = mysqli_query($connect, "SELECT * FROM kegiatan INNER JOIN karyawan ON kegiatan.nik=karyawan.nik WHERE kegiatan.tgl_mulai = NOW() ORDER BY kegiatan.tgl_mulai DESC LIMIT $mulai, $halaman")or die(mysql_error);
	include 'views/views_kegiatan.php';
 ?>