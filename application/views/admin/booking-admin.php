<?php $this->load->view('_partials/head.php'); ?>
<?php $this->load->view('_partials/nav-admin.php'); ?>

<div class="container fadeIn">

    <h2 class="title-style-2">Daftar Booking<span class="title-under"></span></h2>

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
                <th>Kendaraan</th>
                <th>Warna</th>
                <th>Plat Nomor</th>
                <th>Kota</th>
                <th>Tanggal</th>
                <th>Tanggal Pesan</th>
                <th>Total Biaya</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            if (empty($bookings)) {
                echo "<th></th><th></th><th></th><th></th><th></th><th> Tidak Ada Data </th><th></th><th></th><th></th><th></th>";
            } else {
                foreach ($bookings as $booking) {
            ?>
        <tr>
            <th scope="row"><?= $no ?></th>
            <td><?= $booking->kode_jadwal ?></td>
            <td><?= $booking->nama_kendaraan ?></td>
            <td><?= $booking->warna_kendaraan ?></td>
            <td><?= $booking->plat_kendaraan ?></td>
            <td><?= $booking->nama_kota ?></td>
            <td><?= date("d M Y", strtotime($booking->tgl_berangkat)) ?> - <?= date("d M Y", strtotime($booking->tgl_pulang)) ?></td>
            <td><?= date("d M Y H:i:s", strtotime($booking->tgl_pesan)) ?></td>
            <td>Rp. <?= $booking->total_biaya ?></td>
            <td>
                <?php if ($booking->status_jadwal == "Menunggu Pembayaran") { ?>
                    <span class="badge" style="background-color: #f5bc42;"><?= $booking->status_jadwal ?></span>
                <?php } else if ($booking->status_jadwal == "Menunggu Konfirmasi") { ?>
                    <span class="badge" style="background-color: #428df5;"><?= $booking->status_jadwal ?></span>
                <?php } else if ($booking->status_jadwal == "Selesai") { ?>
                    <span class="badge" style="background-color: #42f55d;"><?= $booking->status_jadwal ?></span>
                <?php } else { ?>
                    <span class="badge" style="background-color: #f56042;"><?= $booking->status_jadwal ?></span>
                <?php } ?>
            </td>
            <td>
                <?php if ($booking->status_jadwal == "Menunggu Pembayaran") { ?>
                    <a href="#"
                        id="buttontolak"
                        data-jadwal="<?=$booking->id_jadwal?>"
                        data-user="<?=$booking->id_user?>"
                        data-kode="<?=$booking->kode_jadwal?>"
                        data-toggle="modal" 
                        data-target="#batalkanModal"
                        class="btn btn-danger"> Batalkan
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
                <p id="text"></p>

                <form class="form-donation" method="post" action="<?=base_url('admin/Booking/konfirmasiBooking')?>">

                    <div class="row">

                        <div class="form-group col-md-12 ">
                            <input type="hidden" name="id" id="idjadwal" class="form-control">
                            <input type="hidden" name="user" id="iduser" class="form-control">
                            <input type="hidden" name="kode" id="kode" class="form-control">
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
            $('#text').html("Apakah anda yakin ingin membatalkan booking <b>" + div.data('kode') + "</b>?");
            $('#idjadwal').val(div.data('jadwal'));
            $('#kode').val(div.data('kode'));
            $('#iduser').val(div.data('user'));
        });
    });
</script>