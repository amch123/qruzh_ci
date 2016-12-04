<?php
require('header.php');
?>
    <div role="main" class="main">

        <div role="main" class="main">
            <section class="page-header page-header-light page-header-more-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1>Pagos<span></span></h1>
                            <ul class="breadcrumb breadcrumb-valign-mid">
                                <li><a href="<?php echo base_url(); ?>index.php/account/payment">Pagos</a></li>
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
                    <table id="productcrud" class="table">
                        <thead>
                            <tr>
                                <th>
                                    Id
                                </th>
                                <th>
                                    Order
                                </th>
                                <th>
                                    Monto
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
                            if($payments != "")
                            {
                                foreach($payments->result() as $payment)
                                {
                            ?>
                                    <tr>
                                        <td>
                                            <?php echo $payment->id_payment; ?>
                                        </td>
                                        <td>
                                            <?php echo $payment->id_order; ?>
                                        </td>
                                        <td>
                                            <?php echo $payment->total_amount; ?>
                                        </td>
                                        <td>
                                            <?php echo $product->custom_created_at; ?>
                                        </td>
                                        <td>
                                            <a href="<?php echo base_url(); ?>index.php/account/payment/edit/<?php echo $payment->id_payment; ?>">
                                                <i class="fa fa-check" aria-hidden="true"></i></a>
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