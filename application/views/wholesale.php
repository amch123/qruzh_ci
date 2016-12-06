<?php
require('wholesaleheader.php');
?>
	<div role="main" class="main shop">

        <div role="main" class="main">
            <section class="page-header page-header-light page-header-more-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1>Mayoreo<span></span></h1>
                            <ul class="breadcrumb breadcrumb-valign-mid">
                                <li><a href="#">Inicio</a></li>
                                <li>Mayoreo</li>
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

                <table class="table">
                    <thead>
                        <tr>
                            <th>
                                Producto
                            </th>
                            <th>
                                Titulo
                            </th>
                            <th>
                                Precio Detal
                            </th>
                            <th>
                                Precio Mayor
                            </th>
                            <th>
                                Stock
                            </th>
                            <th>
                                
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;

                        foreach($products->result() as $product)
                        {
                        ?>
                            <tr class="active">
                                <td scope="row">
                                    <img width="75px" height="75px" src="<?php echo base_url(); ?>uploads/<?php echo $product->image; ?>" class="img-responsive"></img>
                                </td>
                                <td>
                                    <?php echo $product->title; ?>
                                </td>
                                 <td>
                                    <?php echo $_SESSION['currency']; ?> <?php echo $product->unit_price; ?>
                                </td>
                                <td>
                                    <?php echo $_SESSION['currency']; ?> <?php echo $product->wholesale_price; ?>
                                </td>
                                <td>
                                    <?php
                                    if($product->stock > 0)
                                    {
                                    ?>
                                        <?php echo $product->stock; ?> Unidad(es)
                                    <?php
                                    }
                                    else
                                    {
                                    ?>
                                        Agotado
                                    <?php
                                    }
                                    ?>
                                </td>
                                <td>
                                    <form enctype="multipart/form-data" action="<?php echo base_url(); ?>index.php/wholesalecart/store" method="post" class="cart">
                                        <?php
                                        if($product->stock > 0)
                                        {
                                        ?>
                                        <div class="quantity">
                                            <input id="quantity" type="number" class="input-text qty text" title="Qty" value="0" name="quantity<?php echo $i; ?>" min="1" step="1">
                                        </div>
                                        <input type="hidden" value="<?php echo $product->id_product; ?>" class="input-text qty text" title="Qty" value="0" name="id_product<?php echo $i; ?>" min="1" step="1">
                                        <input type="hidden" class="input-text qty text" title="Qty" value="<?php echo $i; ?>" name="records">
                                        <button type="submit" class="btn btn-primary btn-icon">Agregar al carro</button>
                                        <?php
                                        }
                                        ?>
                                    </form>
                                </td>
                            </tr>
                        <?php
                            $i = $i + 1;
                        }
                        ?>
                    </tbody>
                </table>
               
                <div class="row">
                    <div class="col-md-12">
                        <hr class="tall">
                    </div>
                </div>
            </div> 
        </div>
    </div>
    
<?php
require('footer.php');
?>