<html>
    <head>
    </head>
    <body>
<table border="1">
    
      <tr >
        <th>No</th>
        <th>Nik</th>
        <th>Nama Karyawan</th>
        <th>Tanggal Mulai</th>
        <th>Tanggal Akhir Undangan</th>
        <th>Proyek</th>
        <th>Peran</th>
        <th>Honor</th>
      </tr>
    
    
    <?php 
      include 'tool/koneksi.php';
        $no = 0;

        $bulan = $_POST['bulan'];
        $tahun = $_POST['tahun'];
        $query = mysqli_query($connect, "SELECT * FROM kegiatan INNER JOIN karyawan ON kegiatan.nik=karyawan.nik WHERE  MONTH(kegiatan.tgl_mulai)='$bulan' AND YEAR(kegiatan.tgl_mulai)='$tahun' ORDER BY kegiatan.tgl_mulai DESC")or die(mysql_error);
	   while ($result = mysqli_fetch_object($query)){
        $no++;
	?>
        <tr>
            <td><?php echo $no?></td>
            <td><?php echo $result->nik?></td>
            <td><?php echo $result->nama?></td>
            <td><?php echo $result->tgl_mulai?></td>
            <td><?php echo $result->tgl_akhir?></td>
            <td><?php echo $result->nama_pekerjaan?></td>
            <td><?php echo $result->peran?></td>
            <td><?php echo $result->honor_kegiatan?></td>
        </tr>
        <?php
       }
        ?>
    
</table>
        </body>
</html>