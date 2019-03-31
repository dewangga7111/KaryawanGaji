<?php 
	include 'tool/koneksi.php';
    $halaman = 10;
  $page = isset($_GET["halaman"]) ? (int)$_GET["halaman"] : 1;
  $mulai = ($page>1) ? ($page * $halaman) - $halaman : 0;
$result2 = mysqli_query($connect, "SELECT * FROM karyawan ");
$result3 = mysqli_query($connect, "SELECT * FROM karyawan ");
	$result = mysqli_query($connect, "SELECT * FROM kehadiran 
INNER JOIN karyawan ON kehadiran.nik=karyawan.nik
LEFT JOIN (SELECT keluar.`id_kehadiran`,keluar.`jam_keluar`,keluar.`honor`, HOUR(TIMEDIFF(keluar.`jam_keluar`,kehadiran.`jam_masuk`)) AS jam_kerja FROM 
kehadiran,keluar WHERE kehadiran.`id_kehadiran`=keluar.`id_kehadiran`) AS kel ON kehadiran.`id_kehadiran`=kel.`id_kehadiran`
ORDER BY kehadiran.`tanggal` DESC, kehadiran.`jam_masuk` DESC

  ");
 $total = mysqli_num_rows($result);
$pages = ceil($total/$halaman); 

$query = mysqli_query($connect, "SELECT * FROM kehadiran 
INNER JOIN karyawan ON kehadiran.nik=karyawan.nik
LEFT JOIN (SELECT keluar.`id_kehadiran`,keluar.`jam_keluar`,keluar.`honor`, HOUR(TIMEDIFF(keluar.`jam_keluar`,kehadiran.`jam_masuk`)) AS jam_kerja FROM 
kehadiran,keluar WHERE kehadiran.`id_kehadiran`=keluar.`id_kehadiran`) AS kel ON kehadiran.`id_kehadiran`=kel.`id_kehadiran`
WHERE kehadiran.tanggal = NOW()
ORDER BY kehadiran.`tanggal` DESC, kehadiran.`jam_masuk` DESC

   LIMIT $mulai, $halaman")or die(mysql_error);
	include 'views/views_kehadiran.php';
 ?>