<?php 
session_start();
	include 'tool/koneksi.php';  

	if (isset($_POST['Login'])) {
		$Username = mysqli_real_escape_string($connect, $_POST['username']);
		$Password = mysqli_real_escape_string($connect, $_POST['password']);
	    
		$query = mysqli_query($connect, "SELECT * FROM karyawan WHERE username ='$Username' AND password='$Password'") or die(mysqli_error());
		if (mysqli_num_rows($query) == 0) {
			echo '<script languange="javascript">alert("Gagal Login! User tidak terdaftar"); document.location="index.php"</script>';
		} else {
            
			$row = mysqli_fetch_assoc($query);
            if ($row['level'] == 1) {
                $_SESSION['nik']             = $row['nik'];
                $_SESSION['nama']            = $row['nama'];
				echo '<script languange="javascript">alert("Anda Berhasil Login Sebagai Admin"); document.location="index_karyawan.php";</script>';


			} else {
                $_SESSION['nik']             = $row['nik'];
                $_SESSION['nama']            = $row['nama'];
				echo '<script languange="javascript">alert("Anda Berhasil Login Sebagai User"); document.location="index_profile.php";</script>';
			}
				
			
		}
		

	}
	include 'views/login.php'
 ?>