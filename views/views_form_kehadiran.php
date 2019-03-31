
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
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://unpkg.com/gijgo@1.9.11/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.11/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    
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
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; Menu | Tambah Kehadiran</span>
</div>
    <div class="container py-3" style="margin-top:70px; margin-bottom:100px">
    <div class="row">
        <div class="mx-auto col-sm-6">
                    <!-- form user info -->
                    <div class="card">
                        <div class="card-header">
                            <h4 class="mb-0">Data Kehadiran</h4>
                        </div>
                        <div class="card-body">
                            <form action="index_tambah_kehadiran.php" class="form-horizontal" method="post" enctype="multipart/form-data" autocomplete="off">
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Nama</label>
                                    <div class="col-lg-9">
                                        <select name="nik" class="form-control">
                                            <option>Pilih Nama</option>
                                                <?php while ($row = mysqli_fetch_assoc($result)) {?>
                                                    <option value="<?php echo $row['nik']?>"><?php echo $row['nama']?></option>
                                                <?php }?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Nama Tempat</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" name="nama_tempat" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Nama Pekerjaan</label>
                                    <div class="col-lg-9">
                                        <select name="nama_pekerjaan" class="form-control">
                                            <option>Pilih Pekerjaan</option>
                                                <?php while ($row2 = mysqli_fetch_assoc($result2)) {?>
                                                    <option value="<?php echo $row2['nama_pekerjaan']?>"><?php echo $row2['nama_pekerjaan']?></option>
                                                <?php }?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Keterangan</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" name="keterangan" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Uraian</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" name="uraian" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Tanggal</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" name="tgl_lahir" id="tanggal" >
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
                        </div>
                    </div>
                    <!-- /form user info -->
        </div>
    </div>
</div>
<script>
    $('#tanggal').datepicker({
    format: 'yyyy-mm-dd'
    });
</script>
    
</body>
</html> 
