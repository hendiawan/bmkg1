<?php

include "koneksi.php";

 $id = $_GET['id'];
 $tgl = $_GET['tgl'];
 $kerusakan = $_GET['kerusakan'];
 $tindakanAwal = $_GET['tindakanAwal'];
 $tindakanLanjut = $_GET['tindakanLanjut'];
 $pelapor = $_GET['pelapor'];

$sqlLaporan = "update laporan set tglLapor='$tgl',kerusakan='$kerusakan',tindakanAwal='$tindakanAwal',tindakanLanjut='$tindakanLanjut',pelapor='$tindakanLanjut'"
        . "where idLaporan='$id'";
        
$queryLaporan = mysql_query($sqlLaporan);

if ($queryLaporan) {
    echo "Laporan Diubah";
} else {
    echo mysql_error();
}
?>
