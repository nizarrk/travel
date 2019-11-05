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

    <div class="form-group alerts">
                    
        <?php if ($this->session->flashdata('fail')){ ?>
            <div class="alert alert-warning" role="alert">
                <?php echo $this->session->flashdata('fail'); ?>
            </div>
        <?php } ?>
        
    </div>

        <div class="row">

            <div style="margin-left: 250px; margin-right: 250px;">

                <h2 class="title-style-2">REGISTER FORM <span class="title-under"></span></h2>
                <form action="<?=base_url('User/add')?>" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input class="form-control <?php echo form_error('nama') ? 'is-invalid':'' ?>" type="text" name="nama" class="form-control" placeholder="Nama*" value="<?=set_value('nama')?>" required>
                        <div class="invalid-feedback" style="color:red">
                            <small><?php echo form_error('nama') ?></small>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="username">Username</label>
                        <input class="form-control <?php echo form_error('username') ? 'is-invalid':'' ?>" type="text" name="username" class="form-control" placeholder="username*" value="<?=set_value('username')?>" required>
                        <div class="invalid-feedback" style="color:red">
                            <small><?php echo form_error('username') ?></small>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input class="form-control <?php echo form_error('alamat') ? 'is-invalid':'' ?>" type="text" name="alamat" class="form-control" placeholder="Alamat*" value="<?=set_value('alamat')?>" required>
                        <div class="invalid-feedback" style="color:red">
                            <small><?php echo form_error('alamat') ?></small>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="telp">No. HP</label>
                        <input class="form-control <?php echo form_error('telp') ? 'is-invalid':'' ?>" type="text" name="telp" class="form-control" placeholder="No. HP*" value="<?=set_value('telp')?>" required>
                        <div class="invalid-feedback" style="color:red">
                            <small><?php echo form_error('telp') ?></small>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input class="form-control <?php echo form_error('email') ? 'is-invalid':'' ?>" type="email" name="email" class="form-control" placeholder="Email*" value="<?=set_value('email')?>" required>
                        <div class="invalid-feedback" style="color:red">
                            <small><?php echo form_error('email') ?></small>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input class="form-control <?php echo form_error('password') ? 'is-invalid':'' ?>" type="password" name="password" class="form-control" placeholder="Password*" value="<?=set_value('password')?>" required>
                        <div class="invalid-feedback" style="color:red">
                            <small><?php echo form_error('password') ?></small>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="konfirm">Konfirmasi Password</label>
                        <input class="form-control <?php echo form_error('konfirm') ? 'is-invalid':'' ?>" type="password" name="konfirm" class="form-control" placeholder="Konfirmasi Password*" value="<?=set_value('konfirm')?>" required>
                        <div class="invalid-feedback" style="color:red">
                            <small><?php echo form_error('konfirm') ?></small>
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