<?php
// Fungsi header dengan mengirimkan raw data excel
header("Content-type: application/vnd-ms-excel");
 
// Mendefinisikan nama file ekspor "hasil-export.xls"
header("Content-Disposition: attachment; filename=izin-pertahun.xls");
 
// Tambahkan table
include 'download_index_izin_tahun.php';
?>