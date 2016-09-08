<?php
include("koneksi.php");
include("./laporan/class_paging.php");
?>




<br>
<div class="container">
    <div class="col-md-10" style="margin-left:8%">
        <div class="box" >
            <div id="main_content">
                <div id="top_banner"></div><br>
                <div id="page_content">
                    <div>
                        <ul class="menu">
                            <center>
                                <img src="./icon/logo_bmkg.png"><br>
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

                        $menu = $_GET['menu'];
                        $sql = mysql_query("select * from identitaspos  inner join kontak on identitaspos.id=kontak.id order by identitaspos.id desc limit $posisi,$batas");

                        $sql1 = mysql_query("select * from identitaspos");
                    }
                    ?>
                    <br>
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-striped" algin="center"  border="1px"   width="100%"  bordercolor="black">
                            <thead>   
                                <tr style="background-color: rgb(139, 192, 179)">
                                    <td rowspan="2" style="width: 30px" ><b><br>NO</b></td>
                                    <td rowspan="2" style="width: 30px" align="center" ><b><br>POS KERJASAMA</b></td>                                                                         

                                    <td align="center" colspan="2"  style="width: 90px" align="center"><b>PENANGGUNGJAWAB</b></td>                                                     
                                    <td align="center" colspan="2"  style="width: 90px" align="center"><b>PENJAGA</b></td>                                                     
                                    <td rowspan="2" align="center" colspan="3"  style="width: 90px" align="center"><b><br>KETERANGAN</b></td>                                                     
                                </tr>
                                <tr style="background-color: rgb(139, 192, 179)">

                                    <td align="center" style="width: 90px"><b>NAMA</b></td>
                                    <td align="center" style="width: 90px"><b>NO HP</b></td>                              
                                    <td align="center" style="width: 90px"><b>NAMA</b></td>
                                    <td align="center" style="width: 90px"><b>NO HP</b></td>                          



                                </tr>

                                <?php
                                $i = 1;
                                while ($data = mysql_fetch_object($sql)) {
                                    ?>
                                    <tr>
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

                        <?php
                        $jmldata = mysql_num_rows($sql1);

                        if (isset($_GET['halaman'])) {
                            $hal = $_GET['halaman'];
                        } else {
                            $hal = 1;
                        }
                        echo "<br>";
                        echo" Halaman <b>" . $hal . "</b> | Jumlah Data  <b>" . ($i - 1) . "</b> dari <b>" . $jmldata . "</b>  | Max Data Perhalaman<b> " . $batas . "</b><br>";
                        $jmlhalaman = $p->jumlahHalaman($jmldata, $batas);
                        $linkHalaman = $p->navHalaman($_GET['halaman'], $jmlhalaman, $menu, $hal);
                        echo "<br>";
                        ?>
                        <a id="pdf" onclick="window.open('./laporan/lpKompetensi_cetak.php?halaman=<?php echo $hal?>', 'myWindow', 'fullscreen=yes,scrollbars=yes')"  class="btn btn-primary"  ><i class="fa  fa-print"></i>Print </a>
                        <br>
                        <br>
                        <?php
                        echo "<div id=paging>Halaman: $linkHalaman</div><br>";
                        ?>
                    </div>



                    <br>


                </div>
            </div>



        </div>
    </div>



</div>
