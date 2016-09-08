<?php
include("../koneksi.php");
include("class_paging.php");
?>
 


<html>
    <head>
        <meta charset="utf-8">
        <script type="text/javascript" src="../jquery-1.4.3.min.js"></script>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Halaman Administrator AWS|AAWS|ARG BMKG Prov. Nusa Tenggara Barat</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="../style/bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="../assets/libs/font-awesome/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="ionicons.min.css" type="">
        <!-- Theme style -->
        <link rel="stylesheet" href="../style/dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="../style/dist/css/skins/_all-skins.min.css">
        <!-- iCheck -->
        <link rel="stylesheet" href="../style/plugins/iCheck/flat/blue.css">
        <!-- Morris chart -->
        <link rel="stylesheet" href="../style/plugins/morris/morris.css">
        <!-- jvectormap -->
        <link rel="stylesheet" href="../style/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
        <!-- Date Picker -->
        <link rel="stylesheet" href="../style/plugins/datepicker/datepicker3.css">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="../style/plugins/daterangepicker/daterangepicker-bs3.css">
        <!-- bootstrap wysihtml5 - text editor -->
        <link rel="stylesheet" href="../style/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

        <script>
            $(document).ready(function() {


                $("#cetak").click(function() {
                    $('#cetak').hide();
                    window.print();
                });

            });
        </script>


    </head>

    <body>



        <br>
        <div class="container">
            <div id="page_content">
                <div>
                    <ul class="menu">
                        <center>
                            <img src="../icon/logo_bmkg.png"><br>
                            <B>KOMPETENSI PETUGAS POS KERJASAMA</B><br>
                            <B>BADAN METEOROLOGI KLIMATOLOGI DAN GEOFISIKA</B><br>
                            <B>PROVINSI NUSA TENGGARA BARAT</B>
                        </center>
                    </ul>
                </div>


                <?php
                $p = new Paging;
                $batas = 10;
                $posisi = $p->cariPosisi($batas);
                $no = $posisi + 1;

                if (isset($_POST['search'])) {
                    
                } else {

                    $menu = 'lpKompetensi';
                    $sql = mysql_query("select * from identitaspos  inner join kontak on identitaspos.id=kontak.id order by identitaspos.id desc limit $posisi,$batas");

                    $sql1 = mysql_query("select * from identitaspos");
                }
                ?>
                <br>

                <table class="table table-striped" algin="center"  border="1px"   width="100%"  bordercolor="black">
                    <thead>   
                        <tr style="background-color: rgb(139, 192, 179);font-size: 8px;">
                            <td rowspan="2" style="width: 30px" ><b><br>NO</b></td>
                            <td rowspan="2" style="width: 30px" align="center" ><b><br>POS KERJASAMA</b></td>                                                                         

                            <td align="center" colspan="2"  style="width: 90px" align="center"><b>PENANGGUNGJAWAB</b></td>                                                     
                            <td align="center" colspan="2"  style="width: 90px" align="center"><b>PENJAGA</b></td>                                                     
                            <td rowspan="2" align="center" colspan="3"  style="width: 90px" align="center"><b><br>KETERANGAN</b></td>                                                     
                        </tr>
                        <tr style="background-color: rgb(139, 192, 179);font-size: 8px;">

                            <td align="center" style="width: 90px"><b>NAMA</b></td>
                            <td align="center" style="width: 90px"><b>NO HP</b></td>                              
                            <td align="center" style="width: 90px"><b>NAMA</b></td>
                            <td align="center" style="width: 90px"><b>NO HP</b></td>                          



                        </tr>

                        <?php
                        $i = 1;
                        while ($data = mysql_fetch_object($sql)) {
                            ?>
                        <tr style="font-size: 8px;">
                                <td><?php echo $no ?></td>
                                <td><?php echo $data->namapos ?></td>
                                <td><?php echo $data->penanggungJawab ?></td>
                                <td><?php echo $data->hpPj ?></td>
                                <td><?php echo $data->penjaga ?></td>
                                <td><?php echo $data->hpPenjaga ?></td>
                                <td><?php echo $data->catatan ?></td>


                            </tr>


                            <?php
                            $no++;
                            $i++;
                        }
                        ?>
                    </thead>
                </table>

                <br>
                <a class="btn btn-primary" id="cetak">Cetak</a>

                <?php
                $jmldata = mysql_num_rows($sql1);

                if (isset($_GET['halaman'])) {
                    $hal = $_GET['halaman'];
                } else {
                    $hal = 1;
                }
                echo "<br>";
                echo" Halaman <b>" . $hal . "</b> | Jumlah Data  <b>" . ($i - 1) . "</b> dari <b>" . $jmldata . "</b>  | Max Data Perhalaman<b> " . $batas . "</b>";
                $jmlhalaman = $p->jumlahHalaman($jmldata, $batas);
                $linkHalaman = $p->navHalaman($_GET['halaman'], $jmlhalaman, $menu, $hal);
                ?>


                <br>


            </div>


        </div>
    </body>


</body>
</html>