
<?php
$id = $_GET['id'];
$sql = mysql_query("select * from identitaspos left join powersistem on  identitaspos.id=powersistem.id left join kontak  on identitaspos.id=kontak.id left join alatutama on alatutama.id=identitaspos.id left join alamat on alamat.id=identitaspos.id where identitaspos.id='$id'");
$data = mysql_fetch_object($sql);

//print_r($data);
?>

<script type="text/javascript" src="jquery-1.4.3.min.js"></script>
<script type="text/javascript">
    //inisialisasi variabel tampung

    var peta;
    var pertama = 0;
    var jenis = "airport";
    var idaws = new Array();
    var idpos = new Array();
    var jenis_komunikasi = new Array();
    var nomorgsm = new Array();
    var merk = new Array();
    var namapos = new Array();
    var lat = new Array();
    var lng = new Array();
    var timur = new Array();
    var barat = new Array();
    var utara = new Array();
    var selatan = new Array();
    var i;
    var url;
    var gambar_tanda;
    //load peta google maps

    function angka(a) {
        if (!/^[0-9.-]+$/.test(a.value)) {
            a.value = a.value.substring(0, a.value.lenght - 1000);
        }
    }

    $(document).ready(function() {


        $('#ubahAlat').click(function() {


            $('#tglPengadaanU').datepicker({
                autoclose: true,
                format: 'dd/mm/yyyy'
            });
            $('#jenisAlatU').removeAttr('readonly');
            $('#merkAlatU').removeAttr('readonly');
            $('#modelAlatU').removeAttr('readonly');
            $('#snAlatU').removeAttr('readonly');
            $('#kondisiAlatU').removeAttr('disabled');
            $('#tglPengadaanU').removeAttr('readonly');
            $('#simpanAlatT').removeAttr('hidden');
            $('#ubahAlatT').hide();

        });
        $("#simpanAlatT").click(function() {
            var id = $('#idAlatU').val();
            var tgl = $('#tglPengadaanU').val();
            var alat = $('#jenisAlatU').val();
            var merk = $('#merkAlatU').val();
            var model = $('#modelAlatU').val();
            var sn = $('#snAlatU').val();
            var kondisi = $('#kondisiAlatU').val();
            var alatS;
            var merkS;
            var modelS;
            var snS;
            var kondisiS;
            var tglS;

            if (tgl == '') {
                tglS = 0;
            }
            if (alat == '') {
                alatS = 0;
            }
            if (merk == '') {
                merkS = 0;
            }

            if (model == '') {
                modelS = 0;
            }

            if (sn == '') {
                snS = 0;
            }
            if (kondisi == '') {
                kondisiS = 0;
            }

            if (
                    alatS == 0 ||
                    merkS == 0 ||
                    modelS == 0 ||
                    snS == 0 ||
                    kondisiS == 0
                    ) {
                alert('Terjadi Kesalahan Pengisian Form, Cek yang belum terisi!');
            } else {

                $.ajax({
                    url: "ubahAlat.php",
                    data: " jenis=" + alat + "&model=" + model + "&merk=" + merk + "&sn=" + sn + "&kondisi=" + kondisi + "&id=" + id + "&tgl=" + tgl,
                    cache: false,
                    success: function(msg) {
                        alert(msg);
                        location.reload(true);

                    }
                });
            }
        });

        simpanIdentitas();
    });






</script>
<script src="simpanIdentitas.js"></script>


<?php
$id = $_GET['id'];
$query = mysql_query("select * from alat where idalat='$id' ");
$dataAlat = mysql_fetch_object($query);
?>

<?php include 'modalrepresentasi.php'; ?>

<div class="col-md-6" >
    <div class="box" >

        <div class="box-body">             
            <div class="box-body">
                <div class="row">
                    <div class="col-xs-7">
                        <span id="namapos_msg"></span>
                        <label >Detail Alat </label><br>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-xs-12">
                                    <span id="namapos_msg"></span>
                                    <label >Jenis</label><br>
                                    <input hidden="" value="<?php echo $id ?>"   >
                                    <input hidden="" value="<?php echo $dataAlat->idalat ?>"id="idAlatU" >
                                    <input readonly=""  value="<?php echo $dataAlat->jenis ?>" placeholder="Jenis" required="" style="width:170%"  name="header" type="text" class="form-control" id="jenisAlatU"  >
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <span id="namapos_msg"></span>
                                    <label >Merk</label><br>
                                    <input readonly="" value="<?php echo $dataAlat->merk ?>"  placeholder="Merk" required="" style="width:170%"  name="header" type="text" class="form-control" id="merkAlatU"    >
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <span id="namapos_msg"></span>
                                    <label >Tanggal Pengadaan</label><br>
                                    <input placeholder="Tanggal" required="" value="<?php echo $dataAlat->tgl ?>" readonly="" style="width:170%"  name="header" type="text" class="form-control" id="tglPengadaanU"  >
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <span id="namapos_msg"></span>
                                    <label >Model</label><br>
                                    <input readonly="" value="<?php echo $dataAlat->model ?>"  placeholder="Model" required="" style="width:170%"  name="header" type="text" class="form-control" id="modelAlatU"  >
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <span id="namapos_msg"></span>
                                    <label >SN</label><br>
                                    <input readonly="" value="<?php echo $dataAlat->sn ?>"  placeholder="SN" required="" style="width:170%"  name="header" type="text" class="form-control" id="snAlatU" >
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <span id="namapos_msg"></span>


                                    <label>Kondisi Alat</label><br>
                                    <span id="jenis_msg"></span>
                                    <div class="input-group">
                                        <select disabled="" id="kondisiAlatU"  name="kompetensi" class="form-control" >
                                            <?php
                                            if ($dataAlat->kondisi == 1) {
                                                ?>
                                                <option selected="" value="1">Baik</option>
                                                <option value="2">Rusak Ringan</option>
                                                <option value="3">Rusak Berat</option>    
                                                <?php
                                            } else if ($dataAlat->kondisi == 2) {
                                                ?>
                                                <option value="1">Baik</option>
                                                <option  selected="" value="2">Rusak Ringan</option>
                                                <option value="3">Rusak Berat</option>    
                                                <?php
                                            } else if ($dataAlat->kondisi == 3) {
                                                ?>
                                                <option value="1">Baik</option>
                                                <option value="2">Rusak Ringan</option>
                                                <option  selected=""  value="3">Rusak Berat</option>    
                                                <?php
                                            } else {
                                                ?>
                                                <option value="1">Baik</option>
                                                <option value="2">Rusak Ringan</option>
                                                <option value="3">Rusak Berat</option>    
                                                <?php
                                            }
                                            ?>
                                        </select>
                                        <br>
                                    </div>
                                </div>
                            </div><br>
                            <div class="row">
                                <div class="col-xs-12">
                                    <div hidden="" id="changeAlat">
                                        <div id="ubahAlatT"> <button id="ubahAlat"  class="btn btn-primary" data-dismiss="modal">Ubah</button> </div> 
                                        <div id="simpanAlatT" hidden=""> <button id="simpanAlat" hidden="" class="btn btn-primary" data-dismiss="modal">Simpan</button> </div> 

                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>


            </div>
        </div> 

    </div>
</div>

<div class="col-md-6" >
    <div class="box" >
        <form class="form-horizontal"   method="post" name="pengajuan" enctype="multipart/form-data" >
            <div class="box-body">
                <div class="box-body">
                    <div class="row">
                        <label >Log Laporan Kerusakan</label><br><br>
                        <span id="pln_msg"></span>
                        <div class="row">
                            <div class="col-xs-12">
                                <div class="box-body table-responsive no-padding">
                                    <table style="overflow:scroll;width: 20px; " class="table table-responsive">
                                        <tr>
                                            <th>No</th>
                                            <th>Tgl Lapor</th>
                                            <th>Kerusakan</th>                              

                                            <th>Pelapor</th>
                                            <th>Detail</th>
                                            <th><div id="remove1" hidden="">Remove</div></th>
                                        </tr>

                                        <?php
                                        $sql = "select * from laporan where idalat='$id'";
                                        $query = mysql_query($sql);
                                        $i = 1;
                                        while ($dataLaporan = mysql_fetch_object($query)) {

                                            $level = $_SESSION['level'];
                                            $level;
                                            if ($level == '2') {
                                                ?>
                                                <script>
            $(document).ready(function() {
                $("#delLap<?php echo json_encode($i) ?>").removeAttr('hidden');
                $("#changeLap<?php echo json_encode($i) ?>").removeAttr('hidden');
            });
                                                </script>    
                                                <?php
                                            }
                                            echo "<tr>";
                                            echo "<td>" . $i . "</td>";
                                            echo " <td>" . $dataLaporan->tglLapor . "</td>";
                                            echo " <td>" . $dataLaporan->kerusakan . "</td>";
                                            echo " <td>" . $dataLaporan->pelapor . "</td>";

                                            echo "<td align='center'><a type='button' id='laporanAlat$i'><i class='glyphicon glyphicon-info-sign'></i></a></td>";
                                            echo "<td align='center'>"
                                            ?>                    <div id="delLap<?php echo $i ?>" hidden="">    <a   href="index.php?menu=rmlp&id=<?php echo $dataLaporan->idLaporan ?>&pg=<?php echo $id ?>  " title="Hapus" onclick="return confirm('Apakah Anda Yakin Menghapus Laporan Alat   ?')" class="btn btn-danger"  data-toggle="modal" ><i class="fa fa-ban"></i></a></div>        <?php
                                            "</td>";
                                            echo "</tr> ";
                                            ?>
                                            <script>
                                                $(document).ready(function() {
                                                    $('#laporanAlat<?php echo json_encode($i) ?>').click(function() {
                                                        $('#modalLaporanAlat<?php echo json_encode($i) ?>').fadeIn();
                                                    });
                                                    $('#closeLaporan<?php echo json_encode($i) ?>').click(function() {
                                                        $('#modalLaporanAlat<?php echo json_encode($i) ?>').fadeOut();
                                                    });
                                                    $('#ubahLaporan<?php echo json_encode($i) ?>').click(function() {
                                                        $('#tglLapor<?php echo json_encode($i) ?>').datepicker({
                                                            autoclose: true,
                                                            format: 'dd/mm/yyyy'
                                                        });
                                                        $('#simpanLaporanT<?php echo json_encode($i) ?>').removeAttr('hidden');
                                                        $('#ubahLaporanT<?php echo json_encode($i) ?>').hide();
                                                        $('#tglLapor<?php echo json_encode($i) ?>').removeAttr('readonly');
                                                        $('#kerusakan<?php echo json_encode($i) ?>').removeAttr('readonly');
                                                        $('#tindakanAwal<?php echo json_encode($i) ?>').removeAttr('readonly');
                                                        $('#tindakanLanjut<?php echo json_encode($i) ?>').removeAttr('readonly');
                                                        $('#pelapor<?php echo json_encode($i) ?>').removeAttr('readonly');
                                                    });

                                                    $("#simpanLaporan<?php echo json_encode($i) ?>").click(function() {
                                                        var id = $('#idAlat<?php echo json_encode($i) ?>').val();
                                                        var tgl = $('#tglLapor<?php echo json_encode($i) ?>').val();
                                                        var kerusakan = $('#kerusakan<?php echo json_encode($i) ?>').val();
                                                        var tindakanAwal = $('#tindakanAwal<?php echo json_encode($i) ?>').val();
                                                        var tindakanLanjut = $('#tindakanLanjut<?php echo json_encode($i) ?>').val();
                                                        var pelapor = $('#pelapor<?php echo json_encode($i) ?>').val();
                                                        var tglS;
                                                        var kerusakanS;
                                                        var tindakanAwalS;
                                                        var tindakanLanjutS;
                                                        var pelaporS;


                                                        if (tgl == '') {
                                                            tglS = 0;
                                                        }
                                                        if (kerusakan == '') {
                                                            kerusakanS = 0;
                                                        }

                                                        if (tindakanAwal == '') {
                                                            tindakanAwalS = 0;
                                                        }

                                                        if (tindakanLanjut == '') {
                                                            tindakanLanjutS = 0;
                                                        }
                                                        if (pelapor == '') {
                                                            pelaporS = 0;
                                                        }

                                                        if (
                                                                tglS == 0 ||
                                                                kerusakanS == 0 ||
                                                                tindakanAwalS == 0 ||
                                                                tindakanLanjutS == 0 ||
                                                                pelaporS == 0
                                                                ) {
                                                            alert('Terjadi Kesalahan Pengisian Form, Cek yang belum terisi!');
                                                        } else {

                                                            $.ajax({
                                                                url: "ubahLaporan.php",
                                                                data: "tgl=" + tgl + "&kerusakan=" + kerusakan + "&tindakanAwal=" + tindakanAwal + "&tindakanLanjut=" + tindakanLanjut + "&pelapor=" + pelapor + "&id=" + id,
                                                                cache: false,
                                                                success: function(msg) {
                                                                    alert(msg);
                                                                    location.reload(true);

                                                                }
                                                            });
                                                        }
                                                    });

                                                });
                                            </script>

                                            <div id="modalLaporanAlat<?php echo $i ?>" class="modal modal-primary">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span></button>
                                                            <h4 class="modal-title">Laporan Kondisi Alat </h4>
                                                        </div>

                                                        <div class="modal-body">

                                                            <div class="row">
                                                                <div class="col-xs-7">
                                                                    <span id="namapos_msg"></span>
                                                                    <label >Tanggal Lapor</label><br>
                                                                    <input hidden=""  value="<?php echo $dataLaporan->idLaporan ?>"id="idAlat<?php echo $i ?>"   >
                                                                    <input value="<?php echo $dataLaporan->tglLapor; ?>" readonly="" placeholder="Tanggal" required="" style="width:170%"  name="header" type="text" class="form-control" id="tglLapor<?php echo $i ?>"  >
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xs-7">
                                                                    <span id="namapos_msg"></span>
                                                                    <label >Kerusakan</label><br>
                                                                    <input value="<?php echo $dataLaporan->kerusakan; ?>" readonly="" placeholder="Kerusakan" required="" style="width:170%"  name="header" type="text" class="form-control" id="kerusakan<?php echo $i ?>"    >
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xs-7">
                                                                    <span id="namapos_msg"></span>
                                                                    <label >Tindakan Awal</label><br>
                                                                    <input value="<?php echo $dataLaporan->tindakanAwal; ?>" readonly="" placeholder="Tindakan Awal" required="" style="width:170%"  name="header" type="text" class="form-control" id="tindakanAwal<?php echo $i ?>"  >
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xs-7">
                                                                    <span id="namapos_msg"></span>
                                                                    <label >Tindakan Lanjut</label><br>
                                                                    <input value="<?php echo $dataLaporan->tindakanLanjut; ?>" readonly="" placeholder="Tindakan Lanjut" required="" style="width:170%"  name="header" type="text" class="form-control" id="tindakanLanjut<?php echo $i ?>" >
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-xs-7">
                                                                    <span id="namapos_msg"></span>
                                                                    <label >Pelapor</label><br>
                                                                    <input value="<?php echo $dataLaporan->pelapor; ?>" readonly="" placeholder="Pelapor" required="" style="width:170%"  name="header" type="text" class="form-control" id="pelapor<?php echo $i ?>"  >
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="modal-footer">

                                                            <div hidden="" id="changeLap<?php echo $i ?>"><div id="ubahLaporanT<?php echo $i ?>"><a id="ubahLaporan<?php echo $i ?>"  class="btn btn-outline pull-left" data-dismiss="modal">Ubah</a>
                                                                </div> 
                                                            </div> 
                                                            <div id="simpanLaporanT<?php echo $i ?>" hidden=""> <a id="simpanLaporan<?php echo $i ?>" hidden="" class="btn btn-outline pull-left" data-dismiss="modal">Simpan</a> </div> 

                                                            <a id="closeLaporan<?php echo $i ?>"  class="btn btn-outline pull-left" data-dismiss="modal">Close</a>

                                                        </div>

                                                    </div>
                                                    <!-- /.modal-content -->
                                                </div>
                                                <!-- /.modal-dialog -->
                                            </div>    
                                            <?php
                                            $i++;
                                        }
                                        ?>  
                                    </table>
                                </div>


                            </div>
                        </div>


                    </div>
                    </form>

                </div>
            </div>



