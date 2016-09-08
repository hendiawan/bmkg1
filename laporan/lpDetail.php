<?php
include("koneksi.php");
include("./laporan/class_paging.php");
?>




<br>
<div class="container">
    <div class="col-md-11">
        <div class="box" >
            <div id="main_content">
                <div id="top_banner"></div><br>


                <div id="page_content">
                    <div>
                        <ul class="menu">
                            <center>
                                <img src="./icon/logo_bmkg.png"><br>
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

                        $menu = 'lpDetailPos';
                        $sql = mysql_query("select * from identitaspos inner join alamat on alamat.id=identitaspos.id inner join alatutama on alatutama.id=identitaspos.id order by identitaspos.id desc limit $posisi,$batas");
                        $sql1 = mysql_query("select * from identitaspos");
                    }
                    ?>
                    <br>
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-striped" algin="center"  border="1px"   width="100%"  bordercolor="black">
                            <thead>   
                                <tr style="background-color: rgb(139, 192, 179)">
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
                                    <tr>
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
                        echo "<br/> <br/>";
                        ?>
                        <a id="pdf" onclick="window.open('./laporan/lpDetail_cetak.php?halaman=<?php echo $hal?>', 'myWindow', 'fullscreen=yes,scrollbars=yes')"  class="btn btn-primary"  ><i class="fa  fa-print"></i>Print </a>

                        <?php
                         echo "<br/><br/>";
                        echo "<div id=paging>Halaman: $linkHalaman</div><br>";
                        ?>

                    </div>


                    <br>


                </div>
            </div>



        </div>
    </div>



</div>


