
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
        $('#tglPengadaan').datepicker({
            autoclose: true,
            format: 'dd/mm/yyyy'

        });
        $("#simpanAlat").click(function() {

            var id = $('#idIdentitas').val();
            var tgl = $('#tglPengadaan').val();
            var alat = $('#jenisAlat').val();
            var merk = $('#merkAlat').val();
            var model = $('#modelAlat').val();
            var sn = $('#snAlat').val();
            var kondisi = $('#kondisiAlat').val();
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
                    tglS == 0 ||
                    alatS == 0 ||
                    merkS == 0 ||
                    modelS == 0 ||
                    snS == 0 ||
                    kondisiS == 0
                    ) {
                alert('Terjadi Kesalahan Pengisian Form, Cek yang belum terisi!');
            } else {

                $.ajax({
                    url: "simpanAlat.php",
                    data: " jenis=" + alat + "&model=" + model + "&merk=" + merk + "&sn=" + sn + "&kondisi=" + kondisi + "&id=" + id + "&tgl=" + tgl,
                    cache: false,
                    success: function(msg) {
                        alert(msg);
                        location.reload(true);

                    }
                });

            }


        });
        $("#tambahAlat").click(function() {
            $("#modalTambahAlat").fadeIn();
        });
        $("#tambahAlatClose").click(function() {
            $("#modalTambahAlat").fadeOut();
        });
        $("#tambahAlat").click(function() {
            $("#modalTambahAlat").fadeIn();
        });

//        untuk kendali representasi
        $("#uploadTimur").click(function() {
            var arahRepresentasi = document.getElementById('arahRepresentasi');
            $("#uploadModalTimur").fadeIn();
            $("#arah").attr('value', 'timur');
            arahRepresentasi.innerHTML = "Timur";
        });
        $("#uploadBarat").click(function() {
            var arahRepresentasi = document.getElementById('arahRepresentasi');
            $("#arah").attr('value', 'barat');
            $("#uploadModalTimur").fadeIn();
            arahRepresentasi.innerHTML = "Barat";
        });
        $("#uploadUtara").click(function() {
            var arahRepresentasi = document.getElementById('arahRepresentasi');
            $("#arah").attr('value', 'utara');
            $("#uploadModalTimur").fadeIn();
            arahRepresentasi.innerHTML = "Utara";
        });
        $("#uploadSelatan").click(function() {
            var arahRepresentasi = document.getElementById('arahRepresentasi');
            $("#arah").attr('value', 'selatan');
            $("#uploadModalTimur").fadeIn();
            arahRepresentasi.innerHTML = "Selatan";
        });

        $("#uploadModalTimurClose").click(function() {
            $("#uploadModalTimur").fadeOut();


        });
        $("#tombolTampilTimur").click(function() {

            $("#timurTampil").modal('show');


        });
        $("#tombolTampilBarat").click(function() {

            $("#baratTampil").modal('show');


        });
        $("#tombolTampilUtara").click(function() {
            $("#utaraTampil").modal('show');


        });
        $("#tombolTampilSelatan").click(function() {
            $("#selatanTampil").modal('show');


        });
        $("#TampilTimurClose").click(function() {
            $("#timurTampil").fadeOut();
        });

//untuk kendali kontak
        $("#uploadPenanggungJawab").click(function() {
            var gambar = document.getElementById('gambarKontak');
            gambar.innerHTML = "Penanggung Jawab";
            $("#urlKontak").attr('value', 'urlPenanggungJawab');
            $("#modalPenangungJawab").fadeIn();
        });
        $("#uploadPenjaga").click(function() {
            var gambar = document.getElementById('gambarKontak');
            $("#urlKontak").attr('value', 'urlPenjaga');
            gambar.innerHTML = "Penjaga";
            $("#modalPenangungJawab").fadeIn();
        });

        $("#uploadmodalPenangungJawabClose").click(function() {

            $("#modalPenangungJawab").fadeOut();
        });

        $("#tombolTampilPenanggungJawab").click(function() {
            $("#penanggungjawabTampil").fadeIn();
        });

        $("#tombolTampilPenjaga").click(function() {
            $("#penjagaTampil").fadeIn();
        });

        $("#penanggungjawabTampilClose").click(function() {

            $("#penanggungjawabTampil").fadeOut();
        });
        $("#penjagaTampilClose").click(function() {

            $("#penjagaTampil").fadeOut();
        });


//untuk upload gambar representasi

        $("#tombolUpload").click(function() {
            var gambar = $("#gambar").val();
            $.ajax({
                url: "upload_4.php",
                type: POST,
                contentType: false,
                data: " gambar=" + gambar,
                cache: false,
                success: function(msg) {
                    alert(msg);

                }
            });
        });

        $("#tombol_ubah").click(function() {
            $('#tanggal').datepicker({
                autoclose: true,
                format: 'dd/mm/yyyy'
            });
            $("#lokasi1").removeAttr('readonly');
            $("#alamat1").removeAttr('readonly');
            $("#pelaksana").removeAttr('readonly');
            $("#tanggal").removeAttr('readonly');
            $("#tahunPengadaan").removeAttr('readonly');
            $("#kalibrasiTerakhir").removeAttr('readonly');

            $("#battery").removeAttr('readonly');
            $("#solar").removeAttr('readonly');
            $("#regulator").removeAttr('readonly');
            $("#pln").removeAttr('readonly');
            $("#catatan").removeAttr('readonly');
            $("#pelatihan").removeAttr('readonly');
            $("#hp_penjaga").removeAttr('readonly');
            $("#penjaga").removeAttr('readonly');
            $("#hp_pj").removeAttr('readonly');
            $("#penanggungjawab").removeAttr('readonly');
            $("#provinsi").removeAttr('readonly');
            $("#kabupaten").removeAttr('readonly');
            $("#kecamatan").removeAttr('readonly');
            $("#desa").removeAttr('readonly');
            $("#e").removeAttr('readonly');
            $("#x").removeAttr('readonly');
            $("#y").removeAttr('readonly');
            $("#jenis_komunikasi1").removeAttr('disabled');
            $("#merk1").removeAttr('readonly');
            $("#nomorgsm1").removeAttr('readonly');

            $("#idaws1").removeAttr('readonly');
            $("#jenis").removeAttr('disabled');
            $("#CatatanPos").removeAttr('readonly');
            $("#KondisiPos").removeAttr('disabled');
            $("#namapos1").removeAttr('readonly');
            $("#simpan").show();
            $("#ubah").hide();
        });

        simpanIdentitas();


        function ambilRepresentasi(akhir) {

            var id = $("#id").val();

            if (akhir == "akhir") {
                url = "representasi.php?akhir=1";
            } else {
                url = "representasi.php?akhir=" + id;
            }

            $.ajax({
                url: url,
                dataType: 'json',
                cache: false,
                success: function(msg) {
                    for (i = 0; i < msg.wilayah.petak.length; i++) {



                        timur[i] = msg.wilayah.petak[i].timur;
                        barat[i] = msg.wilayah.petak[i].barat;
                        utara[i] = msg.wilayah.petak[i].utara;
                        selatan[i] = msg.wilayah.petak[i].selatan;

                        if (barat[i] == 0) {
                            $('#tombolTampilBarat').attr("disabled", true);
                        }
                        if (timur[i] == 0) {
                            $('#tombolTampilTimur').attr("disabled", true);
                        }
                        if (utara[i] == 0) {
                            $('#tombolTampilUtara').attr("disabled", true);
                        }
                        if (selatan[i] == 0) {
                            $('#tombolTampilSelatan').attr("disabled", true);
                        }



                    }
                }
            });
        }

        ambilRepresentasi();
    });



    function ambildatabase(akhir) {
        if (akhir == "akhir") {
            url = "ambildatadp.php?akhir=1";
        } else {
            url = "ambildatadp.php?akhir=0";
        }
        $.ajax({
            url: url,
            dataType: 'json',
            cache: false,
            success: function(msg) {
                for (i = 0; i < msg.wilayah.petak.length; i++) {
                    idaws[i] = msg.wilayah.petak[i].idaws;

                    jenis_komunikasi[i] = msg.wilayah.petak[i].jenis_komunikasi;
                    nomorgsm[i] = msg.wilayah.petak[i].nomorgsm;
                    merk[i] = msg.wilayah.petak[i].merk;
                    namapos[i] = msg.wilayah.petak[i].namapos;
                    lat[i] = msg.wilayah.petak[i].x;
                    lng[i] = msg.wilayah.petak[i].y;
                    timur[i] = msg.wilayah.petak[i].timur;
                    barat[i] = msg.wilayah.petak[i].barat;
                    utara[i] = msg.wilayah.petak[i].utara;
                    selatan[i] = msg.wilayah.petak[i].selatan;
                }
            }
        });
    }

</script>


<script src="updateIdentitas.js"></script>

<div id="modalPenangungJawab" class="modal modal-primary">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Upload Gambar : <span id="gambarKontak"></span> </h4>
            </div>
            <form class="form-horizontal" action="upload_kontak.php" method="post" name="pengajuan" enctype="multipart/form-data" >
                <input hidden="" name="kontak" id="urlKontak"  >
                <input hidden="" name="id" value="<?php echo $data->id ?>" >
                <div class="modal-body">
                    <p id="arahtimur"></p>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-xs-7">
                                <label >Pilih Gambar</label><br>
                                <input id="gambar" required="" class="tultip form-control" id="inputFile" type="file" name="gambar" data-placement="right" title="" data-toggle="tooltip" data-original-title="Format Image File(.jpg) atau (.PDF)" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="tombolUpload" type="submit" class="btn btn-outline pull-left" data-dismiss="modal">Upload</button>
                    <button id="uploadmodalPenangungJawabClose" type="button" class="btn btn-outline">Close</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div id="uploadModalTimur" class="modal modal-primary">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Upload Gambar Arah <span id="arahRepresentasi"></span> </h4>
            </div>
            <form class="form-horizontal" action="upload_4.php" method="post" name="pengajuan" enctype="multipart/form-data" >
                <input hidden="" name="arah" id="arah"  >
                <input hidden="" name="id" value="<?php echo $data->id ?>" >
                <div class="modal-body">
                    <p id="arahtimur"></p>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-xs-7">
                                <label >Pilih Gambar</label><br>
                                <input id="gambar" required="" class="tultip form-control" id="inputFile" type="file" name="gambar" data-placement="right" title="" data-toggle="tooltip" data-original-title="Format Image File(.jpg) atau (.PDF)" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button id="tombolUpload" type="submit" class="btn btn-outline pull-left" data-dismiss="modal">Upload</button>
                    <button id="uploadModalTimurClose" type="button" class="btn btn-outline">Close</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<?php
$query = mysql_query("select * from representasi where id='$id' ");
$dataRepresentasi = mysql_fetch_object($query);

$querykontak = mysql_query("select * from kontak where id='$id' ");
$dataKontak = mysql_fetch_object($querykontak);
?>

<?php include 'modalrepresentasi.php'; ?>

<div class="col-md-6" >
    <div class="box" >
        <form class="form-horizontal" action="upload.php" method="post" name="pengajuan" enctype="multipart/form-data" >
            <div class="box-body">             
                <div class="box-body">
                    <div class="row">
                        <div class="col-xs-7">
                            <span id="namapos_msg"></span>
                            <label >Nama Pos AWS/AAWS/ARGS </label><br>
                            <input hidden="" value="<?php echo $data->id ?>" id="id">
                            <input value="<?php echo $data->namapos ?>" readonly="" placeholder="Nama AWS/AAWS/ARGS" required="" style="width:170%"  name="header" type="text" class="form-control" id="namapos1" >
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-7">
                            <label>Jenis Pos</label><br>
                            <span id="jenis_msg"></span>
                            <div class="input-group">
                                <select disabled="" id="jenis" name="kompetensi" class="form-control" >
                                    <option value="<?php echo $data->jenis ?>"><?php echo strtoupper($data->jenis) ?></option>
                                    <option value="aws">AWS</option>
                                    <option value="awsp">AWS PLUS</option>
                                    <option value="aaws">AAWS</option>
                                    <option value="arg">ARG</option>
                                    <option value="smpk">SMPK</option>                                
                                    <option value="observasi">PH OBSERVASI</option>   
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-7">
                            <span id="idaws_msg"></span>
                            <label >Nomor ID</label><br>
                            <input  readonly="" value="<?php echo $data->idaws ?>" placeholder="Nomor ID AWSCENTER" required="" style="width:170%"  name="header" type="text" class="form-control"  id="idaws1" >

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-7">
                            <span id="nomorgsm_msg"></span>
                            <label >Nomor SIMCARD/GSM</label><br>
                            <input  value="<?php echo $data->nomorgsm ?>"  readonly="" placeholder="Nomor SIMCARD/GSM" required="" style="width:170%"  name="header" type="text" class="form-control"  id="nomorgsm1" >

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-7">
                            <span id="merk_msg"></span><br>                            
                            <label >Merk</label><br>
                            <input  value="<?php echo $data->merk ?>"  readonly=""  placeholder="Merk" required="" style="width:170%"  name="header" type="text" class="form-control"  id="merk1" >
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-7">
                            <label>Metode Komunikasi</label><br>
                            <span id="jk"></span>
                            <div class="input-group">
                                <select disabled="" id="jenis_komunikasi1" name="kompetensi" class="form-control" >
                                    <option value="<?php echo $data->jenis_komunikasi ?>" > <?php echo strtoupper($data->jenis_komunikasi) ?></option>
                                    <option value="sms">SMS</option>
                                    <option value="ftv">FTP</option>
                                    <option value="gprs">GPRS</option>
                                    <option value="3g">3G</option>
                                    <option value="vsat">V Sat</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-7">
                            <label >Koordinat AWS/AAWS/ARG</label><br>
                            <span id="x1"></span>
                            <input value="<?php echo $data->lat ?>"  readonly=""  required="" onkeyup="angka(this)" style="width:170%" class="form-control" type=text id=x size="40" maxlength="40" placeholder="Latitude">
                            <span id="y1"></span>
                            <input value="<?php echo $data->lng ?>"  readonly=""  required="" onkeyup="angka(this)" style="width:170%"  class="form-control" type=text id=y size="60" maxlength="60" placeholder="Longitude">      
                            <span id="e_msg"></span>
                            <input value="<?php echo $data->e ?>"  readonly=""  required="" style="width:170%"  name="header" type="text" class="form-control"  id=e placeholder="Elevasi" >
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-7">
                            <label >Alamat AWS/AAWS/ARG</label><br>
                            <span id="lokasi_msg"></span>
                            <input readonly="" required="" style="width:170%" value="<?php echo $data->lokasi ?>"  name="header" type="text" class="form-control" id="lokasi1" placeholder="Lokasi" >
                            <span id="alamat_msg"></span>
                            <input readonly="" required="" style="width:170%" value="<?php echo $data->alamat ?>"  name="header" type="text" class="form-control" id="alamat1" placeholder="Alamat" >
                            <span id="desa_msg"></span>
                            <input value="<?php echo $data->desa ?>"  readonly="" required="" style="width:170%"  name="header" type="text" class="form-control" id="desa" placeholder="Desa" >
                            <span id="kecamatan_msg"></span>
                            <input value="<?php echo $data->kecamatan ?>"  readonly="" required="" style="width:170%"  name="header" type="text" class="form-control" id="kecamatan" placeholder="Kecamatan" >
                            <span id="kabupaten_msg"></span>
                            <input value="<?php echo $data->kabupaten ?>"  readonly="" required="" style="width:170%"  name="header" type="text" class="form-control" id="kabupaten" placeholder="Kabupaten|Kota" >
                            <span id="provinsi_msg"></span>
                            <input value="<?php echo $data->provinsi ?>"  readonly="" required="" style="width:170%"  name="header" type="text" class="form-control" id="provinsi" placeholder="Provinsi" >
                        </div>
                    </div>   
                    <div class="row">
                        <div class="col-xs-10">
                            <label >Kontak Person</label><br>

                            <table   width="117%" >
                                <thead>
                                    <tr>
                                        <td >
                                            <span id="penanggungjawab_msg"></span>
                                            <input value="<?php echo $data->penanggungJawab ?>" readonly="" required=""   name="header" type="text" class="form-control" id="penanggungjawab"   placeholder="Penanggung Jawab" >
                                        </td> 
                                        <td>
                                            <span id="hp_pj_msg"></span>
                                            <input value="<?php echo $data->hpPj ?>" readonly="" required="" style="width:97%"  name="header" type="text" class="form-control" id="hp_pj" placeholder="No Hp" >
                                        </td> 
                                        <td>
                                            <div id="upPenanggungJawab" hidden=""><a id="uploadPenanggungJawab" type="button"  class="btn btn-primary btn-flat " data-toggle="modal" title="Upload Gambar"  > <i class="fa fa-upload"></i></a></div>  
                                        </td> 
                                        <td>
                                            <button id="tombolTampilPenanggungJawab"  type="button" class="btn btn-primary  btn-flat " data-toggle="modal" title="Lihat Gambar"  > <i class="fa fa-picture-o"></i></button>
                                        </td> 
                                    </tr>
                                    <tr>
                                        <td >
                                            <span id="penjaga_msg"></span>
                                            <input value="<?php echo $data->penjaga ?>" readonly="" required="" style="width:100%"  name="header" type="text" class="form-control" id="penjaga"  placeholder="Penjaga" >
                                        </td> 
                                        <td>
                                            <span id="hp_penjaga_msg"></span>
                                            <input value="<?php echo $data->hpPenjaga ?>" readonly=""   required="" style="width:97%"  name="header" type="text" class="form-control" id="hp_penjaga"   placeholder="No Hp" >
                                        </td> 
                                        <td>
                                            <div hidden id="upPenjaga"><a id="uploadPenjaga" type="button"  class="btn btn-primary btn-flat " data-toggle="modal" title="Upload Gambar"  > <i class="fa fa-upload"></i></a></div>  
                                        </td> 
                                        <td>
                                            <button id="tombolTampilPenjaga"  type="button" class="btn btn-primary  btn-flat " data-toggle="modal" title="Lihat Gambar"  > <i class="fa fa-picture-o"></i></button>
                                        </td> 
                                    </tr>
                                </thead>
                            </table>
                            <span id="pelatihan_msg"></span>
                            <textarea  readonly=""  required="" style="width:115%"  name="header" type="text" class="form-control" id="pelatihan" placeholder="Pelatihan" ><?php echo $data->pelatihan ?></textarea>
                            <span id="catatan_msg"></span>
                            <textarea readonly="" required="" style="width:115%"  name="header" type="text" class="form-control" id="catatan" placeholder="Catatan" ><?php echo $data->catatan ?></textarea>

                        </div>
                    </div>
                </div>
            </div> 
        </form>
    </div>
</div>

<div class="col-md-6" >
    <div class="box" >
        <form class="form-horizontal"   method="post" name="pengajuan" enctype="multipart/form-data" >
            <div class="box-body">
                <div class="box-body">
                    <div class="row">
                        <div class="col-xs-7">
                            <label >Power Sistem</label><br>
                            <span id="pln_msg"></span>
                            <input value="<?php echo $data->pln ?>" readonly="" required="" style="width:170%"  name="header" type="text" class="form-control" id="pln" placeholder="PLN" >
                            <span id="solar_msg"></span>
                            <input value="<?php echo $data->solar ?>" readonly="" required="" style="width:170%"  name="header" type="text" class="form-control" id="solar" placeholder="Daya Solar Panel" >
                            <span id="regulator_msg"></span>
                            <input value="<?php echo $data->regulator ?>" readonly=""   required="" style="width:170%"  name="header" type="text" class="form-control" id="regulator" placeholder="Regulator" >
                            <span id="battery_msg"></span>
                            <input  value="<?php echo $data->battery ?>" readonly="" required="" style="width:170%"  name="header" type="text" class="form-control" id="battery"  placeholder="Battery" >
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-7">
                            <label >Alat Utama</label><br>
                            <span id="tahunPengadaan_msg"></span>
                            <input  value="<?php echo $data->tahunPengadaan ?>" readonly="" required="" style="width:170%"  name="header" type="text" class="form-control" id="tahunPengadaan" placeholder="Tahun Pengadaan" >                          
                            <span id="kalibrasiTerakhir_msg"></span>
                            <input value="<?php echo $data->kalibrasiTerakhir ?>" readonly=""  required="" style="width:170%"  name="header" type="text" class="form-control" id="kalibrasiTerakhir" placeholder="Kalibrasi Terakhir(Tahun)" >                       
                            <span id="tanggal_msg"></span>
                            <input  value="<?php echo $data->tanggal ?>" readonly=""  required="" style="width:170%"  name="header" type="text" class="form-control" id="tanggal" placeholder="Tanggal" >                          
                            <span id="pelaksana_msg"></span>
                            <input value="<?php echo $data->pelaksana ?>" readonly=""  required="" style="width:170%"  name="header" type="text" class="form-control" id="pelaksana" placeholder="Pelaksana" >
                            <br>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-7">
                            <label>Kondisi Pos</label><br>
                            <span id="jenis_msg"></span>
                            <div class="input-group">
                                <select disabled="" id="KondisiPos"  name="kompetensi" class="form-control" >
                                    <?php
                                    if ($data->kondisiPos == 1) {
                                        ?>
                                        <option selected="" value="1">Baik</option>
                                        <option value="2">Rusak Ringan</option>
                                        <option value="3">Rusak Berat</option>    
                                        <?php
                                    } else if ($data->kondisiPos == 2) {
                                        ?>
                                        <option value="1">Baik</option>
                                        <option  selected="" value="2">Rusak Ringan</option>
                                        <option value="3">Rusak Berat</option>    
                                        <?php
                                    } else if ($data->kondisiPos == 3) {
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
                    </div>

                    <div class="row">
                        <div class="col-xs-7">
                            <label >Catatan Alat</label><br>
                            <textarea value="" id="CatatanPos" readonly=""  required="" style="width:170%"  name="header" type="text" class="form-control" id="catatan"  placeholder="Catatan" ><?php echo $data->catatanPos ?> </textarea>                         
                            <br>

                            <div id="changePos" hidden="">
                                <div  id="ubah" class="btn btn-group-sm">
                                    <a type="button" id="tombol_ubah" class="btn btn-primary sm"  title="Ubah Data"  > <i id="iconedit" class="fa fa-edit"></i></a>
                                    <a type="button" id="tombol_hapus" href="?menu=rmpos&id=<?php echo $id ?>" class="btn btn-danger sm"  title="Hapus Data" onclick="return confirm('Apakah Anda Yakin Menghapus Seluruh Data Pos Ini   ?')"   > <i id="iconedit" class="fa fa-trash"></i></a>

                                </div>
                            </div>

                            <div hidden="" id="simpan">
                                <a type="button" id="tombol_simpan" class="btn btn-primary sm"   title="Simpan Data"  > <i id="iconedit" class="fa fa-save"></i></a>
                            </div>

                        </div>
                    </div>

                    <br>
                    <div class="row">
                        <div class="col-xs-7">
                            <label >Represntasi Lokasi ARGS</label><br>
                            <table class="table table-bordered">
                                <tr>
                                    <th>Timur</th>
                                    <th>Barat</th>
                                    <th>Utara</th>
                                    <th>Selatan</th>
                                </tr>
                                <tr>
                                    <th>                          <div id="upTimur" hidden=""><a id="uploadTimur" type="button"  class="btn btn-primary btn-sm " data-toggle="modal" title="Upload Gambar"  > <i class="fa fa-upload"></i></a></div>  
                                </th>
                                <th>                        <div id="upBarat" hidden=""> <a id="uploadBarat" type="button" class="btn btn-primary  btn-sm " data-toggle="modal" title="Upload Gambar"  > <i class="fa fa-upload"></i></a></div>      
                                </th>
                                <th>                           <div id="upUtara" hidden=""> <a  id="uploadUtara" type="button" class="btn btn-primary  btn-sm " data-toggle="modal" title="Upload Gambar"  > <i class="fa fa-upload"></i></a></div>   
                                </th>
                                <th>                        <div id="upSelatan" hidden="">     <a  id="uploadSelatan" type="button" class="btn btn-primary  btn-sm " data-toggle="modal" title="Upload Gambar"  > <i class="fa fa-upload"></i></a></div>  
                                </th>
                                </tr>
                                <tr>
                                    <th>                            <button id="tombolTampilTimur" type="button" class="btn btn-primary  btn-sm " data-toggle="modal" title="Lihat Gambar"  > <i class="fa fa-picture-o"></i></button>
                                    </th>
                                    <th>                            <button id="tombolTampilBarat" type="button" class="btn btn-primary  btn-sm " data-toggle="modal" title="Lihat Gambar"  > <i class="fa fa-picture-o"></i></button> 
                                    </th>
                                    <th>                            <button id="tombolTampilUtara"  type="button" class="btn btn-primary  btn-sm " data-toggle="modal" title="Lihat Gambar"  > <i class="fa fa-picture-o"></i></button>
                                    </th>
                                    <th>                            <button  id="tombolTampilSelatan"  type="button" class="btn btn-primary  btn-sm " data-toggle="modal" title="Lihat Gambar"  > <i class="fa fa-picture-o"></i></button>
                                    </th>
                                </tr>

                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-11">

                            <label >Alat</label><br>
                            <div class="box-body table-responsive no-padding">
                                <table style="overflow:scroll;width: 20px; " class="table table-responsive">
                                    <tr>
                                        <th>No</th>
                                        <th>Jenis</th>
                                        <th>Merk</th>                              
                                        <th>Detail</th>
                                        <th><div hidden="" id="lap">Laporan</div></th>
                                        <th><div hidden="" id="remove">Remove</div></th>
                                    </tr>
                                    <script>
                                        var a;
                                        a = 1;
                                    </script>
                                    <?php
                                    $sql = "select * from alat where id='$id'";
                                    $query = mysql_query($sql);
                                    $i = 1;
                                    while ($dataAlat = mysql_fetch_object($query)) {
                                        
                                        $level = $_SESSION['level'];
                                        $level;
                                        if ($level == '2') {
                                            ?>
                                            <script>
                                                $(document).ready(function() {                                                    
                                                    $("#hapusAlat<?php echo json_encode($i) ?>").removeAttr('hidden');                                                   
                                                    $("#addLap<?php echo json_encode($i) ?>").removeAttr('hidden');                                                   
                                                });
                                            </script>    
                                            <?php
                                        }
                                        $d = $dataAlat->idalat;
                                        echo "<tr>";
                                        echo "<td>" . $i . "</td>";
                                        echo "<td>" . $dataAlat->jenis . "</td>";
                                        echo "<td>" . $dataAlat->merk . "</td>";


                                        echo "<td align='center'><a type='button' id='detail$i'><i class='glyphicon glyphicon-info-sign'></i></a></td>";
                                        echo "<td align='center'><div hidden='' id='addLap$i'><a type='button'  id='laporan$i' ><i class='glyphicon glyphicon-book'></i></a></td>";

                                        echo "<td align='center'>"
                                        ?>                               <div id="hapusAlat<?php echo $i ?>" hidden="" ><a   href="index.php?menu=rmalt&id=<?php echo $dataAlat->idalat ?>&pg=<?php echo $id ?>  " title="Hapus" onclick="return confirm('Apakah Anda Yakin Menghapus alat   ?')" class="btn btn-danger"  data-toggle="modal" ><i class="fa fa-ban"></i></a></div> <?php
                                        "</td>";
                                        ;
                                        echo "</tr>";
                                        ?>

                                        <script>
                                            $(document).ready(function() {


                                                $('#tglLapor<?php echo json_encode($i) ?>').datepicker({
                                                    autoclose: true,
                                                    format: 'dd/mm/yyyy'
                                                });

                                                $('#laporanAlat<?php echo json_encode($i) ?>').click(function() {
                                                    $('#modalLaporanAlat<?php echo json_encode($i) ?>').fadeIn();
                                                });

                                                $('#laporan<?php echo json_encode($i) ?>').click(function() {
                                                    $('#modalLaporan<?php echo json_encode($i) ?>').fadeIn();
                                                });
                                                $('#tambahLaporanClose<?php echo json_encode($i) ?>').click(function() {
                                                    $('#modalLaporan<?php echo json_encode($i) ?>').fadeOut();
                                                });
                                                $('#detail<?php echo json_encode($i) ?>').click(function() {
                                                    window.location = 'index.php?menu=detailAlat&id=<?php echo $d ?>';
                                                    //$('#modalDetail<?php // echo json_encode($i)                                          ?>').fadeIn();

                                                });
                                                $('#ubahAlat<?php echo json_encode($i) ?>').click(function() {
                                                    $('#tglPengadaanU<?php echo json_encode($i) ?>').datepicker({
                                                        autoclose: true,
                                                        format: 'dd/mm/yyyy'
                                                    });
                                                    $('#jenisAlatU<?php echo json_encode($i) ?>').removeAttr('readonly');
                                                    $('#merkAlatU<?php echo json_encode($i) ?>').removeAttr('readonly');
                                                    $('#modelAlatU<?php echo json_encode($i) ?>').removeAttr('readonly');
                                                    $('#snAlatU<?php echo json_encode($i) ?>').removeAttr('readonly');
                                                    $('#kondisiAlatU<?php echo json_encode($i) ?>').removeAttr('readonly');
                                                    $('#tglPengadaanU<?php echo json_encode($i) ?>').removeAttr('readonly');
                                                    $('#ubahAlatT<?php echo json_encode($i) ?>').hide();
                                                    $('#simpanAlatT<?php echo json_encode($i) ?>').removeAttr('hidden');
                                                });
                                                $("#simpanAlatT<?php echo json_encode($i) ?>").click(function() {
                                                    var id = $('#idAlatU<?php echo json_encode($i) ?>').val();
                                                    var tgl = $('#tglPengadaanU<?php echo json_encode($i) ?>').val();
                                                    var alat = $('#jenisAlatU<?php echo json_encode($i) ?>').val();
                                                    var merk = $('#merkAlatU<?php echo json_encode($i) ?>').val();
                                                    var model = $('#modelAlatU<?php echo json_encode($i) ?>').val();
                                                    var sn = $('#snAlatU<?php echo json_encode($i) ?>').val();
                                                    var kondisi = $('#kondisiAlatU<?php echo json_encode($i) ?>').val();
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
                                                            url: "simpanLaporan.php",
                                                            data: "tgl=" + tgl + "&kerusakan=" + kerusakan + "&tindakanAwal=" + tindakanAwal + "&tindakanLanjut=" + tindakanLanjut + "&pelapor=" + pelapor + "&id=" + id,
                                                            cache: false,
                                                            success: function(msg) {
                                                                alert(msg);
                                                                location.reload(true);

                                                            }
                                                        });
                                                    }
                                                });

                                                a++;
                                            });
                                        </script>

                                        
                                        <div id="modalDetail<?php echo $i ?>" class="modal modal-primary">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">×</span></button>
                                                        <h4 class="modal-title">Detail Alat </h4>

                                                    </div>

                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-xs-7">
                                                                <span id="namapos_msg"></span>
                                                                <label >Jenis</label><br>
                                                                <input hidden="" value="<?php echo $id ?>"   >
                                                                <input hidden="" value="<?php echo $dataAlat->idalat ?>"id="idAlatU<?php echo $i ?>" >
                                                                <input readonly=""  value="<?php echo $dataAlat->jenis ?>" placeholder="Jenis" required="" style="width:170%"  name="header" type="text" class="form-control" id="jenisAlatU<?php echo $i ?>"  >
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xs-7">
                                                                <span id="namapos_msg"></span>
                                                                <label >Merk</label><br>
                                                                <input readonly="" value="<?php echo $dataAlat->merk ?>"  placeholder="Merk" required="" style="width:170%"  name="header" type="text" class="form-control" id="merkAlatU<?php echo $i ?>"    >
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xs-7">
                                                                <span id="namapos_msg"></span>
                                                                <label >Tanggal Pengadaan</label><br>
                                                                <input placeholder="Tanggal" required="" value="<?php echo date("d-m-Y", strtotime($dataAlat->tgl)) ?>" readonly="" style="width:170%"  name="header" type="text" class="form-control" id="tglPengadaanU<?php echo $i ?>"  >
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xs-7">
                                                                <span id="namapos_msg"></span>
                                                                <label >Model</label><br>
                                                                <input readonly="" value="<?php echo $dataAlat->model ?>"  placeholder="Model" required="" style="width:170%"  name="header" type="text" class="form-control" id="modelAlatU<?php echo $i ?>"  >
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xs-7">
                                                                <span id="namapos_msg"></span>
                                                                <label >SN</label><br>
                                                                <input readonly="" value="<?php echo $dataAlat->sn ?>"  placeholder="SN" required="" style="width:170%"  name="header" type="text" class="form-control" id="snAlatU<?php echo $i ?>" >
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xs-7">
                                                                <span id="namapos_msg"></span>
                                                                <label >Kondisi</label><br>
                                                                <input readonly="" value="<?php echo $dataAlat->kondisi ?>"  placeholder="Kondisi" required="" style="width:170%"  name="header" type="text" class="form-control" id="kondisiAlatU<?php echo $i ?>"  >
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <div id="ubahAlatT<?php echo $i ?>"><button id="ubahAlat<?php echo $i ?>"  class="btn btn-outline pull-left" data-dismiss="modal">Ubah</button></div>
                                                        <div id="simpanAlatT<?php echo $i ?>" hidden=""><button id="simpanAlat<?php echo $i ?>"  class="btn btn-outline pull-left" data-dismiss="modal">Simpan</button></div>
                                                        <div id="laporanAlatT<?php echo $i ?>"  ><button id="laporanAlat<?php echo $i ?>"  class="btn btn-outline pull-left" data-dismiss="modal">Log Laporan Kerusakan</button></div>

                                                    </div>

                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>    

                                        <div id="modalLaporan<?php echo $i ?>" class="modal modal-primary">
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
                                                                <label >Kerusakan</label><br>
                                                                <input placeholder="Kerusakan" required="" style="width:170%"  name="header" type="text" class="form-control" id="kerusakan<?php echo $i ?>"    >
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xs-7">
                                                                <span id="namapos_msg"></span>
                                                                <label >Tanggal Lapor</label><br>
                                                                <input hidden=""  value="<?php echo $dataAlat->idalat ?>"id="idAlat<?php echo $i ?>"   >
                                                                <input placeholder="Tanggal" required="" style="width:170%"  name="header" type="text" class="form-control" id="tglLapor<?php echo $i ?>"  >
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xs-7">
                                                                <span id="namapos_msg"></span>
                                                                <label >Tindakan Awal</label><br>
                                                                <input placeholder="Tindakan Awal" required="" style="width:170%"  name="header" type="text" class="form-control" id="tindakanAwal<?php echo $i ?>"  >
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xs-7">
                                                                <span id="namapos_msg"></span>
                                                                <label >Tindakan Lanjut</label><br>
                                                                <input placeholder="Tindakan Lanjut" required="" style="width:170%"  name="header" type="text" class="form-control" id="tindakanLanjut<?php echo $i ?>" >
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xs-7">
                                                                <span id="namapos_msg"></span>
                                                                <label >Pelapor</label><br>
                                                                <input placeholder="Pelapor" required="" style="width:170%"  name="header" type="text" class="form-control" id="pelapor<?php echo $i ?>"  >
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button id="simpanLaporan<?php echo $i ?>"  class="btn btn-outline pull-left" data-dismiss="modal">Simpan Laporan</button>
                                                        <button id="tambahLaporanClose<?php echo $i ?>"  class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                                                    </div>

                                                </div>
                                                <!-- /.modal-content -->
                                            </div>
                                            <!-- /.modal-dialog -->
                                        </div>    



                                        <div id="modalLaporanAlat<?php echo $i ?>" class="modal modal-primary">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true" >×</span></button>
                                                        <h4 class="modal-title">Log Laporan Kondisi Alat </h4>
                                                    </div>

                                                    <div class="modal-body">

                                                        <div class="row">
                                                            <div class="col-xs-7">
                                                                <span id="namapos_msg"></span>
                                                                <label >Tanggal Lapor</label><br>
                                                                <input hidden=""  value="<?php echo $dataAlat->idalat ?>"id="idAlat<?php echo $i ?>"   >
                                                                <input placeholder="Tanggal" required="" style="width:170%"  name="header" type="text" class="form-control" id="tglLapor<?php echo $i ?>"  >
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xs-7">
                                                                <span id="namapos_msg"></span>
                                                                <label >Kerusakan</label><br>
                                                                <input placeholder="Kerusakan" required="" style="width:170%"  name="header" type="text" class="form-control" id="kerusakan<?php echo $i ?>"    >
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xs-7">
                                                                <span id="namapos_msg"></span>
                                                                <label >Tindakan Awal</label><br>
                                                                <input placeholder="Tindakan Awal" required="" style="width:170%"  name="header" type="text" class="form-control" id="tindakanAwal<?php echo $i ?>"  >
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xs-7">
                                                                <span id="namapos_msg"></span>
                                                                <label >Tindakan Lanjut</label><br>
                                                                <input placeholder="Tindakan Lanjut" required="" style="width:170%"  name="header" type="text" class="form-control" id="tindakanLanjut<?php echo $i ?>" >
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-xs-7">
                                                                <span id="namapos_msg"></span>
                                                                <label >Pelapor</label><br>
                                                                <input placeholder="Pelapor" required="" style="width:170%"  name="header" type="text" class="form-control" id="pelapor<?php echo $i ?>"  >
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button id="simpanLaporan<?php echo $i ?>"  class="btn btn-outline pull-left" data-dismiss="modal">Simpan Laporan</button>
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


                            <div hidden="" id="addAlat" ><a  id="tambahAlat" type="button" class="btn btn-primary sm" data-toggle="modal" title="Tambah Alat"  > <i  class="fa fa-plus"></i></a></div> 

                        </div>
                    </div>
                </div>           


            </div> 
        </form>

    </div>
</div>

<script>
    $(function() {
        $("#tglPengadaan").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
        //Money Euro
        $("[data-mask]").inputmask();

    });
</script>


