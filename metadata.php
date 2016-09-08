<?php
include("koneksi.php");
include("class_paging.php");
?>




<br>
<div class="container">
    <div class="col-md-10" style="margin-left:8%">
        <div class="box" >
            <div id="main_content">
                <div id="top_banner"></div><br>

                <form style="margin-left: 9px"  action="#" method="POST" class="sidebar">

                    <table class="table-striped">
                        <tr>
                            <td>
                                <div class="input-group input-group-sm">
                                    <select   id="jenis" name="jenis" class="form-control" >

                                        <option value="1">Id Pos</option>
                                        <option value="2">Nama Pos</option>
                                        <option value="3">Kondisi Pos</option>                                           
                                    </select>
                                </div> 
                            </td>
                            <td>
                                <div class="input-group input-group-sm">
                                    <input type="text" name="q" class="form-control" placeholder="Search...">
                                    <span class="input-group-btn">
                                        <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                                        </button>
                                    </span>
                                </div>
                            </td>
                        </tr>

                    </table>
                </form>
                <div id="page_content">
                    <div>
                        <ul class="menu">
                            <center>
                                <B>DATA DISTRIBUTION POINT </B>
                            </center>
                        </ul>
                    </div>


                    <?php
                    $p = new Paging;
                    $batas = 10;
                    $posisi = $p->cariPosisi($batas);
                    $no = $posisi + 1;

                    if (isset($_POST['search'])) {
                        $jenis = $_POST['jenis'];
                        $id = $_POST['q'];
                        $cari = $_POST['q'];

                        if ($jenis == '1') {
                            $sql = mysql_query("select * from identitaspos where idaws like '%$id%' order by id desc limit $posisi,$batas ");
                            $sql1 = mysql_query("select * from identitaspos where idaws like '%$id%' order by id desc  ");
                        } else if ($jenis == '2') {
                            $sql = mysql_query("select * from identitaspos where namapos like '%$id%' order by id desc limit $posisi,$batas");
                            $sql1 = mysql_query("select * from identitaspos where namapos like '%$id%' order by id desc  ");
                        } else if ($jenis == '3') {
                            if (strtolower($id) == 'baik') {
                                $id = 1;
                            } else if (strtolower($id) == 'rusak ringan') {
                                $id = 2;
                            }if (strtolower($id) == 'rusak berat') {
                                $id = 3;
                            }
                            $sql = mysql_query("select * from identitaspos where kondisiPos like '%$id%'  order by id desc limit $posisi,$batas");
                            $sql1 = mysql_query("select * from identitaspos where kondisiPos like '%$id%'  order by id desc  ");
                        } else {

                            $sql = mysql_query("select * from identitaspos where kondisiPos like '%$id%' order by id desc limit $posisi,$batas");
                            $sql1 = mysql_query("select * from identitaspos where kondisiPos like '%$id%' order by id desc  ");
                        }
                    } else {

                        if (isset($_GET['q'])) {
                            $cari = $_GET['q'];
                        } else {
                            $cari = 'a';
                        }

                        if (isset($_GET['j'])) {
                            $jenis = $_GET['j'];
                            $id = $cari;
                            if ($jenis == '1') {
                                $sql = mysql_query("select * from identitaspos where idaws like '%$id%' order by id desc limit $posisi,$batas ");
                                $sql1 = mysql_query("select * from identitaspos where idaws like '%$id%' order by id desc  ");
                            } else if ($jenis == '2') {
                                $sql = mysql_query("select * from identitaspos where namapos like '%$id%' order by id desc limit $posisi,$batas");
                                $sql1 = mysql_query("select * from identitaspos where namapos like '%$id%' order by id desc  ");
                            } else if ($jenis == '3') {
                                if (strtolower($id) == 'baik') {
                                    $id = 1;
                                } else if (strtolower($id) == 'rusakringan') {
                                    $id = 2;
                                }if (strtolower($id) == 'rusakberat') {
                                    $id = 3;
                                }
                                $sql = mysql_query("select * from identitaspos where kondisiPos like '%$id%'  order by id desc limit $posisi,$batas");
                                $sql1 = mysql_query("select * from identitaspos where kondisiPos like '%$id%'  order by id desc  ");
                            } else {

                                $sql = mysql_query("select * from identitaspos   order by id desc limit $posisi,$batas");
                                $sql1 = mysql_query("select * from identitaspos  order by id desc  ");
                            }
                        } else {
                            $jenis = 'umum';
                            $id = '0';
                            $sql = mysql_query("select * from identitaspos order by id desc limit $posisi,$batas");
                            $sql1 = mysql_query("select * from identitaspos");
                        }
                    }
                    ?>

                    <br>
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-striped" algin="center"    width="100%"  >


                            <thead>

                                <tr>
                                    <th>
                                        NO
                                    </th>
                                    <th>
                                        Nomor ID 
                                    </th>

                                    <th>
                                        JENIS KOMUNIKASI  
                                    </th>
                                    <th>
                                        NOMOR GSM 
                                    </th>
                                    <th>
                                        MERK
                                    </th>
                                    <th>
                                        NAMAPOS
                                    </th>
                                    <th>
                                        KONDISI POS
                                    </th>
                                    <th>
                                        DETAIL
                                    </th>
                                </tr>
                                <?php
                                $i = 1;

                                while ($data = mysql_fetch_object($sql)) {
                                    ?>
                                    <tr>
                                        <td><?php echo $no ?></td>
                                        <td><?php echo $data->idaws ?></td>
                                        <td><?php echo $data->jenis_komunikasi ?></td>
                                        <td><?php echo $data->nomorgsm ?></td>
                                        <td><?php echo $data->merk ?></td>
                                        <td><?php echo $data->namapos ?></td>
                                        <td><?php
                                            if ($data->kondisiPos == '1') {
                                                ?>
                                                <i class="fa fa-circle-o text-green"></i> <span>Baik</span>
                                                <?php
                                            } else if ($data->kondisiPos == '2') {
                                                ?>
                                                <i class="fa fa-circle-o text-yellow"></i> <span>Rusak Ringan</span>
                                                <?php
                                            } else if ($data->kondisiPos == '3') {
                                                ?>
                                                <i class="fa fa-circle-o text-red"></i> <span>Rusak Berat</span>
                                                <?php
                                            }
                                            ?></td>
                                        <td align="center"><a href="index.php?menu=datadetail&id=<?php echo $data->id ?>" type="button"><i class="glyphicon glyphicon-info-sign"></i></a></td>
                                    </tr>
                                    <?php
                                    $no++;
                                    $i++;
                                }
                                ?>
                            </thead>


                        </table>
                    </div>

                    <?php
                    $jmldata = mysql_num_rows($sql1);

                    if (isset($_GET['halaman'])) {
                        $hal = $_GET['halaman'];
                    } else {
                        $hal = 1;
                    }

                    echo "<br /> <br />";
                    echo" Halaman <b>" . $hal . "</b> | Jumlah Data  <b>" . ($i - 1) . "</b> dari <b>" . $jmldata . "</b>  | Max Data Perhalaman<b> " . $batas . "</b>";
                    $jmlhalaman = $p->jumlahHalaman($jmldata, $batas);
                    $linkHalaman = $p->navHalaman($_GET['halaman'], $jmlhalaman, $jenis, $cari, $hal);
                    echo "<br /> <br />";
                    echo "<div id=paging>Halaman: $linkHalaman</div><br>";
                    ?>



                    <br>


                </div>
            </div>



        </div>
    </div>

    <div id="tambahDataPos" hidden="" class="col-md-10" style="margin-left:8%">

        <a  href="index.php?menu=datai" type="button" class="btn btn-primary btn-flat" data-toggle="modal" title="Tambah Data"  > <i class="fa fa-plus"></i></a>

    </div>

</div>


