<?php

//// These four parameters must be changed dependent on your MySQL settings
//$hostdb = 'localhost'; // MySQl host
//$userdb = 'root';  // MySQL username
//$passdb = '';  // MySQL password
//$namedb = 'ekstrakurikuler_v4'; // MySQL database name
//// Please uncomment the appropriate statement
//$link = mysqli_connect($hostdb, $userdb, $passdb, $namedb);
//
//if (!$link) {
//    die('Could not connect: ' . mysqli_error());
//}
//
function antiinjection($data) {
    $filter_sql = stripslashes(strip_tags(htmlspecialchars($data, ENT_QUOTES)));
    return $filter_sql;
}
//
//function mail_server() {
//    return "ekstrakurikuler@stmikbumigora.ac.id";
//}
//
//function webmail() {
//    return "http://mail.stmikbumigora.ac.id";
//}
//
//function server() {
//    return "http://ekstrakurikuler.stmikbumigora.ac.id";
//}

include "cipher.php"; // panggil file nya
$cipher = new Cipher(MCRYPT_BLOWFISH, MCRYPT_MODE_ECB);
$kunci = "bismillaahirrohmaa nirrohiim"; // kunci
?>