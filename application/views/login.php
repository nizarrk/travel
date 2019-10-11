<?php $this->load->view('_partials/head.php'); ?>
<?php $this->load->view('_partials/nav.php'); ?>

<div class="page-heading text-center">

    <div class="container zoomIn animated">
        
        <h1 class="page-title">Login <span class="title-under"></span></h1>
        <p class="page-description">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit Necessitatibus.
        </p>
        
    </div>

</div>

<div class="main-container fadeIn animated">

    <div class="container">

        <div class="row">

            <div style="margin-left: 250px; margin-right: 250px;">

                <h2 class="title-style-2">LOGIN FORM <span class="title-under"></span></h2>

                <form action="php/mail.php" class="contact-form ajax-form">

                    <div class="form-group">
                        <input type="text" name="name" class="form-control" placeholder="Name*" required>
                    </div>

                        <div class="form-group">
                        <input type="email" name="email" class="form-control" placeholder="E-mail*" required>
                    </div>

                    <div class="form-group alerts">
                    
                        <div class="alert alert-success" role="alert">
                            
                        </div>

                        <div class="alert alert-danger" role="alert">
                            
                        </div>
                        
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