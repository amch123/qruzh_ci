<?php
require('header.php');
?>
    <div role="main" class="main">

        <div role="main" class="main">
            <section class="page-header page-header-light page-header-more-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1>Detalle de la Orden de Compra<span></span></h1>
                            <ul class="breadcrumb breadcrumb-valign-mid">
                                <li><a href="<?php echo base_url(); ?>index.php/account/order">Ordenes de Compras</a> / <a href="<?php echo base_url(); ?>index.php/account/order/show/<?php echo $this->uri->segment(4); ?>">Detalle de la Orden de Compra</a></li>
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
                    if(isset($_SESSION['delete_status']))
                    {
                    ?>
                        <div class="alert alert-success">
                            <strong>Exito!</strong> Se ha borrado el producto de la orden.
                        </div>
                    <?php 
                        unset($_SESSION['delete_status']);
                    }
                    ?>
                    <?php 
                    if($_SESSION['id_role'] == 1)
                    {
                    ?>
                        <hr>
                        <form action="<?php echo base_url(); ?>index.php/account/order/update" id="frmSignUp" method="post">
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <label>Estatus de la Orden de Compra</label>
                                        <select class="form-control" name="id_order_status" required>
                                            <option value="">-Seleccione-</option>
                                            <?php
                                            foreach($statuses->result() as $status)
                                            {
                                            ?>
                                                <option <?php if($order[0]->status == $status->id_order_status) { ?> selected <?php } ?> value="<?php echo $status->id_order_status; ?>"><?php echo $status->order_status; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                                                    
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="hidden" name="id_order" value="<?php echo $order[0]->id_order; ?>">
                                    <input type="submit" value="Editar" class="btn btn-warning btn-lg btn-block pull-right mb-xl" data-loading-text="Loading...">
                                </div>
                            </div>
                        </form>
                    <?php 
                    }
                    ?>
                        <hr>
                        <table class="table table-bordered">
                             <thead>
                                <tr>
                                    <th>
                                        Cliente
                                    </th>
                                    <th>
                                        Impuesto
                                    </th>
                                    <th>
                                        Monto
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <?php echo $order[0]->name; ?>
                                    </td>
                                    <td>
                                        <?php echo $_SESSION['currency']; ?> <?php echo $order[0]->total_tax; ?>
                                    </td>
                                    <td>
                                        <?php echo $_SESSION['currency']; ?> <?php echo $order[0]->total_amount; ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    <hr>
                    <h3>Productos de la Orden</h3>
                    <hr>
                    <table id="crud" class="table table-responsive">
                        <thead>
                            <tr>
                                <th>
                                    Id
                                </th>
                                <th>
                                    Producto
                                </th>
                                <th>
                                    Cantidad
                                </th>
                                <th>
                                    Precio
                                </th>
                                <th>
                                    Subtotal
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if($orders_products != "")
                            {
                                foreach($orders_products->result() as $order_product)
                                {
                            ?>
                                    <tr>
                                        <td>
                                            <?php echo $order_product->id_product; ?>
                                        </td>
                                        <td>
                                            <?php echo $order_product->title; ?>
                                        </td>
                                        <td>
                                            <?php echo $order_product->quantity; ?>
                                        </td>
                                        <td>
                                            <?php echo $_SESSION['currency']; ?> <?php echo $order_product->unit_price; ?>
                                        </td>
                                        <td>
                                            <?php echo $_SESSION['currency']; ?> <?php echo $order_product->unit_price*$order_product->quantity; ?>
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