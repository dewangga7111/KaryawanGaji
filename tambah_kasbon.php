<?php
include 'tool/koneksi.php';
$result = mysqli_query($connect, "SELECT * FROM karyawan ");
if ($_SERVER['REQUEST_METHOD'] == "POST") {
		$nik                 = $_POST['nik'];
		$total_pinjam              = $_POST['total_pinjam'];
        $jumlah_angsuran    = $_POST['jumlah_angsuran'];
        $keterangan         =$_POST['keterangan'];
    
		$query = "INSERT INTO kasbon VALUES (
				'', 
				'$nik',  
				'$total_pinjam', 
                '$jumlah_angsuran',
                '$total_pinjam',
                '$keterangan'
                    )";

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
	
	include 'views/views_form_kasbon.php';
?>