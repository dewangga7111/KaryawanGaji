<html>
    <head>
    </head>
    <body>
<table border="1">
    
      <tr >
        <th>No</th>
        <th>Nik</th>
        <th>Nama Karyawan</th>
        <th>Tanggal</th>
        <th>Uraian</th>
      </tr>
    
    
    <?php 
      include 'tool/koneksi.php';
        $no = 0;
        $bulan = $_POST['bulan'];
        $tahun = $_POST['tahun'];
        $query = mysqli_query($connect, "SELECT * FROM izin INNER JOIN karyawan ON izin.nik=karyawan.nik WHERE MONTH(izin.tanggal)='$bulan' AND YEAR(izin.tanggal)='$tahun' ORDER BY izin.tanggal DESC")or die(mysql_error);
	   while ($result = mysqli_fetch_object($query)){
        $no++;
	?>
        <tr>
            <td><?php echo $no?></td>
            <td><?php echo $result->nik?></td>
            <td><?php echo $result->nama?></td>
            <td><?php echo $result->tanggal?></td>
            <td><?php echo $result->uraian?></td>
        </tr>
        <?php
       }
        ?>
    
</table>
        </body>
</html>