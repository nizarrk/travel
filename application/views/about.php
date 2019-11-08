<?php $this->load->view('_partials/head.php'); ?>
<?php if($this->session->userdata('nama_user')) {
            $this->load->view('_partials/nav-user.php');
        } else {
            $this->load->view('_partials/nav.php');
        }  ?>

<div class="page-heading text-center">
    <div class="container zoomIn animated">
        <h1 class="page-title">ABOUT US <span class="title-under"></span></h1>
    </div>
</div>

<div class="main-container">
    <div class="container">
        <div class="row fadeIn animated">
            <div class="col-md-6">
                <img src="<?=base_url('assets/images/travelen-logo-blue.png')?>" alt="" class="img-responsive" style="margin-top: 100px;">
            </div>
            
            <div class="col-md-6">
                <h2 class="title-style-2">ABOUT TRAVELEN <span class="title-under"></span></h2>
                <p>
                    Travelen perusahaan perjalanan online terkemuka di Kota Bangil, Jawa Timur yang menyediakan berbagai kebutuhan perjalanan dalam satu platform, memungkinkan pelanggan untuk membuat momen bersama orang-orang yang mereka cintai.
                </p>

                <p>
                    Perusahaan didirikan pada tahun 2012 oleh Mummamad Wahyudi, Derianto Kusuma, dan Albert Zhang. Ide ini muncul disaat Ferry Unardi sering mengalami kesulitan dalam pemesanan pesawat, terutama disaat dia ingin pulang ke Padang, Indonesia, dari Amerika Serikat.
                </p>

                <p>
                    Pada awal konsepnya Travelen berfungsi sebagai mesin pencari untuk membandingkan harga travel dari berbagai situs lainnya. Pada pertengahan tahun 2013 Travelen kemudian berubah menjadi situs reservasi travel di mana pengguna dapat melakukan pemesanan di situs resminya. Pada bulan Maret 2014, Ferry Unardi menyatakan bahwa Travelen akan segera masuk ke bisnis reservasi travel wisata.
                </p>
                
            </div>

        </div> <!-- /.row -->

        <h2 class="title-style-1">Our Best Ride <span class="title-under"></span></h2>
        <br>
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-4 gallery">
                <img src="<?=base_url('assets/images/kendaraan/1.jpg')?>" class="img-responsive">
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 gallery">
                <img src="<?=base_url('assets/images/kendaraan/2.jpg')?>" class="img-responsive">
            </div>
            <div class="col-lg-4 col-md-4 col-sm-4 gallery">
                <img src="<?=base_url('assets/images/kendaraan/3.jpg')?>" class="img-responsive">
            </div>
        </div><br>

        
    


</div>

<?php $this->load->view('_partials/footer.php'); ?>
<?php $this->load->view('_partials/js.php'); ?>