<!DOCTYPE html>
<html class="no-js">
    <?php $this->load->view('_partials/head.php'); ?>

    <body>
        <?php if($this->session->userdata('nama_user')) {
            $this->load->view('_partials/nav-user.php');
        } else {
            $this->load->view('_partials/nav.php');
        }  ?>

        <?php $this->load->view('slider.php'); ?>

    <div class="section-home our-causes animate-onscroll fadeIn">

        <div class="container">

            <h2 class="title-style-1">Booking Sekarang <span class="title-under"></span></h2>

            <?php $this->load->view('content-jadwal.php'); ?>

        </div>
        
    </div> <!-- /.our-causes -->
    
    <div class="section-home our-sponsors animate-onscroll fadeIn">
    
        <div class="container">

            <h2 class="title-style-1">Our Sponsors <span class="title-under"></span></h2>

            <ul class="owl-carousel list-unstyled list-sponsors">

              <li> <img src="assets/images/sponsors/bus.png" alt=""></li>
              <li> <img src="assets/images/sponsors/wikimedia.png" alt=""></li>
              <li> <img src="assets/images/sponsors/one-world.png" alt=""></li>
              <li> <img src="assets/images/sponsors/wikiversity.png" alt=""></li>
              <li> <img src="assets/images/sponsors/united-nations.png" alt=""></li>

              <li> <img src="assets/images/sponsors/bus.png" alt=""></li>
              <li> <img src="assets/images/sponsors/wikimedia.png" alt=""></li>
              <li> <img src="assets/images/sponsors/one-world.png" alt=""></li>
              <li> <img src="assets/images/sponsors/wikiversity.png" alt=""></li>
              <li> <img src="assets/images/sponsors/united-nations.png" alt=""></li>

            </ul>

        </div>

    </div> <!-- /.our-sponsors -->

    <?php $this->load->view('_partials/footer.php'); ?>
    <?php $this->load->view('_partials/donate-modal.php'); ?>
    <?php $this->load->view('_partials/js.php'); ?>

    <script>
        $(document).ready(function () {
            $('#tanggal1').datepicker({
                format: "yyyy-mm-dd",
                autoclose:true,
                startDate: 'd',
                endDate: '+1m'
            });

            $('#tanggal2').datepicker({
                format: "yyyy-mm-dd",
                autoclose:true,
                startDate: 'd',
                endDate: '+1m'
            });
        });

        $(document).ready(function() {
            // Untuk sunting
            $("#kota").on("click", function (event) {
                let div = $(event.target) // Tombol dimana modal di tampilkan

                // Isi nilai pada field
                $('#namakota').val(div[0].innerText);
                $('#hargakota').val(div.data('harga'));
            });
        });
    </script>
