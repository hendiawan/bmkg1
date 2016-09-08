<?php

$id=$_GET['id'];
$pg=$_GET['pg'];

$rmLaporan="delete from laporan where idlaporan='$id'";
$queryHapus=  mysql_query($rmLaporan);

if($queryHapus){
    ?>
    <script>
        alert("Data Alat Berhasil Di Hapus");
        window.location="index.php?menu=detailAlat&id=<?php echo $pg ?>"
    </script>
    <?php
    
    
}
