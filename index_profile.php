<?php
include 'tool/koneksi.php';
    session_start();
   if(isset($_SESSION['username'])) {
   header('location:index.php'); }
    error_reporting(0);
    $nik 	= $_SESSION['nik'];
	$query 	= mysqli_query($connect, "SELECT * FROM karyawan WHERE nik = '$nik'");
	$result = mysqli_fetch_object($query);
    $query2 	= mysqli_query($connect, "SELECT * FROM biodata WHERE nik = '$nik'");
	$result2 = mysqli_fetch_object($query2);
    $query3 = mysqli_query($connect, "SELECT(SELECT COUNT(*) FROM kehadiran WHERE kehadiran.`nik`='$nik' AND MONTH(kehadiran.tanggal)=MONTH(NOW()) AND YEAR(kehadiran.tanggal)=YEAR(NOW())) AS total_hadir,
(SELECT COUNT(*) FROM izin WHERE izin.`nik`='$nik' AND MONTH(izin.tanggal)=MONTH(NOW()) AND YEAR(izin.tanggal)=YEAR(NOW())) AS total_izin,
(SELECT COUNT(*) FROM denda WHERE denda.`nik`='$nik' AND MONTH(denda.tanggal)=MONTH(NOW()) AND YEAR(denda.tanggal)=YEAR(NOW()) AND TIME(denda.jam_masuk) BETWEEN '12:01:00' AND '24:00:00') AS total_alpa
");
$result3 = mysqli_fetch_object($query3);

$query4 	= mysqli_query($connect, "SELECT (SELECT SUM(HOUR(TIMEDIFF(keluar.`jam_keluar`,kehadiran.`jam_masuk`))) AS total_jam FROM kehadiran,keluar WHERE kehadiran.`id_kehadiran`=keluar.`id_kehadiran` AND kehadiran.`nik`='$nik' AND MONTH(kehadiran.tanggal)=MONTH(NOW()) AND YEAR(kehadiran.tanggal)=YEAR(NOW()
)ORDER BY kehadiran.`nik`)AS sekarang, ROUND(((SELECT SUM(HOUR(TIMEDIFF(keluar.`jam_keluar`,kehadiran.`jam_masuk`))) AS total_jam FROM kehadiran,keluar WHERE kehadiran.`id_kehadiran`=keluar.`id_kehadiran` AND kehadiran.`nik`='$nik' AND MONTH(kehadiran.tanggal)=MONTH(NOW()) AND YEAR(kehadiran.tanggal)=YEAR(NOW()
)ORDER BY kehadiran.`nik`)/160) * 100) AS persen");
$result4 = mysqli_fetch_object($query4);
    
include 'views/views_profile_user.php';
?>