<?php
require('header.php');
?>
    <div role="main" class="main">

        <div role="main" class="main">
            <section class="page-header page-header-light page-header-more-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1>Bienvenido<span></span></h1>
                            <ul class="breadcrumb breadcrumb-valign-mid">
                                <li><a href="index.php">Inicio</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <div class="container">

            <div class="row">
                <div class="col-md-3">
                    <?php
                    require('accountmenu.php');
                    ?>
                </div>
                <div class="col-md-9">
                    <div>
                        <div class="thumbnail">
                            <img src="<?php echo base_url(); ?>template/img/products/product-20.jpg" class="img-responsive img-rounded"></img>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
<?php
require('footer.php');
?>