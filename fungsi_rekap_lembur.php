<?php 
	include 'tool/koneksi.php';
    $halaman = 10;
  $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
  $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
  $bulan = $_POST['bulan'];
  $tahun = $_POST['tahun'];
	$result = mysqli_query($connect, "SELECT * FROM lembur INNER JOIN karyawan ON lembur.nik=karyawan.nik WHERE month(lembur.tanggal)='$bulan' and year(lembur.tanggal)='$tahun' ORDER BY lembur.tanggal DESC");
 $total = mysqli_num_rows($result);
$pages = ceil($total/$halaman); 

$query = mysqli_query($connect, "SELECT * FROM lembur INNER JOIN karyawan ON lembur.nik=karyawan.nik WHERE month(lembur.tanggal)='$bulan' and year(lembur.tanggal)='$tahun' ORDER BY lembur.tanggal DESC LIMIT $mulai, $halaman")or die(mysql_error);
	include 'views/views_lembur.php';
 ?>