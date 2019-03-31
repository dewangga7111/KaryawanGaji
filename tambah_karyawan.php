<?php
include 'tool/koneksi.php';
if ($_SERVER['REQUEST_METHOD'] == "POST") {
		$nik                 = $_POST['nik'];
		$nama                = $_POST['nama'];
		$no_ktp              = $_POST['no_ktp'];
		$npwp                = $_POST['npwp'];
		$pass_efin           = $_POST['pass_efin'];
		$tempat_lahir	     = $_POST['tempat_lahir'];		
		$tgl_lahir 	         = $_POST['tgl_lahir'];
		$nilai_test_english  = $_POST['nilai_test_english'];
		$tgl_mulai_kerja	 = $_POST['tgl_mulai_kerja'];		
        $tgl_abis_kontrak	 = $_POST['tgl_abis_kontrak'];		
        $tgl_resign	         = $_POST['tgl_resign'];		
        $alamat	             = $_POST['alamat'];		
        $no_hp	             = $_POST['no_hp'];		
        $no_lain	         = $_POST['no_lain'];		
        $email	             = $_POST['email'];		
        $pendidikan_akhir	 = $_POST['pendidikan_akhir'];		
        $tgl_ijazah	         = $_POST['tgl_ijazah'];		
        $status	             = $_POST['status'];
        $jabatan	         = $_POST['jabatan'];		
        $divisi	             = $_POST['divisi'];		
        $password	         = $_POST['password'];		

		
		$query = "INSERT INTO karyawan VALUES (
				'$nik', 
				'$nama',  
				'$no_ktp',
				'$npwp',
				'$pass_efin',
				'$tempat_lahir',
				'$tgl_lahir',
                '$nilai_test_english',  
                '$tgl_mulai_kerja',
                '$tgl_abis_kontrak',	 
                '$tgl_resign',	         
                '$alamat',	             
                '$no_hp',	             
                '$no_lain',	         
                '$email',	             
                '$pendidikan_akhir',
                '$tgl_ijazah',	         
                '$status',	             
                '$jabatan',	         
                '$divisi',
                '$nik',
                '$password',
                '2'
                    )";

		if (mysqli_query($connect,$query)) {
			header("location:index_karyawan.php");
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
	
	include 'views/views_form_karyawan.php';
?>