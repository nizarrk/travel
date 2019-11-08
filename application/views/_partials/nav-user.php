<header class="main-header">
    <nav class="navbar navbar-static-top">
        <div class="navbar-top">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6 col-xs-12">
                        <ul class="list-unstyled list-inline header-contact">
                            <li> <i class="fa fa-phone"></i> <a href="tel:">+212 658 986 213 </a> </li>
                            <li> <i class="fa fa-envelope"></i> <a href="mailto:contact@sadaka.org">contact@sadaka.org</a> </li>
                        </ul> <!-- /.header-contact  -->
                    </div>
                    <div class="col-sm-6 col-xs-12 text-right">
                        <ul class="list-unstyled list-inline header-social">
                            <li> <a href="#"> <i class="fa fa-facebook"></i> </a> </li>
                            <li> <a href="#"> <i class="fa fa-twitter"></i>  </a> </li>
                            <li> <a href="#"> <i class="fa fa-google"></i>  </a> </li>
                            <li> <a href="#"> <i class="fa fa-youtube"></i>  </a> </li>
                            <li> <a href="#"> <i class="fa fa fa-pinterest-p"></i>  </a> </li>
                        </ul> <!-- /.header-social  -->
                    </div>
                </div>
            </div>
        </div>

        <div class="navbar-main">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?= base_url('') ?>">
                        <img src="<?= base_url('assets/images/travelen-logo.png')?>" style="width:150px; margin-top: -10px;" alt="">
                    </a>
                </div>
                
                <div id="navbar" class="navbar-collapse collapse pull-right">
                    <ul class="nav navbar-nav">
                        <li><a class="<?= $this->uri->segment(1) == '' ? 'is-active': '' ?>" href="<?= base_url('') ?>">HOME</a></li>
                        <li><a class="<?= $this->uri->segment(1) == 'About' ? 'is-active': '' ?>" href="<?= base_url('About') ?>">ABOUT</a></li>
                        <li><a class="<?= $this->uri->segment(1) == 'Help' ? 'is-active': '' ?>" href="<?= base_url('Help') ?>">HELP</a></li>

                        <li class="dropdown text-success" >
                            <a href="#" class="notification" data-toggle="dropdown">
                                <span class="glyphicon glyphicon-bell" style="color: white;"></span>
                                <span class="badge badge-danger" id="load_row"><?php if ($countnotif > 0) echo $countnotif?></span>
                            </a>
                            
                            <ul class="dropdown-menu" role="menu" id="load_data" style="margin-left: -200px;">
                            <?php
                            if (empty($notif)) { ?>
                                <li>Tidak Ada Notifikasi Baru</li>
                            <?php 
                            } else { 
                                foreach ($notif as $row) { 
                                    if ($row->tipe_notifikasi == "Booking") { ?>
                                        <li>
                                            <a href="#" onclick="updateNotifUser(<?=$row->id_notifikasi?>)">
                                                <span><?=$row->desk_notifikasi?></span>
                                                <br>
                                                <small><?=time_since(strtotime($row->tgl_notifikasi))?></small>
                                                <?php if ($row->status_notifikasi == "Aktif") { ?>
                                                <span class="badge" style="background-color: #f56042;">Baru</span>
                                                <?php } ?>
                                            </a>
                                        </li>
                                    <?php } else if ($row->tipe_notifikasi == "Pembayaran") { ?>
                                        <li>
                                            <a href="#" onclick="updateNotifUser(<?=$row->id_notifikasi?>)">
                                                <span><?=$row->desk_notifikasi?></span>
                                                <br>
                                                <small><?=time_since(strtotime($row->tgl_notifikasi))?></small>
                                                <?php if ($row->status_notifikasi == "Aktif") { ?>
                                                <span class="badge" style="background-color: #f56042;">Baru</span>
                                                <?php } ?>
                                            </a>
                                        </li>
                                        <?php } ?> 
                                    <?php } ?>  
                                    <a href="<?=base_url('Notifikasi')?>">Lihat  Semua</a>                       
                                <?php } ?>
                            </ul>
                        </li>
                        
                        <li class="has-child">
                            <a href="#">
                                <span class="glyphicon glyphicon-user" style="color: white;"></span>
                            </a>
                            <ul class="submenu">
                                <li class="submenu-item"><a href="<?=base_url('User/profile')?>">Profile </a></li>
                                <li class="submenu-item"><a href="<?=base_url('Jadwal/history')?>">History </a></li>
                                <li class="submenu-item"><a href="<?=base_url('User/logout')?>">Logout </a></li>
                            </ul>
                        </li>
                    </ul>
                </div> <!-- /#navbar -->
            </div> <!-- /.container -->
        </div> <!-- /.navbar-main -->
    </nav> 
</header> <!-- /. main-header -->