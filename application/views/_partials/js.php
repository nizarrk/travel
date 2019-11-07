<!--  Scripts
    ================================================== -->

    <!-- jQuery -->
    <script src="<?=base_url('assets/js/jquery-1.11.1.min.js')?>"></script>

    <!-- Bootsrap javascript file -->
    <script src="<?=base_url('assets/js/bootstrap.min.js')?>"></script>

    <!-- Datepicker javascript file -->
    <script src="<?=base_url('assets/js/bootstrap-datepicker.min.js')?>"></script>
    
    <!-- owl carouseljavascript file -->
    <script src="<?=base_url('assets/js/owl.carousel.min.js')?>"></script>

    <!-- Template main javascript -->
    <script src="<?=base_url('assets/js/main.js')?>"></script>

    <!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
    <script>
        (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
        function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
        e=o.createElement(i);r=o.getElementsByTagName(i)[0];
        e.src='//www.google-analytics.com/analytics.js';
        r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
        ga('create','UA-XXXXX-X');ga('send','pageview');
    </script>

    <script>
        function updateNotifAdmin(id, tipe) {            
            $.ajax({
                url: "<?=base_url('Notifikasi/editStatus')?>/" + id,
                type: "POST",
                dataType: "JSON",
                success: function(data) {                                      
                    if (tipe == 'Booking') {
                        location.href = "<?=base_url('admin/Booking')?>"
                    } else if (tipe == 'Pembayaran') {
                        location.href = "<?=base_url('admin/Booking/pembayaran')?>"
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log("error", jqXHR, textStatus, errorThrown);
                }
            })
        }

        function updateNotifUser(id) {            
            $.ajax({
                url: "<?=base_url('Notifikasi/editStatus')?>/" + id,
                type: "POST",
                dataType: "JSON",
                success: function(data) {                  
                    location.href = "<?=base_url('Jadwal/history')?>"
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log("error", jqXHR, textStatus, errorThrown);
                }
            })
        }
    </script>

    </body>
</html>