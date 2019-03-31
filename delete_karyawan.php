<?php 
    $host = "localhost";
	$username = "root";
	$password = "";
	$db = "nufaza";
	$connect = mysqli_connect($host, $username, $password, $db) or die (mysqli_error());

	$nik = $_GET['nik'];
	$sql = "DELETE FROM karyawan WHERE nik = '$nik'";

	if (mysqli_query($connect, $sql)) {
    	header("location:index_karyawan.php");
	} else {
 	   echo mysqli_error($connect);
 	   echo '<script type="text/javascript">alert("Data gagal dihapus");</script>';
	}

	mysqli_close($connect);
 ?>