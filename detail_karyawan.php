<?php
include 'tool/koneksi.php';
    error_reporting(0);
    $nik 	= $_GET['nik'];
	$query 	= mysqli_query($connect, "SELECT * FROM karyawan WHERE nik = '$nik'");
	$result = mysqli_fetch_object($query);
    $query2 	= mysqli_query($connect, "SELECT * FROM biodata WHERE nik = '$nik'");
	$result2 = mysqli_fetch_object($query2);
    
include 'views/views_detail_karyawan.php';
?>