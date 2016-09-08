<?php

include "koneksi.php";

$idaws = $_GET['idaws'];
 
$jenis_komunikasi = $_GET['jenis_komunikasi'];
$nomorgsm = $_GET['nomorgsm'];
$merk = $_GET['merk'];
$namapos = $_GET['namapos'];
$x = $_GET['x'];
$y = $_GET['y'];
$e = $_GET['e'];
$jenis = $_GET['jenis'];
$desa = $_GET['desa'];
$kecamatan = $_GET['kecamatan'];
$kabupaten = $_GET['kabupaten'];
$provinsi = $_GET['provinsi'];
$penanggungjawab = $_GET['penanggungjawab'];
$hpPj = $_GET['hpPj'];
$penjaga = $_GET['penjaga'];
$hpPenjaga = $_GET['hp_penjaga'];
$pelatihan = $_GET['pelatihan'];
$catatan = $_GET['catatan'];
$pln = $_GET['pln'];
$solar = $_GET['solar'];
$ragulator = $_GET['ragulator'];
$battery = $_GET['battery'];
 
$tahunPengadaan = $_GET['tahunPengadaan'];
$kalibrasiTerakhir = $_GET['kalibrasiTerakhir'];
$tanggal = $_GET['tanggal'];
$pelaksana = $_GET['pelaksana'];
$lokasi = $_GET['lokasi'];
$alamat = $_GET['alamat'];



$identitasPos = mysql_query("insert into identitaspos values(null,'$idaws','$jenis_komunikasi','$nomorgsm','$merk','$namapos','$x','$y','$e','$jenis','0','1')");


$identitasView = mysql_query("select id from identitaspos order by id desc ");
$dataIdentitasPos = mysql_fetch_object($identitasView);
$idIdentitasPos = $dataIdentitasPos->id;

$alamat = mysql_query("insert into alamat(desa,kecamatan,kabupaten,provinsi,lokasi,alamat,id) values ('$desa','$kecamatan','$kabupaten','$provinsi','$lokasi','$alamat','$idIdentitasPos')");
$kontak = mysql_query("insert into kontak (penanggungJawab,hpPj,penjaga,hpPenjaga,pelatihan,catatan,id)values('$penanggungjawab','$hpPj','$penjaga','$hpPenjaga','$pelatihan','$catatan','$idIdentitasPos')");
 
$powerSistem=  mysql_query("insert into powersistem (pln,solar,regulator,battery,id)values('$pln','$solar','$ragulator','$battery','$idIdentitasPos')");
$alatUtamaDb= mysql_query("insert into alatutama (tahunPengadaan,kalibrasiTerakhir,tanggal,pelaksana,id)values('$tahunPengadaan','$kalibrasiTerakhir','$tanggal','$pelaksana','$idIdentitasPos') ");
$representasiDb= mysql_query("insert into representasi (timur,utara,selatan,barat,id) values ('0','0','0','0','$idIdentitasPos') ");

if ($alatUtamaDb) {
    echo "berhasil tambah alamat";
} else {
    echo mysql_error();
}
?>
