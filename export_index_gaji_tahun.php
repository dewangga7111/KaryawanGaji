<?php ob_start(); ?>
<html>
    <head>
    </head>
    <body>
<table border="1">
    
      <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Nik</th>
        <th>Gaji Pokok</th>
        <th>BPJS Kes</th>
        <th>BPJS Ket</th>
        <th>Pajak</th>
        <th>Piket Malam</th>
        <th>Lembur</th>
        <th>Denda</th>
        <th>THP</th>
        <th>Tanggal</th>
      </tr>
    
    
    <?php 
      include 'tool/koneksi.php';
        
        $tahun = $_POST['tahun'];
         $no = 0;
        $query = mysqli_query($connect, "SELECT * FROM gaji INNER JOIN karyawan ON gaji.nik=karyawan.nik WHERE YEAR(gaji.tanggal)='$tahun'")or die(mysql_error);
        $no++;
	   while ($result = mysqli_fetch_object($query)){
	?>
        <tr>
            <td><?php echo $no?></td>
            <td><?php echo $result->nama?></td>
            <td><?php echo $result->nik?></td>
            <td><?php echo $result->gaji_pokok?></td>
            <td><?php echo $result->bpjs_kes?></td>
            <td><?php echo $result->bpjs_ket?></td>
            <td><?php echo $result->pajak?></td>
            <td><?php echo $result->piket_malam?></td>
            <td><?php echo $result->lembur?></td>
            <td><?php echo $result->denda?></td>
            <td><?php echo $result->thp?></td>
            <td><?php echo $result->tanggal?></td>
        </tr>
        <?php
       }
        ?>
    
</table>
        </body>
</html>
<?php
$html = ob_get_contents();
ob_end_clean();
        
require_once('tool/html2pdf.class.php');
$pdf = new HTML2PDF('L','A4','en');
$pdf->WriteHTML($html);
$pdf->Output('gaji-tahun.pdf', 'D');
?>