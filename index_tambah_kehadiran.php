<?php
include 'tool/koneksi.php';
$result = mysqli_query($connect, "SELECT * FROM karyawan ");
$result2 =  mysqli_query($connect, "SELECT * FROM pekerjaan ");
if ($_SERVER['REQUEST_METHOD'] == "POST") {
		$nik                 = $_POST['nik'];
		$nama_tempat                = $_POST['nama_tempat'];
		$nama_pekerjaan              = $_POST['nama_pekerjaan'];
        $keterangan             =$_POST['keterangan'];
		$uraian                = $_POST['uraian'];
        $tanggal = $_POST['tanggal'];
    
		$query = "INSERT INTO kehadiran VALUES(
				'', 
				'$nama_tempat',  
				'$nama_pekerjaan',
				'$keterangan',
				'$uraian',
				'$tanggal',
				'$nik',
                ''
                )";

		if (mysqli_query($connect,$query)) {
			header("location:index_kehadiran.php");
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
	
	include 'views/views_form_kehadiran.php';
?>