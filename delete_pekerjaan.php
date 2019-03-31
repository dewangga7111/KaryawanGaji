<?php 
    $host = "localhost";
	$username = "root";
	$password = "";
	$db = "nufaza";
	$connect = mysqli_connect($host, $username, $password, $db) or die (mysqli_error());

	$nama_pekerjaan = $_GET['nama_pekerjaan'];
	$sql = "DELETE FROM pekerjaan WHERE nama_pekerjaan ='$nama_pekerjaan'";

	if (mysqli_query($connect, $sql)) {
    	header("location:tambah_pekerjaan.php");
	} else {
 	   echo mysqli_error($connect);
 	   echo '<script type="text/javascript">alert("Data gagal dihapus");</script>';
	}

	mysqli_close($connect);
 ?>