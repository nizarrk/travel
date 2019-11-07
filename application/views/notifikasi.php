<?php $this->load->view('_partials/head.php'); ?>
<?php if ($this->session->userdata('id_user') == 1) {
            $this->load->view('_partials/nav-admin.php');
        } else {
            $this->load->view('_partials/nav-user.php');
        }  ?>
<br>
<div class="container" style="width: 500px;">

<?php if ($this->session->userdata('id_user') == 1) {
    foreach ($notifications as $row) { 
        if ($row->tipe_notifikasi == "Booking") { ?>
            <div class="list-group" onclick="updateNotifAdmin(<?=$row->id_notifikasi?>, 'Booking')">
                <a href="#" class="list-group-item active">
                    <h4 class="list-group-item-heading"><?=$row->desk_notifikasi?></h4>
                    <p class="list-group-item-text"><?=time_since(strtotime($row->tgl_notifikasi))?></p>
                    <?php if ($row->status_notifikasi == "Aktif") { ?>
                        <span class="badge" style="background-color: #f56042; color:white">Baru</span>
                    <?php } ?>
                </a>
            </div>
        
        <?php } else if ($row->tipe_notifikasi == "Pembayaran") { ?>
            <div class="list-group" onclick="updateNotifAdmin(<?=$row->id_notifikasi?>, 'Pembayaran')">
                <a href="#" class="list-group-item active">
                    <h4 class="list-group-item-heading"><?=$row->desk_notifikasi?></h4>
                    <p class="list-group-item-text"><?=time_since(strtotime($row->tgl_notifikasi))?></p>
                    <?php if ($row->status_notifikasi == "Aktif") { ?>
                        <span class="badge" style="background-color: #f56042;">Baru</span>
                    <?php } ?>
                </a>
            </div>
            <?php } ?> 
        <?php } ?> 
<?php } else { 
    foreach ($notifications as $row) { 
        if ($row->tipe_notifikasi == "Booking") { ?>
            <div class="list-group" onclick="updateNotifUser(<?=$row->id_notifikasi?>, 'Booking')">
                <a href="#" class="list-group-item active">
                    <h4 class="list-group-item-heading"><?=$row->desk_notifikasi?></h4>
                    <p class="list-group-item-text"><?=time_since(strtotime($row->tgl_notifikasi))?></p>
                    <?php if ($row->status_notifikasi == "Aktif") { ?>
                        <span class="badge" style="background-color: #f56042; color:white">Baru</span>
                    <?php } ?>
                </a>
            </div>
        
        <?php } else if ($row->tipe_notifikasi == "Pembayaran") { ?>
            <div class="list-group" onclick="updateNotifUser(<?=$row->id_notifikasi?>, 'Pembayaran')">
                <a href="#" class="list-group-item active">
                    <h4 class="list-group-item-heading"><?=$row->desk_notifikasi?></h4>
                    <p class="list-group-item-text"><?=time_since(strtotime($row->tgl_notifikasi))?></p>
                    <?php if ($row->status_notifikasi == "Aktif") { ?>
                        <span class="badge" style="background-color: #f56042;">Baru</span>
                    <?php } ?>
                </a>
            </div>
            <?php } ?> 
        <?php } ?>
    <?php } ?> 
</div>

<?php $this->load->view('_partials/footer.php'); ?>
<?php $this->load->view('_partials/js.php'); ?>