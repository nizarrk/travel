<?php $this->load->view('_partials/head.php'); ?>
<?php 
if($this->session->userdata('nama_user')) {
    if ($this->session->userdata('is_admin') == 'yes') {
        $this->load->view('_partials/nav-admin.php');
    } else {
        $this->load->view('_partials/nav-user.php');
    }
} else {
    $this->load->view('_partials/nav.php');
    }  ?>
<h2 class="title-style-1">Jadwal Tersedia<span class="title-under"></span></h2>
<div class="container">
    <div class="row">
        <div style="padding-top:30px" class="panel-body">
            <form action="<?=base_url('Jadwal')?>" method="post">
                <!-- <div class="col-lg-3 col-md-3 col-sm-3">
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
                </div> -->

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
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <button type="submit" class="btn btn-primary"><i class="glyphicon glyphicon-search"></i> Cari Jadwal</button>
                </div>
            </form>
        </div>     
    </div><!--/row -->

    <div class="row">
        <!-- <div class="col-lg-4 col-md-4 col-sm-4">
            <p><b>Kota Tujuan:</b> <?=$post[1]?></p>
        </div>

        <div class="col-lg-4 col-md-4 col-sm-4">
            <p><b>Tarif:</b> Rp. <?=$post[2]?></p>
        </div> -->

        <div class="col-lg-4 col-md-4 col-sm-4">
            <p><b>Tanggal:</b> <?=date("d M Y", strtotime($post[3])) ?> - <?=date("d M Y", strtotime($post[4])) ?></p>
        </div>

    </div>
    <?php if ($schedules == null) { ?>
        <table class="table table-style-1">
        <thead>
            <tr>
                <th>#</th>
                <th>Kategori</th>
                <th>Kendaraan</th>
                <th>Warna</th>
                <th>Plat Nomor</th>
                <th>Penumpang</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
    </table>
    <?php } else { ?>
    <table class="table table-style-1">
        <thead>
            <tr>
                <th>#</th>
                <th>Kategori</th>
                <th>Kendaraan</th>
                <th>Warna</th>
                <th>Plat Nomor</th>
                <th>Penumpang</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($schedules as $schedule) {
            ?>
            <tr>
                <th scope="row"><?= $no ?></th>
                <td><?= $schedule->nama_kategori ?></td>
                <td><?= $schedule->nama_kendaraan ?></td>
                <td><?= $schedule->warna_kendaraan ?></td>
                <td><?= $schedule->plat_kendaraan ?></td>
                <td><?= $schedule->jumlah_penumpang_kendaraan ?></td>
                <td><?= rupiah($schedule->harga_kendaraan); ?></td>
                <td>
                    <a href="#"
                    id="buttonbooking"
                    data-idkota="<?= $post[0] ?>"
                    data-kota="<?= $post[1] ?>"
                    data-tarif="<?= $post[2] ?>"
                    data-tgl1="<?= $post[3] ?>"
                    data-tgl2="<?=$post[4] ?>"
                    data-formatedtgl1="<?=date("d M Y", strtotime($post[3])) ?>"
                    data-formatedtgl2="<?=date("d M Y", strtotime($post[4])) ?>"
                    data-hari="<?= $post[5] + 1 ?>"
                    data-idkategori="<?= $schedule->id_kategori ?>"
                    data-idkendaraan="<?= $schedule->id_kendaraan ?>"
                    data-nama="<?= $schedule->nama_kendaraan ?>"
                    data-warna="<?= $schedule->warna_kendaraan ?>"
                    data-plat="<?= $schedule->plat_kendaraan ?>"
                    data-penumpang="<?= $schedule->jumlah_penumpang_kendaraan ?>"
                    data-harga="<?= $schedule->harga_kendaraan ?>"
                    data-toggle="modal" 
                    data-target="<?=$this->session->userdata('is_admin') == 'yes' ? '#bookingOfflineModal' : '#konfirmasiModal'?>"
                    class="btn btn-primary"> Booking
                    </a>
                </td>
            </tr>
            <?php $no++; 
            }; ?>
        </tbody>
    </table>
    <?php } ?>
</div>

<!-- Konfirmasi Modal -->
<div class="modal fade" id="konfirmasiModal" tabindex="-1" role="dialog" aria-hidden="true">

<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title" id="donateModalLabel">Konfirmasi Booking</h4>
    </div>

    <div class="modal-body">
        <form class="form-donation" action="<?=base_url('Jadwal/booking')?>" method="post">
            <h3 class="title-style-1 text-center">Detail Booking<span class="title-under"></span>  </h3>

            <!-- <div class="row">
                <div class="form-group col-md-12 ">
                    <input type="text" class="form-control" name="penjemputan" placeholder="Alamat Penjemputan*" required>
                </div>
            </div> -->

            <div class="row">
                <div class="form-group col-md-12 ">
                    <p>Berikut adalah detail dari booking anda:</p>
                </div>
            </div>

            <div class="row">
                <ul>
                    <!-- <li><b> Kota Tujuan: </b><span id="kotatujuan"></span></li> -->
                    <!-- <li><b> Tarif: </b><span id="tarif"></span></li> -->
                    <li><b> Tanggal: </b><span id="tgl1"></span><span> - </span><span id="tgl2"></span>&nbsp<span id="hari"></span></li>
                    <li><b> Jenis Kendaraan: </b><span id="kendaraan"></span></li>
                    <li><b> Harga Kendaraan: </b><span id="hargakendaraan"></span></li>
                    <li><b> Total Biaya: </b><span id="total"></span></li>
                </ul>
            </div>

            <div class="row">
                <div class="form-group col-md-12 ">
                    <p>Apakah anda yakin ingin booking kendaraan ini?</p>
                </div>
            </div>
            
            <div class="row">
                <div class="form-group col-md-12 ">
                    <input type="hidden" name="kendaraan" id="inputkendaraan">
                    <input type="hidden" name="kota" id="inputkota">
                    <input type="hidden" name="user" id="inputuser" value="<?=$this->session->userdata('id_user')?>">
                    <input type="hidden" name="tgl1" id="inputtgl1" value="<?=$post[3]?>">
                    <input type="hidden" name="tgl2" id="inputtgl2" value="<?=$post[4]?>">
                    <input type="hidden" name="total" id="inputtotal">
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-12">
                    <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Tidak</button>
                    <button style="margin-right: 3px;" type="submit" class="btn btn-default pull-right" >Ya</button>
                </div>
            </div>
        </form>
    </div>
  </div>
</div>

</div> <!-- /.modal -->

<!-- Booking Manual Modal -->
<div class="modal fade" id="bookingOfflineModal" tabindex="-1" role="dialog" aria-hidden="true">

<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title" id="donateModalLabel">Booking Manual</h4>
    </div>

    <div class="modal-body">
        <form class="form-donation" action="<?=base_url('Jadwal/bookingOffline')?>" method="post">
            <h3 class="title-style-1 text-center">Detail Booking<span class="title-under"></span>  </h3>

            <div class="row">
                <div class="col-lg-4 col-md-4 col-sm-4">
                    <p><b>Kota Tujuan:</b> <?=$post[1]?></p>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-4">
                    <p><b>Tanggal:</b> <?=date("d M Y", strtotime($post[3])) ?> - <?=date("d M Y", strtotime($post[4])) ?>
                </div>

                <div class="col-lg-4 col-md-4 col-sm-4">
                    <p><b>Total Biaya:</b> Rp. <span id="totalOffline"></span></p>
                </div>

            </div>

            <div class="row">
                <div class="form-group col-md-12 ">
                    <label for="nama">Nama</label>
                    <input type="text" class="form-control" name="nama" placeholder="Nama User*" required>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-12 ">
                    <label for="alamat">Alamat</label>
                    <input type="text" class="form-control" name="alamat" placeholder="Alamat*" required>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-12 ">
                    <label for="telp">Telepon</label>
                    <input type="text" class="form-control" name="telp" placeholder="Nomor Telepon*" required>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-12 ">
                    <label for="penjemputan">Lokasi Penjemputan</label>
                    <input type="text" class="form-control" name="penjemputan" placeholder="Alamat Penjemputan*" required>
                </div>
            </div>
            
            <div class="row">
                <div class="form-group col-md-12 ">
                    <input type="hidden" name="kendaraan" id="inputkendaraanoffline">
                    <input type="hidden" name="kota" id="inputkotaoffline">
                    <input type="hidden" name="user" id="inputuser" value="<?=$this->session->userdata('id_user')?>">
                    <input type="hidden" name="tgl1" id="inputtgl1" value="<?=$post[3]?>">
                    <input type="hidden" name="tgl2" id="inputtgl2" value="<?=$post[4]?>">
                    <input type="hidden" name="nominal" id="inputtotaloffline">
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-12">
                    <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Tidak</button>
                    <button style="margin-right: 3px;" type="submit" class="btn btn-default pull-right" >Ya</button>
                </div>
            </div>
        </form>
    </div>
  </div>
</div>

</div> <!-- /.modal -->

<?php $this->load->view('_partials/footer.php'); ?>
<?php $this->load->view('_partials/js.php'); ?>

<script>
    //<!-- Input form -->
    $(document).ready(function () {
        $('#tanggal1').datepicker({
            format: 'yyyy-mm-dd',
            autoclose:true,
            startDate: 'd',
            endDate: '+1m'
        });

        $('#tanggal2').datepicker({
            format: "yyyy-mm-dd",
            autoclose:true,
            startDate: 'd',
            endDate: '+1m'
        });
    });

    $(document).ready(function() {
        // Untuk sunting
        $("#kota").on("click", function (event) {
            let div = $(event.target) // Tombol dimana modal di tampilkan

            // Isi nilai pada field
            $('#namakota').val(div[0].innerText);
            $('#hargakota').val(div.data('harga'));
        });
    });

    $(document).ready(function() {
        // Untuk sunting
        $(window).load(function () {            

            $('#kota').val(<?=(string) $post[0]?>);
            $('#hargakota').val(<?=(string) $post[2]?>);
            $('#tanggal1').val($('#buttonbooking').data('tgl1'));
            $('#tanggal2').val($('#buttonbooking').data('tgl2'));
            
        });
    });


    //<!-- Konfirmasi Modal -->
    $(document).ready(function() {
        // Untuk sunting
        $("#konfirmasiModal").on("show.bs.modal", function (event) {
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan

            let total = 0

            if (div.data('hari') == 0) {
                total = div.data('harga')
            } else {
                total = div.data('harga') * div.data('hari')
            }
            

            // Isi nilai pada text
            $('#kotatujuan').text(div.data('kota'));
            $('#tarif').text("Rp. " + div.data('tarif'));
            $('#tgl1').text(div.data('formatedtgl1'));
            $('#tgl2').text(div.data('formatedtgl2'));
            $('#hari').text("(" + div.data('hari') + " Hari)");
            $('#kendaraan').text(div.data('nama'));
            $('#hargakendaraan').text("Rp. " + div.data('harga'));
            $('#total').text("Rp. " + total);

            // Isi nilai pada field
            $('#inputkota').val(div.data('idkota'));
            $('#inputtotal').val(total);
            $('#inputkendaraan').val(div.data('idkendaraan'));
        });
    });

    //<!-- Booking Offline Modal -->
    $(document).ready(function() {
        // Untuk sunting
        $("#bookingOfflineModal").on("show.bs.modal", function (event) {
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan

            let total = 0

            if (div.data('hari') == 0) {
                total = div.data('harga') + div.data('tarif')
            } else {
                total = div.data('harga') * div.data('hari') + div.data('tarif')
            }
            
            // Isi nilai pada field
            $('#harioffline').text("(" + div.data('hari') + " Hari)");
            $('#inputkotaoffline').val(div.data('idkota'));
            $('#inputtotaloffline').val(total);
            $('#totalOffline').text(total);
            $('#inputkendaraanoffline').val(div.data('idkendaraan'));
        });
    });
</script>