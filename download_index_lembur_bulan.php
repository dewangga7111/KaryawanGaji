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
        <th>Tanggal</th>
        <th>Status Hari</th>
        <th>Jam Mulai</th>
        <th>Jam Selesai</th>
        <th>Jumlah Jam</th>
        <th>Honor</th>
      </tr>
    
    
    <?php 
      include 'tool/koneksi.php';
        $no = 0;
    $bulan = $_POST['bulan'];
        $tahun = $_POST['tahun'];
        $query = mysqli_query($connect, "SELECT * FROM lembur INNER JOIN karyawan ON lembur.nik=karyawan.nik WHERE MONTH(lembur.tanggal)='$bulan' AND YEAR(lembur.tanggal)='$tahun' ORDER BY lembur.tanggal")or die(mysql_error);
	   while ($result = mysqli_fetch_object($query)){
        $no++;
	?>
        <tr>
            <td><?php echo $no?></td>
            <td><?php echo $result->nik?></td>
            <td><?php echo $result->nama?></td>
            <td><?php echo $result->nama_tempat?></td>
            <td><?php echo $result->nama_pekerjaan?></td>
            <td><?php echo $result->tanggal?></td>
            <td><?php echo $result->status_hari?></td>
            <td><?php echo $result->jam_mulai?></td>
            <td><?php echo $result->jam_selesai?></td>
            <td><?php echo $result->jumlah_jam?></td>
            <td><?php echo $result->honor?></td>
        </tr>
        <?php
       }
        ?>
    
</table>
        </body>
</html>