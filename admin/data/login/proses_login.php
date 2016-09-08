<?php

session_start();
ob_start();
include '../../../koneksi.php';


$user = $_POST['user'];
$pass = md5($_POST['pass']);

$sql = "select * from user where username='$user'  and password='$pass' ";
$query = mysql_query($sql);
$jml_data = mysql_num_rows($query);

if ($jml_data > 0) {
    
    $_SESSION['login-bmkg'] = "";
    $data = mysql_fetch_assoc($query);
    $_SESSION['username'] = $data['username'];
    $_SESSION['pass'] = $data['password'];
    $_SESSION['level'] = $data['level'];
    header("location:../../index.php?open");
    
    

} else {
    header("location:../../index.php?error=1");
}
?>