<?php
require('header.php');
?>
	<div class="slider-container rev_slider_wrapper">
        <div id="revolutionSlider" class="slider rev_slider" data-plugin-revolution-slider data-plugin-options='{"gridwidth": 1170, "gridheight": 500}'>
            <ul>
                <li data-transition="fade">
                        <img src="<?php echo base_url(); ?>template/img/slider1.jpg"  
						alt=""
						data-bgposition="center center" 
						data-bgfit="cover" 
						data-bgrepeat="no-repeat" 
						class="rev-slidebg"></img>

                        <div class="tp-caption top-label"
                        data-x="600"
                        data-y="180"
                        data-start="500"
                        data-transform_in="y:[-300%];opacity:0;s:500;"><em>Consigue todo para tu celular</em>
                    </div>

                    <div class="tp-caption main-label"
                        style="color: #FF7C0C;"
                        data-x="600"
                        data-y="210"
                        data-start="1500"
                        data-whitespace="nowrap"                         
                        data-transform_in="y:[100%];s:500;"
                        data-transform_out="opacity:0;s:500;"
                        data-mask_in="x:0px;y:0px;"><em>y mucho más...</em>
                    </div>

                    <div class="tp-caption bottom-label"
                        data-x="220"
                        data-y="280"
                        data-start="2000"
                        data-transform_in="y:[100%];opacity:0;s:500;">
                    </div> 
                </li>
                <li data-transition="fade">
                        <img src="<?php echo base_url(); ?>template/img/slider3.jpg"  
						alt=""
						data-bgposition="center center" 
						data-bgfit="cover" 
						data-bgrepeat="no-repeat" 
						class="rev-slidebg"></img>

                    <div class="tp-caption top-label"
                        style="color: #FF7C0C; font-weight: bolder;"
                        data-x="40"
                        data-y="180"
                        data-start="500"
                        data-transform_in="y:[-300%];opacity:0;s:500;">¡Estamos al alcance
                    </div>

                    <div class="tp-caption main-label"
                        style="color: #000000;"
                        data-x="40"
                        data-y="210"
                        data-start="1500"
                        data-whitespace="nowrap"                         
                        data-transform_in="y:[100%];s:500;"
                        data-transform_out="opacity:0;s:500;"
                        data-mask_in="x:0px;y:0px;">de tu mano!
                    </div>

                    <div class="tp-caption bottom-label"
                        data-x="220"
                        data-y="280"
                        data-start="2000"
                        data-transform_in="y:[100%];opacity:0;s:500;"> 
                    </div>
                </li>
            </ul>
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-12">
            <hr class="tall">
        </div>
    </div>

    <div class="row center4">
        <div class="col-md-12">
            <h2 class="pt-sm"><strong class="semi-bold">DESTACADOS</strong></h2>
            <h4>Nuestros productos más solicitados</h4>
        </div>
    </div>

    <div role="main" class="main shop">

        <div class="container">

            <div class="row">
                <ul class="products product-thumb-info-list" data-plugin-masonry>
                    <li class="col-md-3 col-sm-6 col-xs-12 product">
                        <span class="product-thumb-info">
                            <a href="shop-cart.html" class="add-to-cart-product">
                                <span><i class="fa fa-shopping-cart"></i> Agregar al Carro</span>
                            </a>
                            <a href="shop-product-sidebar.html">
                                <span class="product-thumb-info-image">
                                    <span class="product-thumb-info-act">
                                        <span class="product-thumb-info-act-left"><em>Ver</em></span>
                                        <span class="product-thumb-info-act-right"><em><i class="fa fa-plus"></i> Detalles</em>
                                        </span>
                                    </span>
                                    <img src="<?php echo base_url(); ?>template/img/products/product-1.jpg" class="img-responsive"></img>
                                </span>
                            </a>
                            <span class="product-thumb-info-content">
                                <a href="shop-product-sidebar.html">
                                    <h4>Photo Camera</h4>
                                    <span class="price">
                                        <ins><span class="amount">$299</span></ins>
                                    </span>
                                </a>
                            </span>
                        </span>
                    </li>
                    <li class="col-md-3 col-sm-6 col-xs-12 product">
                        <span class="product-thumb-info">
                            <a href="shop-cart.html" class="add-to-cart-product">
                                <span><i class="fa fa-shopping-cart"></i> Agregar al Carro</span>
                            </a>
                            <a href="shop-product-sidebar.html">
                                <span class="product-thumb-info-image">
                                    <span class="product-thumb-info-act">
                                        <span class="product-thumb-info-act-left"><em>Ver</em>
                                        </span>
                                        <span class="product-thumb-info-act-right"><em><i class="fa fa-plus"></i> Detalles</em>
                                        </span>
                                    </span>
                                    <img src="<?php echo base_url(); ?>template/img/products/product-2.jpg" class="img-responsive"></img>
                                </span>
                            </a>
                            <span class="product-thumb-info-content">
                                <a href="shop-product-sidebar.html">
                                    <h4>Golf Bag</h4>
                                    <span class="price">
                                        <span class="amount">$72</span>
                                    </span>
                                </a>
                            </span>
                        </span>
                    </li>
                    <li class="col-md-3 col-sm-6 col-xs-12 product">
                        <span class="product-thumb-info">
                            <a href="shop-cart.html" class="add-to-cart-product">
                                <span><i class="fa fa-shopping-cart"></i> Agregar al Carro</span>
                            </a>
                            <a href="shop-product-sidebar.html">
                                <span class="product-thumb-info-image">
                                    <span class="product-thumb-info-act">
                                        <span class="product-thumb-info-act-left"><em>Ver</em></span>
                                        <span class="product-thumb-info-act-right"><em><i class="fa fa-plus"></i> Detalles</em></span>
                                    </span>
                                    <img src="<?php echo base_url(); ?>template/img/products/product-3.jpg" class="img-responsive"></img>
                                </span>
                            </a>
                            <span class="product-thumb-info-content">
                                <a href="shop-product-sidebar.html">
                                    <h4>Workout</h4>
                                    <span class="price">
                                        <span class="amount">$60</span>
                                    </span>
                                </a>
                            </span>
                        </span>
                    </li>
                    <li class="col-md-3 col-sm-6 col-xs-12 product">
                        <span class="product-thumb-info">
                            <a href="shop-cart.html" class="add-to-cart-product">
                                <span><i class="fa fa-shopping-cart"></i> Agregar al carro</span>
                            </a>
                            <a href="shop-product-sidebar.html">
                                <span class="product-thumb-info-image">
                                    <span class="product-thumb-info-act">
                                        <span class="product-thumb-info-act-left"><em>Ver</em></span>
                                        <span class="product-thumb-info-act-right"><em><i class="fa fa-plus"></i> Detalles</em></span>
                                    </span>
                                    <img src="<?php echo base_url(); ?>template/img/products/product-4.jpg" class="img-responsive"></img>
                                </span>
                            </a>
                            <span class="product-thumb-info-content">
                                <a href="shop-product-sidebar.html">
                                    <h4>Luxury bag</h4>
                                    <span class="price">
                                        <span class="amount">$199</span>
                                    </span>
                                </a>
                            </span>
                        </span>
                    </li>
                </ul>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <hr class="tall">
                </div>
            </div>
        </div>
    </div>
             

    <section class="parallax section section-text-light section-parallax section-center" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="mb-none"><strong>Estamos localizados</strong></h1>
                    <h4 class="lead">en todo el territorio Mexicano</h4>
                </div>
            </div>
        </div>
    </section>

    <div class="row">
        <div class="col-md-12">
            <hr class="tall">
        </div>
    </div>

    <div class="row center4">
        <div class="col-md-12">
            <h2 class="pt-sm"><strong class="semi-bold">ENVIOS</strong></h2>
            <h4>Trabajamos con las siguientes empresas de envios</h4>
        </div>
    </div>


    <div class="home-concept">
        <div class="container"> 
            <div class="row center">
                <div class="col-md-6 col-md-offset-6">
                    <div class="project-image">
                        <div id="fcSlideshow" class="fc-slideshow">
                            <ul class="fc-slides">
                                <li><img src="<?php echo base_url(); ?>template/img/projects/project-home-1.jpg" class="img-responsive"></img></li>
                                <li><img src="<?php echo base_url(); ?>template/img/projects/project-home-2.jpg" class="img-responsive"></img></li>
                            </ul>
                        </div>
                    </div>
                 </div>
            </div>
        </div>
    </div>
<?php
require('footer.php');
?>