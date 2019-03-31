<?php 
//ob_start(); 
?>
<!DOCTYPE html>
<html>
    <head>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    </head>
    <body>

    <?php 
      include 'tool/koneksi.php';
        $nik = $_POST['nik'];
        $bulan = $_POST['bulan'];
        $tahun = $_POST['tahun'];
        $query = mysqli_query($connect, "SELECT karyawan.`nik`,((ROUND(60/100 * gaji_pokok)+ROUND(25/100 * gaji_pokok)+ROUND(15/100 * gaji_pokok)+gaji.`lembur`+gaji.`piket_malam`+gaji.`bonus_thr`)-(ROUND(gaji.`denda`+gaji.`kasbon`+gaji.`pajak`+gaji.`bpjs`+gaji.`jht_pensiun`+gaji.`pph`))) AS gaji_diterima,
ROUND(gaji.`denda`+gaji.`kasbon`+gaji.`pajak`+gaji.`jht_pensiun`+gaji.`bpjs`+gaji.`pph`)AS total_potongan,
(ROUND(60/100 * gaji_pokok)+ROUND(25/100 * gaji_pokok)+ROUND(15/100 * gaji_pokok)+gaji.`lembur`+gaji.`piket_malam`+gaji.`bonus_thr`+gaji.`bpjs_kes`+gaji.`bpjs_ket`) AS total_terima,
(ROUND(60/100 * gaji_pokok)+ROUND(25/100 * gaji_pokok)+ROUND(15/100 * gaji_pokok)+gaji.`lembur`+gaji.`piket_malam`+gaji.`bonus_thr`) AS total_gaji ,
karyawan.divisi,karyawan.jabatan,karyawan.`nama`, gaji.`gaji_pokok`,ROUND(60/100 * gaji_pokok) AS gaji,DATE(NOW()) as tanggal,
ROUND(25/100 * gaji_pokok) AS tidak_tetap,ROUND(15/100 * gaji_pokok) AS tetap,
 gaji.`bpjs_kes`, gaji.`bpjs_ket`,gaji.`pajak`,gaji.`kasbon`,gaji.`bonus_thr`,gaji.`pph`,gaji.`jht_pensiun`,gaji.`bpjs`, gaji.`piket_malam`, gaji.`lembur`,gaji.`denda`, gaji.`thp`, 
 MONTH(gaji.`tanggal`) AS bulan, YEAR(gaji.`tanggal`) AS tahun  FROM gaji,karyawan WHERE gaji.nik=karyawan.nik AND karyawan.nik='$nik' AND MONTH(gaji.`tanggal`)='$bulan' AND YEAR(gaji.`tanggal`)='$tahun' ORDER BY karyawan.nik DESC")or die(mysql_error);
	    $result = mysqli_fetch_object($query)
	?>
        <table style="border-collapse: collapse;" width="60%">
            <tr>
                <td rowspan="2" colspan="2" style="border-top:1px solid black; border-left:1px solid black;"><img src="views/logo/logo.jpeg" width="300px" height="80px" ></td>
                <th style="text-align:center;border-right:1px solid black; border-top:1px solid black;" colspan="2">Slip Gaji</th>
            </tr>
            <tr>
                <th style="text-align:center;border-right:1px solid black;" colspan="2"><?php echo $result->bulan?> <?php echo $result->tahun?></th>
            </tr>
            <tr>
                <td style="width:25%;border-left:1px solid black; ">NIK</td>
                <td style="width:25%">: <?php echo $result->nik?></td>
                <td style="width:25%" >Divisi</td>
                <td style="width:25%;border-right:1px solid black;">: <?php echo $result->divisi?></td>
            </tr>
            <tr>
                <td style="width:25%; border-left:1px solid black;">Nama</td>
                <td style="width:25%">: <?php echo $result->nama?></td>
                <td style="width:25%" >Jabatan</td>
                <td style="width:25%;border-right:1px solid black;">: <?php echo $result->jabatan?></td>
            </tr>
            <tr>
                <th colspan="2" style="border-left:1px solid black; border-top:1px solid black;border-bottom:1px solid black;" >Penerimaan</th>
                <th colspan="2" style="border-right:1px solid black; border-top:1px solid black;border-bottom:1px solid black;">Potongan</th>
            </tr>
            <tr>
                <td style="border-left:1px solid black;">Gaji Pokok</td>
                <td style="text-align:right; padding-right:10px">: Rp.<?php echo $result->gaji?></td>
                <td>Cicilan Pinjaman</td>
                <td style="text-align:right;border-right:1px solid black;">: Rp.<?php echo $result->kasbon?></td>
            </tr>
            <tr>
                <td style="border-left:1px solid black;">Tunjangan Tetap</td>
                <td style="text-align:right; padding-right:10px">: Rp.<?php echo $result->tetap?></td>
                <td>PPH21 atas Gaji</td>
                <td style="text-align:right;border-right:1px solid black;">: Rp.<?php echo $result->pph?></td>
            </tr>
            <tr>
                <td style="border-left:1px solid black;">Tunjangan Tidak Tetap</td>
                <td style="text-align:right; padding-right:10px;">: Rp.<?php echo $result->tidak_tetap?></td>
                <td>BPJS Kesehatan Pribadi</td>
                <td style="text-align:right;border-right:1px solid black;">: Rp.<?php echo $result->bpjs?></td>
            </tr>
            <tr>
                <td style="border-left:1px solid black;">Tunjangan Lembur</td>
                <td style="text-align:right; padding-right:10px;">: Rp.<?php echo $result->lembur?></td>
                <td>JHT+Pensiun</td>
                <td style="text-align:right;border-right:1px solid black;">: Rp.<?php echo $result->jht_pensiun?></td>
            </tr>
            <tr>
                <td style="border-left:1px solid black;">Tunjangan Piket</td>
                <td style="text-align:right; padding-right:10px;">: Rp.<?php echo $result->piket_malam?></td>
                <td>Denda</td>
                <td style="text-align:right;border-right:1px solid black;">: Rp.<?php echo $result->denda?></td>
            </tr>
            <tr>
                <td style="border-left:1px solid black;">Bonus/THR</td>
                <td style="text-align:right; padding-right:10px;">: Rp.<?php echo $result->bonus_thr?></td>
                <td>Pajak</td>
                <td style="text-align:right;border-right:1px solid black;">: Rp.<?php echo $result->pajak?></td>
            </tr>
            <tr>
                <th style="text-align:left; border-left:1px solid black;border-top:1px solid black;border-bottom:1px solid black;">Total Gaji</th>
                <th style="text-align:right; padding-right:10px;border-top:1px solid black;">: Rp.<?php echo $result->total_gaji?></th>
                <th></th>
                <th style="border-right:1px solid black;"></th>
            </tr>
            <tr>
                <th colspan="2" style="border-left:1px solid black;border-bottom:1px solid black;">TANGGUNGAN KANTOR</th>
                <th></th>
                <th style="border-right:1px solid black;"></th>
            </tr>
            <tr>
                <td style="border-left:1px solid black;">BPJS Ketenagakerjaan</td>
                <td style="text-align:right; padding-right:10px;">: Rp.<?php echo $result->bpjs_ket?></td>
                <th></th>
                <th style="border-right:1px solid black;"></th>
            </tr>
            <tr>
                <td style="border-left:1px solid black;">BPJS Kesehatan</td>
                <td style="text-align:right; padding-right:10px;">: Rp.<?php echo $result->bpjs_kes?></td>
                <th></th>
                <th style="border-right:1px solid black;"></th>
            </tr>
            <tr>
                <th style="text-align:left;border-left:1px solid black;border-top:1px solid black;border-bottom:1px solid black;">Total Penerimaan</th>
                <th style="text-align:right; padding-right:10px;border-top:1px solid black;border-bottom:1px solid black;">: Rp.<?php echo $result->total_terima?></th>
                <th style="border-top:1px solid black;border-bottom:1px solid black;">Total Potongan</th>
                <th style="text-align:right; padding-right:10px;border-right:1px solid black;border-top:1px solid black;border-bottom:1px solid black;">: Rp.<?php echo $result->total_potongan?></th>
            </tr>
            <tr>
                <th style="text-align:left;border-left:1px solid black; border-bottom:1px solid black;">Total Gaji Diterima</th>
                <th style="text-align:right; padding-right:10px;border-bottom:1px solid black;border-right:1px solid black;">: Rp.<?php echo $result->gaji_diterima?></th>
                <th ></th>
                <td style="text-align:center; border-right:1px solid black;">Bandung, <?php echo $result->tanggal?></td>
            </tr>
        </table>
        <table width="60%" style="border-collapse:collapse;">
            <tr>
                <th style="width:25%;border-left:1px solid black;"></th>
                <th style="width:25%"></th>
                <td style="width:25%;text-align:center;">Disetujui</td>
                <td style="width:25%;text-align:center;border-right:1px solid black;" >Diterima Oleh</td>
            </tr>
            <tr>
                <th style="width:25%;border-left:1px solid black;"></th>
                <th style="width:25%"></th>
                <th style="width:25%"><img src="views/logo/tanda_tangan.png"></th>
                <th style="width:25%;border-right:1px solid black;" ></th>
            </tr>
            <tr>
                <th style="width:25%;border-left:1px solid black;"></th>
                <th style="width:25%"></th>
                <th style="width:25%; font-size:13px">NIA ARDHYANI, AMD</th>
                <th style="width:25%;border-right:1px solid black;" ></th>
            </tr>
            <tr>
                <th style="width:25%;border-left:1px solid black;border-bottom:1px solid black;"></th>
                <th style="width:25%;border-bottom:1px solid black;"></th>
                <td style="width:25%; text-align:center; font-size:11px;;border-bottom:1px solid black;">Dir,SDM & Keu</td>
                <th style="width:25%;border-bottom:1px solid black;border-right:1px solid black; " ><?php echo $result->nama?></th>
            </tr>
        </table>
    
     	<script>
		window.print();
	</script>
    

        </body>
</html>
<?php
//$html = ob_get_contents();
//ob_end_clean();
//        
//require_once('tool/html2pdf.class.php');
//$pdf = new HTML2PDF('P','A5','en');
//$pdf->WriteHTML($html);
//$pdf->Output('slip-gaji.pdf', 'D');
?>