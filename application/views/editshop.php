<?php
require('header.php');
?>
    <div role="main" class="main">

        <div role="main" class="main">
            <section class="page-header page-header-light page-header-more-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1>Tiendas<span></span></h1>
                            <ul class="breadcrumb breadcrumb-valign-mid">
                                <li><a href="<?php echo base_url(); ?>index.php/account/shop/create">Editar Tienda</a></li>
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
                    <?php 
                    if(isset($_SESSION['error']))
                    {
                    ?>
                        <div class="alert alert-danger">
                            <?php echo $_SESSION['error']; ?>
                        </div>
                    <?php 
                        unset($_SESSION['error']);
                    }
                    ?>
                    <div class="featured-boxes">
                        <div class="row">
                            <div class="col-sm-1">
                            </div>
                            <div class="col-sm-10">
                                <div class="featured-box featured-box-primary align-left mt-xlg">
                                    <div class="box-content">
                                        <form action="<?php echo base_url(); ?>index.php/account/shop/update" id="frmSignUp" method="post">
                                            <div class="row">
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <label>Estados</label>
                                                        <select class="form-control" name="id_state" required>
                                                            <option value="">-Seleccione-</option>
                                                            <?php
                                                            foreach($states->result() as $state)
                                                            {
                                                            ?>
                                                                <option <?php if($shop[0]->id_state == $state->id_state) { ?> selected <?php } ?> value="<?php echo $state->id_state; ?>"><?php echo $state->state; ?></option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <label>Nombre de la Tienda</label>
                                                        <input type="text" name="shop_name" value="<?php echo $shop[0]->shop_name; ?>" class="form-control input-lg" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <input type="hidden" name="id_shop" value="<?php echo $shop[0]->id_shop; ?>">
                                                    <input type="submit" value="Editar" class="btn btn-warning btn-lg btn-block pull-right mb-xl" data-loading-text="Loading...">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-1">
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