<?php
require('header.php');
?>
    <div role="main" class="main">

        <div role="main" class="main">
            <section class="page-header page-header-light page-header-more-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1>Estados<span></span></h1>
                            <ul class="breadcrumb breadcrumb-valign-mid">
                                <li><a href="<?php echo base_url(); ?>index.php/account/state/edit/<?php echo $this->uri->segment(4); ?>">Editar Estado</a></li>
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
                    if(isset($_SESSION['update_status']))
                    {
                    ?>
                        <div class="alert alert-success">
                            <strong>Exito!</strong> Se ha editado el estado.
                        </div>
                    <?php 
                        unset($_SESSION['update_status']);
                    }
                    ?>
                    <div class="featured-boxes">
                        <div class="row">
                            <div class="col-sm-1">
                            </div>
                            <div class="col-sm-10">
                                <div class="featured-box featured-box-primary align-left mt-xlg">
                                    <div class="box-content">
                                        <form action="<?php echo base_url(); ?>index.php/account/state/update" id="frmSignUp" method="post">
                                            <div class="row">
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <label>Nombre del Estado</label>
                                                        <input type="text" name="state" value="<?php echo $state[0]->state; ?>" class="form-control input-lg" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <label>Selecciona la tienda</label>
                                                        <select class="form-control" name="id_shop" required>
                                                            <option value="">-Seleccione-</option>
                                                            <?php
                                                            foreach($shops->result() as $shop)
                                                            {
                                                            ?>
                                                                <option <?php if($state[0]->id_shop == $shop->id_shop) { ?> selected <?php } ?> value="<?php echo $shop->id_shop; ?>"><?php echo $shop->shop_name; ?></option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>     
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <input type="hidden" name="id_state" value="<?php echo $state[0]->id_state; ?>">
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