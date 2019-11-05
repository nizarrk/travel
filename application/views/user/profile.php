<?php $this->load->view('_partials/head.php'); ?>
<?php $this->load->view('_partials/nav-user.php'); ?>

<div class="container">
    <h2 class="title-style-1">Profile User <span class="title-under"></span></h2>

    <!-- jalankan validasi pesan -->
    <?php if($this->session->flashdata('fail')) { ?>
        <div class="alert alert-warning" role="alert">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <h4>Peringatan!</h4>
            <?= $this->session->flashdata('fail'); ?> <br>
            <?= validation_errors(); ?>
        </div>
    <?php  
                }
        else if($this->session->flashdata('success')) {?>
            <div class="alert alert-success" role="alert">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <h4>Sukses!</h4>
            <?= $this->session->flashdata('success'); ?>
        </div>
    <?php }; ?>
    <!-- End validasi -->

    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                <a 
                href="#" 
                data-nama="<?=$user->nama_user?>"
                data-username="<?=$user->username_user?>"
                data-alamat="<?=$user->alamat_user?>"
                data-email="<?=$user->email_user?>"
                data-telp="<?=$user->telp_user?>"
                data-oldfoto="<?=$user->foto_user?>"
                data-foto="<?=base_url()?>upload/user/<?= $user->foto_user?>"
                data-toggle="modal" 
                data-target="#modal-profile" 
                class="pull-right">
                    <i class="glyphicon glyphicon-edit"></i> 
                    Edit Profile
                </a>
                <h3 class="panel-title"><?= $user->nama_user; ?></h3>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="picture">
                        <div class="col-md-3 col-lg-3">
                            <figure>
                                <a href="<?=base_url()?>upload/user/<?= $user->foto_user; ?>" itemprop="contentUrl" data-size="480x480" data-index="0">
                                    <img class="img-responsive" src="<?=base_url()?>upload//user/<?= $user->foto_user; ?>">
                                </a>
                            <figure>
                        </div>
                    </div>
                    <div class=" col-md-9 col-lg-9 "> 
                        <table id="table_id" class="table table-user-information">
                            <tbody>
                                <tr>
                                    <td>Username</td>
                                    <td>:</td>
                                    <td><?= $user->username_user; ?></td>
                                </tr>
                                <tr>
                                    <td>Alamat</td>
                                    <td>:</td>
                                    <td><?= $user->alamat_user; ?></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>:</td>
                                    <td>
                                        <a href="mailto:<?= $user->email_user; ?>"><?=  $user->email_user; ?></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Telepon</td>
                                    <td>:</td>
                                    <td><?= $user->telp_user; ?></td>
                                </tr>
                                <tr>
                                    <?php
                                    $tgl = strtotime($user->created_at); ?>
                                    <td>Member Sejak</td>
                                    <td>:</td>
                                    <td><?=  date("d M Y", $tgl); ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="panel-footer">
                <button class="btn btn-default" data-id="<?=$user->id_user?>" data-toggle="modal" data-target="#modal-password"><i class="glyphicon glyphicon-cog"></i> Ganti Password</button>
            </div>
        </div>
    </div>
</div>

<!-- Edit Profile Modal -->
<div class="modal fade" id="modal-profile" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="donateModalLabel">Edit Profile</h4>
            </div>
            <div class="modal-body">
                <form class="form-donation" method="post" action="<?=base_url('User/editProfile')?>" enctype="multipart/form-data">

                <div class="row">
                    <div class="form-group col-md-12 ">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama Kota">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-12 ">
                        <label for="username">Username</label>
                        <input type="text" name="username" id="username" class="form-control" placeholder="Username">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-12 ">
                        <label for="alamat">Alamat</label>
                        <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Alamat">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-12 ">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Email">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-12 ">
                        <label for="telp">Telepon</label>
                        <input type="text" name="telp" id="telp" class="form-control" placeholder="Telepon">
                    </div>
                </div>

                <div class="row">
                <div class="form-group col-md-6 ">
                    <label class="control-label">Foto</label>
                    <input type="hidden" class="form-control" name="oldfoto" id="oldfoto">
                    <input class="form-control" name="foto" type="file" id="foto" accept="image/*" onchange="preview()" />
                </div>
                <div class="form-group col-md-6">
                    <img style="max-height: 100px; max-width:100px;" id="image" />
                </div>
            </div>

                <div class="row">
                    <div class="form-group col-md-12">
                        <button type="submit" class="btn btn-primary pull-right" >Edit</button>
                    </div>
                </div>
                
                </form>
            </div>
        </div>
    </div>
</div> <!-- /.modal -->

<!-- Edit Password Modal -->
<div class="modal fade" id="modal-password" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="donateModalLabel">Edit Password</h4>
            </div>
            <div class="modal-body">
                <form class="form-donation" method="post" action="<?=base_url('User/editPassword')?>">

                <div class="row">
                    <div class="form-group col-md-12 ">
                        <label for="oldpass">Password Lama</label>
                        <input type="password" name="oldpass" id="oldpass" class="form-control" placeholder="Password Lama">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-12 ">
                        <label for="newpass">Password Baru</label>
                        <input type="password" name="newpass" id="newpass" class="form-control" placeholder="Password Baru">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-12 ">
                        <label for="konfirm">Konfirmasi Password Baru</label>
                        <input type="password" name="konfirm" id="konfirm" class="form-control" placeholder="Konfirmasi Password Baru">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-12">
                        <button type="submit" class="btn btn-primary pull-right" >Edit</button>
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
        $("#modal-profile").on("show.bs.modal", function (event) {
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan

            // Isi nilai pada field
            $('#nama').val(div.data('nama'));
            $('#username').val(div.data('username'));
            $('#alamat').val(div.data('alamat'));
            $('#email').val(div.data('email'));
            $('#telp').val(div.data('telp'));
            $('#oldfoto').val(div.data('oldfoto'));
            $('#image').attr('src', div.data('foto'));
        });
    });

    function preview() {
        var foto = document.getElementById("foto").files[0];

        var reader = new FileReader();

        reader.onload = function(e) {
            // get loaded data and render thumbnail.
            document.getElementById("image").src = e.target.result;
        };

        // read the image file as a data URL.
        reader.readAsDataURL(foto);

    }
</script>