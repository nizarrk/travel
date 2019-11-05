<?php $this->load->view('_partials/head.php'); ?>
<?php $this->load->view('_partials/nav-user.php'); ?>

<div class="container">
    <div class="row">
        <h2 class="title-style-1">Terima Kasih <span class="title-under"></span></h2>
    </div>

    <div class="row">
        <center>
            <img src="<?=base_url('assets/images/travelen-logo-blue.png')?>" style="width: 350px;" class="img-responsive">
            <br>
        </center>
    </div>

    <div class="row">
        <center>
            <p>Terima Kasih Telah melakukan booking menggunakan layanan Travelen. Anda diharapkan segera melakukan transaksi (Maksimal 2 jam setelah booking) untuk validasi booking anda.</p><br>
            
        </center>
    </div>

    <div class="row" style="margin-bottom: 30px;">
        <center>
            <a href="<?=base_url('Jadwal/history')?>" class="btn btn-default">Pembayaran</a>
            <a href="<?=base_url('Home')?>" class="btn btn-default">Kembali</a>
        </center>
    </div>
    
</div>

<?php $this->load->view('_partials/footer.php'); ?>
<?php $this->load->view('_partials/js.php'); ?>
