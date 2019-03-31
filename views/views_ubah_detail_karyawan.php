
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
<div id="mySidenav" class="sidenav" style="  background: #0ecc02;
  background: -webkit-linear-gradient(top, #34bc1e, #8dff87);">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()" >&times;</a>
    <h4 style="color:white; margin-left:31px; opacity:0.9">
        Selamat Datang<br> <?php echo $_SESSION['nama'];?><br/>
    </h4>
    <hr width="75%" align="center" color="white" style="opacity:0.7">
  <a style="color:white; font-size: 20px; opacity:0.9" href="index_karyawan.php">Karyawan</a>
  <a style="color:white; font-size: 20px; opacity:0.9" href="index_kehadiran.php">Absensi</a>
  <a style="color:white; font-size: 20px; opacity:0.9" href="index_gaji.php">Gaji</a>
  <a style="color:white; font-size: 20px; opacity:0.9" href="index.php">Logout</a>
    <a style="color:white; font-size: 20px; opacity:0.9" href="pengaturan.php"><img src="views/images/config.png" height="25" width="25" style="margin-top:260px; margin-left:-10px; opacity:0.7"></a>
</div>
<div id="main" class="container-fluid shadow" style="background: #edeeef">
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; Menu | Ubah Biodata</span>
</div>
    <div class="container py-3" style="margin-top:70px; margin-bottom:100px">
    <div class="row">
        <div class="mx-auto col-sm-6">
                    <!-- form user info -->
                    <div class="card">
                        <div class="card-header">
                            <h4 class="mb-0">Data Karyawan</h4>
                        </div>
                        <div class="card-body">
                            <form action="ubah_detail.php?nik=<?php echo $result->nik?>" class="form-horizontal" method="post" enctype="multipart/form-data" autocomplete="off">
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">NIK</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" name="nik" value="<?php echo $result->nik?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Nama Penggilan</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" name="nama_panggilan" value="<?php echo $result->nama_panggilan?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Status Nikah</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" name="status_nikah" value="<?php echo $result->status_nikah?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-lg-3 col-form-label form-control-label">Jenis Kelamin</label>
                                    <div class="radio col-sm-9">
                                        <label>
                                            <input type="radio" name="jenis_kelamin" value="Laki-Laki" checked> Laki-laki
                                        </label>
                                        <label>
                                        <input type="radio" name="jenis_kelamin" value="Perempuan"> Perempuan
                                        </label>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Agama</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" name="agama" value="<?php echo $result->agama?>">
                                    </div>
                                </div>
                                       <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Sosial Media</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" name="sosial_media" value="<?php echo $result->sosial_media?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Hobi</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" name="hobi"  value="<?php echo $result->hobi?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Olahraga</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" name="olahraga" value="<?php echo $result->olahraga?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Speed Mengetik</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" name="speed_mengetik" value="<?php echo $result->speed_mengetik?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Riwayat Pendidikan</label>
                                    <div class="col-lg-9">
                                        <textarea rows="3" class="form-control" name="riwayat_pendidikan" ><?php echo $result->riwayat_pendidikan?></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Riwayat Pekerjaan</label>
                                    <div class="col-lg-9">
                                        <textarea rows="3" class="form-control" name="riwayat_pekerjaan" ><?php echo $result->riwayat_pekerjaan?></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Riwayat Kursus</label>
                                    <div class="col-lg-9">
                                        <textarea rows="3" class="form-control" name="riwayat_kursus" ><?php echo $result->riwayat_kursus?></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Susunan Keluarga</label>
                                    <div class="col-lg-9">
                                        <textarea rows="3" class="form-control" name="susunan_keluarga" ><?php echo $result->susunan_keluarga?></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Susunan Orang Tua</label>
                                    <div class="col-lg-9">
                                        <textarea rows="3" class="form-control" name="susunan_orangtua" ><?php echo $result->susunan_orangtua?></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Susunan Saudara</label>
                                    <div class="col-lg-9">
                                        <textarea rows="3" class="form-control" name="susunan_saudara" ><?php echo $result->susunan_saudara?></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">biografi</label>
                                    <div class="col-lg-9">
                                        <textarea rows="3" class="form-control" name="biografi" ><?php echo $result->biografi?></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Foto</label>
                                    <div class="col-lg-9">
                                        <input type="file" name="foto" value="views/images/<?php echo $result->foto ?>">
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
                                                  <p>Anda yakin dengan biodata yang dimasukkan?</p>      
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
    
</body>
</html> 
