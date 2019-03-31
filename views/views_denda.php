
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="takola.png">
    <title>SDM</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Menyisipkan Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="tool/style.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    	<script type="text/javascript" src="media/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="media/js/bootstrap.min.js"></script>
  <script src="tool/js.js"></script>
    <script src='jquery-3.3.1.js' type='text/javascript'></script>
   <script src='jquery-ui.min.js' type='text/javascript'></script>
   <script type='text/javascript'>
   $(document).ready(function(){
     $('.dateFilter').datepicker({
        dateFormat: "yy-mm-dd"
     });
   });
   </script>
</head>
<body style="background:#caf2c4">
<?php
   session_start();
   if(isset($_SESSION['username'])) {
   header('location:index.php'); }
   require_once("tool/koneksi.php");
?>
<div id="mySidenav" class="sidenav" style="  background: #caf2c4;">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()" >&times;</a>
    <h4 style="color:blck; margin-left:31px; opacity:0.9">
        Selamat Datang<br> <?php echo $_SESSION['nama'];?><br/>
    </h4>
    <hr width="75%" align="center" color="white" style="opacity:0.7">
  <a style="color:blck; font-size: 20px; opacity:0.9" href="index_karyawan.php">Karyawan</a>
  <a style="color:blck; font-size: 20px; opacity:0.9" href="index_kehadiran.php">Absensi</a>
  <a style="color:blck; font-size: 20px; opacity:0.9" href="index_gaji.php">Gaji</a>
  <a style="color:blck; font-size: 20px; opacity:0.9" href="index.php">Logout</a>
    <a style="color:blck; font-size: 20px; opacity:0.9" href="pengaturan.php"><img src="views/images/config.png" height="25" width="25" style="margin-top:260px; margin-left:-10px; opacity:0.7"></a>
</div>
<div id="main" class="container-fluid shadow" style="background: #edeeef">
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; Menu | Denda</span>
</div>

<div class="container-fluid" style="margin-top:100px; width:1200px; background:#edeeef; border-radius:15px;">
    
    <div class="row" style="margin-left:1px">
    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample" style="margin-bottom:30px; margin-top:30px">
    Rekap
    </button>
    <div class="dropdown show" style="margin-left:15px;  margin-top:30px;margin-bottom:30px">
  <button class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
    Absensi
  </button>

  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
    <a class="dropdown-item" href="index_kehadiran.php">Kehadiran</a>
    <a class="dropdown-item" href="index_kegiatan.php">Kegiatan</a>
    <a class="dropdown-item" href="index_izin.php">Izin</a>
      <a class="dropdown-item" href="index_lembur.php">Lemburan</a>
    <a class="dropdown-item" href="index_piket.php">Piket Malam</a>
    <a class="dropdown-item" href="index_denda.php">Denda Alpa</a>
  </div>
</div>
    <a href="tambah_alpa.php"><button class="btn btn-info" style="margin-left:10px; margin-top:30px">Tambah Alpa</button></a>
  <div class="btn-group" role="group">
    <button id="btnGroupDrop1" type="button"
            class="btn btn-secondary dropdown-toggle"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="height:38px; margin-top:30px; margin-left:10px">
      Filter
    </button>
    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
      <a class="dropdown-item" href="fungsi_index_telat.php">Telat</a>
      <a class="dropdown-item" href="fungsi_index_alpa.php">Alpa</a>
    </div>
  </div>
    </div>
    <div class="collapse" id="collapseExample">
      <div class="col-md-4 mb-3">
        <h5>Cari Bulan</h5>  
    </div>
      <form class="form-row"action="fungsi_rekap_denda.php" class="form-horizontal" method="post" enctype="multipart/form-data" style="margin-left:10px; ">
          
          <label>Bulan</label>
          <div class="col-md-4 mb-3">
        <select name="bulan" class="form-control">
        <option value="01">Januari</option>
        <option value="02">Februari</option>
        <option value="03">Maret</option>
        <option value="04">April</option>
        <option value="05">Mei</option>
        <option value="06">Juni</option>
        <option value="07">Juli</option>
        <option value="08">Agustus</option>
        <option value="09">September</option>
        <option value="10">Oktober</option>
        <option value="11">November</option>
        <option value="12">Desember</option>
        </select>
          </div>
          
          <label>Tahun</label>
          <div class="col-md-4 mb-3">
        <select name="tahun" class="form-control">
        <?php
        $awal= date('Y') - 50;
        for($i = $awal;$i<$awal + 100;$i++){
            $sel = $i == date('Y') ? ' selected="selected"' : '';
            echo '<option value="'.$i.'"'.$sel.'>'.$i.'</option>';
        }
        ?>
        </select>
          </div>
          <button type="submit" class="btn btn-primary" value="Rekap" style="margin-left:10px; height: 38px;">Cari</button>

      </form>
      <div class="col-md-4 mb-3" style="margin-top:15px">
        <h5>Unduh Rekap Per Orang</h5>  
    </div>
    <form class="form-row" action="export_index_denda_orang.php" class="form-horizontal" method="post" enctype="multipart/form-data" style="margin-left:10px">
        Nama
        <div class="col-md-2.5 mb-3">
        <select name="nik" class="form-control" style="width:200px">
            <option>Pilih Nama</option>
                <?php while ($row = mysqli_fetch_assoc($result2)) {?>
                    <option value="<?php echo $row['nik']?>"><?php echo $row['nama']?></option>
                <?php }?>
        </select>
          </div>
        Bulan
        <div class="col-md-2.5 mb-3">
        <select name="bulan" class="form-control" style="width:200px">
        <option value="01">Januari</option>
        <option value="02">Februari</option>
        <option value="03">Maret</option>
        <option value="04">April</option>
        <option value="05">Mei</option>
        <option value="06">Juni</option>
        <option value="07">Juli</option>
        <option value="08">Agustus</option>
        <option value="09">September</option>
        <option value="10">Oktober</option>
        <option value="11">November</option>
        <option value="12">Desember</option>
        </select>   
          </div>
        Tahun
          <div class="col-md-2.5 mb-3">
        <select name="tahun" class="form-control" style="width:200px"> 
        <?php
        $awal= date('Y') - 50;
        for($i = $awal;$i<$awal + 100;$i++){
            $sel = $i == date('Y') ? ' selected="selected"' : '';
            echo '<option value="'.$i.'"'.$sel.'>'.$i.'</option>';
        }
        ?>
        </select>
          </div>
        <button type="submit" class="btn btn-primary" value="Rekap" style="margin-left:10px; height: 38px">Unduh</button>
    </form>
      <div class="col-md-4 mb-3" style="margin-top:15px">
        <h5>Unduh Rekap Per Bulan</h5>  
    </div>
    <form class="form-row" action="export_index_denda_bulan.php" class="form-horizontal" method="post" enctype="multipart/form-data" style="margin-left:10px">
        Bulan
        <div class="col-md-2.5 mb-3">
        <select name="bulan" class="form-control" style="width:200px">
        <option value="01">Januari</option>
        <option value="02">Februari</option>
        <option value="03">Maret</option>
        <option value="04">April</option>
        <option value="05">Mei</option>
        <option value="06">Juni</option>
        <option value="07">Juli</option>
        <option value="08">Agustus</option>
        <option value="09">September</option>
        <option value="10">Oktober</option>
        <option value="11">November</option>
        <option value="12">Desember</option>
        </select>   
          </div>
        Tahun
          <div class="col-md-2.5 mb-3">
        <select name="tahun" class="form-control" style="width:200px"> 
        <?php
        $awal= date('Y') - 50;
        for($i = $awal;$i<$awal + 100;$i++){
            $sel = $i == date('Y') ? ' selected="selected"' : '';
            echo '<option value="'.$i.'"'.$sel.'>'.$i.'</option>';
        }
        ?>
        </select>
          </div>
        <button type="submit" class="btn btn-primary" value="Rekap" style="margin-left:10px; height: 38px">Unduh</button>
    </form>
      <div class="col-md-4 mb-3" style="margin-top:15px">
        <h5>Unduh Rekap Per Tahun</h5>  
    </div>
    <form class="form-row" action="export_index_denda_tahun.php" class="form-horizontal" method="post" enctype="multipart/form-data" style="margin-left:10px">
        Tahun
          <div class="col-md-2.5 mb-3">
        <select name="tahun" class="form-control" style="width:200px"> 
        <?php
        $awal= date('Y') - 50;
        for($i = $awal;$i<$awal + 100;$i++){
            $sel = $i == date('Y') ? ' selected="selected"' : '';
            echo '<option value="'.$i.'"'.$sel.'>'.$i.'</option>';
        }
        ?>
        </select>
          </div>
        <button type="submit" class="btn btn-primary" value="Rekap" style="margin-left:10px; height: 38px">Unduh</button>
    </form>
    </div>
<table class="table table-striped">
    <thead>
      <tr>
        <th>No</th>
        <th>Nik</th>
        <th>Nama Karyawan</th>
        <th>Denda</th>
        <th>Tanggal</th>
        <th>Jam</th>
        <th>Action</th>
      </tr>
    </thead>
    <tbody>
    <?php 
       $no = $mulai+0;
	   while ($result = mysqli_fetch_object($query)) {
        $no++;
	?>
        <tr>
            <td><?php echo $no?></td>
            <td><?php echo $result->nik?></td>
            <td><?php echo $result->nama?></td>
            <td><?php echo $result->denda?></td>
            <td><?php echo $result->tanggal?></td>
            <td><?php echo $result->jam_masuk?></td>
            <td>
                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#<?php echo $result->id_denda?>">
                Hapus
            </button>
            </td>
                <!-- The Modal -->
                <div class="modal fade" id="<?php echo $result->id_denda?>" role="dialog">
                  <div class="modal-dialog">
                    <div class="modal-content">

                      <!-- Modal Header -->
                      <div class="modal-header">
                        <h4 class="modal-title">Konfirmasi Hapus</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>

                      <!-- Modal body -->
                      <div class="modal-body">
                      <p>Anda yakin ingin menghapus data <b><?php echo $result->nama?></b>? </p>      
                      </div>

                      <!-- Modal footer -->
                      <div class="modal-footer">
                          <a href="delete_denda.php?id_denda=<?php echo $result->id_denda?>"><button type="button" class="btn btn-success" data="modal">Ya</button></a>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
                      </div>

                    </div>
                  </div>
                </div>
        </tr>
    <?php
       }
    ?>
    </tbody>
</table>
<ul class="pagination" style="margin-left:18px; margin-bottom:70px">
  <li class="page-item" style="margin-bottom:30px">
      <div class="row">
          <?php for ($i=1; $i<=$pages ; $i++){ ?>
          <a class="page-link" href="?halaman=<?php echo $i; ?>"><?php echo $i; ?></a>
          <?php } ?>
      </div>
  </li>       
</ul>

</div>  
</body>
</html> 
