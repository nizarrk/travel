<?php $this->load->view('_partials/head.php'); ?>
<?php $this->load->view('_partials/nav.php'); ?>

<div class="page-heading text-center">

    <div class="container zoomIn animated">
        
        <h1 class="page-title">Login <span class="title-under"></span></h1>
        
    </div>

</div>

<div class="main-container fadeIn animated">

    <div class="container">

    <!-- jalankan validasi pesan -->
    <?php if($this->session->flashdata('fail')) { ?>
        <div style="margin-left: 250px; margin-right: 250px;" class="alert alert-warning" role="alert">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <h4>Peringatan!</h4>
            <?php echo $this->session->flashdata('fail'); ?>
        </div>
    <?php  
                }
        else if($this->session->flashdata('success')) {?>
            <div style="margin-left: 250px; margin-right: 250px;" class="alert alert-success" role="alert">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <h4>Sukses!</h4>
            <?php echo $this->session->flashdata('success'); ?>
        </div>
    <?php }; ?>
    <!-- End validasi -->

        <div class="row">

            <div style="margin-left: 250px; margin-right: 250px;">

                <h2 class="title-style-2">LOGIN FORM <span class="title-under"></span></h2>

                <form action="<?= base_url('User/login') ?>" method="post" class="contact-form">

                    <div style="margin-bottom: 15px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="login-username" class="form-control" name="username" value="" placeholder="Username" type="text" required>                                        
                    </div>
                        
                    <div style="margin-bottom: 10px" class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input id="login-password" class="form-control" name="password" placeholder="Password" type="password" required>
                    </div>

                    
                    <p>
                        <b>Belum punya akun?</b> Klik <b><a href="<?= base_url('User/register') ?>">disini</a></b> untuk melakukan pendaftaran dan menikmati fitur dari Travelen.
                    </p>
                        <div class="form-group">
                        <button type="submit" class="btn btn-primary pull-right">Login</button>
                    </div>

                    <div class="clearfix"></div>

                </form>

            </div>

        </div> <!-- /.row -->


    </div>

</div>

<?php $this->load->view('_partials/footer.php'); ?>
<?php $this->load->view('_partials/js.php'); ?>