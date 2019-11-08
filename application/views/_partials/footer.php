<footer class="main-footer">

    <div class="footer-top">
        
    </div>


    <div class="footer-main">
        <div class="container">
            
            <div class="row">
                <div class="col-lg-4">
                    <h4 class="footer-title">Feature <span class="title-under"></span></h4>
                    <ul>
                        <li><a href="<?=base_url('About')?>">Our story</a></li>
                        <li><a href="<?=base_url('User')?>">Login</a></li>
                        <li><a href="<?=base_url('User/register')?>">Register</a></li>
                        <li><a href="<?=base_url('Help')?>">Booking</a></li>
                    </ul>
                </div>
                <div class="col-lg-4">
                <h4 class="footer-title">Need Help?<span class="title-under"></span></h4>
                    <span class="glyphicon glyphicon-phone"></span><a href="tel://085608003736"> +62 812 3376 3055</a><br>
                    <span class="glyphicon glyphicon-envelope"></span><a href="mailto:customerservices@travelen.com"> customerservices@travelen.com</a>
				</div>

                <div class="col-md-4">

                        <div class="footer-col">

                            <h4 class="footer-title">Contact us <span class="title-under"></span></h4>

                            <div class="footer-content">

                                <div class="footer-form">
                                    
                                    <div class="footer-form" >
                                    
                                    <form action="php/mail.php" class="ajax-form">

                                        <div class="form-group">
                                            <input type="text" name="name" class="form-control" placeholder="Name" required>
                                        </div>

                                         <div class="form-group">
                                            <input type="email" name="email" class="form-control" placeholder="E-mail" required>
                                        </div>

                                        <div class="form-group">
                                            <textarea name="message" class="form-control" placeholder="Message" required></textarea>
                                        </div>

                                        <div class="form-group alerts">
                        
                                            <div class="alert alert-success" role="alert">
                                              
                                            </div>

                                            <div class="alert alert-danger" role="alert">
                                              
                                            </div>
                                            
                                        </div>

                                         <div class="form-group">
                                            <button type="submit" class="btn btn-submit pull-right">Send message</button>
                                        </div>
                                        
                                    </form>

                                </div>

                                </div>
                            </div>
                            
                        </div>

                    </div>
                
                <div class="clearfix"></div>
            </div>

        </div>

    </div>

    <div class="footer-bottom">

        <div class="container text-right">
            Sadaka @ copyrights 2015 - by <a href="http://www.ouarmedia.com" target="_blank">Ouarmedia</a>
        </div>
    </div>
    
</footer> <!-- main-footer -->