<?php 
	include 'tool/koneksi.php';
    
$nik = $_POST['nik'];
$bulan = $_POST['bulan'];
$tahun = $_POST['tahun'];
$result = mysqli_query($connect, "SELECT * FROM karyawan  ");
$query = mysqli_query($connect, "SELECT karyawan.`nik`,karyawan.`nama`, SUM(lembur.`honor`) AS total_honor, MONTH(lembur.`tanggal`) AS bulan 
FROM karyawan, lembur
WHERE MONTH(lembur.`tanggal`) = '$bulan' AND YEAR(lembur.`tanggal`) = '$tahun' AND karyawan.`nik`='$nik' AND karyawan.`nik`=lembur.`nik`
")or die(mysql_error);
	include 'views/views_hitung_lembur.php';
 ?>