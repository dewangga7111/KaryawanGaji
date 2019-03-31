<?php
include 'tool/koneksi.php';
$result = mysqli_query($connect, "SELECT * FROM karyawan ");
if ($_SERVER['REQUEST_METHOD'] == "POST") {
		$nik                 = $_POST['nik'];
		$tanggal             = $_POST['tanggal'];
    
		$query = "INSERT INTO denda VALUES (
				'', 
				'$nik',  
				'$tanggal',
				'17:00:00',
				'75000'                  
                    )";

		if (mysqli_query($connect,$query)) {
			header("location:index_denda.php");
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
	
	include 'views/views_form_alpa.php';
?>