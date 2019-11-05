<?php $this->load->view('_partials/head.php'); ?>
<?php $this->load->view('_partials/nav-user.php'); ?>

<h2 class="title-style-1">History Booking<span class="title-under"></span></h2>
<div class="container">
    <table class="table table-style-1">
        <thead>
            <tr>
                <th>#</th>
                <th>Kode Jadwal</th>
                <th>Kendaraan</th>
                <th>Warna</th>
                <th>Plat Nomor</th>
                <th>Kota</th>
                <th>Tanggal</th>
                <th>Total Biaya</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            if (empty($histories)) {
                echo "<th></th><th></th><th></th><th></th><th></th><th> Tidak Ada Data </th><th></th><th></th><th></th><th></th>";
            } else {
                foreach ($histories as $history) {
            ?>
        <tr>
            <th scope="row"><?= $no ?></th>
            <td><?= $history->kode_jadwal ?></td>
            <td><?= $history->nama_kendaraan ?></td>
            <td><?= $history->warna_kendaraan ?></td>
            <td><?= $history->plat_kendaraan ?></td>
            <td><?= $history->nama_kota ?></td>
            <td><?= date("d M Y", strtotime($history->tgl_berangkat)) ?> - <?= date("d M Y", strtotime($history->tgl_pulang)) ?></td>
            <td>Rp. <?= $history->total_biaya ?></td>
            <td>
                <?php if ($history->status_jadwal == "Menunggu Pembayaran") { ?>
                    <span class="badge" style="background-color: #f5bc42;"><?= $history->status_jadwal ?></span>
                <?php } else if ($history->status_jadwal == "Menunggu Konfirmasi") { ?>
                    <span class="badge" style="background-color: #428df5;"><?= $history->status_jadwal ?></span>
                <?php } else if ($history->status_jadwal == "Selesai") { ?>
                    <span class="badge" style="background-color: #42f55d;"><?= $history->status_jadwal ?></span>
                <?php } else { ?>
                    <span class="badge" style="background-color: #f56042;"><?= $history->status_jadwal ?></span>
                <?php } ?>
            </td>
            <td>
                <?php if ($history->status_jadwal == "Menunggu Pembayaran") { ?>
                    <a href="#"
                        id="buttonbayar"
                        data-jadwal="<?=$history->id_jadwal?>"
                        data-toggle="modal" 
                        data-target="#bayarModal"
                        class="btn btn-primary"> Bayar
                    </a>
                <?php } else {
                    echo "-";
                } ?>
            </td>
        </tr>
            <?php $no++; 
            }
        }; ?>
        </tbody>
    </table>
</div>

<!-- Bayar Modal -->
<div class="modal fade" id="bayarModal" tabindex="-1" role="dialog" aria-labelledby="donateModalLabel" aria-hidden="true">

<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title">Konfirmasi Pembayaran</h4>
    </div>
    <div class="modal-body">

        <form class="form-donation" action="<?=base_url('Pembayaran')?>" enctype="multipart/form-data" method="post">
            <h3 class="title-style-1 text-center">Silahkan isi kelengkapan form <span class="title-under"></span>  </h3>

            <div class="row">
                <div class="form-group col-md-12 ">
                    <input type="hidden" class="form-control" name="jadwal" id="idjadwal" >
                    <input type="hidden" class="form-control" name="user" id="iduser" value="<?=$this->session->userdata('id_user');?>" >
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-12 ">
                <label class="control-label">Nama Pemilik Rekening</label>
                    <input type="text" class="form-control" name="namarek" id="namarek" placeholder="Nama Pemilik Rekening">
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-12 ">
                <label class="control-label">Nomor Rekening</label>
                    <input type="text" class="form-control" name="norek" id="norek" placeholder="Nomor Rekening">
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-12 ">
                <label class="control-label">Nominal Transfer</label>
                    <input type="text" class="form-control" name="nominal" id="nominal" placeholder="Nominal">
                    <small>*Jumlah pembayaran minimal 50% dari total biaya.</small>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-6 ">
                    <label class="control-label">Bukti Pembayaran</label>
                    <input class="form-control" name="bukti" type="file" id="bukti" accept="image/*" onchange="preview()" />
                </div>
                <div class="form-group col-md-6">
                    <img style="max-height: 100px; max-width:100px;" id="image" />
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-12">
                    <label for="">Transfer Ke:</label>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-6">
                    <input type="text" class="form-control" name="namarektravelen" value="PT. TRAVELINDO MAKMUR" disabled>
                </div>
                <div class="form-group col-md-6">
                    <input type="text" class="form-control" name="norektravelen" value="BNI: 0987566546778" disabled>
                </div>
            </div>

            <div class="row">
                <div class="form-group col-md-12">
                    <button type="submit" class="btn btn-primary pull-right" name="donateNow" >Kirim</button>
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
    //<!-- Bayar Modal -->
    $(document).ready(function() {
        // Untuk sunting
        $("#bayarModal").on("show.bs.modal", function (event) {
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan

            // Isi nilai pada field
            $('#idjadwal').val(div.data('jadwal'));
        });
    });

    function preview() {
        var foto = document.getElementById("bukti").files[0];

        var reader = new FileReader();

        reader.onload = function(e) {
            // get loaded data and render thumbnail.
            document.getElementById("image").src = e.target.result;
        };

        // read the image file as a data URL.
        reader.readAsDataURL(foto);

    }
</script>