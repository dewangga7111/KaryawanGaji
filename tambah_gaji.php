<?php
include 'tool/koneksi.php';
$result = mysqli_query($connect, "SELECT * FROM karyawan ");
if ($_SERVER['REQUEST_METHOD'] == "POST") {
		$nik                 = $_POST['nik'];
		$gaji_pokok                = $_POST['gaji_pokok'];
        $pph      = $_POST['pph'];    
        $bpjs                   = $_POST['bpjs'];
        $pensiun            = $_POST['pensiun'];
        $thr                = $_POST['thr'];
		$bpjs_ket              = $_POST['bpjs_ket'];
		$bpjs_kes                = $_POST['bpjs_kes'];
		$pajak           = $_POST['pajak'];
		$tanggal = date("Y-m-d");
    
		$query = "INSERT INTO gaji VALUES (
				'', 
				'$nik',  
				'$gaji_pokok',
                '$pph',
                '$bpjs',
                '$pensiun',
                '$thr',
				'$bpjs_ket',
				'$bpjs_kes',
				'$pajak',
				'',
                '',
                '',  
                '',
                '',	 
                '$tanggal'	                  
                    )";

		if (mysqli_query($connect,$query)) {
			header("location:index_gaji.php");
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
	
	include 'views/views_form_gaji.php';
?>