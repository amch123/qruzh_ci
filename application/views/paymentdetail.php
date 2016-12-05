<?php
require('header.php');
?>
    <div role="main" class="main">

        <div role="main" class="main">
            <section class="page-header page-header-light page-header-more-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1>Detalle del Pago<span></span></h1>
                            <ul class="breadcrumb breadcrumb-valign-mid">
                                <li><a href="<?php echo base_url(); ?>index.php/account/payment">Pagos</a> / <a href="<?php echo base_url(); ?>index.php/account/payment/show/<?php echo $this->uri->segment(4); ?>">Detalle del Pago</a></li>
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
                                <th>
                                    Tipo de Pago
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <?php echo $payment[0]->name; ?>
                                </td>
                                <td>
                                    <?php echo $_SESSION['currency']; ?> <?php echo $payment[0]->total_tax; ?>
                                </td>
                                <td>
                                    <?php echo $_SESSION['currency']; ?> <?php echo $payment[0]->total_amount; ?>
                                </td>
                                <td>
                                    <?php echo $payment[0]->payment_type; ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <hr>
                    <h3>Productos de la Orden</h3>
                    <hr>
                    <table id="productcrud" class="table table-responsive">
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