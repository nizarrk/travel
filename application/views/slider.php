<!-- Carousel
================================================== -->
<div id="homeCarousel" class="carousel slide carousel-home" data-ride="carousel">

    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#homeCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#homeCarousel" data-slide-to="1"></li>
        <li data-target="#homeCarousel" data-slide-to="2"></li>
    </ol>

    <div class="carousel-inner" role="listbox">

        <div class="item active">

            <img src="assets/images/slider/001.jpg" alt="">

            <div class="container">

            <div class="carousel-caption">
                <img class="carousel-title bounceInDown animated slow" src="<?= base_url('assets/images/travelen-logo.png')?>" style="width:450px; margin-top: -10px;" alt="">
                <h4 class="carousel-subtitle bounceInUp animated slow ">Travel kemanapun kapanpun</h4>

            </div> <!-- /.carousel-caption -->

            </div>

        </div> <!-- /.item -->


        <div class="item ">

            <img src="assets/images/slider/002.jpg" alt="">

            <div class="container">

            <div class="carousel-caption">

                <h2 class="carousel-title bounceInDown animated slow">Penjadwalan Realtime</h2>
                <h4 class="carousel-subtitle bounceInUp animated slow">Mudah cari jadwal!</h4>

            </div> <!-- /.carousel-caption -->

            </div>

        </div> <!-- /.item -->




        <div class="item ">

            <img src="assets/images/slider/003.jpg" alt="">

            <div class="container">

            <div class="carousel-caption">

                <h2 class="carousel-title bounceInDown animated slow" >Transaksi Simpel dan aman</h2>
                <h4 class="carousel-subtitle bounceInUp animated slow">Konfirmasi admin cepat!</h4>

            </div> <!-- /.carousel-caption -->

            </div>

        </div> <!-- /.item -->

    </div>

    <a class="left carousel-control" href="#homeCarousel" role="button" data-slide="prev">
        <span class="fa fa-angle-left" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>

    <a class="right carousel-control" href="#homeCarousel" role="button" data-slide="next">
        <span class="fa fa-angle-right" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>

</div><!-- /.carousel -->