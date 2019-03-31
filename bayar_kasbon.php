<?php
include 'tool/koneksi.php';
$id_kasbon            = $_GET['id_kasbon'];
$query = mysqli_query($connect, "SELECT * FROM kasbon INNER JOIN karyawan ON kasbon.nik=karyawan.nik WHERE kasbon.id_kasbon='$id_kasbon'");
$result = mysqli_fetch_object($query);
if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $id_kasbon                 = $_GET['id_kasbon'];
		$nik                 = $_POST['nik'];
		$bayar              = $_POST['bayar'];
        $tanggal = date("Y-m-d");
        
		$query = "INSERT INTO bayar VALUES('',$id_kasbon,'$nik', '$bayar','$tanggal')";
    
		if (mysqli_query($connect,$query)) {
			header("location:index_kasbon.php");
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
	
	include 'views/views_form_bayar.php';
?>