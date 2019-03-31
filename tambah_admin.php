<?php
include 'tool/koneksi.php';

	$result = mysqli_query($connect, "SELECT * FROM karyawan ");

if ($_SERVER['REQUEST_METHOD'] == "POST") {
		$nik                 = $_POST['nik'];			

		
		$query = "UPDATE karyawan SET
                level ='1'
                WHERE nik='$nik'
                    ";

		if (mysqli_query($connect,$query)) {
            echo mysqli_error($connect);
			header("location:pengaturan.php");
		}
        else {
            echo mysqli_error($connect);
            if(mysqli_errno($connect) == 1062){
                echo '<script type="text/javascript">alert("Mohon masukan NIK yang berbeda");</script>';
            }
			else{
			echo '<script type="text/javascript">alert("Data gagal ditambahkan");</script>';
            }
        }
	}
	
	include 'views/views_admin.php';
?>