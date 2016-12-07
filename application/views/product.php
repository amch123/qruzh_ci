<?php
require('header.php');
?>
	<div role="main" class="main shop">

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
                            <h1 class="mb-none"><strong>Todos los productos</strong></h1>
                        </div>
                    </div>

                    <?php
                    if($products != "")
                    {
                    ?>
                        <div class="row">
                            <ul class="products product-thumb-info-list" data-plugin-masonry data-plugin-options='{"layoutMode": "fitRows"}'>
                                <?php
                                foreach($products->result() as $product)
                                {
                                ?>
                                    <li class="col-md-4 col-sm-6 col-xs-12 product">
                                        <span class="product-thumb-info">
                                            <a href="<?php echo base_url(); ?>index.php/product/show/<?php echo $product->id_product; ?>">
                                                <span class="product-thumb-info-image">
                                                    <span class="product-thumb-info-act">
                                                        <span class="product-thumb-info-act-left"><em>View</em></span>
                                                        <span class="product-thumb-info-act-right"><em><i class="fa fa-plus"></i> Details</em></span>
                                                    </span>
                                                    <img src="<?php echo base_url(); ?>uploads/<?php echo $product->image; ?>" class="img-responsive"></img>
                                                </span>
                                            </a>
                                            <span class="product-thumb-info-content">
                                                <a href="shop-product-sidebar.html">
                                                    <h4 class="heading-primary">
                                                        <?php echo $product->title; ?>
                                                    </h4>
                                                    <span class="price">
                                                        <ins>
                                                            <span class="amount">
                                                                <?php echo $_SESSION['currency']; ?> <?php echo $product->unit_price; ?>
                                                            </span>
                                                        </ins>
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
                                <ul class="pagination pull-right">
                                    <?php echo $links; ?>
                                </ul>
                            </div>
                        </div>
                    <?php 
                    }
                    else
                    {
                    ?>
                        <div class="row">
                            <div class="col-md-12">
                                <h2>No hay registros</h2>
                            </div>
                        </div>
                    <?php 
                    }
                    ?>
                </div>
                <div class="col-md-3">
                    <aside class="sidebar">
                                
                        <h4 class="heading-primary">Categorias</h4>
                        <ul class="nav nav-list mb-xlg">
                            <?php
                            foreach($categories->result() as $category)
                            {
                            ?>
                                <li><a href="<?php echo base_url(); ?>index.php/product/category/<?php echo $category->id_category; ?>"><?php echo $category->category_name; ?></a></li>
                            <?php
                            }
                            ?>
                        </ul>
                    </aside>
                </div>
            </div>
        </div>
    </div>
<?php
require('footer.php');
?>