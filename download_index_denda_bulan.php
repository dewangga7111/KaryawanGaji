<html>
    <head>
    </head>
    <body>
<table border="1">
    
      <tr >
        <th>No</th>
        <th>Nik</th>
        <th>Nama Karyawan</th>
        <th>Jam Masuk</th>
        <th>Denda</th>
        <th>Tanggal</th>
      </tr>
    
    
    <?php 
      include 'tool/koneksi.php';
        $no = 0;
    $bulan = $_POST['bulan'];
        $tahun = $_POST['tahun'];
        $query = mysqli_query($connect, "SELECT * FROM denda INNER JOIN karyawan ON denda.nik=karyawan.nik WHERE MONTH(denda.tanggal)='$bulan' AND YEAR(denda.tanggal)='$tahun' ORDER BY denda.tanggal DESC")or die(mysql_error);
	   while ($result = mysqli_fetch_object($query)){
        $no++;
	?>
        <tr>
            <td><?php echo $no?></td>
            <td><?php echo $result->nik?></td>
            <td><?php echo $result->nama?></td>
            <td><?php echo $result->jam_masuk?></td>
            <td><?php echo $result->denda?></td>
            <td><?php echo $result->tanggal?></td>
        </tr>
        <?php
       }
        ?>
    
</table>
        </body>
</html>