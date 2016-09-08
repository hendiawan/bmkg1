<?php

include "koneksi.php";

 $id = $_GET['id'];
 $jenis = $_GET['jenis'];
 $merk = $_GET['merk'];
 $tgl = $_GET['tgl'];
 $model = $_GET['model'];
 $sn = $_GET['sn'];
 $kondisi = $_GET['kondisi'];

$simpanAlat="insert into alat (jenis,merk,model,sn,kondisi,tgl,id) values ('$jenis','$merk','$model','$sn','$kondisi','$tgl','$id') ";
$querySimpanAlat=  mysql_query($simpanAlat);
if($querySimpanAlat){
    echo 'Success !';
}  else {
 echo    mysql_error();    
}
?>
