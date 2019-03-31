<?php 
	include 'tool/koneksi.php';
    $halaman = 10;
  $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
  $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
  $bulan = $_POST['bulan'];
  $tahun = $_POST['tahun'];
	$result = mysqli_query($connect, "SELECT * FROM izin INNER JOIN karyawan ON izin.nik=karyawan.nik WHERE month(izin.tanggal)='$bulan' and year(izin.tanggal)='$tahun' ORDER BY izin.tanggal DESC");
 $total = mysqli_num_rows($result);
$pages = ceil($total/$halaman); 

$query = mysqli_query($connect, "SELECT * FROM izin INNER JOIN karyawan ON izin.nik=karyawan.nik WHERE month(izin.tanggal)='$bulan' and year(izin.tanggal)='$tahun' ORDER BY izin.tanggal DESC LIMIT $mulai, $halaman")or die(mysql_error);
	include 'views/views_izin.php';
 ?>