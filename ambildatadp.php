<?php

include "koneksi.php";
$akhir = $_GET['akhir'];
if ($akhir == 'aws') {
       $query = "SELECT * FROM `identitaspos` left join representasi on identitaspos.id=representasi.id left join alamat on alamat.id=identitaspos.id where identitaspos.jenis='aws'";
}else if ($akhir == 'awsp') {
       $query = "SELECT * FROM `identitaspos` left join representasi on identitaspos.id=representasi.id left join alamat on alamat.id=identitaspos.id where identitaspos.jenis='awsp'";
}else if ($akhir == 'aaws') {
       $query = "SELECT * FROM `identitaspos` left join representasi on identitaspos.id=representasi.id left join alamat on alamat.id=identitaspos.id where identitaspos.jenis='aaws'";
}else if ($akhir == 'arg') {
       $query = "SELECT * FROM `identitaspos` left join representasi on identitaspos.id=representasi.id left join alamat on alamat.id=identitaspos.id where identitaspos.jenis='arg'";
}else if ($akhir == 'smpk') {
       $query = "SELECT * FROM `identitaspos` left join representasi on identitaspos.id=representasi.id left join alamat on alamat.id=identitaspos.id where identitaspos.jenis='smpk'";
}else if ($akhir == 'observasi') {
       $query = "SELECT * FROM `identitaspos` left join representasi on identitaspos.id=representasi.id left join alamat on alamat.id=identitaspos.id where identitaspos.jenis='observasi'";
} else {
    $query = "SELECT * FROM `identitaspos` left join representasi on identitaspos.id=representasi.id left join alamat on alamat.id=identitaspos.id";
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
		"desa":"' . $x['desa'] . '",
		"kabupaten":"' . $x['kabupaten'] . '",
		"kecamatan":"' . $x['kecamatan'] . '",
		"provinsi":"' . $x['provinsi'] . '",
		"kondisi":"' . $x['kondisiPos'] . '",
		"lokasi":"' . $x['lokasi'] . '",
		"alamat":"' . $x['alamat'] . '",
		"e":"' . $x['e'] . '"
		
    },';
}
$json = substr($json, 0, strlen($json) - 1);
$json .= ']';

$json .= '}}';
echo $json;
?>
