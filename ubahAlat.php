<?php

include "koneksi.php";

 $id = $_GET['id'];
 echo $tgl = $_GET['tgl'];
 $jenis = $_GET['jenis'];
 $merk = $_GET['merk'];
 $model = $_GET['model'];
 $sn = $_GET['sn'];
 $kondisi = $_GET['kondisi'];

$updateAlat="update alat set jenis='$jenis',merk='$merk',model='$model',sn='$sn',kondisi='$kondisi',tgl='$tgl' where idalat='$id'";
$qUpdateAlat=  mysql_query($updateAlat);

if($qUpdateAlat){
    echo 'Success !';
}  else {
 echo    mysql_error();    
}

?>
