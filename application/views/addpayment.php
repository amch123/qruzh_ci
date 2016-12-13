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
                                <li><a href="<?php echo base_url(); ?>index.php/account/payment/create">Agregar Pago</a></li>
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
                    <div class="featured-boxes">
                        <div class="row">
                            <div class="col-sm-1">
                            </div>
                            <div class="col-sm-10">
                                <div class="featured-box featured-box-primary align-left mt-xlg">
                                    <div class="box-content">
                                        <form action="https://www.paypal.com/cgi-bin/webscr" id="frmSignUp" method="post">
                                            <div class="row">
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <label>Orden de Compra a Pagar</label>
                                                         <select class="form-control" name="id_order" onchange="MM_jumpMenu('parent',this,0)" required>
                                                            <option value="<?php echo base_url(); ?>index.php/payment/create">-Seleccione-</option>
                                                            <?php
                                                            if($orders != "")
                                                            {
                                                                foreach($orders->result() as $order)
                                                                {
                                                            ?>
                                                                    <option  <?php if($order->id_order == $_SESSION['id_order']) { ?> selected <? } ?>value="<?php echo base_url(); ?>index.php/payment/getValues/<?php echo $order->id_order; ?>">Orden N- <?php echo $order->id_order; ?>. Monto a pagar <?php echo $_SESSION['currency']; ?> <?php echo $order->total_amount; ?></option>
                                                            <?php
                                                                }
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <?php 
                                                    if(isset($_SESSION['id_order']))
                                                     {
                                                    ?>
                                                        <!-- obligatory form paypal -->
                                                        <input type='hidden' name='cmd' value='_xclick'>
                                                        <input type='hidden' name='business' value='Gustavo.bolanos@biowaynetwork.com'>
                                                        <input type='hidden' name='item_name' value="Orden Nro: <?php echo $_SESSION['id_order']; ?>">   
                                                        <input type='hidden' name='item_number' value="<?php echo $_SESSION['id_order']; ?>">
                                                        <input type="hidden"  name='amount' 
                                                            value="<?php echo $_SESSION['total_amount']; ?>"
                                                            >
                                                        <input type='hidden' name='page_style' value='primary'>
                                                        <input type='hidden' name='no_shipping' value='1'>
                                                        <input type='hidden' name='return' value='<?php echo base_url(); ?>index.php/payment/store' >
                                                        <input type='hidden' name='rm' value='2'>
                                                        <input type='hidden' name='cancel_return' value='<?php echo base_url(); ?>index.php/payment'>
                                                        <input type='hidden' name='no_note' value='1'>
                                                        <input type='hidden' name='currency_code' value='MXN'>
                                                        <input type='hidden' name='cn' value='PP-BuyNowBF'>
                                                        <input type='hidden' name='custom' value=''>
                                                        <input type='hidden' name='night_phone_a' value=''>
                                                        <input type='hidden' name='night_phone_c' value=''>
                                                        <input type='hidden' name='lc' value='es'>
                                                        <input type='hidden' name='country' value='MX'>
                                                    <?php 
                                                    }
                                                    ?>
                                                    <input type="submit" value="Pagar" class="btn btn-warning btn-lg btn-block pull-right mb-xl" data-loading-text="Loading...">
                                                
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

    <div class="modal fade" id="defaultModal" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="defaultModalLabel">Agregar Imagen</h4>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url(); ?>index.php/account/image/store" id="frmSignUp" enctype="multipart/form-data" method="post">
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input type="file" name="image">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <input type="submit" value="Guardar" class="btn btn-warning btn-lg btn-block pull-right mb-xl" data-loading-text="Loading...">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php
require('footer.php');
?>