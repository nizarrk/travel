<?php $this->load->view('_partials/head.php'); ?>
<?php $this->load->view('_partials/nav-admin.php'); ?>

<div class="container fadeIn">

    <h2 class="title-style-2">Daftar Kota<span class="title-under"></span></h2>

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

    <a href="#" data-toggle="modal" data-target="#modal-add" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Tambah</a>
    <br><br>
    <table class="table table-style-1">
        <thead>
        <tr>
            <th>#</th>
            <th>Nama Kota</th>
            <th>Harga</th>
            <th>Aksi</th>
        </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($cities as $city) {
            ?>
        <tr>
            <th scope="row"><?= $no ?></th>
            <td><?= $city->nama_kota ?></td>
            <td><?= "Rp. " . $city->harga_kota ?></td>
            <td>
                <a href="#" 
                    data-id="<?= $city->id_kota ?>"
                    data-nama="<?= $city->nama_kota ?>"
                    data-harga="<?= $city->harga_kota ?>"
                    data-toggle="modal" 
                    data-target="#modal-edit"
                    class="btn btn-warning">
                    <i class="glyphicon glyphicon-pencil"></i> Edit
                </a>
                <a href="#" 
                    data-id="<?= $city->id_kota ?>"
                    data-nama="<?= $city->nama_kota ?>"
                    data-toggle="modal" 
                    data-target="#modal-delete" 
                    class="btn btn-danger">
                    <i class="glyphicon glyphicon-trash"></i> Hapus</a>
            </td>
        </tr>
            <?php $no++; 
            }; ?>
        </tbody>
    </table>

</div>

<!-- Add Modal -->
<div class="modal fade" id="modal-add" tabindex="-1" role="dialog" aria-hidden="true">

<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title" id="donateModalLabel">Tambah Kota</h4>
    </div>
    <div class="modal-body">

        <form class="form-donation" method="post" action="<?=base_url('admin/Kota/add')?>">

            <div class="row">

                <div class="form-group col-md-12 ">
                    <label for="nama">Nama Kota</label>
                    <input type="text" name="nama" class="form-control" placeholder="Nama Kota">
                </div>

            </div>

            <div class="row">

                <div class="form-group col-md-12 ">
                    <label for="harga">Harga</label>
                    <input type="text" name="harga" class="form-control" placeholder="Harga">
                </div>

            </div>

            <div class="row">

                <div class="form-group col-md-12">
                    <button type="submit" class="btn btn-primary pull-right" >Tambah</button>
                </div>

            </div>
                
        </form>
      
    </div>
  </div>
</div>

</div> <!-- /.modal -->

<!-- Edit Modal -->
<div class="modal fade" id="modal-edit" tabindex="-1" role="dialog" aria-hidden="true">

<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title" id="donateModalLabel">Edit Kota</h4>
    </div>
    <div class="modal-body">

        <form class="form-donation" method="post" action="<?=base_url('admin/Kota/edit')?>">

        <div class="row">

                <div class="form-group col-md-12 ">
                    <input type="hidden" name="id" id="idkota" class="form-control" placeholder="Nama Kota">
                </div>

            </div>

            <div class="row">

                <div class="form-group col-md-12 ">
                    <label for="nama">Nama Kota</label>
                    <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama Kota">
                </div>

            </div>

            <div class="row">

                <div class="form-group col-md-12 ">
                    <label for="harga">Harga</label>
                    <input type="text" name="harga" id="harga" class="form-control" placeholder="Harga">
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

<!-- Delete Modal -->
<div class="modal fade" id="modal-delete" tabindex="-1" role="dialog" aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="donateModalLabel">Hapus Kota</h4>
            </div>
            <div class="modal-body">
                <p id="text"></p>

                <form class="form-donation" method="post" action="<?=base_url('admin/Kota/delete')?>">

                    <div class="row">

                        <div class="form-group col-md-12 ">
                            <input type="hidden" name="id" id="iddelete" class="form-control">
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
        $("#modal-edit").on("show.bs.modal", function (event) {
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan

            // Isi nilai pada field
            $(this).find('#idkota').attr("value", div.data('id'));
            $(this).find('#nama').attr("value", div.data('nama'));
            $(this).find('#harga').attr("value", div.data('harga'));
        });
    });

    $(document).ready(function() {
        // Untuk sunting
        $("#modal-delete").on("show.bs.modal", function (event) {
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan

            // Isi nilai pada field
            $(this).find('#text').html("Apakah Anda Yakin ingin menghapus Kota <b>" + div.data('nama') + "</b>?");
            $(this).find('#iddelete').attr("value", div.data('id'));
        });
    });
</script>