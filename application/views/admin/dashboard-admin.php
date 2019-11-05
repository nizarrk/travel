<?php $this->load->view('_partials/head.php'); ?>
<?php $this->load->view('_partials/nav-admin.php'); ?>

<div class="section-home our-causes fadeIn">

        <div class="container">

            <h2 class="title-style-1">Manage Travel<span class="title-under"></span></h2>

            <div class="row">

                <div class="col-md-3 col-sm-6">

                    <div class="cause">

                        <img src="<?=base_url('assets/images/map.jpg')?>" alt="" class="cause-img">

                        <h4 class="cause-title"><a href="<?=base_url('admin/Kota')?>">KOTA</a></h4>
                        <div class="cause-details">
                            Atur dan tambahkan kota tujuan yang dijangkau oleh travel.
                        </div>

                    </div> <!-- /.cause -->
                    
                </div> 

                <div class="col-md-3 col-sm-6">

                    <div class="cause">

                        <img src="<?=base_url('assets/images/bus.jpg')?>" alt="" class="cause-img">

                        <h4 class="cause-title"><a href="<?=base_url('Admin/kendaraan')?>">KENDARAAN</a></h4>
                        <div class="cause-details">
                        Atur dan tambahkan kendaraan yang dimiliki oleh travel.
                        </div>

                    </div> <!-- /.cause -->
                    
                </div>


                <div class="col-md-3 col-sm-6">

                    <div class="cause">

                        <img src="<?=base_url('assets/images/booking.jpg')?>" alt="" class="cause-img">

                        <h4 class="cause-title"><a href="<?=base_url('Admin/booking')?>">BOOKING</a></h4>
                        <div class="cause-details">
                        Atur dan lihat status pemesanan pelanggan travel.
                        </div>

                    </div> <!-- /.cause -->
                    
                </div>

                <div class="col-md-3 col-sm-6">

                    <div class="cause">

                        <img src="<?=base_url('assets/images/pembayaran.jpg')?>" alt="" class="cause-img">

                        <h4 class="cause-title"><a href="<?=base_url('Admin/booking/pembayaran')?>">PEMBAYARAN</a></h4>
                        <div class="cause-details">
                        Atur dan lihat daftar pengguna travel.
                        </div>

                    </div> <!-- /.cause -->
                    
                </div>

            </div>

        </div>
        
    </div> <!-- /.our-causes -->

<?php $this->load->view('_partials/footer.php'); ?>
<?php $this->load->view('_partials/js.php'); ?>