<?php

include "koneksi.php";
$akhir = $_GET['akhir'];
if ($akhir == 1) {
    $query = "SELECT * FROM identitaspos ORDER BY idaws DESC LIMIT 1";
} else {
    $query = "SELECT * FROM `identitaspos` inner join representasi on identitaspos.id=representasi.id WHERE representasi.id =$akhir ";
}
$data = mysql_query($query);

$json = '{"wilayah": {';
$json .= '"petak":[ ';
while ($x = mysql_fetch_array($data)) {
    $json .= '{';
    $json .= '  "idaws":"' . $x['idaws'] . '",
		 
                "jenis_komunikasi":"' . htmlspecialchars($x['jenis_komunikasi']) . '",
		"nomorgsm":"' . htmlspecialchars($x['nomorgsm']) . '",
		"merk":"' . htmlspecialchars($x['merk']) . '",
		"namapos":"' . htmlspecialchars($x['namapos']) . '",
		"jenis":"' . htmlspecialchars($x['jenis']) . '",
		"x":"' . $x['lat'] . '",
		"y":"' . $x['lng'] . '",
		"timur":"' . $x['timur'] . '",
		"barat":"' . $x['barat'] . '",
		"utara":"' . $x['utara'] . '",
		"selatan":"' . $x['selatan'] . '",
		"e":"' . $x['e'] . '"
		
    },';
}
$json = substr($json, 0, strlen($json) - 1);
$json .= ']';

$json .= '}}';
echo $json;
?>
