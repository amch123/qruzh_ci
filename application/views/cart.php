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

                            <div class="featured-boxes">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="featured-box featured-box-primary align-left mt-sm">
                                            <div class="box-content">
                                                <form method="post" action="">
                                                    <table class="shop_table cart">
                                                        <?php
                                                        if($this->cart->total_items() > 0)
                                                        {
                                                        ?>
                                                            <thead>
                                                                <tr>
                                                                    <th class="product-remove">
                                                                        &nbsp;
                                                                    </th>
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
                                                        <?php
                                                        }
                                                        ?>
                                                        <tbody>
                                                            <?php
                                                            if($this->cart->total_items() > 0)
                                                            {
                                                                foreach($this->cart->contents() as $items)
                                                                {
                                                            ?>
                                                                    <tr class="cart_table_item">
                                                                        <td class="product-remove">
                                                                            <a title="Remove this item" class="remove" href="#">
                                                                                <i class="fa fa-times"></i>
                                                                            </a>
                                                                        </td>
                                                                        <td class="product-thumbnail">
                                                                            <a href="shop-product-sidebar.html">
                                                                                <img width="100" height="100" alt="" class="img-responsive" src="img/products/product-1.jpg">
                                                                            </a>
                                                                        </td>
                                                                        <td class="product-name">
                                                                            <a href="shop-product-sidebar.html">Photo Camera</a>
                                                                        </td>
                                                                        <td class="product-price">
                                                                            <span class="amount">$299</span>
                                                                        </td>
                                                                        <td class="product-quantity">
                                                                            <form enctype="multipart/form-data" method="post" class="cart">
                                                                                <div class="quantity">
                                                                                    <input type="button" class="minus" value="-">
                                                                                    <input type="text" class="input-text qty text" title="Qty" value="1" name="quantity" min="1" step="1">
                                                                                    <input type="button" class="plus" value="+">
                                                                                </div>
                                                                            </form>
                                                                        </td>
                                                                        <td class="product-subtotal">
                                                                            <span class="amount">$299</span>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="actions" colspan="6">
                                                                            <div class="actions-continue">
                                                                                <input type="submit" value="Update Cart" name="update_cart" class="btn btn-default">
                                                                            </div>
                                                                        </td>
                                                                    </tr>
                                                            <?php
                                                                }
                                                            }
                                                            else
                                                            {
                                                            ?>
                                                                <tr class="cart_table_item">
                                                                    <td class="product-thumbnail text-center">
                                                                        No hay productos en el carro
                                                                    </td> 
                                                                </tr>
                                                            <?php
                                                            }
                                                            ?>
                                                        </tbody>
                                                    </table>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php
                            if($this->cart->total_items() > 0)
                            {
                            ?>
                                <div class="featured-boxes">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="featured-box featured-box-primary align-left mt-xlg">
                                                <div class="box-content">
                                                    <h4 class="heading-primary text-uppercase mb-md">Empresa de Envio</h4>
                                                    <form action="/" id="frmCalculateShipping" method="post">
                                                        <div class="row">
                                                            <div class="form-group">
                                                                <div class="col-md-12">
                                                                    <label>Empresa</label>
                                                                    <select class="form-control">
                                                                        <option value="">-Seleccione-</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="featured-box featured-box-primary align-left mt-xlg">
                                                <div class="box-content">
                                                    <h4 class="heading-primary text-uppercase mb-md">Cart Totals</h4>
                                                    <table class="cart-totals">
                                                        <tbody>
                                                            <tr class="cart-subtotal">
                                                                <th>
                                                                    <strong>Cart Subtotal</strong>
                                                                </th>
                                                                <td>
                                                                    <strong><span class="amount">$431</span></strong>
                                                                </td>
                                                            </tr>
                                                            <tr class="shipping">
                                                                <th>
                                                                    Shipping
                                                                </th>
                                                                <td>
                                                                    Free Shipping<input type="hidden" value="free_shipping" id="shipping_method" name="shipping_method">
                                                                </td>
                                                            </tr>
                                                            <tr class="total">
                                                                <th>
                                                                    <strong>Order Total</strong>
                                                                </th>
                                                                <td>
                                                                    <strong><span class="amount">$431</span></strong>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="actions-continue">
                                            <button type="submit" class="btn pull-right btn-primary btn-lg">Proceed to Checkout <i class="fa fa-angle-right ml-xs"></i></button>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>

                        </div>
                    </div>

                </div>

            </div>
<?php
require('footer.php');
?>