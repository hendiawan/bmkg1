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
$id = $_GET['id'];
$KondisiPos = $_GET['KondisiPos'];
$CatatanPos = $_GET['CatatanPos'];

$lokasi = $_GET['lokasi'];
$alamat = $_GET['alamat'];


$sql="update identitaspos set idaws='$idaws' ,jenis='$jenis',jenis_komunikasi='$jenis_komunikasi',nomorgsm='$nomorgsm',merk='$merk',namapos='$namapos',lat='$x',lng='$y',e='$e',kondisiPos='$KondisiPos',catatanPos='$CatatanPos' where id='$id'";
$identitasPos = mysql_query($sql);

$alamat = mysql_query("update alamat set desa='$desa',kecamatan='$kecamatan',kabupaten='$kabupaten',provinsi='$provinsi',lokasi='$lokasi',alamat='$alamat' where id='$id'");
$kontak = mysql_query("update kontak set penanggungJawab='$penanggungjawab',hpPj='$hpPj',penjaga='$penjaga',hpPenjaga='$hpPenjaga',pelatihan='$pelatihan',catatan='$catatan' where id='$id' ");

$powerSistem = mysql_query("update powersistem set pln='$pln',solar='$solar',regulator='$ragulator',battery='$battery' where id='$id' ");
$alatUtamaDb = mysql_query("update alatutama set  tahunPengadaan='$tahunPengadaan',kalibrasiTerakhir='$kalibrasiTerakhir',tanggal='$tanggal',pelaksana='$pelaksana' where id='$id' ");
if ($identitasPos) {
    echo "Berhasi Ubah data !";

} else {
    echo mysql_error();
}
?>
