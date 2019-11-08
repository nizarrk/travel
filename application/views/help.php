<?php $this->load->view('_partials/head.php'); ?>
<?php if($this->session->userdata('nama_user')) {
    $this->load->view('_partials/nav-user.php');
} else {
    $this->load->view('_partials/nav.php');
    }  ?>

<div class="container">
    <div class="row centered mt mb">
        <h2 class="title-style-1">Cara Booking & Bayar <span class="title-under"></span></h2>
        <br>
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4 gallery">
                <img src="<?=base_url('assets/images/help/1.png')?>" class="img-responsive">
                    
                    <p style="padding: 10px;">
                            1. User memilih menu login yang tersedia menggunakan akun yang telah terdaftar.
                    </p>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 gallery">
                <img src="<?=base_url('assets/images/help/2.png')?>" class="img-responsive">
                    
                    <p style="padding: 10px;">
                            2. User memilih jadwal sesuai dengan yang diinginkan.
                    </p>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 gallery">
                <img src="<?=base_url('assets/images/help/3.png')?>" class="img-responsive">
                    
                    <p style="padding: 10px;">
                            3. Pilih salah satu jadwal yang tersedia dengan memilih tombol Booking.
                    </p>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4 gallery">
                <img src="<?=base_url('assets/images/help/4.png')?>" class="img-responsive">
                    
                    <p style="padding: 10px;">
                            4. User harus memasukkan alamat yang digunkana untuk penjemputan.
                    </p>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 gallery">
                <img src="<?=base_url('assets/images/help/5.png')?>" class="img-responsive">
                    
                    <p style="padding: 10px;">
                            5. Berhasil user akan di arahakan ke halaman sukses dan memilih tombol pembayaran.
                    </p>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 gallery">
                <img src="<?=base_url('assets/images/help/6.png')?>" class="img-responsive">
                    
                    <p style="padding: 10px;">
                            6. User melakukan konfirmasi jadwal yang dipilih dengan memilih tombol Bayar.
                    </p>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4 gallery">
                <img src="<?=base_url('assets/images/help/7.png')?>" class="img-responsive">
                    
                    <p style="padding: 10px;">
                            7. User harus mengisi form yang tersedia terkait untuk bukti pembayaran.
                    </p>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 gallery">
                <img src="<?=base_url('assets/images/help/8.png')?>" class="img-responsive">
                    
                    <p style="padding: 10px;">
                            8. User menunggu sampai status berubah menjadi selesai.
                    </p>
            </div>
        </div>
        
        
    </div><!--/row -->
</div><!--/container -->

<?php $this->load->view('_partials/footer.php'); ?>
<?php $this->load->view('_partials/js.php'); ?>