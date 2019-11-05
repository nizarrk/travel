<?php if ($this->session->userdata('nama_user')) {
echo "<h3>Selamat Datang, ".$this->session->userdata('nama_user')."</h3>";
} ?>

<div class="row">
    <div style="padding-top:30px" class="panel-body">
        <form action="<?=base_url('Jadwal')?>" method="post">
            <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="form-group">
                    <label for="kota">Kota Tujuan</label>
                    <input type="hidden" name="namakota" id="namakota">
                    <input type="hidden" name="hargakota" id="hargakota">
                    <select class="form-control" id="kota" name="kota" required>
                        <option selected disabled>Choose...</option>
                        <?php foreach ($cities as $city) { ?>
                        <option value="<?=$city->id_kota?>" data-harga="<?=$city->harga_kota?>"><?=$city->nama_kota?></option>
                        <?php }; ?>
                    </select>
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="form-group">
                    <label class="control-label">Pilih Tanggal Berangkat</label>
                    <input class="form-control" type="text" name="tgl1" id="tanggal1" placeholder="Tanggal Berangkat" value="" required />
                </div>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-4">
                <div class="form-group">
                    <label class="control-label">Pilih Tanggal Pulang</label>
                    <input class="form-control" type="text" name="tgl2" id="tanggal2" placeholder="Tanggal Pulang" value="" required />
                </div>
            </div>
            <br>
            <center>
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-search"></i> Cari Jadwal</button>
                </div>
            </center>
        </form>
    </div>     
</div><!--/row -->