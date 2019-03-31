
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
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; Menu | Pekerjaan</span>
</div>

<div class="container-fluid" style="margin-top:100px; width:500px; padding-top:50px; padding-bottom:30px; background:#edeeef; border-radius:15px;">
    <form action="tambah_pekerjaan.php" class="form-horizontal" method="post" enctype="multipart/form-data" autocomplete="off">
        <h5 style="margin-bottom:30px">Tambah Pekerjaan</h5>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Nama Pekerjaan</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" name="pekerjaan" >
                                    </div>
                                </div>
                
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label"></label>
                                    <div class="col-lg-9">
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal"> Save
                                        </button>
                                            <!-- The Modal -->
                                            <div class="modal fade" id="myModal" role="dialog">
                                              <div class="modal-dialog">
                                                <div class="modal-content">

                                                  <!-- Modal Header -->
                                                  <div class="modal-header">
                                                    <h4 class="modal-title">Konfirmasi</h4>
                                                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                  </div>

                                                  <!-- Modal body -->
                                                  <div class="modal-body">
                                                  <p>Anda yakin dengan data yang dimasukkan?</p>      
                                                  </div>

                                                  <!-- Modal footer -->
                                                  <div class="modal-footer">
                                                      <button type="submit" class="btn btn-success" data="modal">Ya</button>
                                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
                                                  </div>

                                                </div>
                                              </div>
                                            </div>
                                    </div>
                                </div>
                            </form>
    <hr width="95%" align="center" color="black" style="opacity:0.7; margin-bottom:30px; margin-top:30px ">
<table class="table table-striped">
    <thead>
      <tr>
        <th>No</th>
        <th>Pekerjaan</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
    <?php 
       $no = 0;
	   while ($result = mysqli_fetch_object($hasil)) {
        $no++;
	?>
        <tr>
            <td><?php echo $no?></td>
            <td><?php echo $result->nama_pekerjaan?></td>
            <td>
  			<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#<?php echo $result->nama_pekerjaan?>">
                Hapus
            </button>
            </td>
                <!-- The Modal -->
                <div class="modal fade" id="<?php echo $result->nama_pekerjaan?>" role="dialog">
                  <div class="modal-dialog">
                    <div class="modal-content">

                      <!-- Modal Header -->
                      <div class="modal-header">
                        <h4 class="modal-title">Konfirmasi Hapus</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                      </div>

                      <!-- Modal body -->
                      <div class="modal-body">
                      <p>Anda yakin ingin menghapus <b><?php echo $result->nama_pekerjaan?></b>? </p>      
                      </div>

                      <!-- Modal footer -->
                      <div class="modal-footer">
                          <a href="delete_pekerjaan.php?nama_pekerjaan=<?php echo $result->nama_pekerjaan?>"><button type="button" class="btn btn-success" data="modal">Ya</button></a>
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
    

</div>  
</body>
</html> 
