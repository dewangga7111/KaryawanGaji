<?php
include 'tool/koneksi.php';

    $nik 	= $_GET['nik'];
	$query 	= mysqli_query($connect, "SELECT * FROM karyawan WHERE nik = '$nik'");
	$result = mysqli_fetch_object($query);

if ($_SERVER['REQUEST_METHOD'] == "POST") {
		$nik                 = $_GET['nik'];
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

		
		$query = "UPDATE karyawan SET
				nik ='$nik', 
				nama ='$nama',  
				no_ktp ='$no_ktp',
				npwp ='$npwp',
				pass_efin ='$pass_efin',
				tempat_lahir ='$tempat_lahir',
				tgl_lahir ='$tgl_lahir',
                nilai_test_english ='$nilai_test_english',  
                tgl_mulai_kerja ='$tgl_mulai_kerja',
                tgl_abis_kontrak ='$tgl_abis_kontrak',	 
                tgl_resign ='$tgl_resign',	         
                alamat ='$alamat',	             
                no_hp ='$no_hp',	             
                no_lain ='$no_lain',	         
                email ='$email',	             
                pendidikan_akhir ='$pendidikan_akhir',
                tgl_ijazah ='$tgl_ijazah',	         
                status ='$status',	             
                jabatan ='$jabatan',	         
                divisi ='$divisi',
                username ='$nik',
                password ='$password'
                WHERE nik='$nik'
                    ";

		if (mysqli_query($connect,$query)) {
            echo mysqli_error($connect);
			header("location:index_karyawan.php");
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
	
	include 'views/views_ubah_karyawan.php';
?>