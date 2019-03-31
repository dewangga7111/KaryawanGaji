<html>
    <head>
    </head>
    <body>
<table border="1">
    
      <tr >
        <th>No</th>
        <th>Nik</th>
        <th>Nama Karyawan</th>
        <th>No KTP</th>
        <th>NPWP</th>
        <th>Pass E-Fin</th>
        <th>Tempat Lahir</th>
        <th>Tanggal lahir</th>
        <th>Nilai Test English</th>
        <th>Tanggal Mulai Kerja</th>
        <th>Tanggal Abis Kerja</th>
        <th>Tanggal Resign</th>
        <th>Alamat</th>
        <th>No HP</th>
        <th>No Lain</th>
        <th>Email</th>
        <th>Pendidikan Akhir</th>
        <th>Tanggal Ijazah</th>
        <th>Status</th>
        <th>Jabatan</th>
        <th>Divisi</th>
        <th>Password</th>
      </tr>
    
    
    <?php 
      include 'tool/koneksi.php';
        $no = 0;
        $query = mysqli_query($connect, "SELECT * FROM karyawan WHERE status='resign'")or die(mysql_error);
	   while ($result = mysqli_fetch_object($query)) {
        $no++;
	?>
        <tr>
            <td><?php echo $no?></td>
            <td><?php echo $result->nik?></td>
            <td><?php echo $result->nama?></td>
            <td><?php echo $result->no_ktp?></td>
            <td><?php echo $result->npwp?></td>
            <td><?php echo $result->pass_efin?></td>
            <td><?php echo $result->tempat_lahir?></td>
            <td><?php echo $result->tgl_lahir?></td>
            <td><?php echo $result->nilai_test_english?></td>
            <td><?php echo $result->tgl_mulai_kerja?></td>
            <td><?php echo $result->tgl_abis_kontrak?></td>
            <td><?php echo $result->tgl_resign?></td>
            <td><?php echo $result->alamat?></td>
            <td><?php echo $result->no_hp?></td>
            <td><?php echo $result->no_lain?></td>
            <td><?php echo $result->email?></td>
            <td><?php echo $result->pendidikan_akhir?></td>
            <td><?php echo $result->tgl_ijazah?></td>
            <td><?php echo $result->status?></td>
            <td><?php echo $result->jabatan?></td>
            <td><?php echo $result->divisi?></td>
            <td><?php echo $result->password?></td>
        </tr>
        <?php
       }
        ?>
    
</table>
        </body>
</html>