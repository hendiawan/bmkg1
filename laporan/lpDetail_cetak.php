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


        <div class="col-xs-12">

            <br>
            <div id="page_content">
                <div>
                    <ul class="menu">
                        <center>
                            <img src="../icon/logo_bmkg.png"><br>
                            <B>METADATA POS KERJASAMA</B><br>
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


                    $sql = mysql_query("select * from identitaspos inner join alamat on alamat.id=identitaspos.id inner join alatutama on alatutama.id=identitaspos.id order by identitaspos.id desc limit $posisi,$batas");
                    $sql1 = mysql_query("select * from identitaspos");
                }
                ?>
                <br>

                <table class="table table-striped" algin="center"  border="1px"   width="100%"  bordercolor="black">
                    <thead>   
                        <tr style="background-color: rgb(139, 192, 179);font-size: 8px;">
                            <td  style="width: 30px" ><b> NO</b></td>
                            <td   style="width: 30px" align="center" ><b> NAMA POS KERJASAMA</b></td>                                                                        
                            <td align="center"    style="width: 90px" align="center"><b>LINTANG</b></td>                                                     
                            <td align="center"    style="width: 90px" align="center"><b>BUJUR</b></td>                                                     
                            <td align="center"    style="width: 90px" align="center"><b>KABUPATEN</b></td>                                                     
                            <td align="center"   style="width: 90px" align="center"><b>KECAMATAN</b></td>                                                     
                            <td align="center"   style="width: 90px" align="center"><b>DESA</b></td>                                                     
                            <td align="center"    style="width: 90px" align="center"><b>ALAMAT</b></td>                                                     
                            <td align="center"    style="width: 90px" align="center"><b>MERK</b></td>                                                     
                            <td align="center"    style="width: 90px" align="center"><b>TAHUN PASANG</b></td>                                                     
                        </tr>

                        <?php
                        $i = 1;
                        while ($data = mysql_fetch_object($sql)) {
                            ?>
                        <tr style="font-size: 8px;">
                                <td><?php echo $no ?></td>
                                <td><?php echo $data->namapos ?></td>
                                <td><?php echo $data->lat ?></td>
                                <td><?php echo $data->lng ?></td>
                                <td><?php echo $data->kabupaten ?></td>
                                <td><?php echo $data->kecamatan ?></td>
                                <td><?php echo $data->desa ?></td>
                                <td><?php echo $data->alamat ?></td>
                                <td><?php echo $data->merk ?></td>
                                <td><?php echo $data->tahunPengadaan ?></td>
                            </tr>
                            <?php
                            $no++;
                            $i++;
                        }
                        ?>

                    </thead>
                </table><br>

                <a class="btn btn-primary" id="cetak">Cetak</a>
                <br>

                <?php
                $jmldata = mysql_num_rows($sql1);

                if (isset($_GET['halaman'])) {
                    $hal = $_GET['halaman'];
                } else {
                    $hal = 1;
                }
                echo "<br>";
                echo" Halaman <b>" . $hal . "</b> | Jumlah Data  <b>" . ($i - 1) . "</b> dari <b>" . $jmldata . "</b>  | Max Data Perhalaman<b> " . $batas . "</b>";
                ?>



                <br>


            </div>
        </div>

    </body>


</body>
</html>


