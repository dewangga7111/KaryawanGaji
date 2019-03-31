<?php
include 'tool/koneksi.php';
    $id_lembur       =$_GET['id_lembur'];
    $query 	= mysqli_query($connect, "SELECT * FROM lembur INNER JOIN karyawan ON lembur.nik=karyawan.nik WHERE id_lembur = '$id_lembur'");
	$result = mysqli_fetch_object($query);
if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $id_lembur       =$_GET['id_lembur'];
		$nik      = $_POST['nik'];
		$nama        = $_POST['nama'];
		$tempat_lembur        = $_POST['tempat_lembur'];
		$pekerjaan           = $_POST['pekerjaan'];
        $jam_mulai          = $_POST['jam_mulai'];
        $jam_selesai           = $_POST['jam_selesai'];
        $jumlah_jam          = $_POST['jumlah_jam'];
        $honor           = $_POST['honor'];
        $status             = $_POST['status_hari'];
        $tanggal             = $_POST['tanggal'];

		
		$query = "UPDATE lembur SET
				nama_tempat ='$tempat_lembur',
				nama_pekerjaan ='$pekerjaan',
                tanggal ='$tanggal',
                status_hari ='$status',
				jam_mulai ='$jam_mulai',
				jam_selesai ='$jam_selesai',
                jumlah_jam ='$jumlah_jam',
				honor ='$honor'
                WHERE id_lembur='$id_lembur'
                    ";

		if (mysqli_query($connect,$query)) {
            echo mysqli_error($connect);
			header("location:index_lembur.php");
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
	
	include 'views/views_ubah_lembur.php';
?>