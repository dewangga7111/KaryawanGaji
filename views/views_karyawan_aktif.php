
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
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; Menu | Karyawan Aktif</span>
</div>

<div class="container-fluid" style="margin-top:100px; width:1200px; background:#edeeef; border-radius:15px;">
    <div class="row">
<div class="btn-group" role="group" aria-label="Button group with nested dropdown" style="margin-bottom:30px; margin-left:15px; margin-top:30px"> 
    <a href="tambah_karyawan.php">
        <button type="button" class="btn btn-secondary" style="border-top-right-radius:0px; border-bottom-right-radius:0px;">Tambah Karyawan</button>
    </a>

  <div class="btn-group" role="group">
    <button id="btnGroupDrop1" type="button"
            class="btn btn-secondary dropdown-toggle"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Filter
    </button>
    <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
      <a class="dropdown-item" href="index_karyawan_aktif.php">Karyawan Aktif</a>
      <a class="dropdown-item" href="index_karyawan_resign.php">Karyawan Resign</a>
    </div>
  </div>
</div>
    <a href="export_index_karyawan_aktif.php"><button class="btn btn-success" style="margin-left:10px; margin-top:30px">Unduh</button></a>
        </div>
<table class="table table-striped">
    <thead>
      <tr>
        <th>No</th>
        <th>Nik</th>
        <th>Nama Karyawan</th>
        <th>Email</th>
        <th>No Hp</th>
        <th>Status</th>
        <th>Jabatan</th>
        <th>Aksi</th>
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
            <td><?php echo $result->email?></td>
            <td><?php echo $result->no_hp?></td>
            <td><?php echo $result->status?></td>
            <td><?php echo $result->jabatan?></td>
            <td>
            <a href="detail_karyawan.php?nik=<?php echo $result->nik?>"><button type="button" class="btn btn-primary">Detail</button></a>&nbsp|&nbsp
			<a href="ubah_karyawan.php?nik=<?php echo $result->nik?>"><button type="button" class="btn btn-warning">Ubah</button></a>&nbsp|&nbsp
  			<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#<?php echo $result->nik?>">
                Hapus
            </button>
            </td>
                <!-- The Modal -->
                <div class="modal fade" id="<?php echo $result->nik?>" role="dialog">
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
                          <a href="delete_karyawan.php?nik=<?php echo $result->nik?>"><button type="button" class="btn btn-success" data="modal">Ya</button></a>
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
