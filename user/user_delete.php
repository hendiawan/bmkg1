<?php

include '../koneksi.php';
$id = $_GET['u'];
$sql_hapus_user = "delete from user where idUser='$id'";
$query_delete = mysql_query($sql_hapus_user);
if ($query_delete) {
    ?>
    <script>
        alert("Data User Berhasil Di Hapus !!");
        window.location = "../?menu=view"
    </script>    
    <?php

}
?>