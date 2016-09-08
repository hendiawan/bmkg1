<html>
    <head>
        <?php include("koneksi.php"); ?>
        <title>Sistem AWS AAWS Center Mataram</title>
        <link rel="stylesheet" type="text/css" href="style_perum.css" />
        <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
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
            var desa = new Array();
            var kecamatan = new Array();
            var kabupaten = new Array();
            var provinsi = new Array();
            var timur = new Array();
            var barat = new Array();
            var utara = new Array();
            var kondisi = new Array();
            var selatan = new Array();
            var alamat = new Array();
            var lokasi = new Array();
            var penanda = new Array();
            var i;
            var url;
            var gambar_tanda;
            //load peta google maps
            function peta_awal() {
                var lombok = new google.maps.LatLng(-8.681493815778646, 117.35767364501953);
                var petaoption = {
                    zoom: 8,
                    center: lombok,
                    mapTypeId: google.maps.MapTypeId.MAP
                };
                peta = new google.maps.Map(document.getElementById("petaku"), petaoption);
                google.maps.event.addListener(peta, 'click', function(event) {
                    kasihtanda(event.latLng);
                });

                $("#aws").click(function() {
                    peta = new google.maps.Map(document.getElementById("petaku"), petaoption);
                    ambildatabase('aws');
                });



                $("#awsp").click(function() {
                    peta = new google.maps.Map(document.getElementById("petaku"), petaoption);
                    ambildatabase('awsp');
                });

                $("#awsp").click(function() {
                    peta = new google.maps.Map(document.getElementById("petaku"), petaoption);
                    ambildatabase('awsp');
                });

                $("#aaws").click(function() {
                    peta = new google.maps.Map(document.getElementById("petaku"), petaoption);
                    ambildatabase('aaws');
                });
                $("#arg").click(function() {
                    peta = new google.maps.Map(document.getElementById("petaku"), petaoption);
                    ambildatabase('arg');
                });
                $("#smpk").click(function() {
                    peta = new google.maps.Map(document.getElementById("petaku"), petaoption);
                    ambildatabase('smpk');
                });
                $("#observasi").click(function() {
                    peta = new google.maps.Map(document.getElementById("petaku"), petaoption);
                    ambildatabase('observasi');
                });
                ambildatabase('awal');


            }

            $(document).ready(function() {


                $("#timur").click(function() {
                    $('#timur1').modal('show');
                });
                $("#barat").click(function() {
                    $('#barat1').modal('show');
                });
                $("#utara").click(function() {
                    $('#utara1').modal('show');
                });
                $("#selatan").click(function() {
                    $('#selatan1').modal('show');
                });
                $("#mapmenu1").removeAttr('hidden');
                $("#mapmenu2").removeAttr('hidden');
                $("#mapmenu3").removeAttr('hidden');
                $("#mapmenu4").removeAttr('hidden');
                $("#mapmenu5").removeAttr('hidden');

                $("#legenda1").removeAttr('hidden');
                $("#legenda2").removeAttr('hidden');
                $("#legenda3").removeAttr('hidden');
                $("#legenda4").removeAttr('hidden');
                $("#legenda5").removeAttr('hidden');
                $("#legenda6").removeAttr('hidden');
                $("#legenda7").removeAttr('hidden');

               




            });
//            function kasihtanda(lokasi) {
//                set_icon(jenis);
//                tanda = new google.maps.Marker({
//                    position: lokasi,
//                    map: peta,
//                    icon: gambar_tanda
//                });
//                $("#x").val(lokasi.lat());
//                $("#y").val(lokasi.lng());
//
//            }

            function set_icon(jenisnya, kondisi) {
                if (jenisnya == 'aws' && kondisi == '1') {
                    gambar_tanda = 'icon/aws1.png';
                } else if (jenisnya == 'aws' && kondisi == '2') {
                    gambar_tanda = 'icon/aws2.png';
                } else if (jenisnya == 'aws' && kondisi == '3') {
                    gambar_tanda = 'icon/aws3.png';
                } else if (jenisnya == 'arg' && kondisi == '1') {
                    gambar_tanda = 'icon/arg1.png';
                } else if (jenisnya == 'arg' && kondisi == '2') {
                    gambar_tanda = 'icon/arg2.png';
                } else if (jenisnya == 'arg' && kondisi == '3') {
                    gambar_tanda = 'icon/arg3.png';
                } else if (jenisnya == 'aaws' && kondisi == '1') {
                    gambar_tanda = 'icon/aaws1.png';
                } else if (jenisnya == 'aaws' && kondisi == '2') {
                    gambar_tanda = 'icon/aaws2.png';
                } else if (jenisnya == 'aaws' && kondisi == '3') {
                    gambar_tanda = 'icon/aaws3.png';
                } else if (jenisnya == 'observasi' && kondisi == '1') {
                    gambar_tanda = 'icon/observasi1.png';
                } else if (jenisnya == 'observasi' && kondisi == '2') {
                    gambar_tanda = 'icon/observasi2.png';
                } else if (jenisnya == 'observasi' && kondisi == '3') {
                    gambar_tanda = 'icon/observasi3.png';
                } else if (jenisnya == 'smpk' && kondisi == '1') {
                    gambar_tanda = 'icon/smpk1.png';
                } else if (jenisnya == 'smpk' && kondisi == '2') {
                    gambar_tanda = 'icon/smpk2.png';
                } else if (jenisnya == 'smpk' && kondisi == '3') {
                    gambar_tanda = 'icon/smpk3.png';
                } else if (jenisnya == 'awsp' && kondisi == '1') {
                    gambar_tanda = 'icon/awsp1.png';
                } else if (jenisnya == 'awsp' && kondisi == '2') {
                    gambar_tanda = 'icon/awsp2.png';
                } else if (jenisnya == 'awsp' && kondisi == '3') {
                    gambar_tanda = 'icon/awsp3.png';
                }
            }
            function ambildatabase(akhir) {
                if (akhir == "akhir") {
                    url = "ambildatadp.php?akhir=1";
                } else if (akhir == "aws") {
                    url = "ambildatadp.php?akhir=aws";
                } else if (akhir == "awsp") {
                    url = "ambildatadp.php?akhir=awsp";
                } else if (akhir == "aaws") {
                    url = "ambildatadp.php?akhir=aaws";

                } else if (akhir == "arg") {
                    url = "ambildatadp.php?akhir=arg";

                } else if (akhir == "observasi") {
                    url = "ambildatadp.php?akhir=observasi";

                } else if (akhir == "smpk") {
                    url = "ambildatadp.php?akhir=smpk";
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
                            provinsi[i] = msg.wilayah.petak[i].provinsi;
                            desa[i] = msg.wilayah.petak[i].desa;
                            kecamatan[i] = msg.wilayah.petak[i].kecamatan;
                            kabupaten[i] = msg.wilayah.petak[i].kabupaten;
                            timur[i] = msg.wilayah.petak[i].timur;
                            barat[i] = msg.wilayah.petak[i].barat;
                            utara[i] = msg.wilayah.petak[i].utara;
                            selatan[i] = msg.wilayah.petak[i].selatan;
                            kondisi[i] = msg.wilayah.petak[i].kondisi;
                            lokasi[i] = msg.wilayah.petak[i].lokasi;
                            alamat[i] = msg.wilayah.petak[i].alamat;

//                            set_icon(msg.wilayah.petak[i].jenis);
                            set_icon(msg.wilayah.petak[i].jenis, kondisi[i]);
                            var point = new google.maps.LatLng(
                                    parseFloat(msg.wilayah.petak[i].x),
                                    parseFloat(msg.wilayah.petak[i].y));
                            tanda = new google.maps.Marker({
                                position: new google.maps.LatLng(parseFloat(msg.wilayah.petak[i].x), parseFloat(msg.wilayah.petak[i].y)),
                                map: peta,
                                icon: gambar_tanda
                            });


                            var infowindow = new google.maps.InfoWindow();

                            google.maps.event.addListener(tanda, 'click', (function(tanda, i) {
                                return function() {
                                    infowindow.setContent(namapos[i]);
                                    infowindow.open(peta, tanda);
                                    $("#metadata").attr('class', 'treeview active');
                                    $("#idaws").attr('value', idaws[i]);
                                    $("#idpos").attr('value', idpos[i]);
                                    $("#jenis_komunikasi").attr('value', jenis_komunikasi[i]);
                                    $("#nomorgsm").attr('value', nomorgsm[i]);
                                    $("#merk").attr('value', merk[i]);
                                    $("#namapos").attr('value', namapos[i]);
                                    $("#lat").attr('value', lat[i]);
                                    $("#lng").attr('value', lng[i]);
                                    $("#desaI").attr('value', desa[i]);
                                    $("#kecamatanI").attr('value', kecamatan[i]);
                                    $("#kabupatenI").attr('value', kabupaten[i]);
                                    $("#provinsiI").attr('value', provinsi[i]);
                                    $("#lokasi").attr('value', lokasi[i]);
                                    $("#alamat").attr('value', alamat[i]);
                                    $("#gambararahtimur").attr('src', './gambar/' + timur[i]);
                                    $("#gambararahbarat").attr('src', './gambar/' + barat[i]);
                                    $("#gambararahutara").attr('src', './gambar/' + utara[i]);
                                    $("#gambararahselatan").attr('src', './gambar/' + selatan[i]);
                                    $("#arahtimur").html(namapos[i]);
                                    $("#arahutara").html(namapos[i]);
                                    $("#arahbarat").html(namapos[i]);
                                    $("#arahselatan").html(namapos[i]);
                                }
                            })(tanda, i));


                        }
                    }
                });
            }


            function setjenis(jns) {
                jenis = jns;
            }


        </script>

    </head>
    <body>
    <body onLoad="peta_awal()">

    <center><h3>Lokasi Sistem ARG | AWS | AWS Plus | SMPK | PH Observasi BMKG Prov. NTB </h3></center>

    <?php 
    
//    echo $_SERVER['HTTP_HOST']."<br>";
//    echo"url_akses :". $_SERVER['PHP_SELF'];
     if (isset($_GET['u'])){
         echo $_GET['u'];
    } ;
    
    ?>
    <div id="petaku" style="margin-left:2%;  width:95%; height:500px;" ></div>


    <!-- Modal -->
    <div id="timur1" class="modal modal-primary">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Arah Timur </h4>
                </div>
                <div class="modal-body">
                    <p id="arahtimur"></p>
                    <img class="img-thumbnail" id="gambararahtimur" >
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-outline">Save changes</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <div id="barat1" class="modal modal-primary">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Arah Barat </h4>
                </div>
                <div class="modal-body">
                    <p id="arahbarat"></p>
                    <img class="img-thumbnail" id="gambararahbarat" >
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-outline">Save changes</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <div id="utara1" class="modal modal-primary">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Arah Utara </h4>
                </div>
                <div class="modal-body">
                    <p id="arahutara"></p>
                    <img class="img-thumbnail" id="gambararahutara" >
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-outline">Save changes</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <div id="selatan1" class="modal modal-primary">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">Arah Selatan </h4>
                </div>
                <div class="modal-body">
                    <p id="arahselatan"></p>
                    <img class="img-thumbnail" id="gambararahselatan" >
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-outline">Save changes</button>
                </div>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>


</body>
</html>