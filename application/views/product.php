<?php
require('header.php');
?>
	<div role="main" class="main shop">

        <div role="main" class="main">
            <section class="page-header page-header-light page-header-more-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1>Productos<span></span></h1>
                            <ul class="breadcrumb breadcrumb-valign-mid">
                                <li><a href="#">Inicio</a></li>
                                <li class="active">Productos</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <hr class="tall">
                </div>
            </div>

               
            <div class="row">
                <div class="col-md-9">

                    <div class="row">
                        <div class="col-md-6">
                            <h1 class="mb-none"><strong>
                                Todos los productos</strong>
                            </h1>
                            <p>
                                1–9 de 25
                            </p>
                        </div>
                    </div>

                    <div class="row">
                        <ul class="products product-thumb-info-list">
                                <li class="col-sm-4 col-xs-12 product">
                                    <a href="shop-product-sidebar.html" style="display: none;">
                                        <span class="onsale">Sale!</span>
                                    </a>
                                    <span class="product-thumb-info">
                                        <a href="#">
                                            <span class="product-thumb-info-image">
                                                <span class="product-thumb-info-act">
                                                    <span class="product-thumb-info-act-left"><em>Ver</em></span>
                                                    <span class="product-thumb-info-act-right"><em><i class="fa fa-plus"></i> Detalles</em></span>
                                                </span>
                                                <img src="<?php echo base_url(); ?>template/img/products/product-2.jpg" class="img-responsive"></img>
                                            </span>
                                        </a>
                                        <span class="product-thumb-info-content">
                                            <a href="shop-product-sidebar.html">
                                                <h4>Nombe</h4>
                                                <span class="price">
                                                    <ins><span class="amount">Precio</span></ins>
                                                </span>
                                            </a>
                                        </span>
                                    </span>
                                </li>
                        </ul>
                    </div>

                <div class="row">
                    <div class="col-md-12">
                        <ul class="pagination pull-right">
                            <li><a href="#"><i class="fa fa-chevron-left"></i></a></li>
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#"><i class="fa fa-chevron-right"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <aside class="sidebar">
                            
                    <h4 class="heading-primary">Categorias</h4>
                    <ul class="nav nav-list mb-xlg">
                        <li><a href="#">Design (2)</a></li>
                        <li class="active">
                            <a href="#">Photos (4)</a>
                            <ul>
                                <li><a href="#">Animals</a></li>
                                <li class="active"><a href="#">Business</a></li>
                                <li><a href="#">Sports</a></li>
                                <li><a href="#">People</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Videos (3)</a></li>
                        <li><a href="#">Lifestyle (2)</a></li>
                        <li><a href="#">Technology (1)</a></li>
                    </ul>
                </aside>
            </div>
        </div>
    </div>
<?php
require('footer.php');
?>