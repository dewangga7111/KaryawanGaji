
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
    <link rel="stylesheet" href="tool/css.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    	<script type="text/javascript" src="media/jquery/jquery.min.js"></script>
	<script type="text/javascript" src="media/js/bootstrap.min.js"></script>
  <script src="tool/js.js"></script>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; Menu | Detail Karyawan</span>
</div>
<div class="container emp-profile">
            <form method="post">
                <div class="row">
                    <div class="col-md-4">
                        <img src='views/images/<?php echo $result2->foto?>' width='200' height='200' style="border-radius:100%; margin-left:80px; object-fit: cover;">
                    </div>
                    <div class="col-md-6">
                        <div class="profile-head">
                                    <h5>
                                        <?php echo $result->nama?>
                                    </h5>
                                    <h6>
                                        <?php echo $result->jabatan?>
                                    </h6>
                                    <p class="proile-rating">STATUS : <?php echo $result->status?></p>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Data Karyawan</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Tentang</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="riwayat-tab" data-toggle="tab" href="#riwayat" role="tab" aria-controls="profile" aria-selected="false">Riwayat</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="susunan-tab" data-toggle="tab" href="#susunan" role="tab" aria-controls="profile" aria-selected="false">Susunan</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="col-md-2">
                        <ul class="pagination">
                          <li class="page-item"><a class="page-link" href="tambah_detail.php?nik=<?php echo $result->nik?>">Tambah Detail</a></li>
                          <li class="page-item" style="width:600px"><a class="page-link" href="ubah_detail.php?nik=<?php echo $result->nik?>">Edit Detail </a></li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="profile-work">
                            <div class="card w-100" style="background: #edeff2; border:none; margin-top:30px;">
                          <div class="card-body">
                            <h5 class="card-title">Bio</h5>
                            <p class="card-text"><?php echo $result2->biografi?></p>
                          </div>
                        </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="tab-content profile-tab" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>NIK</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $result->nik?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Nama Lengkap</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $result->nama?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>No KTP</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $result->no_ktp?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>NPWP</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $result->npwp?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Password E-Fin</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $result->pass_efin?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Tempat lahir</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $result->tempat_lahir?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Tanggal lahir</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $result->tgl_lahir?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Tanggal mulai kerja</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $result->tgl_mulai_kerja?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Tanggal abis kontrak</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $result->tgl_abis_kontrak?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>NIK</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $result->nik?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Tanggal Resign</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $result->tgl_resign?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Alamat</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $result->alamat?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Nomor Handphone</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $result->no_hp?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Nomor Lain</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $result->no_lain?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Email</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $result->email?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Pendidikan Terakhir</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $result->pendidikan_akhir?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Tanggal Ijazah</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $result->tgl_ijazah?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Divisi</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $result->divisi?></p>
                                            </div>
                                        </div>
                            </div>
                            <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Nama Panggilan</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $result2->nama_panggilan?></p>
                                            </div>
                                        </div>
                                         
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Jenis Kelamin</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $result2->jenis_kelamin?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Agama</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $result2->agama?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Status</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $result2->status_nikah?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Hobi</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $result2->hobi?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Olahraga</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $result2->olahraga?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Kecepatan Mengetik 10 Jari</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $result2->speed_mengetik?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Sosial Media</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $result2->sosial_media?></p>
                                            </div>
                                        </div>
                            </div>
                            <div class="tab-pane fade" id="riwayat" role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Pendidikan</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $result2->riwayat_pendidikan?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Pekerjaan</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $result2->riwayat_pekerjaan?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Kursus</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $result2->riwayat_kursus?></p>
                                            </div>
                                        </div>
                            </div>
                            <div class="tab-pane fade" id="susunan" role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Keluarga</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $result2->susunan_keluarga?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Orang Tua</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $result2->susunan_orangtua?></p>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Saudara Kandung</label>
                                            </div>
                                            <div class="col-md-6">
                                                <p><?php echo $result2->susunan_saudara?></p>
                                            </div>
                                        </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>           
        </div>
</body>
</html> 
