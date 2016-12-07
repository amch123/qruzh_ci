<?php
require('header.php');
?>
    <div role="main" class="main shop">

        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <hr class="tall">
                </div>
            </div>

                    <div class="row">
                        <div class="col-md-12">
                            <h2 class="mb-none"><strong>Confirmar Orden de Compra</strong></h2>
                        </div>
                    </div>

                    <div class="row">
                        <form action="<?php echo base_url(); ?>index.php/account/order/store" id="frmShippingAddress" method="post">
                            <div class="col-md-12">

                                <div class="panel-group" id="accordion">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                                    Dirección de Envio
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseOne" class="accordion-body collapse in">
                                            <div class="panel-body">
                                                    <div class="row">
                                                        <div class="form-group">
                                                            <div class="col-md-6">
                                                                <label>Nombre</label>
                                                                <input type="text" name="name" value="" class="form-control">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label>Apellido</label>
                                                                <input type="text" name="lastname" value="" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                <div class="row">
                                                    <div class="form-group">
                                                        <div class="col-md-12">
                                                            <label>Dirección </label>
                                                            <input type="text" name="adress" value="" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group">
                                                        <div class="col-md-6">
                                                            <label>Ciudad </label>
                                                            <input type="text" value="" name="city" class="form-control">
                                                        </div>
                                                        <div class="col-md-6">
                                                            <label>Teléfono </label>
                                                            <input type="text" value="" name="phone" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                                    Orden
                                                </a>
                                            </h4>
                                        </div>
                                        <div id="collapseThree" class="accordion-body collapse in">
                                            <div class="panel-body">
                                                <table class="shop_table cart">
                                                    <thead>
                                                        <tr>
                                                            <th class="product-thumbnail">
                                                                &nbsp;
                                                            </th>
                                                            <th class="product-name">
                                                                Producto
                                                            </th>
                                                            <th class="product-price">
                                                                Precio
                                                            </th>
                                                            <th class="product-quantity">
                                                                Cantidad
                                                            </th>
                                                            <th class="product-subtotal">
                                                                Total
                                                            </th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        foreach($this->shop1->get_content() as $items)
                                                        {
                                                        ?>
                                                            <tr class="cart_table_item">
                                                                <td class="product-thumbnail">
                                                                    <img width="100" height="100" src="<?php echo base_url(); ?>uploads/<?php echo $items['options']['image']; ?>" class="img-responsive"></img>
                                                                </td>
                                                                <td class="product-name">
                                                                    <a href="shop-product-sidebar.html"><?php echo $items['name']; ?></a>
                                                                </td>
                                                                <td class="product-price">
                                                                    <span class="amount"><?php echo $_SESSION['currency']; ?> <?php echo $items['price']; ?></span>
                                                                </td>
                                                                <td class="product-quantity">
                                                                    <?php echo $items['qty']; ?>
                                                                </td>
                                                                <td class="product-subtotal">
                                                                    <span class="amount"><?php echo $_SESSION['currency']; ?> <?php echo $items['qty']*$items['price']; ?></span>
                                                                </td>
                                                            </tr>
                                                        <?php
                                                        }
                                                        ?>
                                                    </tbody>
                                                </table>

                                                <hr class="tall">

                                                <h4 class="heading-primary">Cart Totals</h4>
                                                <table class="cart-totals">
                                                    <tbody>
                                                        <tr class="cart-subtotal">
                                                            <th>
                                                                <strong>Subtotal del Carro</strong>
                                                            </th>
                                                            <td>
                                                                <strong>
                                                                <span class="amount">
                                                                    <?php echo $_SESSION['currency']; ?> 
                                                                    <?php echo (($this->shop1->total_cart() * 12)/100) +$this->shop1->total_cart(); ?>
                                                                </span>
                                                                </strong>
                                                            </td>
                                                        </tr>
                                                        <tr class="shipping">
                                                            <th>
                                                                Envio (<?php echo $_SESSION['shipping_company']; ?>)
                                                            </th>
                                                            <td>
                                                                <?php echo $_SESSION['currency']; ?> <?php echo $_SESSION['shipping_price']; ?>
                                                            </td>
                                                        </tr>
                                                        <tr class="total">
                                                            <th>
                                                                <strong>Order Total</strong>
                                                            </th>
                                                            <td>
                                                                <strong>
                                                                <span class="amount">
                                                                <?php echo $_SESSION['currency']; ?>
                                                                <?php echo (($this->shop1->total_cart() * 12)/100) +$this->shop1->total_cart() + $_SESSION['shipping_price']; ?>
                                                                </span>
                                                                </strong>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="actions-continue">
                                    <input type="submit" value="Guardar Orden y Continuar" name="proceed" class="btn btn-lg btn-primary mt-xl">
                                </div>

                            </div>
                        </div>
                    </form>
                </div>

            </div>
<?php
require('footer.php');
?>