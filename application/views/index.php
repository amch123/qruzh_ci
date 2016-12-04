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
            <h2 class="pt-sm"><strong class="semi-bold">RECIENTES</strong></h2>
            <h4>Nuestros productos más recientes</h4>
        </div>
    </div>

    <div role="main" class="main shop">

        <div class="container">

            <div class="row">
                <ul class="products product-thumb-info-list" data-plugin-masonry>
                    <?php 
                    foreach($recent_products->result() as $recent_product)
                    {
                    ?>
                    <li class="col-md-3 col-sm-6 col-xs-12 product">
                        <span class="product-thumb-info">
                            <a href="<?php echo base_url(); ?>index.php/product/show/<?php echo $recent_product->id_product; ?>">
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
                                    <h4><?php echo $recent_product->title; ?></h4>
                                    <span class="price">
                                        <ins><span class="amount"><?php echo $recent_product->unit_price; ?></span></ins>
                                    </span>
                                </a>
                            </span>
                        </span>
                    </li>
                    <?php 
                    }
                    ?>
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