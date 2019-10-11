<?php $this->load->view('_partials/head.php'); ?>
<?php $this->load->view('_partials/nav.php'); ?>

<div class="page-heading text-center">

    <div class="container zoomIn animated">
        
        <h1 class="page-title">Register <span class="title-under"></span></h1>
        <p class="page-description">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit Necessitatibus.
        </p>
        
    </div>

</div>

<div class="main-container fadeIn animated">

    <div class="container">

        <div class="row">

            <div style="margin-left: 250px; margin-right: 250px;">

                <h2 class="title-style-2">REGISTER FORM <span class="title-under"></span></h2>

                <form action="php/mail.php" class="contact-form ajax-form">

                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" class="form-control" placeholder="Nama*" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" name="alamat" class="form-control" placeholder="Alamat*" required>
                    </div>
                    <div class="form-group">
                        <label for="telp">No. HP</label>
                        <input type="text" name="telp" class="form-control" placeholder="No. HP*" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" class="form-control" placeholder="Email*" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password*" required>
                    </div>
                    <div class="form-group">
                        <label for="konfirm">Konfirmasi Password</label>
                        <input type="password" name="konfirm" class="form-control" placeholder="Konfirmasi Password*" required>
                    </div>

                    <div class="form-group alerts">
                    
                        <div class="alert alert-success" role="alert">
                            
                        </div>

                        <div class="alert alert-danger" role="alert">
                            
                        </div>
                        
                    </div>

                        <div class="form-group">
                        <button type="submit" class="btn btn-primary pull-right">Daftar</button>
                    </div>

                    <div class="clearfix"></div>

                </form>

            </div>

        </div> <!-- /.row -->


    </div>

</div>

<?php $this->load->view('_partials/footer.php'); ?>
<?php $this->load->view('_partials/js.php'); ?>