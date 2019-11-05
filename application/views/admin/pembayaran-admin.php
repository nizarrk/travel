<?php $this->load->view('_partials/head.php'); ?>
<?php $this->load->view('_partials/nav-admin.php'); ?>

<div class="container fadeIn">

    <h2 class="title-style-2">Daftar Pembayaran<span class="title-under"></span></h2>

    <!-- jalankan validasi pesan -->
    <?php if($this->session->flashdata('fail')) { ?>
        <div class="alert alert-warning" role="alert">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <h4>Peringatan!</h4>
            <?php echo $this->session->flashdata('fail'); ?>
        </div>
    <?php  
                }
        else if($this->session->flashdata('success')) {?>
            <div class="alert alert-success" role="alert">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <h4>Sukses!</h4>
            <?php echo $this->session->flashdata('success'); ?>
        </div>
    <?php }; ?>
    <!-- End validasi -->

    <table class="table table-style-1">
        <thead>
            <tr>
                <th>#</th>
                <th>Kode Jadwal</th>
                <th>Kode Pembayaran</th>
                <th>No. Rekening User</th>
                <th>Nama Rekening User</th>
                <th>Nominal Pembayaran</th>
                <th>Tanggal Pembayaran</th>
                <th>Bukti Pembayaran</th>
                <th>Status Pembayaran</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            if (empty($payments)) {
                echo "<th></th><th></th><th></th><th></th><th></th><th> Tidak Ada Data </th><th></th><th></th><th></th><th></th>";
            } else {
                foreach ($payments as $payment) {
            ?>
        <tr>
            <th scope="row"><?= $no ?></th>
            <td><?= $payment->kode_jadwal ?></td>
            <td><?= $payment->kode_pembayaran ?></td>
            <td><?= $payment->no_rek_user ?></td>
            <td><?= $payment->nama_rek_user ?></td>
            <td>Rp. <?= $payment->nominal_pembayaran ?></td>
            <td><?= date("d M Y H:i:s", strtotime($payment->tgl_pembayaran)) ?></td>
            <td>
                <img src="<?=base_url()?>/upload/pembayaran/<?=$payment->bukti_pembayaran?>" alt="<?=$payment->bukti_pembayaran?>" style="max-width: 150px;">
                <?= $payment->bukti_pembayaran ?></td>
            <td>
                <?php if ($payment->status_pembayaran == "Menunggu Konfirmasi") { ?>
                    <span class="badge" style="background-color: #428df5;"><?= $payment->status_pembayaran ?></span>
                <?php } else if ($payment->status_pembayaran == "Diterima") { ?>
                    <span class="badge" style="background-color: #42f55d;"><?= $payment->status_pembayaran ?></span>
                <?php } else { ?>
                    <span class="badge" style="background-color: #f56042;"><?= $payment->status_pembayaran ?></span>
                <?php } ?>
            </td>
            <td>
                <?php if ($payment->status_pembayaran == "Menunggu Konfirmasi") { ?>
                    <a href="#"
                        id="buttontolak"
                        data-jadwal="<?=$payment->id_jadwal?>"
                        data-pembayaran="<?=$payment->id_pembayaran?>"
                        data-user="<?=$payment->id_user?>"
                        data-kode="<?=$payment->kode_pembayaran?>"
                        data-booking="<?=$payment->kode_jadwal?>"
                        data-toggle="modal" 
                        data-target="#batalkanModal"
                        class="btn btn-danger"> Batalkan
                    </a>
                    <a href="#"
                        id="buttonterima"
                        data-jadwal="<?=$payment->id_jadwal?>"
                        data-pembayaran="<?=$payment->id_pembayaran?>"
                        data-kode="<?=$payment->kode_pembayaran?>"
                        data-booking="<?=$payment->kode_jadwal?>"                        
                        data-user="<?=$payment->id_user?>"
                        data-toggle="modal" 
                        data-target="#terimaModal"
                        class="btn btn-success"> Terima
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

<!-- Batalkan Modal -->
<div class="modal fade" id="batalkanModal" tabindex="-1" role="dialog" aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Konfirmasi</h4>
            </div>
            <div class="modal-body">
                <p id="textbatal"></p>

                <form class="form-donation" method="post" action="<?=base_url('admin/Booking/tolakPembayaran')?>">

                    <div class="row">

                        <div class="form-group col-md-12 ">
                            <input type="hidden" name="jadwal" id="idjadwal" class="form-control">
                            <input type="hidden" name="pembayaran" id="idpembayaran" class="form-control">
                            <input type="hidden" name="kode" id="kode" class="form-control">
                            <input type="hidden" name="user" id="iduser" class="form-control">
                            <input type="hidden" name="booking" id="kodebooking" class="form-control">
                        </div>

                    </div>

                    <div class="row">

                        <div class="form-group col-md-12">
                            <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Tidak</button>
                            <button style="margin-right: 3px;" type="submit" class="btn btn-warning pull-right" >Ya</button>
                        </div>

                    </div>
                        
                </form>
            
            </div>
        </div>
    </div>

</div> <!-- /.modal -->

<!-- Terima Modal -->
<div class="modal fade" id="terimaModal" tabindex="-1" role="dialog" aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title">Konfirmasi</h4>
            </div>
            <div class="modal-body">
                <p id="textterima"></p>

                <form class="form-donation" method="post" action="<?=base_url('admin/Booking/terimaPembayaran')?>">

                    <div class="row">

                        <div class="form-group col-md-12 ">
                            <input type="hidden" name="jadwal" id="idjadwal" class="form-control">
                            <input type="hidden" name="pembayaran" id="idpembayaran" class="form-control">
                            <input type="hidden" name="kode" id="kode" class="form-control">
                            <input type="hidden" name="user" id="iduser" class="form-control">
                            <input type="hidden" name="booking" id="kodebooking" class="form-control">
                        </div>

                    </div>

                    <div class="row">

                        <div class="form-group col-md-12">
                            <button type="button" class="btn btn-default pull-right" data-dismiss="modal">Tidak</button>
                            <button style="margin-right: 3px;" type="submit" class="btn btn-warning pull-right" >Ya</button>
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
    $(document).ready(function() {
        // Untuk sunting
        $("#batalkanModal").on("show.bs.modal", function (event) {
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan

            // Isi nilai pada field
            $(this).find('#textbatal').html("Apakah anda yakin ingin membatalkan pembayaran booking <b>" + div.data('kode') + "</b>?");
            $(this).find('#idjadwal').val(div.data('jadwal'));
            $(this).find('#idpembayaran').val(div.data('pembayaran'));
            $(this).find('#kode').val(div.data('kode'));
            $(this).find('#iduser').val(div.data('user'));
            $(this).find('#kodebooking').val(div.data('booking'));

        });
    });

    $(document).ready(function() {
        // Untuk sunting
        $("#terimaModal").on("show.bs.modal", function (event) {
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan

            // Isi nilai pada field
            $(this).find('#textterima').html("Apakah anda yakin ingin menerima pembayaran booking <b>" + div.data('kode') + "</b>?");
            $(this).find('#idjadwal').val(div.data('jadwal'));
            $(this).find('#idpembayaran').val(div.data('pembayaran'));
            $(this).find('#kode').val(div.data('kode'));
            $(this).find('#iduser').val(div.data('user'));
            $(this).find('#kodebooking').val(div.data('booking'));
        });
    });
</script>