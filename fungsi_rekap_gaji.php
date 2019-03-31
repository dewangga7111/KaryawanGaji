<?php 
	include 'tool/koneksi.php';
    $halaman = 10;
  $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
  $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
  $bulan = $_POST['bulan'];
  $tahun = $_POST['tahun'];
	$result = mysqli_query($connect, "SELECT * FROM gaji INNER JOIN karyawan ON gaji.nik=karyawan.nik WHERE month(gaji.tanggal)='$bulan' and year(gaji.tanggal)='$tahun' ORDER BY gaji.tanggal DESC");
 $total = mysqli_num_rows($result);
$pages = ceil($total/$halaman); 

$query = mysqli_query($connect, "SELECT gaji.id_gaji, karyawan.`nik`,karyawan.`nama`, gaji.`gaji_pokok`, gaji.`bpjs_kes`, gaji.`bpjs_ket`,gaji.`pajak`,gaji.`kasbon`, gaji.`piket_malam`, gaji.`lembur`,gaji.`denda`, gaji.`thp`, MONTH(gaji.`tanggal`) AS bulan, YEAR(gaji.`tanggal`) AS tahun  FROM gaji,karyawan WHERE gaji.nik=karyawan.nik AND MONTH(gaji.`tanggal`)='$bulan' AND YEAR(gaji.`tanggal`)='$tahun' ORDER BY karyawan.nik DESC LIMIT $mulai, $halaman")or die(mysql_error);
	include 'views/views_gaji.php';
 ?>