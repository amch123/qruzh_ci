            <!-- Modal -->
            <div id="myModal" class="modal fade" role="dialog">
                <div class="modal-dialog">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-body">
                        <p>Some text in the modal.</p>
                        </div>
                    </div>

                </div>
            </div>
            <footer id="footer" class="color color-primary">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="contact-details">
                                <h4>Menú</h4>
                                <ul class="contact">
                                    <a href="<?php echo base_url(); ?>index.php"><li><p><strong>Inicio</strong></p></li></a>
                                    <a href="<?php echo base_url(); ?>index.php/aboutus"><li><p><strong>Nosotros</strong></p></li></a>
                                    <a href="<?php echo base_url(); ?>index.php/product"><li><p><strong>Productos</strong></p></li></a>
                                    <a href="<?php echo base_url(); ?>index.php/wholesale"><li><p><strong>Mayoreo</strong></p></li></a>
                                    <a href="<?php echo base_url(); ?>index.php/branch"><li><p><strong>Sucursales</strong></p></li></a>
                                    <a href="<?php echo base_url(); ?>index.php/contact"><li><p><strong>Contáctanos</strong></p></li></a>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-4">
                        </div>
                        <div class="col-md-3">
                            <h4>Siguenos</h4>
                            <ul class="social-icons">
                                <li class="social-icons-facebook"><a href="<?php echo $_SESSION['facebook']; ?>" target="_blank" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                                <li class="social-icons-twitter"><a href="<?php echo $_SESSION['twitter']; ?>" target="_blank" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                            </ul>
                        </div>
                        <div class="col-md-2">
                            <h4>Aceptamos</h4>
                            <ul class="contact">
                                <li><a href="#" target="_blank"><img src="<?php echo base_url(); ?>template/img/visa.png"></img></i></a></li>
                                <li><a href="#" target="_blank"><img src="<?php echo base_url(); ?>template/img/mastercard.png"></img></i></a></li>
                                <li><a href="#" target="_blank"><img src="<?php echo base_url(); ?>template/img/paypal.png"></img></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="footer-copyright">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-7">
                                <p>© Mobilephone <?php echo date('Y'); ?>. Todos los derechos reservados.</p>
                            </div>
                            <div class="col-md-4">
                                <nav id="sub-menu">
                                    <ul>
                                        <li>Powered by</li>
                                        <li><a href="#" class="logo">
                                        <img src="<?php echo base_url(); ?>template/img/logo-footer.png"></img>
                                        </a></li>
                                    </ul>
                                </nav>
                            </div>                            
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <!-- Vendor -->
        <script type="text/javascript" src="<?php echo base_url(); ?>template/vendor/jquery/jquery.js"></script> 
        <script type="text/javascript" src="<?php echo base_url(); ?>template/vendor/jquery.appear/jquery.appear.js"></script> 
        <script type="text/javascript" src="<?php echo base_url(); ?>template/vendor/jquery.easing/jquery.easing.js"></script> 
        <script type="text/javascript" src="<?php echo base_url(); ?>template/vendor/jquery-cookie/jquery-cookie.js"></script> 
        <script type="text/javascript" src="<?php echo base_url(); ?>template/vendor/bootstrap/js/bootstrap.js"></script> 
        <script type="text/javascript" src="<?php echo base_url(); ?>template/vendor/common/common.js"></script> 
        <script type="text/javascript" src="<?php echo base_url(); ?>template/vendor/jquery.validation/jquery.validation.js"></script> 
        <script type="text/javascript" src="<?php echo base_url(); ?>template/vendor/jquery.stellar/jquery.stellar.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>template/vendor/jquery.easy-pie-chart/jquery.easy-pie-chart.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>template/vendor/jquery.gmap/jquery.gmap.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>template/vendor/jquery.lazyload/jquery.lazyload.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>template/vendor/isotope/jquery.isotope.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>template/vendor/owl.carousel/owl.carousel.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>template/vendor/magnific-popup/jquery.magnific-popup.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>template/vendor/vide/vide.js"></script>
            
        <!-- Theme Base, Components and Settings -->
        <script type="text/javascript" src="<?php echo base_url(); ?>template/js/theme.js"></script>

        <!-- Current Page Vendor and Views -->
        <script type="text/javascript" src="<?php echo base_url(); ?>template/vendor/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>template/vendor/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>template/vendor/circle-flip-slideshow/js/jquery.flipshow.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>template/js/views/view.home.js"></script>
            
        <!-- Theme Custom -->
        <script type="text/javascript" src="//cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
        <script type="text/javascript" src="//cdn.datatables.net/responsive/2.1.0/js/dataTables.responsive.js"></script>
        <script type="text/javascript" src="<?php echo base_url(); ?>template/js/custom.js"></script>

        <!-- Theme Initialization Files -->
        <script type="text/javascript" src="<?php echo base_url(); ?>template/js/theme.init.js"></script>

        <!-- Google Analytics: Change UA-XXXXX-X to be your site's ID. Go to http://www.google.com/analytics/ for more information.
        <script>
            (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
                })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
            
            ga('create', 'UA-12345678-1', 'auto');
             ga('send', 'pageview');
        </script>
            -->
    </body>
</html>