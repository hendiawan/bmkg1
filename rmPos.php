<?php


$id=$_GET['id'];

$sqlPos="delete from identitaspos where id='$id'";
$sqlAlatUtama="delete from alatutama where id='$id'";
$sqlAlat="delete from alat where id='$id'";
$sqlAlamat="delete from alamat where id='$id'";
$sqlPowerSistem="delete from powersistem where id='$id'";

$sqlTampilAlat="select idLaporan from laporan inner join alat on laporan.idalat=alat.idalat inner join "
        . "identitaspos on alat.id=identitaspos.id where identitaspos.id='$id'";
$queryTampilAlat =  mysql_query($sqlTampilAlat);

$sqlTampilRepresentasi="select * from representasi where id= '$id' ";
$queryTampilRepresentasi=  mysql_query($sqlTampilRepresentasi);

while ($dataTampilRepresentasi= mysql_fetch_object($queryTampilRepresentasi)){
    
  
    $dataTampilRepresentasi->timur;
    $dataTampilRepresentasi->utara;
    $dataTampilRepresentasi->barat;
    $dataTampilRepresentasi->selatan;
    
    if ($dataTampilRepresentasi->timur!='0'){
        unlink("./gambar/$dataTampilRepresentasi->timur");
    }
    if ($dataTampilRepresentasi->barat!='0'){
        unlink("./gambar/$dataTampilRepresentasi->barat");
    }
    if ($dataTampilRepresentasi->utara!='0'){
        unlink("./gambar/$dataTampilRepresentasi->utara");
    }
    if ($dataTampilRepresentasi->selatan!='0'){
        unlink("./gambar/$dataTampilRepresentasi->selatan");
    }
    
    $sqlHapusRep= mysql_query("delete from representasi where id='$id'") ;
    
    
}

$sqlKontak= mysql_query("select id_kontak,urlPenjaga,urlPenanggungJawab from kontak where id='$id'");

while ($dataKontak=  mysql_fetch_object($sqlKontak)){
    $id=$dataKontak->id_kontak;
    $penjaga=$dataKontak->urlPenjaga;
    $penanggungJawab=$dataKontak->urlPenanggungJawab;
    
    if ($penjaga!=NULL){
         unlink("./gambar/$penjaga");
    }
    if ($penanggungJawab!=NULL){
         unlink("./gambar/$penanggungJawab");
    }
    
    $hapusKontak=  mysql_query("delete from kontak where id_kontak='$id'");
    
}


while ($dataTampilAlat  = mysql_fetch_object($queryTampilAlat)){
     $dataTampilAlat->idLaporan;
     $hapusLaporan=  mysql_query("delete from laporan where idLaporan='$dataTampilAlat->idLaporan'");
}


$hapusAlatUtama = mysql_query($sqlAlatUtama);
$hapusAlat      = mysql_query($sqlAlat);
$hapusPos       =  mysql_query($sqlPos);
$hapusAlamat       =  mysql_query($sqlAlamat);
$hapusPowerSistem       =  mysql_query($sqlPowerSistem);


if($hapusPos){
    ?>
    <script>
      alert("Data Pos Berhasil Di Hapus");
        window.location="index.php?menu=data"
    </script>
    <?php
}else{
    echo mysql_error();
}
