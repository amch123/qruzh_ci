<?php
require('header.php');
?>
    <div role="main" class="main">

        <div role="main" class="main">
            <section class="page-header page-header-light page-header-more-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1>Ordenes de Compras<span></span></h1>
                            <ul class="breadcrumb breadcrumb-valign-mid">
                                <li><a href="<?php echo base_url(); ?>index.php/account/order">Ordenes de Compras</a></li>
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
                            <strong>Exito!</strong> Se ha borrado la orden de compra.
                        </div>
                    <?php 
                        unset($_SESSION['delete_status']);
                    }
                    ?>
                    <table id="productcrud" class="table">
                        <thead>
                            <tr>
                                <th>
                                    Id
                                </th>
                                <th>
                                    Cliente
                                </th>
                                <th>
                                    Subtotal
                                </th>
                                <th>
                                    Impuesto
                                </th>
                                <th>
                                    Total
                                </th>
                                <th>
                                    Fecha
                                </th>
                                <th>
                                    
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if($orders != "")
                            {
                                foreach($orders->result() as $order)
                                {
                            ?>
                                    <tr>
                                        <td>
                                            <?php echo $order->id_order; ?>
                                        </td>
                                        <td>
                                            <?php echo $order->name; ?>
                                        </td>
                                        <td>
                                            <?php echo $_SESSION['currency']; ?> <?php echo $order->subtotal; ?>
                                        </td>
                                        <td>
                                            <?php echo $_SESSION['currency']; ?> <?php echo $order->total_tax; ?>
                                        </td>
                                        <td>
                                            <?php echo $_SESSION['currency']; ?> <?php echo $order->total_amount; ?>
                                        </td>
                                        <td>
                                            <?php echo $order->custom_created_at; ?>
                                        </td>
                                        <td>
                                            <a href="<?php echo base_url(); ?>index.php/account/order/show/<?php echo $order->id_order; ?>">
                                                <i class="fa fa-eye" aria-hidden="true"></i></a>
                                            <a href="<?php echo base_url(); ?>index.php/account/order/delete/<?php echo $order->id_order; ?>">
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