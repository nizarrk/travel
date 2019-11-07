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
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Necessitatibus, nulla quae possimus id fugit totam perspiciatis ad consequatur natus dolores unde ipsa, architecto, dignissimos corrupti explicabo provident debitis suscipit, beatae!
                </p>

                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi pariatur, voluptatum molestiae voluptas ducimus tempora numquam eligendi quos, quia aut quidem et, odio deleniti amet natus accusamus fugit! Temporibus, tenetur.
                </p>

                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Esse voluptatem, ea, quisquam vero ullam nesciunt recusandae expedita similique nisi! Ducimus, reiciendis, quia. Explicabo minima error excepturi minus, aperiam illum fugit.
                </p>

                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Modi pariatur, voluptatum molestiae voluptas ducimus tempora numquam eligendi quos, quia aut quidem et, odio deleniti amet natus accusamus fugit! Temporibus, tenetur.
                </p>

                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Esse voluptatem, ea, quisquam vero ullam nesciunt recusandae expedita similique nisi! Ducimus, reiciendis, quia. Explicabo minima error excepturi minus, aperiam illum fugit , quia. Explicabo minima error excepturi minus, aperiam illum fugit.

                </p>
                
            </div>

        </div> <!-- /.row -->

        
    


</div>

<?php $this->load->view('_partials/footer.php'); ?>
<?php $this->load->view('_partials/js.php'); ?>