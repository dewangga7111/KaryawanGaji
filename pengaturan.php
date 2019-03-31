
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
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; Menu | Pengaturan</span>
</div>

<div class="container-fluid" style="margin-top:100px; padding-top:25px; width:320px; height:300px; background:#edeeef; border-radius:15px;">
    <div class="card" style="width: 18rem;">
  <div class="card-header">
    Pengaturan
  </div>
  <ul class="list-group list-group-flush">
    <li class="list-group-item"><a href="tambah_admin.php">Tambah Admin</a></li>
      <li class="list-group-item"><a href="tambah_pekerjaan.php">Tambah Pekerjaan</a></li>
      <li class="list-group-item"><a href="index_delete_kehadiran.php">Hapus Kehadiran</a></li>
      <li class="list-group-item"><a href="index_tambah_kehadiran.php">Tambah Kehadiran</a></li>
  </ul>
</div>
</div>  
</body>
</html> 
