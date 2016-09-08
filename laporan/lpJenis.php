<?php
include("koneksi.php");
include("class_paging.php");


$i = 1;
$totObservasi = 0;
while ($i <= 3) {
    $sqlObserbasi1 = "select jenis from identitaspos where jenis='observasi' and kondisiPos='$i'";
    $jumlahObservasi[$i] = mysql_num_rows(mysql_query($sqlObserbasi1));
    $totObservasi = $totObservasi + $jumlahObservasi[$i];
    $i++;
}
$i = 1;
$totArg = 0;
while ($i <= 3) {
    $sqlArg = "select jenis from identitaspos where jenis='arg' and kondisiPos='$i'";
    $jumlahArg[$i] = mysql_num_rows(mysql_query($sqlArg));
    $totArg = $totArg + $jumlahArg[$i];
    $i++;
}
$i = 1;
$totAws = 0;
while ($i <= 3) {
    $sqlAws = "select jenis from identitaspos where jenis='aws' and kondisiPos='$i'";
    $jumlahAws[$i] = mysql_num_rows(mysql_query($sqlAws));
    $totAws = $totAws + $jumlahAws[$i];
    $i++;
}
$i = 1;
$totAaws = 0;
while ($i <= 3) {
    $sqlAaws = "select jenis from identitaspos where jenis='aaws' and kondisiPos='$i'";
    $jumlahAaws[$i] = mysql_num_rows(mysql_query($sqlAaws));
    $totAaws = $totAaws + $jumlahAaws[$i];
    $i++;
}
$i = 1;
$totSmpk = 0;
while ($i <= 3) {
    $sqlSmpk = "select jenis from identitaspos where jenis='smpk' and kondisiPos='$i'";
    $jumlahSmpk[$i] = mysql_num_rows(mysql_query($sqlSmpk));
    $totSmpk = $totSmpk + $jumlahSmpk[$i];
    $i++;
}

$i = 1;
$totAwsp = 0;
while ($i <= 3) {
    $sqlAwsp = "select jenis from identitaspos where jenis='awsp' and kondisiPos='$i'";
    $jumlahAwsp[$i] = mysql_num_rows(mysql_query($sqlAwsp));
    $totAwsp = $totAwsp + $jumlahAwsp[$i];
    $i++;
}
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
                                <B>JENIS DAN JUMLAH POS KERJASAMA</B><br>
                                <B>BADAN METEOROLOGI KLIMATOLOGI DAN GEOFISIKA</B><br>
                                <B>PROVINSI NUSA TENGGARA BARAT</B>
                            </center>
                        </ul>
                    </div>



                    <br>
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-striped" algin="center"  border="1px"   width="100%"  bordercolor="black">
                            <thead>   
                                <tr style="background-color: rgb(139, 192, 179)">
                                    <td rowspan="2" style="width: 30px" ><b><br>NO</b></td>
                                    <td rowspan="2" style="width: 30px" align="center" ><b><br>JENIS</b></td>                                                                         
                                    <td rowspan="2" style="width: 90px" align="center"><b><br>JUMLAH</b></td>                                                     
                                    <td align="center" colspan="3"  style="width: 90px" align="center"><b>KONDISI</b></td>                                                     
                                </tr>
                                <tr style="background-color: rgb(139, 192, 179)">

                                    <td align="center" style="width: 90px; background-color: rgb(136, 179, 116)"><b>BAIK</b></td>
                                    <td align="center" style="width: 90px; background-color: #F6F757"><b>RUSAK RINGAN</b></td>                              
                                    <td align="center" style="width: 90px; background-color: rgb(248, 57, 57)"><b>RUSAK PARAH</b></td>                              

                                </tr>
                            </thead>

                            <tbody>
                                <tr>

                                    <td align="center"><b>-</b></td>
                                    <td align="center"><b>-</b></td>
                                    <td align="center"><b>-</b></td>
                                    <td align="center"><b>-</b></td>
                                    <td align="center"><b>-</b></td>
                                    <td align="center"><b>-</b></td>

                                </tr>
                                <tr>
                                    <td>1</td>
                                    <td>POS HUJAN OBSERVASI ( PH OBS )</td>
                                    <td align="center"><?php echo $totObservasi ?></td>
                                    <td align="center"><?php echo $jumlahObservasi[1] ?></td>
                                    <td align="center"><?php echo $jumlahObservasi[2] ?></td>
                                    <td align="center"><?php echo $jumlahObservasi[3] ?></td>

                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>AUTOMATIC RAIN GAUGE ( ARG )</td>
                                    <td align="center"><?php echo $totArg ?></td>
                                    <td align="center"><?php echo $jumlahArg[1] ?></td>
                                    <td align="center"><?php echo $jumlahArg[2] ?></td>
                                    <td align="center"><?php echo $jumlahArg[3] ?></td>

                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>AUTOMATIC WEATHER STATION ( AWS )</td>
                                    <td align="center"><?php echo $totAws ?></td>
                                    <td align="center"><?php echo $jumlahAws[1] ?></td>
                                    <td align="center"><?php echo $jumlahAws[2] ?></td>
                                    <td align="center"><?php echo $jumlahAws[3] ?></td>

                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>AUTOMATIC AGROCLIMATE WEATHER STATION ( AAWS )</td>
                                    <td align="center"><?php echo $totAaws ?></td>
                                    <td align="center"><?php echo $jumlahAaws[1] ?></td>
                                    <td align="center"><?php echo $jumlahAaws[2] ?></td>
                                    <td align="center"><?php echo $jumlahAaws[3] ?></td>

                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>STASIUN METEOROLOGI PERTANIAN KHUSUS ( SMPK )</td>
                                    <td align="center"><?php echo $totSmpk ?></td>
                                    <td align="center"><?php echo $jumlahSmpk[1] ?></td>
                                    <td align="center"><?php echo $jumlahSmpk[2] ?></td>
                                    <td align="center"><?php echo $jumlahSmpk[3] ?></td>

                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>( AWS PLUS )</td>
                                    <td align="center"><?php echo $totAwsp ?></td>
                                    <td align="center"><?php echo $jumlahAwsp[1] ?></td>
                                    <td align="center"><?php echo $jumlahAwsp[2] ?></td>
                                    <td align="center"><?php echo $jumlahAwsp[3] ?></td>

                                </tr>
                                <tr>

                                    <td   align="center"><b>-</b></td>
                                    <td align="center"><b>-</b></td>
                                    <td align="center"><b>-</b></td>
                                    <td align="center"><b>-</b></td>
                                    <td align="center"><b>-</b></td>
                                    <td align="center"><b>-</b></td>

                                </tr>
                                <tr>

                                    <td colspan="2" align="center"><b>TOTAL</b></td>
                                    <td align="center"><b><?php echo $totAaws + $totArg + $totSmpk + $totObservasi + $totAwsp + $totAws ?></b></td>
                                    <td align="center"><b><?php echo $jumlahAaws[1] + $jumlahArg[1] + $jumlahAws[1] + $jumlahAwsp[1] + $jumlahObservasi[1] + $jumlahSmpk[1] ?></b></td>
                                    <td align="center"><b><?php echo $jumlahAaws[2] + $jumlahArg[2] + $jumlahAws[2] + $jumlahAwsp[2] + $jumlahObservasi[2] + $jumlahSmpk[2] ?></b></td>
                                    <td align="center"><b><?php echo $jumlahAaws[3] + $jumlahArg[3] + $jumlahAws[3] + $jumlahAwsp[3] + $jumlahObservasi[3] + $jumlahSmpk[3] ?></b></td>

                                </tr>
                            </tbody>


                        </table>
                    </div>


                    <br>
                    <br>

                    <a id="pdf" onclick="window.open('./laporan/lpJenis_cetak.php', 'myWindow', 'fullscreen=yes,scrollbars=yes')"  class="btn btn-primary"  ><i class="fa  fa-print"></i>Print </a>

                    <br>
                    <br>

                </div>
            </div>



        </div>
    </div>



</div>


