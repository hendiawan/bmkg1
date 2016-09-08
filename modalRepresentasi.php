<div id="penanggungjawabTampil" class="modal modal-primary">

    <div class="modal-dialog">

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Foto Penanggungjawab </h4>                 
            </div>
            <div class="modal-body">
                <p id="arahutara"></p>            
                <img class="img-thumbnail" id="gambararahutara" src="./gambar/<?php echo $dataKontak->urlPenanggungJawab ?>" >
            </div>
            <div class="modal-footer">
                <button id="penanggungjawabTampilClose" type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>

            </div>
        </div>
        <!-- /.modal-content -->
    </div>
</div>
<div id="penjagaTampil" class="modal modal-primary">

    <div class="modal-dialog">

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Foto Penjaga </h4>                 
            </div>
            <div class="modal-body">
                <p id="arahutara"></p>            
                <img class="img-thumbnail" id="gambararahutara" src="./gambar/<?php echo $dataKontak->urlPenjaga ?>" >
            </div>
            <div class="modal-footer">
                <button id="penjagaTampilClose" type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>

            </div>
        </div>
        <!-- /.modal-content -->
    </div>
</div>
<!-- /.modal-dialog -->
<div id="timurTampil" class="modal modal-primary">

    <div class="modal-dialog">

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Arah Timur </h4>                 
            </div>
            <div class="modal-body">
                <p id="arahutara"></p>
                <img class="img-thumbnail" id="gambararahutara" src="./gambar/<?php echo $dataRepresentasi->timur ?>" >
            </div>
            <div class="modal-footer">
                <button id="TampilTimurClose" type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>

            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div id="baratTampil" class="modal modal-primary">

    <div class="modal-dialog">

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Arah Barat </h4>

            </div>
            <div class="modal-body">
                <p id="arahutara"></p>
                <img class="img-thumbnail" id="gambararahutara" src="./gambar/<?php echo $dataRepresentasi->barat ?>" >
            </div>
            <div class="modal-footer">
                <button id="TampilTimurClose" type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div id="utaraTampil" class="modal modal-primary">

    <div class="modal-dialog">

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Arah Utara </h4>

            </div>
            <div class="modal-body">
                <p id="arahutara"></p>
                <img class="img-thumbnail" id="gambararahutara" src="./gambar/<?php echo $dataRepresentasi->utara ?>" >
            </div>
            <div class="modal-footer">
                <button id="TampilTimurClose" type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>

            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<div id="selatanTampil" class="modal modal-primary">

    <div class="modal-dialog">

        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Arah Selatan </h4>

            </div>
            <div class="modal-body">
                <p id="arahutara"></p>
                <img class="img-thumbnail" id="gambararahutara" src="./gambar/<?php echo $dataRepresentasi->selatan ?>" >
            </div>
            <div class="modal-footer">
                <button id="TampilTimurClose" type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button>

            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<div id="modalTambahAlat" class="modal modal-primary">

    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Tambah Alat </h4>
            </div>

            <div class="modal-body">

                <div class="row">
                    <div class="col-xs-7">
                        <span id="namapos_msg"></span>
                        <label >Jenis</label><br>
                        <input hidden="" id="idIdentitas" value="<?php echo $id ?>"   >
                        <input placeholder="Jenis" required="" style="width:170%"  name="header" type="text" class="form-control" id="jenisAlat"  >
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-7">
                        <span id="namapos_msg"></span>
                        <label >Merk</label><br>
                        <input placeholder="Merk" required="" style="width:170%"  name="header" type="text" class="form-control" id="merkAlat"    >
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-7">
                        <span id="namapos_msg"></span>
                        <label >Tanggal Pengadaan</label><br>
                        <input placeholder="Tanggal Pengadaan" required="" style="width:170%"  name="header" type="text" class="form-control" id="tglPengadaan" data-inputmask="'alias': 'dd-mm-yyyy'" data-mask    >
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-7">
                        <span id="namapos_msg"></span>
                        <label >Model</label><br>
                        <input placeholder="Model" required="" style="width:170%"  name="header" type="text" class="form-control" id="modelAlat"  >
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-7">
                        <span id="namapos_msg"></span>
                        <label >SN</label><br>
                        <input placeholder="SN" required="" style="width:170%"  name="header" type="text" class="form-control" id="snAlat" >
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-7">
                        <span id="namapos_msg"></span>
                        <label >Kondisi</label><br>
                       
                        <select class="form-control" id="kondisiAlat">
                            <option value="1">Baik</option>
                            <option value="2">Rusak Ringan</option>
                            <option value="3">Rusak Parah</option>
                        </select>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button id="simpanAlat" type="submit"  class="btn btn-outline pull-left" data-dismiss="modal">Simpan</button>
                <button id="tambahAlatClose"  class="btn btn-outline pull-left" data-dismiss="modal">Close</button>

            </div>



        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
