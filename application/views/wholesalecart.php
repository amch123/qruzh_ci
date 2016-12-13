<?php
require('wholesaleheader.php');
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
                                                        if($this->shop2->total_articles() > 0)
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
                                                            if($this->shop2->total_articles() > 0)
                                                            {
                                                                foreach($this->shop2->get_content() as $items)
                                                                {
                                                            ?>
                                                                    <tr class="cart_table_item">
                                                                        <td class="product-remove">
                                                                            <a title="Remove this item" class="remove" href="<?php echo base_url(); ?>index.php/wholesalecart/destroy/<?php echo $items['rowid']; ?>">
                                                                                <i class="fa fa-times"></i>
                                                                            </a>
                                                                        </td>
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
                                                                            <form enctype="multipart/form-data" method="post" class="cart">
                                                                                <div class="quantity">
                                                                                    <input type="number" class="input-text qty text" title="Qty" value="<?php echo $items['qty']; ?>" name="quantity" min="0" step="1">
                                                                                </div>
                                                                            </form>
                                                                        </td>
                                                                        <td class="product-subtotal">
                                                                            <span class="amount"><?php echo $_SESSION['currency']; ?> <?php echo $items['qty']*$items['price']; ?></span>
                                                                        </td>
                                                                    </tr>
                                                            <?php
                                                                }
                                                            ?>
                                                                <tr>
                                                                    <td class="actions" colspan="6">
                                                                        <div class="actions-continue">
                                                                            <input type="submit" value="Actualizar Carro" name="update_cart" class="btn btn-default">
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            <?php
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
                            if($this->shop2->total_articles() > 0)
                            {
                            ?>
                                <form id="searchForm" action="<?php echo base_url(); ?>index.php/shipping/sessionshipping" method="post">
                                    <div class="featured-boxes">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <div class="featured-box featured-box-primary align-left mt-xlg">
                                                    <div class="box-content">
                                                        <h4 class="heading-primary text-uppercase mb-md">Empresa de Envio</h4>
                                                        <div class="row">
                                                            <div class="form-group">
                                                                <div class="col-md-12">
                                                                    <label>Empresa</label>
                                                                    <select name="id_shipping_company" class="form-control" required>
                                                                        <option value="">-Seleccione-</option>
                                                                        <?php
                                                                         foreach($shipping_companies->result() as $shipping_company)
                                                                        {        
                                                                        ?>
                                                                            <option value="<?php echo $shipping_company->id_shipping_company; ?>"><?php echo $shipping_company->company_name; ?></option>
                                                                        <?php
                                                                        }       
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="featured-box featured-box-primary align-left mt-xlg">
                                                    <div class="box-content">
                                                        <h4 class="heading-primary text-uppercase mb-md">Total</h4>
                                                        <table class="cart-totals">
                                                            <tbody>
                                                                <tr class="cart-subtotal">
                                                                    <th>
                                                                        <strong>Subtotal</strong>
                                                                    </th>
                                                                    <td>
                                                                        <strong><span class="amount"><?php echo $_SESSION['currency']; ?> <?php echo $this->shop2->total_cart(); ?></span></strong>
                                                                    </td>
                                                                </tr>
                                                                <tr class="tax">
                                                                    <th>
                                                                        <strong>Impuesto (<?php echo $_SESSION['tax']; ?> %)</strong>
                                                                    </th>
                                                                    <td>
                                                                        <strong><span class="amount"><?php echo $_SESSION['currency']; ?> <?php echo $tax = ($this->shop2->total_cart() * 12)/100; ?></span></strong>
                                                                    </td>
                                                                </tr>
                                                                <tr class="total">
                                                                    <th>
                                                                        <strong>Total</strong>
                                                                    </th>
                                                                    <td>
                                                                        <strong><span class="amount"><?php echo $_SESSION['currency']; ?> <?php echo $tax + $this->shop2->total_cart(); ?></span></strong>
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
                                                <input type="hidden" name="wholesalecart" value="1">
                                                <button type="submit" class="btn pull-right btn-primary btn-lg">Proceder a Pagar <i class="fa fa-angle-right ml-xs"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
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