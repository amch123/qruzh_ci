<?php
require('header.php');
?>
	<div role="main" class="main shop">

        <div role="main" class="main">
            <section class="page-header page-header-light page-header-more-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1>Detalle Producto<span></span></h1>
                            <ul class="breadcrumb breadcrumb-valign-mid">
                                <li><a href="#">Inicio</a></li>
                                <li><a href="#">Productos</a></li>
                                <li class="active">Cargador</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <div role="main" class="main shop">

            <div class="container">
                <?php 
                if(isset($_SESSION['store_status']))
                {
                ?>
                    <div class="alert alert-success">
                        <strong>Exito!</strong> Se ha agregado el producto al carro.
                    </div>
                <?php 
                    unset($_SESSION['store_status']);
                }
                ?>
                <div class="row">
                    <div class="col-md-12">
                        <hr class="tall">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">

                        <div class="owl-carousel owl-theme" data-plugin-options='{"items": 1}'>
                            <div>
                                <div class="thumbnail">
                                    <img src="<?php echo base_url(); ?>template/img/products/product-7.jpg" class="img-responsive img-rounded"></img>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">

                        <div class="summary entry-summary">
                            <h1 class="mb-none"><strong><?php echo $product[0]->title; ?></strong></h1>

                            <div title="Rated 5.00 out of 5" class="star-rating">
                                <span style="width:100%"><strong class="rating">5.00</strong> out of 5</span>
                            </div>

                            <p class="price">
                                <span class="amount"><?php echo $product[0]->unit_price; ?></span>
                            </p>

                            <form enctype="multipart/form-data" action="<?php echo base_url(); ?>index.php/cart/store" method="post" class="cart">
                                <div class="quantity">
                                    <input type="button" class="minus" value="-">
                                    <input id="quantity" type="text" class="input-text qty text" title="Qty" value="0" name="quantity" min="1" step="1">
                                    <input type="button" class="plus" value="+">
                                </div>
                                <button type="submit" class="btn btn-primary btn-icon">Agregar al carro</button>
                                <input type="hidden" value="<?php echo $product[0]->id_product; ?>" name="id_product">
                            </form>

                            <div class="product_meta">
                                <span class="posted_in">Categorías: <a rel="tag" href="#">Cargadores</a>, <a rel="tag" href="#">Accesorios</a>.</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="tabs tabs-product">
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#productDescription" data-toggle="tab">Descripción</a></li>
                            </ul>
                            <div class="tab-content">
                                <div class="tab-pane active" id="productDescription">
                                    <p><?php echo $product[0]->description; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
require('footer.php');
?>