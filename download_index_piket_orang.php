<html>
    <head>
    </head>
    <body>
<table border="1">
    
      <tr >
        <th>No</th>
        <th>Nik</th>
        <th>Nama Karyawan</th>
        <th>Keterangan</th>
        <th>Status</th>
        <th>Honor</th>
        <th>Tanggal</th>
      </tr>
    
    
    <?php 
      include 'tool/koneksi.php';
        $no = 0;
        $nik = $_POST['nik'];
        $bulan = $_POST['bulan'];
        $tahun = $_POST['tahun'];
        $query = mysqli_query($connect, "SELECT * FROM piket INNER JOIN karyawan ON piket.nik=karyawan.nik WHERE karyawan.nik='$nik' AND MONTH(piket.tanggal)='$bulan' AND YEAR(piket.tanggal)='$tahun' ORDER BY piket.tanggal DESC")or die(mysql_error);
	   while ($result = mysqli_fetch_object($query)){
        $no++;
	?>
        <tr>
            <td><?php echo $no?></td>
            <td><?php echo $result->nik?></td>
            <td><?php echo $result->nama?></td>
            <td><?php echo $result->keterangan?></td>
            <td><?php echo $result->status_hari?></td>
            <td><?php echo $result->honor_piket?></td>
            <td><?php echo $result->tanggal?></td>
        </tr>
        <?php
       }
        ?>
    
</table>
        </body>
</html>