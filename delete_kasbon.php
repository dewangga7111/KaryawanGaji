<?php 
    $host = "localhost";
	$username = "root";
	$password = "";
	$db = "nufaza";
	$connect = mysqli_connect($host, $username, $password, $db) or die (mysqli_error());

	$id_kasbon = $_GET['id_kasbon'];
	$sql = "DELETE FROM kasbon WHERE id_kasbon ='$id_kasbon'";

	if (mysqli_query($connect, $sql)) {
    	header("location:index_kasbon.php");
	} else {
 	   echo mysqli_error($connect);
 	   echo '<script type="text/javascript">alert("Data gagal dihapus");</script>';
	}

	mysqli_close($connect);
 ?>