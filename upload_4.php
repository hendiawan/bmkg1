<?php
include './koneksi.php';

$max = 1 * 1024 * 1024;
$id = $_POST['id'];
$arah = $_POST['arah'];
$tanggal = date("Y-m-d");
$file = $_FILES['gambar']['name'];
$size = $_FILES['gambar']['size'];
$tmp = $_FILES['gambar']['tmp_name'];
$extensi = pathinfo($file, PATHINFO_EXTENSION);

if ($size > $max) {
    $size = 0;
} else {
    $size = 1;
}


$file;
$size;
$tmp;
$extensi;

if (file_exists('./gambar/' . $file) || $size != 1 || $extensi != "jpg" && $extensi != "JPG") {
    ?>
    <script>
        alert("Cek Kembali Ekstensi File !");
        window.location = 'index.php?menu=datadetail&id=<?php echo $id ?>';
    </script>
    <?php
} else {
//    echo 'Belum Ada';
    $sql = "select " . $arah . " from representasi where id='$id'";
    $cek = mysql_query($sql);
    $dataCek = mysql_fetch_object($cek);
    $tgl = date('d-m-Y');
    $waktu = date('H-i-s');
    $file = $tgl . $waktu . $file;
    $sqlArah = "update  representasi   set " . $arah . "='$file' where id='$id'";
    if ($dataCek->$arah == 0) {


        $gambar_upload = move_uploaded_file($tmp, "./gambar/$file");
        $simpan = mysql_query($sqlArah);
        ?>
        <script>
            alert("Gambar Berhasil Di Upload ");
            window.location = 'index.php?menu=datadetail&id=<?php echo $id ?>';
        </script>
        <?php
    } else {

        $gambar_upload = move_uploaded_file($tmp, "./gambar/$file");
        $simpan = mysql_query($sqlArah);
        ?>
        <script>
            alert("Gambar Berhasil Di Upload ");
            window.location = 'index.php?menu=datadetail&id=<?php echo $id ?>';
        </script>
        <?php
        unlink('./gambar/' . $dataCek->$arah);
    }
}
?>
