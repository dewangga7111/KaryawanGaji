<html>
    <head>
    </head>
    <body>
<table border="1">
    
      <tr >
        <th>No</th>
        <th>Nik</th>
        <th>Nama Karyawan</th>
        <th>Nama Tempat</th>
        <th>Nama Pekerjaan</th>
        <th>Uraian</th>
        <th>Tanggal</th>
        <th>Jam Masuk</th>
        <th>Jam Keluar</th>
        <th>Jam Kerja</th>
      </tr>
    
    
    <?php 
      include 'tool/koneksi.php';
        $no = 0;
        $nik = $_POST['nik'];
        $bulan = $_POST['bulan'];
        $tahun = $_POST['tahun'];
        $query = mysqli_query($connect, "SELECT * FROM kehadiran 
INNER JOIN karyawan ON kehadiran.nik=karyawan.nik
LEFT JOIN (SELECT keluar.`id_kehadiran`,keluar.`jam_keluar`,keluar.`honor`, HOUR(TIMEDIFF(keluar.`jam_keluar`,kehadiran.`jam_masuk`)) AS jam_kerja FROM 
kehadiran,keluar WHERE kehadiran.`id_kehadiran`=keluar.`id_kehadiran`) AS kel ON kehadiran.`id_kehadiran`=kel.`id_kehadiran`
WHERE karyawan.`nik`='$nik' AND MONTH(kehadiran.`tanggal`)='$bulan' AND YEAR(kehadiran.`tanggal`)='$tahun'
ORDER BY kehadiran.`tanggal` DESC, kehadiran.`jam_masuk` DESC")or die(mysql_error);
	   while ($result = mysqli_fetch_object($query)){
        $no++;
	?>
        <tr>
            <td><?php echo $no?></td>
            <td><?php echo $result->nik?></td>
            <td><?php echo $result->nama?></td>
            <td><?php echo $result->nama_tempat?></td>
            <td><?php echo $result->nama_pekerjaan?></td>
            <td><?php echo $result->uraian?></td>
            <td><?php echo $result->tanggal?></td>
            <td><?php echo $result->jam_masuk?></td>
            <td><?php echo $result->jam_keluar?></td>
            <td><?php echo $result->jam_kerja?></td>
        </tr>
        <?php
       }
        ?>
    
</table>
        </body>
</html>