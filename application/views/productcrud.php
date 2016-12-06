<?php
require('header.php');
?>
    <div role="main" class="main">

        <div role="main" class="main">
            <section class="page-header page-header-light page-header-more-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1>Productos<span></span></h1>
                            <ul class="breadcrumb breadcrumb-valign-mid">
                                <li><a href="<?php echo base_url(); ?>index.php/account/product">Productos</a></li>
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
                    <a href="<?php echo base_url(); ?>index.php/account/product/create"><button type="button" class="btn btn-default mr-xs mb-sm">Agregar Producto</button></a></i></button>
                    <hr>
                    <?php 
                    if(isset($_SESSION['store_status']))
                    {
                    ?>
                        <div class="alert alert-success">
                            <strong>Exito!</strong> Se ha guardado el producto.
                        </div>
                    <?php 
                        unset($_SESSION['store_status']);
                    }
                    ?>
                    <?php 
                    if(isset($_SESSION['delete_status']))
                    {
                    ?>
                        <div class="alert alert-success">
                            <strong>Exito!</strong> Se ha borrado el producto.
                        </div>
                    <?php 
                        unset($_SESSION['delete_status']);
                    }
                    ?>
                    <table id="crud" class="table">
                        <thead>
                            <tr>
                                <th>
                                    Id
                                </th>
                                <th>
                                    Imagen
                                </th>
                                <th>
                                    Titulo
                                </th>
                                <th>
                                    Precio Unitario
                                </th>
                                <th>
                                    Precio al Mayor
                                </th>
                                <th>
                                    Stock
                                </th>
                                <th>
                                    Fecha de Registro
                                </th>
                                <th>
                                    
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if($products != "")
                            {
                                foreach($products->result() as $product)
                                {
                            ?>
                                    <tr>
                                        <td>
                                            <?php echo $product->id_product; ?>
                                        </td>
                                        <td>
                                            <img src="<?php echo base_url(); ?>pre_uploads/<?php echo $product->image; ?>" class="img-responsive"></img>
                                        </td>
                                        <td>
                                            <?php echo $product->title; ?>
                                        </td>
                                        <td>
                                            <?php echo $product->unit_price; ?>
                                        </td>
                                        <td>
                                            <?php echo $product->wholesale_price; ?>
                                        </td>
                                        <td>
                                            <?php echo $product->stock; ?> Unidad(es)
                                        </td>
                                        <td>
                                            <?php echo $product->custom_created_at; ?>
                                        </td>
                                        <td>
                                            <a href="<?php echo base_url(); ?>index.php/account/product/edit/<?php echo $product->id_product; ?>">
                                                <i class="fa fa-pencil" aria-hidden="true"></i></a>
                                            <a href="<?php echo base_url(); ?>index.php/account/product/delete/<?php echo $product->id_product; ?>">
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