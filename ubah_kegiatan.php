<?php
include 'tool/koneksi.php';
    $id_kegiatan       =$_GET['id_kegiatan'];
    $query 	= mysqli_query($connect, "SELECT * FROM kegiatan INNER JOIN karyawan ON kegiatan.nik=karyawan.nik WHERE id_kegiatan = '$id_kegiatan'");
	$result = mysqli_fetch_object($query);
if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $id_kegiatan       =$_GET['id_kegiatan'];
		$nik      = $_POST['nik'];
        $nama      = $_POST['nama'];
		$mulai        = $_POST['tgl_mulai'];
		$akhir        = $_POST['tgl_akhir'];
		$pekerjaan           = $_POST['nama_pekerjaan'];
        $peran          = $_POST['peran'];
        $honor_kegiatan           = $_POST['honor_kegiatan'];
		
		$query = "UPDATE kegiatan SET
				tgl_mulai ='$mulai',
				tgl_akhir ='$akhir',
                nama_pekerjaan ='$pekerjaan',
                peran ='$peran',
				honor_kegiatan ='$honor_kegiatan'
                WHERE id_kegiatan='$id_kegiatan'
                    ";

		if (mysqli_query($connect,$query)) {
            echo mysqli_error($connect);
			header("location:index_kegiatan.php");
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
	
	include 'views/views_ubah_kegiatan.php';
?>