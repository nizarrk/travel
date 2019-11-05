<?php $this->load->view('_partials/head.php'); ?>
<?php $this->load->view('_partials/nav-admin.php'); ?>

<div class="container fadeIn">
    <div role="tabpanel">

        <!-- Nav tabs -->
        <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#kategori" aria-controls="kategori" role="tab" data-toggle="tab">Kategori</a></li>
            <li role="presentation"><a href="#kendaraan" aria-controls="kendaraan" role="tab" data-toggle="tab">Kendaraan</a></li>
        </ul>

        <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="kategori">
                <h2 class="title-style-2">Daftar Kategori<span class="title-under"></span></h2>

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

                <a href="#" data-toggle="modal" data-target="#modal-add-kategori" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Tambah</a>
                <br><br>
                <table class="table table-style-1">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Kategori</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($categories as $category) {
                        ?>
                    <tr>
                        <th scope="row"><?= $no ?></th>
                        <td><?= $category->nama_kategori ?></td>
                        <td>
                            <a href="#" 
                                data-id="<?= $category->id_kategori ?>"
                                data-nama="<?= $category->nama_kategori ?>"
                                data-toggle="modal" 
                                data-target="#modal-edit-kategori"
                                class="btn btn-warning">
                                <i class="glyphicon glyphicon-pencil"></i> Edit
                            </a>
                            <a href="#" 
                                data-id="<?= $category->id_kategori ?>"
                                data-nama="<?= $category->nama_kategori ?>"
                                data-toggle="modal" 
                                data-target="#modal-delete-kategori" 
                                class="btn btn-danger">
                                <i class="glyphicon glyphicon-trash"></i> Hapus</a>
                        </td>
                    </tr>
                        <?php $no++; 
                        }; ?>
                    </tbody>
                </table>
            </div>
            <div role="tabpanel" class="tab-pane" id="kendaraan">
                <h2 class="title-style-2">Daftar Kendaraan<span class="title-under"></span></h2>

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
                        <th>Kategori</th>
                        <th>Nama</th>
                        <th>Warna</th>
                        <th>Plat Nomor</th>
                        <th>Jumlah Penumpang</th>
                        <th>Harga</th>
                        <th>Aksi</th>
                    </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($vehicles->result() as $vehicle) {
                        ?>
                    <tr>
                        <th scope="row"><?= $no ?></th>
                        <td><?= $vehicle->nama_kategori ?></td>
                        <td><?= $vehicle->nama_kendaraan ?></td>
                        <td><?= $vehicle->warna_kendaraan ?></td>
                        <td><?= $vehicle->plat_kendaraan ?></td>
                        <td><?= $vehicle->jumlah_penumpang_kendaraan ?></td>
                        <td><?= "Rp. " . $vehicle->harga_kendaraan ?></td>
                        <td>
                            <a href="#" 
                                data-id="<?= $vehicle->id_kendaraan ?>"
                                data-kategori="<?= $vehicle->id_kategori ?>"
                                data-nama="<?= $vehicle->nama_kendaraan ?>"
                                data-warna="<?= $vehicle->warna_kendaraan ?>"
                                data-plat="<?= $vehicle->plat_kendaraan ?>"
                                data-penumpang="<?= $vehicle->jumlah_penumpang_kendaraan ?>"
                                data-harga="<?= $vehicle->harga_kendaraan ?>"
                                data-toggle="modal" 
                                data-target="#modal-edit"
                                class="btn btn-warning">
                                <i class="glyphicon glyphicon-pencil"></i> Edit
                            </a>
                            <a href="#" 
                                data-id="<?= $vehicle->id_kendaraan ?>"
                                data-nama="<?= $vehicle->nama_kendaraan ?>"
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
        </div>

    </div>

</div>

<!-- Add Kategori Modal -->
<div class="modal fade" id="modal-add-kategori" tabindex="-1" role="dialog" aria-hidden="true">

<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title" id="donateModalLabel">Tambah Kategori</h4>
    </div>
    <div class="modal-body">

        <form class="form-donation" method="post" action="<?=base_url('admin/Kendaraan/addKategori')?>">

            <div class="row">

                <div class="form-group col-md-12 ">
                    <label for="nama">Nama Kategori</label>
                    <input type="text" name="nama" class="form-control" placeholder="Nama Kategori">
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

<!-- Edit Kategori Modal -->
<div class="modal fade" id="modal-edit-kategori" tabindex="-1" role="dialog" aria-hidden="true">

<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title" id="donateModalLabel">Edit Kategori</h4>
    </div>
    <div class="modal-body">

        <form class="form-donation" method="post" action="<?=base_url('admin/Kendaraan/editKategori')?>">

        <div class="row">

                <div class="form-group col-md-12 ">
                    <input type="hidden" name="id" id="idkategori" class="form-control">
                </div>

            </div>

            <div class="row">

                <div class="form-group col-md-12 ">
                    <label for="nama">Nama Kategori</label>
                    <input type="text" name="nama" id="namaKategori" class="form-control" placeholder="Nama Kategori">
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

<!-- Delete Kategori Modal -->
<div class="modal fade" id="modal-delete-kategori" tabindex="-1" role="dialog" aria-hidden="true">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="donateModalLabel">Hapus Kategori</h4>
            </div>
            <div class="modal-body">
                <p id="textKategori"></p>

                <form class="form-donation" method="post" action="<?=base_url('admin/Kendaraan/deleteKategori')?>">

                    <div class="row">

                        <div class="form-group col-md-12 ">
                            <input type="hidden" name="id" id="iddeletekategori" class="form-control">
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

<!-- Add Modal -->
<div class="modal fade" id="modal-add" tabindex="-1" role="dialog" aria-hidden="true">

<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      <h4 class="modal-title" id="donateModalLabel">Tambah Kendaraan</h4>
    </div>
    <div class="modal-body">

        <form class="form-donation" method="post" action="<?=base_url('admin/Kendaraan/add')?>">

            <div class="row">

                <div class="form-group col-md-12 ">
                    <label for="nama">Nama Kendaraan</label>
                    <input type="text" name="nama" class="form-control" placeholder="Nama Kendaraan">
                </div>

            </div>

            <div class="row">

                <div class="form-group col-md-12 ">
                    <label for="kategori">Kategori</label>
                    <select class="form-control" id="kategori" name="kategori">
                        <option selected disabled>Choose...</option>
                        <?php foreach ($categories as $category) { ?>
                        <option value="<?=$category->id_kategori?>"><?=$category->nama_kategori?></option>
                        <?php }; ?>
                    </select>
                </div>

            </div>

            <div class="row">

                <div class="form-group col-md-12 ">
                    <label for="warna">Warna Kendaraan</label>
                    <input type="text" name="warna" class="form-control" placeholder="Warna Kendaraan">
                </div>

            </div>

            <div class="row">

                <div class="form-group col-md-12 ">
                    <label for="plat">Plat Nomor Kendaraan</label>
                    <input type="text" name="plat" class="form-control" placeholder="Plat Nomor Kendaraan">
                </div>

            </div>

            <div class="row">

                <div class="form-group col-md-12 ">
                    <label for="penumpang">Jumlah Penumpang</label>
                    <input type="number" name="penumpang" class="form-control" placeholder="Jumlah Penumpang">
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
      <h4 class="modal-title" id="donateModalLabel">Edit Kendaraan</h4>
    </div>
    <div class="modal-body">

        <form class="form-donation" method="post" action="<?=base_url('admin/Kendaraan/edit')?>">

        <div class="row">

                <div class="form-group col-md-12 ">
                    <input type="hidden" name="id" id="idkendaraan" class="form-control">
                </div>

            </div>

            <div class="row">

                <div class="form-group col-md-12 ">
                    <label for="nama">Nama Kendaraan</label>
                    <input type="text" name="nama" id="namakendaraan" class="form-control" placeholder="Nama Kendaraan">
                </div>

            </div>

            <div class="row">

            <div class="form-group col-md-12 ">
                <label for="kategori">Kategori</label>
                <select class="form-control" id="kategoriedit" name="kategori">
                    <option selected disabled>Choose...</option>
                    <?php foreach ($categories as $category) { ?>
                    <option value="<?=$category->id_kategori?>"><?=$category->nama_kategori?></option>
                    <?php }; ?>
                </select>
            </div>

            </div>

            <div class="row">

                <div class="form-group col-md-12 ">
                    <label for="nama">Warna Kendaraan</label>
                    <input type="text" name="warna" id="warna" class="form-control" placeholder="Warna Kendaraan">
                </div>

            </div>

            <div class="row">

                <div class="form-group col-md-12 ">
                    <label for="nama">Plat Nomor Kendaraan</label>
                    <input type="text" name="plat" id="plat" class="form-control" placeholder="Plat Nomor Kendaraan">
                </div>

            </div>

            <div class="row">

                <div class="form-group col-md-12 ">
                    <label for="nama">Jumlah Penumpang</label>
                    <input type="number" name="penumpang" id="penumpang" class="form-control" placeholder="Jumlah Penumpang">
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
      <h4 class="modal-title" id="donateModalLabel">Hapus Kendaraan</h4>
    </div>
    <div class="modal-body">
        <p id="text"></p>

        <form class="form-donation" method="post" action="<?=base_url('admin/Kendaraan/delete')?>">

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
    //<!-- Kendaraan Modal -->
    $(document).ready(function() {
        // Untuk sunting
        $("#modal-edit").on("show.bs.modal", function (event) {
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan

            // Isi nilai pada field
            $('#idkendaraan').attr("value", div.data('id'));
            $('#kategoriedit').val(div.data('kategori'));
            $('#namakendaraan').attr("value", div.data('nama'));
            $('#warna').attr("value", div.data('warna'));
            $('#plat').attr("value", div.data('plat'));
            $('#penumpang').attr("value", div.data('penumpang'));
            $('#harga').attr("value", div.data('harga'));
        });
    });

    $(document).ready(function() {
        // Untuk sunting
        $("#modal-delete").on("show.bs.modal", function (event) {
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan

            // Isi nilai pada field
            $(this).find('#text').html("Apakah Anda Yakin ingin menghapus kendaraan <b>" + div.data('nama') + "</b>?");
            $(this).find('#iddelete').attr("value", div.data('id'));
        });
    });
    //<!-- /Kendaraan Modal -->

    //<!-- Kategori Modal -->
    $(document).ready(function() {
        // Untuk sunting
        $("#modal-edit-kategori").on("show.bs.modal", function (event) {
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan

            // Isi nilai pada field
            $(this).find('#idkategori').attr("value", div.data('id'));
            $(this).find('#namaKategori').attr("value", div.data('nama'));
        });
    });

    $(document).ready(function() {
        // Untuk sunting
        $("#modal-delete-kategori").on("show.bs.modal", function (event) {
            var div = $(event.relatedTarget) // Tombol dimana modal di tampilkan

            // Isi nilai pada field
            $(this).find('#textKategori').html("Apakah Anda Yakin ingin menghapus kategori <b>" + div.data('nama') + "</b>?");
            $(this).find('#iddeletekategori').attr("value", div.data('id'));
        });
    });
    //<!-- /Kategori Modal -->
</script>