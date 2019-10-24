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
                
                <a class="navbar-brand" href="index.html"><img src="<?= base_url('assets/images/sadaka-logo.png')?>" alt=""></a>
                
            </div>

            <div id="navbar" class="navbar-collapse collapse pull-right">

                <ul class="nav navbar-nav">
                    

                    <li><a class="<?= $this->uri->segment(1) == '' ? 'is-active': '' ?>" href="<?= base_url('Dashboard/admin') ?>">HOME</a></li>
                    <li class="has-child"><a href="#">MANAGE</a>
                        <ul class="submenu">
                            <li class="submenu-item"><a href="<?=base_url('admin/Kota')?>">Kota </a></li>
                            <li class="submenu-item"><a href="<?=base_url('Admin/kendaraan')?>">Kendaraan </a></li>
                            <li class="submenu-item"><a href="<?=base_url('Admin/booking')?>">Booking </a></li>
                            <li class="submenu-item"><a href="<?=base_url('Admin/user')?>">Pengguna </a></li>
                        </ul>

                    </li>
                    <li class="has-child"><a href="#"><?=$this->session->userdata('nama_user');?></a>
                        <ul class="submenu">
                            <li class="submenu-item"><a href="<?=base_url('User/logout')?>">Logout </a></li>
                        </ul>

                    </li>

                </ul>

            </div> <!-- /#navbar -->

            </div> <!-- /.container -->
            
        </div> <!-- /.navbar-main -->


    </nav> 

</header> <!-- /. main-header -->