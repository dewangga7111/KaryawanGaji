
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
    <script type="text/javascript" >

 function hitung() {
 a=eval(form.gaji_pokok.value); //mengisi variabel a dengan isi dari input name angka1
b=eval(form.pph.value);
c=eval(form.bpjs.value);
d=eval(form.pajak.value);
e=eval(form.piket_malam.value);
f=eval(form.lembur.value);
g=eval(form.denda.value);
h=eval(form.kasbon.value);
j=eval(form.pensiun.value);
k=eval(form.thr.value);
 i=a-b-c+k-j-d-h+e+f-g //menjumlahkan kedua variabel
 form.thp.value = i; //memberikan hasil penjumlahan ke input name total
 }
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
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; Menu | Ubah Gaji</span>
</div>
    <div class="container py-3" style="margin-top:70px; margin-bottom:100px">
    <div class="row">
        <div class="mx-auto col-sm-6">
                    <!-- form user info -->
                    <div class="card">
                        <div class="card-header">
                            <h4 class="mb-0">Data Gaji</h4>
                        </div>
                        <div class="card-body">
                            <form action="ubah_gaji.php?id_gaji=<?php echo $result->id_gaji?>" class="form-horizontal" method="post" enctype="multipart/form-data" autocomplete="off" name="form">
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Gaji</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" name="gaji_pokok"  value="<?php echo $result->gaji_pokok?>" required >
                                    </div>
                                </div>
                                 <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">PPH21 atas Gaji</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" name="pph" value="<?php echo $result->pph?>"  required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">BPJS</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" name="bpjs" value="<?php echo $result->bpjs?>"  required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">JHT + Pensiun</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" name="pensiun" value="<?php echo $result->jht_pensiun?>"  required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Bonus THR</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" name="thr" value="<?php echo $result->bonus_thr?>"  required >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">BPJS Ket</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" name="bpjs_ket"  value="<?php echo $result->bpjs_ket?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">BPJS Kes</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" name="bpjs_kes"  value="<?php echo $result->bpjs_kes?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Pajak</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" name="pajak"  value="<?php echo $result->pajak?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Kasbon</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" name="kasbon"  value="<?php echo $result_kasbon->jumlah_bayar?>" required>
                                    </div>
                                </div>
                                       <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Piket Malam</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" name="piket_malam"  value="<?php echo $result_piket->hasil?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Lembur</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" name="lembur" id="tgl_lahir"  value="<?php echo $result_lembur->hasil?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">Denda</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" name="denda"  value="<?php echo $result_denda->hasil?>" required>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-lg-3 col-form-label form-control-label">THP</label>
                                    <div class="col-lg-9">
                                        <input class="form-control" type="text" name="thp"  id="tgl_mulai_kerja" value="<?php echo $result->thp?>">  <input class="btn btn-secondary" type=button name=submit onclick="hitung()" value="Hitung THP" style="margin-top:10px" required >
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
                                                  <p>Anda yakin ingin mengubah data </p>      
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
