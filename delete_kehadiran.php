<?php 
    $host = "localhost";
	$username = "root";
	$password = "";
	$db = "nufaza";
	$connect = mysqli_connect($host, $username, $password, $db) or die (mysqli_error());

	$id_kehadiran = $_GET['id_kehadiran'];
	$sql = "DELETE FROM kehadiran WHERE id_kehadiran ='$id_kehadiran'";

	if (mysqli_query($connect, $sql)) {
    	header("location:index_kehadiran.php");
	} else {
 	   echo mysqli_error($connect);
 	   echo '<script type="text/javascript">alert("Data gagal dihapus");</script>';
	}

	mysqli_close($connect);
 ?>