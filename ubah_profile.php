<?php
include 'tool/koneksi.php';
error_reporting(0);
    $nik 	= $_GET['nik'];
    $query = mysqli_query($connect, "SELECT * FROM biodata WHERE nik = '$nik'");
	$result = mysqli_fetch_object($query);

if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $biografi            = $_POST['biografi'];
		$nik                 = $_GET['nik'];
		$nama_panggilan      = $_POST['nama_panggilan'];
		$status_nikah        = $_POST['status_nikah'];
		$jenis_kelamin       = $_POST['jenis_kelamin'];
		$agama	             = $_POST['agama'];		
		$sosial_media 	     = $_POST['sosial_media'];
		$hobi                = $_POST['hobi'];
		$olahraga	         = $_POST['olahraga'];		
        $speed_mengetik	     = $_POST['speed_mengetik'];		
        $riwayat_pendidikan	 = $_POST['riwayat_pendidikan'];		
        $riwayat_pekerjaan	 = $_POST['riwayat_pekerjaan'];		
        $riwayat_kursus	     = $_POST['riwayat_kursus'];		
        $susunan_keluarga	 = $_POST['susunan_keluarga'];		
        $susunan_orangtua    = $_POST['susunan_orangtua'];		
        $susunan_saudara	 = $_POST['susunan_saudara'];	
        $FOTO 	= $_FILES['foto']['name'];
		$TMP 	= $_FILES['foto']['tmp_name'];
		$PATH	= "views/images/".$FOTO;

		if(move_uploaded_file($TMP, $PATH)){


		
		$query = "UPDATE biodata SET
                foto ='$FOTO',
                biografi ='$biografi',
				nik ='$nik',
                nama_panggilan ='$nama_panggilan',                
                status_nikah ='$status_nikah',        
                jenis_kelamin ='$jenis_kelamin',       
                agama ='$agama',	             
                sosial_media ='$sosial_media', 	     
                hobi ='$hobi',                
                olahraga ='$olahraga',	         
                speed_mengetik ='$speed_mengetik',	     
                riwayat_pendidikan ='$riwayat_pendidikan',	 
                riwayat_pekerjaan ='$riwayat_pekerjaan',	 
                riwayat_kursus ='$riwayat_kursus',	     
                susunan_keluarga ='$susunan_keluarga',	 
                susunan_orangtua ='$susunan_orangtua',    
                susunan_saudara ='$susunan_saudara'
                WHERE nik='$nik'
                    ";

		if (mysqli_query($connect,$query)) {
			header("location:index_profile.php?nik=$result->nik?");
		}
        else {
            
            if(mysqli_errno($connect) == 1062){
                echo '<script type="text/javascript">alert("Mohon masukan NIK yang berbeda");</script>';
            }
			else{
			echo '<script type="text/javascript">alert("Biodata gagal ditambahkan");</script>';
            }
        }
            } else {
		echo '<script type="text/javascript">alert("Foto Gagal Diupload");</script>';
		}  
	}
	
	include 'views/views_ubah_profile.php';
?>