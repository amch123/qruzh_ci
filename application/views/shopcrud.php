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
                                <li><a href="<?php echo base_url(); ?>index.php/account/shop">Tiendas</a></li>
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
                    <a href="<?php echo base_url(); ?>index.php/account/shop/create"><button type="button" class="btn btn-default mr-xs mb-sm">Agregar Tienda</button></a></i></button>
                    <hr>
                    <?php 
                    if(isset($_SESSION['store_status']))
                    {
                    ?>
                        <div class="alert alert-success">
                            <strong>Exito!</strong> Se ha agregado la tienda.
                        </div>
                    <?php 
                        unset($_SESSION['store_status']);
                    }
                    ?>
                    <?php 
                    if(isset($_SESSION['update_status']))
                    {
                    ?>
                        <div class="alert alert-success">
                            <strong>Exito!</strong> Se ha editado la tienda.
                        </div>
                    <?php 
                        unset($_SESSION['update_status']);
                    }
                    ?>
                    <?php 
                    if(isset($_SESSION['delete_status']))
                    {
                    ?>
                        <div class="alert alert-success">
                            <strong>Problema!</strong> Se ha borrado la tienda.
                        </div>
                    <?php 
                        unset($_SESSION['delete_status']);
                    }
                    ?>
                    <table id="crud" class="table table-responsive">
                        <thead>
                            <tr>
                                <th>
                                    Id
                                </th>
                                <th>
                                    Estado
                                </th>
                                <th>
                                    Tienda
                                </th>
                                <th>
                                    
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if($shops != "")
                            {
                                foreach($shops->result() as $shop)
                                {
                            ?>
                                    <tr>
                                        <td>
                                            <?php echo $shop->id_shop; ?>
                                        </td>
                                        <td>
                                            <?php echo $shop->state; ?>
                                        </td>
                                        <td>
                                            <?php echo $shop->shop_name; ?>
                                        </td>
                                        <td>
                                            <a href="<?php echo base_url(); ?>index.php/account/shop/edit/<?php echo $shop->id_shop; ?>">
                                                <i class="fa fa-pencil" aria-hidden="true"></i></a>
                                            <a href="<?php echo base_url(); ?>index.php/account/shop/delete/<?php echo $shop->id_shop; ?>">
                                                <i class="fa fa-times" aria-hidden="true"></i></a>
                                        </td>
                                    </tr> 
                            <?php
                                }
                            }
                            ?>     
                        </tbody>
                    </table>
                </div>

            </div>

        </div>

    </div>
<?php
require('footer.php');
?>