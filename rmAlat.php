<?php

$id=$_GET['id'];
$pg=$_GET['pg'];

$rmLaporan="delete from laporan where idalat='$id'";
$rmAlat="delete from alat where idalat='$id'";
$queryHapus=  mysql_query($rmAlat);

if($queryHapus){
    ?>
    <script>
        alert("Data Alat Berhasil Di Hapus");
        window.location="index.php?menu=datadetail&id=<?php echo $pg ?>"
    </script>
    <?php
    
    
}
