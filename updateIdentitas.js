function simpanIdentitas() {
    $("#tombol_simpan").click(function() {

        var lokasi = $("#lokasi1").val();
        var lokasi_msg = document.getElementById('lokasi_msg');
        var alamat = $("#alamat1").val();
        var alamat_msg = document.getElementById('alamat_msg');

        var id = $("#id").val();
        var x = $("#x").val();
        var y = $("#y").val();
        var e = $("#e").val();
        var KondisiPos = $("#KondisiPos").val();
        var CatatanPos = $("#CatatanPos").val();
        var tahunPengadaan = $("#tahunPengadaan").val();
        
        var kalibrasiTerakhir = $("#kalibrasiTerakhir").val();
        var tanggal = $("#tanggal").val();
        var pelaksana = $("#pelaksana").val();
        var pln = $("#pln").val();
      
        var tahunPengadaan_msg = document.getElementById('tahunPengadaan_msg');
        var kalibrasiTerakhir_msg = document.getElementById('kalibrasiTerakhir_msg');
        var tanggal_msg = document.getElementById('tanggal_msg');
        var pelaksana_msg = document.getElementById('pelaksana_msg');
        var pln_msg = document.getElementById('pln_msg');
        var solar = $("#solar").val();
        var solar_msg = document.getElementById('solar_msg');
        var regulator = $("#regulator").val();
        var regulator_msg = document.getElementById('regulator_msg');
        var battery = $("#battery").val();
        var battery_msg = document.getElementById('battery_msg');
        var penanggungjawab = $("#penanggungjawab").val();
        var penanggungjawab_msg = document.getElementById('penanggungjawab_msg');
        var hpPj = $("#hp_pj").val();
        var hpPj_msg = document.getElementById('hp_pj_msg');
        var penjaga = $("#penjaga").val();
        var penjaga_msg = document.getElementById('penjaga_msg');
        var hp_penjaga = $("#hp_penjaga").val();
        var hp_penjaga_msg = document.getElementById('hp_penjaga_msg');
        var pelatihan = $("#pelatihan").val();
        var pelatihan_msg = document.getElementById('pelatihan_msg');
        var catatan = $("#catatan").val();
        var catatan_msg = document.getElementById('catatan_msg');
        var desa = $("#desa").val();
        var desa_msg = document.getElementById('desa_msg');
        var kecamatan = $("#kecamatan").val();
        var kecamatan_msg = document.getElementById('kecamatan_msg');
        var kabupaten = $("#kabupaten").val();
        var kabupaten_msg = document.getElementById('kabupaten_msg');
        var provinsi = $("#provinsi").val();
        var provinsi_msg = document.getElementById('provinsi_msg');
        var e_msg = document.getElementById('e_msg');
        var idaws = $("#idaws1").val();
        var idaws_msg = document.getElementById('idaws_msg')

        var jenis_komunikasi = $("#jenis_komunikasi1").val();
        var nomorgsm = $("#nomorgsm1").val();
        var nomorgsm_msg = document.getElementById('nomorgsm_msg');
        var merk = $("#merk1").val();
        var merk_msg = document.getElementById('merk_msg');
        var namapos = $("#namapos1").val();
        var namapos_msg = document.getElementById('namapos_msg')
        var jenis = $("#jenis").val();
        var jenis_msg = document.getElementById('jenis_msg')
        var goodColor = "rgb(145, 198, 145)";
        var badColor = "rgb(204, 144, 144)";
        var lat1 = document.getElementById('x');
        var lng1 = document.getElementById('y');
        var x1 = document.getElementById('x1');
        var y1 = document.getElementById('y1');
        var jenis_kom = document.getElementById('jenis_komunikasi1');
        var jenis_komunikasi_err = document.getElementById('jk');
        var pelaksanaS;
        var tanggalS;
        var kalibrasiTerakhirS;
        var tahunPengadaanS;
         
        var solarS;
        var batteryS;
        var regulatorS;
        var plnS;
        var catatanS;
        var pelatihanS;
        var hp_penjagaS;
        var penjagaS;
        var hpPjS;
        var penanggungjawabS;
        var desaS;
        var kecamatanS;
        var kabupatenS;
        var provinsiS;
        var eS;
        var merkS;
        var nomorgsmS;

        var idawsS;
        var jenisS;
        var namaposS;
        var xS;
        var yS;
        var jenis_komunikasiS;
        var lokasiS;
        var alamatS;

        if (lokasi == '') {

            lokasi_msg.style.color = badColor;
            lokasi_msg.innerHTML = "Tidak Boleh Kosong!";
            lokasiS = 0;
        }
        if (alamat == '') {

            alamat_msg.style.color = badColor;
            alamat_msg.innerHTML = "Tidak Boleh Kosong!";
            alamatS = 0;
        }


        if (pelaksana == '') {
            pelaksana_msg.style.color = badColor;
            pelaksana_msg.innerHTML = "Tidak Boleh Kosong!";
            pelaksanaS = 0;
        }
        if (tanggal == '') {
            tanggal_msg.style.color = badColor;
            tanggal_msg.innerHTML = "Tidak Boleh Kosong!";
            tanggalS = 0;
        }
        if (kalibrasiTerakhir == '') {
            kalibrasiTerakhir_msg.style.color = badColor;
            kalibrasiTerakhir_msg.innerHTML = "Tidak Boleh Kosong!";
            kalibrasiTerakhirS = 0;
        }
        if (tahunPengadaan == '') {
            tahunPengadaan_msg.style.color = badColor;
            tahunPengadaan_msg.innerHTML = "Tidak Boleh Kosong!";
            tahunPengadaanS = 0;
        }
       
        if (solar == '') {
            solar_msg.style.color = badColor;
            solar_msg.innerHTML = "Tidak Boleh Kosong!";
            solarS = 0;
        }
        if (battery == '') {
            battery_msg.style.color = badColor;
            battery_msg.innerHTML = "Tidak Boleh Kosong!";
            batteryS = 0;
        }
        if (regulator == '') {
            regulator_msg.style.color = badColor;
            regulator_msg.innerHTML = "Tidak Boleh Kosong!";
            regulatorS = 0;
        }
        if (pln == '') {
            pln_msg.style.color = badColor;
            pln_msg.innerHTML = "Tidak Boleh Kosong!";
            plnS = 0;
        }
        if (catatan == '') {
            catatan_msg.style.color = badColor;
            catatan_msg.innerHTML = "Catatan Tidak Boleh Kosong!";
            catatanS = 0;
        }
        if (pelatihan == '') {
            pelatihan_msg.style.color = badColor;
            pelatihan_msg.innerHTML = "Pelatihan Tidak Boleh Kosong!";
            pelatihanS = 0;
        }
        if (hp_penjaga == '') {
            hp_penjaga_msg.style.color = badColor;
            hp_penjaga_msg.innerHTML = "No Hp Penjaga Tidak Boleh Kosong!";
            hp_penjagaS = 0;
        }
        if (penjaga == '') {
            penjaga_msg.style.color = badColor;
            penjaga_msg.innerHTML = "Penjaga Tidak Boleh Kosong!";
            penjagaS = 0;
        }

        if (hpPj == '') {
            hpPj_msg.style.color = badColor;
            hpPj_msg.innerHTML = "No Hp Penanggungjawab Tidak Boleh Kosong!";
            hpPjS = 0;
        }
        if (penanggungjawab == '') {
            penanggungjawab_msg.style.color = badColor;
            penanggungjawab_msg.innerHTML = "Penanggungjawab Tidak Boleh Kosong!";
            penanggungjawabS = 0;
        }
        if (desa == '') {
            desa_msg.style.color = badColor;
            desa_msg.innerHTML = "Desa Tidak Boleh Kosong!";
            desaS = 0;
        }

        if (kecamatan == '') {
            kecamatan_msg.style.color = badColor;
            kecamatan_msg.innerHTML = "Kecamatan Tidak Boleh Kosong!";
            kecamatanS = 0;
        }
        if (kabupaten == '') {
            kabupaten_msg.style.color = badColor;
            kabupaten_msg.innerHTML = "Kabupaten Tidak Boleh Kosong!";
            kabupatenS = 0;
        }
        if (provinsi == '') {
            provinsi_msg.style.color = badColor;
            provinsi_msg.innerHTML = "Provinsi Tidak Boleh Kosong!";
            provinsiS = 0;
        }
        if (e == '') {
            e_msg.style.color = badColor;
            e_msg.innerHTML = "Elevesi Tidak Boleh Kosong!";
            eS = 0;
        }
        if (merk == '') {
            merk_msg.style.color = badColor;
            merk_msg.innerHTML = "NomorGsm Tidak Boleh Kosong!";
            merkS = 0;
        }
        if (nomorgsm == '') {
            nomorgsm_msg.style.color = badColor;
            nomorgsm_msg.innerHTML = "NomorGsm Tidak Boleh Kosong!";
            nomorgsmS = 0;
        }

        if (idaws == '') {
            idaws_msg.style.color = badColor;
            idaws_msg.innerHTML = "IDAWS Tidak Boleh Kosong!";
            idawsS = 0;
        }
        if (jenis == '') {
            jenis_msg.style.color = badColor;
            jenis_msg.innerHTML = " Jenis Pos Tidak Boleh Kosong! ";
            jenisS = 0;
        }
        if (namapos == '') {
            namapos_msg.style.color = badColor;
            namapos_msg.innerHTML = "Nama Pos Tidak Boleh Kosong!";
            namaposS = 0;
        }
        if (x == '') {
            x1.style.color = badColor;
            x1.innerHTML = "Latitude Tidak Boleh Kosong!";
            lat1.style.backgroundColor = badColor;
            xS = 0;
        }
        if (y == '') {
            y1.style.color = badColor;
            y1.innerHTML = "Longitude Tidak Boleh Kosong!";
            lng1.style.backgroundColor = badColor;
            yS = 0;
        }
        if (jenis_komunikasi == '') {
            jenis_komunikasi_err.style.color = badColor;
            jenis_komunikasi_err.innerHTML = "Jenis Komunikasi Tidak Boleh Kosong!";
            jenis_kom.style.backgroundColor = badColor;
            jenis_komunikasiS = 0;
        }

        if (
                jenis_komunikasiS == 0 ||
                yS == 0 ||
                xS == 0 ||
                namaposS == 0 ||
                jenisS == 0 ||
                idawsS == 0 ||
                nomorgsmS == 0 ||
                merkS == 0 ||
                eS == 0 ||
                provinsiS == 0 ||
                kabupatenS == 0 ||
                kecamatanS == 0 ||
                desaS == 0 ||
                penanggungjawabS == 0 ||
                hpPjS == 0 ||
                penjagaS == 0 ||
                hp_penjagaS == 0 ||
                plnS == 0 ||
                catatanS == 0 ||
                regulatorS == 0 ||
                solarS == 0 ||
                batteryS == 0 ||
               
                pelaksanaS == 0 ||
                tanggalS == 0 ||
                kalibrasiTerakhirS == 0 ||
                tahunPengadaanS == 0

                ) {
            alert('Terjadi kesalahan pengisian form!')
        } else {
            $("#loading").show();
            $.ajax({
                url: "ubah_dp.php",
                data: " x=" + x + "&y=" + y + "&e=" + e + "&idaws=" + idaws + "&jenis_komunikasi=" + jenis_komunikasi + "&nomorgsm=" + nomorgsm +
                        "&merk=" + merk + "&namapos=" + namapos + "&jenis=" + jenis +
                        "&desa=" + desa + "&kecamatan=" + kecamatan + "&kabupaten=" + kabupaten + "&provinsi=" + provinsi +
                        "&penanggungjawab=" + penanggungjawab + "&hpPj=" + hpPj + "&penjaga=" + penjaga + "&hp_penjaga=" + hp_penjaga + "&pelatihan=" + pelatihan +
                        "&catatan=" + catatan + "&pln=" + pln + "&solar=" + solar + "&ragulator=" + regulator +
                        "&battery=" + battery  + "&tahunPengadaan=" + tahunPengadaan + "&kalibrasiTerakhir=" + kalibrasiTerakhir +
                        "&tanggal=" + tanggal + "&pelaksana=" + pelaksana + "&id=" + id + "&KondisiPos=" + KondisiPos + "&CatatanPos=" + CatatanPos+ "&lokasi=" + lokasi + "&alamat=" + alamat,
                cache: false,
                success: function(msg) {
                    alert(msg);
                    location.reload(true);
                    ambildatabase('akhir');
                }
            });
        }


    });
}

