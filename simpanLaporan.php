<?php

include "koneksi.php";

echo $id = $_GET['id'];
echo $tgl = $_GET['tgl'];
echo $kerusakan = $_GET['kerusakan'];
echo $tindakanAwal = $_GET['tindakanAwal'];
echo $tindakanLanjut = $_GET['tindakanLanjut'];
echo $pelapor = $_GET['pelapor'];

$sqlLaporan = "insert into laporan (tglLapor,kerusakan,tindakanAwal,tindakanLanjut,pelapor,idalat) "
        . "values('$tgl','$kerusakan','$tindakanAwal','$tindakanLanjut','$pelapor','$id')";
$queryLaporan = mysql_query($sqlLaporan);

if ($queryLaporan) {
    echo "Laporan Disimpan";
} else {
    echo mysql_error();
}
?>
