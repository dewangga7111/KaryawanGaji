<?php 
    $host = "localhost";
	$username = "root";
	$password = "";
	$db = "nufaza";
	$connect = mysqli_connect($host, $username, $password, $db) or die (mysqli_error());

	$id_denda = $_GET['id_denda'];
	$sql = "DELETE FROM denda WHERE id_denda = '$id_denda'";

	if (mysqli_query($connect, $sql)) {
    	header("location:index_denda.php");
	} else {
 	   echo mysqli_error($connect);
 	   echo '<script type="text/javascript">alert("Data gagal dihapus");</script>';
	}

	mysqli_close($connect);
 ?>