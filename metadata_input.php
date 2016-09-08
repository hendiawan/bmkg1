<script type="text/javascript" src="jquery-1.4.3.min.js"></script>
<script type="text/javascript">
    //in
    //isialisasi variabel tampung
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

        simpanIdentitas();

        $('#tanggal').datepicker({
            autoclose: true,
            format: 'dd/mm/yyyy'
        });


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
                    idpos[i] = msg.wilayah.petak[i].idpos;
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
<script src="simpanIdentitas.js"></script>
<div class="col-md-6" >
    <div class="box" >
        <form class="form-horizontal" action="upload.php" method="post" name="pengajuan" enctype="multipart/form-data" >
            <div class="box-body">             
                <div class="box-body">
                    <div class="row">
                        <div class="col-xs-7">
                            <span id="namapos_msg"></span>
                            <label >Nama Pos AWS/AAWS/ARGS </label><br>
                            <input placeholder="Nama AWS/AAWS/ARGS" required="" style="width:170%"  name="header" type="text" class="form-control" id="namapos1" >
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-7">
                            <label>Jenis Pos</label><br>
                            <span id="jenis_msg"></span>
                            <div class="input-group">
                                <select id="jenis" name="kompetensi" class="form-control" >
                                    <option value="">Pilih Jenis</option>
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
                            <input placeholder="Nomor ID" required="" style="width:170%"  name="header" type="text" class="form-control"  id="idaws1" >
                        </div>
                    </div>
                    <!--                    <div class="row">
                                            <div class="col-xs-7">
                                                <span id="idpos_msg"></span>
                                                <label >Nomor ID POS</label><br>
                                                <input placeholder="Nomor ID POS AWSCENTER" required="" style="width:170%"  name="header" type="text" class="form-control"  id="idpos1" >
                    
                                            </div>
                                        </div>-->
                    <div class="row">
                        <div class="col-xs-7">
                            <span id="nomorgsm_msg"></span>
                            <label >Nomor SIMCARD/GSM</label><br>
                            <input placeholder="Nomor SIMCARD/GSM" required="" style="width:170%"  name="header" type="text" class="form-control"  id="nomorgsm1" >

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-7">
                            <span id="merk_msg"></span><br>                            
                            <label >Merk</label><br>
                            <input placeholder="Merk" required="" style="width:170%"  name="header" type="text" class="form-control"  id="merk1" >
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-7">
                            <label>Metode Komunikasi</label><br>
                            <span id="jk"></span>
                            <div class="input-group">
                                <select id="jenis_komunikasi1" name="kompetensi" class="form-control" >
                                    <option value="">Pilih Metode</option>
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
                            <input required="" onkeyup="angka(this)" style="width:170%" class="form-control" type=text id=x size="40" maxlength="40" placeholder="Latitude">
                            <span id="y1"></span>
                            <input required="" onkeyup="angka(this)" style="width:170%"  class="form-control" type=text id=y size="60" maxlength="60" placeholder="Longitude">      
                            <span id="e_msg"></span>
                            <input required="" style="width:170%"  name="header" type="text" class="form-control"  id=e placeholder="Elevasi" >
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-7">
                            <label >Alamat AWS/AAWS/ARG</label><br>
                            <span id="lokasi_msg"></span>
                            <input required="" style="width:170%"  name="header" type="text" class="form-control" id="lokasi1" placeholder="Lokasi" >
                            <span id="alamat_msg"></span>
                            <input required="" style="width:170%"  name="header" type="text" class="form-control" id="alamat1" placeholder="Alamat" >
                            <span id="desa_msg"></span>
                            <input required="" style="width:170%"  name="header" type="text" class="form-control" id="desa" placeholder="Desa" >
                            <span id="kecamatan_msg"></span>
                            <input required="" style="width:170%"  name="header" type="text" class="form-control" id="kecamatan" placeholder="Kecamatan" >
                            <span id="kabupaten_msg"></span>
                            <input required="" style="width:170%"  name="header" type="text" class="form-control" id="kabupaten" placeholder="Kabupaten|Kota" >
                            <span id="provinsi_msg"></span>
                            <input required="" style="width:170%"  name="header" type="text" class="form-control" id="provinsi" placeholder="Provinsi" >
                        </div>
                    </div>                     
                </div>
            </div> 
        </form>
    </div>
</div>

<div class="col-md-6" >
    <div class="box" >
        <form class="form-horizontal" action="upload.php" method="post" name="pengajuan" enctype="multipart/form-data" >
            <div class="box-body">
                <div class="box-body">
                    <div class="row">
                        <div class="col-xs-7">
                            <label >Kontak Person</label><br>
                            <span id="penanggungjawab_msg"></span>
                            <input required="" style="width:170%"  name="header" type="text" class="form-control" id="penanggungjawab"   placeholder="Penanggung Jawab" >
                            <span id="hp_pj_msg"></span>
                            <input required="" style="width:170%"  name="header" type="text" class="form-control" id="hp_pj" placeholder="No Hp" >
                            <span id="penjaga_msg"></span>
                            <input required="" style="width:170%"  name="header" type="text" class="form-control" id="penjaga"  placeholder="Penjaga" >
                            <span id="hp_penjaga_msg"></span>
                            <input required="" style="width:170%"  name="header" type="text" class="form-control" id="hp_penjaga"   placeholder="No Hp" >
                            <span id="pelatihan_msg"></span>
                            <textarea required="" style="width:170%"  name="header" type="text" class="form-control" id="pelatihan" placeholder="Pelatihan" ></textarea>
                            <span id="catatan_msg"></span>
                            <textarea required="" style="width:170%"  name="header" type="text" class="form-control" id="catatan" placeholder="Catatan" ></textarea>

                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-7">
                            <label >Power Sistem</label><br>
                            <span id="pln_msg"></span>
                            <input required="" style="width:170%"  name="header" type="text" class="form-control" id="pln" placeholder="PLN" >
                            <span id="solar_msg"></span>
                            <input required="" style="width:170%"  name="header" type="text" class="form-control" id="solar" placeholder="Daya Solar Panel" >
                            <span id="regulator_msg"></span>
                            <input required="" style="width:170%"  name="header" type="text" class="form-control" id="regulator" placeholder="Regulator" >
                            <span id="battery_msg"></span>
                            <input required="" style="width:170%"  name="header" type="text" class="form-control" id="battery"  placeholder="Battery" >
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-7">
                            <label >Alat Utama</label><br>
                            <span id="tahunPengadaan_msg"></span>
                            <input required="" style="width:170%"  name="header" type="text" class="form-control" id="tahunPengadaan" placeholder="Tahun Pengadaan" >                          
                            <span id="kalibrasiTerakhir_msg"></span>
                            <input required="" style="width:170%"  name="header" type="text" class="form-control" id="kalibrasiTerakhir" placeholder="Kalibrasi Terakhir(Tahun)" >                       
                            <span id="tanggal_msg"></span>
                            <input required="" style="width:170%"  name="header" type="text" class="form-control" id="tanggal" placeholder="Tanggal" >                          
                            <span id="pelaksana_msg"></span>
                            <input required="" style="width:170%"  name="header" type="text" class="form-control" id="pelaksana" placeholder="Pelaksana" >

                        </div>
                    </div>
                </div>           
                <div class="box-body">
                    <div class="row">
                        <div class="col-xs-6">
                            <input  style="width:215%;" id="tombol_simpan"  value="simpan" name="simpan_mhs" class="btn btn-primary" >
                        </div>
                    </div>
                </div>

            </div> 
        </form>

    </div>
</div>

