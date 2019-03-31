<?php
include 'tool/koneksi.php';
$hasil = mysqli_query($connect, "SELECT * FROM pekerjaan ");
if ($_SERVER['REQUEST_METHOD'] == "POST") {
		$pekerjaan                 = $_POST['pekerjaan'];
    
		$query = "INSERT INTO pekerjaan VALUES (
                '$pekerjaan'	                  
                )";

		if (mysqli_query($connect,$query)) {
			header("location:tambah_pekerjaan.php");
		}
        else {
            
            if(mysqli_errno($connect) == 1062){
                echo '<script type="text/javascript">alert("Mohon masukan NIK yang berbeda");</script>';
            }
			else{
			echo '<script type="text/javascript">alert("Data gagal ditambahkan");</script>';
            }
        }
	}
	
	include 'views/views_pekerjaan.php';
?>