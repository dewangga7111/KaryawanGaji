<?php
include 'tool/koneksi.php';
    $id_gaji 	= $_GET['id_gaji'];
    $nik 	= $_GET['nik'];
    $bulan  = $_GET['bulan'];
    $tahun  = $_GET['tahun'];
	$query 	= mysqli_query($connect, "SELECT * FROM gaji WHERE id_gaji = '$id_gaji'");
	$result = mysqli_fetch_object($query);
    $honor_piket 	= mysqli_query($connect, "SELECT SUM(piket.honor_piket) as hasil FROM piket WHERE nik = '$nik' AND MONTH(piket.tanggal)='$bulan' AND YEAR(piket.tanggal)='$tahun'");
    $result_piket = mysqli_fetch_object($honor_piket);

    $honor_lembur 	= mysqli_query($connect, "SELECT SUM(lembur.honor) as hasil FROM lembur WHERE nik = '$nik' AND MONTH(lembur.tanggal)='$bulan' AND YEAR(lembur.tanggal)='$tahun'");
    $result_lembur = mysqli_fetch_object($honor_lembur);

    $honor_denda 	= mysqli_query($connect, "SELECT SUM(denda.denda) as hasil FROM denda WHERE nik = '$nik' AND MONTH(denda.tanggal)='$bulan' AND YEAR(denda.tanggal)='$tahun'");
    $result_denda = mysqli_fetch_object($honor_denda);

    $honor_kasbon 	= mysqli_query($connect, "SELECT jumlah_bayar FROM bayar WHERE nik = '$nik' AND MONTH(bayar.tanggal)='$bulan' AND YEAR(bayar.tanggal)='$tahun'");
    $result_kasbon = mysqli_fetch_object($honor_kasbon);
    error_reporting(0);
if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $id_gaji 	= $_GET['id_gaji'];
        $nik 	= $_GET['nik'];
        $bulan  = $_GET['bulan'];
        $tahun  = $_GET['tahun'];
		$gaji_pokok      = $_POST['gaji_pokok'];
        $pph       = $_POST['pph'];    
        $bpjs                   = $_POST['bpjs'];
        $pensiun            = $_POST['pensiun'];
        $thr                = $_POST['thr'];
		$bpjs_ket        = $_POST['bpjs_ket'];
		$bpjs_kes        = $_POST['bpjs_kes'];
		$pajak           = $_POST['pajak'];
        $kasbon          = $_POST['kasbon'];
        $piket           = $_POST['piket_malam'];
        $lembur          = $_POST['lembur'];
        $denda           = $_POST['denda'];
        $thp             = $_POST['thp'];

		
		$query = "UPDATE gaji SET
				gaji_pokok ='$gaji_pokok',
                pph ='$pph',
                bpjs ='$bpjs',
                jht_pensiun ='$pensiun',
                bonus_thr ='$thr',
				bpjs_ket ='$bpjs_ket',
				bpjs_kes ='$bpjs_kes',
				pajak ='$pajak',
                kasbon ='$kasbon',
				piket_malam ='$piket',
                lembur ='$lembur',  
                denda ='$denda',
                thp ='$thp'	 
                WHERE id_gaji='$id_gaji'
                    ";

		if (mysqli_query($connect,$query)) {
            echo mysqli_error($connect);
			header("location:index_gaji.php");
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
	
	include 'views/views_ubah_gaji.php';
?>