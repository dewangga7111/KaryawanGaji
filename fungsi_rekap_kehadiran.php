<?php 
	include 'tool/koneksi.php';
    $halaman = 10;
error_reporting(0);
  $bulan = $_POST['bulan'];
  $tahun = $_POST['tahun'];
$result2 = mysqli_query($connect, "SELECT * FROM karyawan ");
	$result = mysqli_query($connect, "SELECT * FROM kehadiran 
INNER JOIN karyawan ON kehadiran.nik=karyawan.nik
LEFT JOIN (SELECT keluar.`id_kehadiran`,keluar.`jam_keluar`,keluar.honor, HOUR(TIMEDIFF(keluar.`jam_keluar`,kehadiran.`jam_masuk`)) AS jam_kerja FROM 
kehadiran,keluar WHERE kehadiran.`id_kehadiran`=keluar.`id_kehadiran`) AS kel ON kehadiran.`id_kehadiran`=kel.`id_kehadiran`
WHERE month(kehadiran.tanggal)='$bulan' and year(kehadiran.tanggal)='$tahun'
ORDER BY kehadiran.`tanggal` DESC, kehadiran.`jam_masuk` DESC ");
 $total = mysqli_num_rows($result);

$query = mysqli_query($connect, "SELECT * FROM kehadiran 
INNER JOIN karyawan ON kehadiran.nik=karyawan.nik
LEFT JOIN (SELECT keluar.`id_kehadiran`,keluar.honor,keluar.`jam_keluar`, HOUR(TIMEDIFF(keluar.`jam_keluar`,kehadiran.`jam_masuk`)) AS jam_kerja FROM 
kehadiran,keluar WHERE kehadiran.`id_kehadiran`=keluar.`id_kehadiran`) AS kel ON kehadiran.`id_kehadiran`=kel.`id_kehadiran`
WHERE month(kehadiran.tanggal)='$bulan' and year(kehadiran.tanggal)='$tahun'
ORDER BY kehadiran.`tanggal` DESC, kehadiran.`jam_masuk` DESC ")or die(mysql_error);
	include 'views/views_kehadiran.php';
 ?>