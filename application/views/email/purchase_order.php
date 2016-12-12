<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title></title>
<style type="text/css">
<!--
.Estilo3 {color: #FF6600}
-->
</style>
</head>
<body style="font-family:"Helvetica Neue", Helvetica, Arial, sans-serif; background-color:#eeeeee; margin:0; padding:0; color:#333333;">

<table width="100%" bgcolor="#eeeeee" cellpadding="0" cellspacing="0" border="0">
    <tbody>
        <tr>
            <td>
                <table cellpadding="0" cellspacing="0" width="600" border="0" align="center">
                    <tbody>
                        <tr>
                            <td height="40" style="font-size:12px;" align="center"></td></tr>
                        <tr>
                            <td>
                                <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                    <tbody>
                                        <tr>
                                            <td colspan="3" rowspan="3" bgcolor="#FFFFFF" style="padding:0">
                                                <!-- inicio contenido -->
                                                <a href="#"><img src="'. base_url() .'template/img/header.jpg" width="600" alt="" style="display:block; border:0; margin:0 0 44px; background:#ffffff;"></a>                           <!-- inicio articulos -->
                                                <table cellpadding="0" cellspacing="0" border="0" width="100%">
                                                    <tbody>
                                                        <tr valign="top">
                                                            <td width="30"><p style="margin:0; font-size:1px; line-height:1px;">&nbsp;</p></td>
                                                            <td width="30"><p style="margin:0; font-size:1px; line-height:1px;">&nbsp;</p></td>                                                                        <td width="30"><p style="margin:0; font-size:1px; line-height:1px;">&nbsp;</p></td>
                                                        </tr>
                                                        <tr valign="top">
                                                            <td width="30"><p style="margin:0; font-size:1px; line-height:1px;">&nbsp;</p>
                                                            </td>

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
                                                                            '.$order[0]->name.'
                                                                        </td>
                                                                        <td>
                                                                            '.$_SESSION['currency'].''.$order[0]->total_tax.'
                                                                        </td>
                                                                        <td>
                                                                            '.$_SESSION['currency'].' '.$order[0]->total_amount.'
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
                                                                    
                                                                    '.if($orders_products != "").'

                                                                        '.foreach($orders_products->result() as $order_product).'

                                                                            <tr>
                                                                                <td>
                                                                                    '.$order_product->id_product.'
                                                                                </td>
                                                                                <td>
                                                                                    '.$order_product->title.'
                                                                                </td>
                                                                                <td>
                                                                                    '.$order_product->quantity.'
                                                                                </td>
                                                                                <td>
                                                                                    '.$_SESSION['currency'].' '.$order_product->unit_price.'
                                                                                </td>
                                                                                <td>
                                                                                    '.$_SESSION['currency'].' '$order_product->unit_price*$order_product->quantity.'
                                                                                </td>
                                                                            </tr>     
                                                                </tbody>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <!-- /fin articulos -->
                                                <table style="margin:0; font-size:5px; line-height:5px;" bgcolor="#DDDDDD" width="600" cellpadding="0" cellspacing="0"><tr><td height="30">&nbsp;</td></tr></table>
                                                <table cellpadding="0" cellspacing="0" border="0" width="100%" bgcolor="#DDDDDD">
                                                    <tbody>
                                                        <tr valign="top">
                                                            <td width="30"><p style="margin:0; font-size:1px; line-height:1px;">&nbsp;</p></td>
                                                            <td width="400">
                                                                <p style="margin:0 0 4px; font-weight:bold; color:#333333; font-size:14px; line-height:22px;">MOBILEPHONE</p>
                                                                <p style="margin:0; color:#333333; font-size:11px; line-height:18px;">Website:<span class="Estilo3"> <a href="#" target="_blank" style="color:#ff6600; text-decoration:none; font-weight:bold;">www.qruzh.com</a><strong>.mx</strong></span>
                                                                </p>
                                                            </td>
                                                            <td width="26"><p style="margin:0; font-size:1px; line-height:1px;">&nbsp;</p>
                                                            </td>
                                                            <td width="114">
                                                                <a href="'. $_SESSION["facebook"] .'" target="_blank" style="float:left; width:24px; height:24px; margin:6px 15px 10px 0;"><img src="'. base_url() .'template/img/facebook.png" alt="facebook" style="display:block; margin:0; border:0; background:#eeeeee;"></a>
                                                                <a href="'.$_SESSION["twitter"].'" target="_blank" style="float:left; width:24px; height:24px; margin:6px 15px 10px 0;"><img src="'. base_url() .'template/img/twitter.png" alt="twitter" style="display:block; margin:0; border:0; background:#eeeeee;"></a>
                                                            </td>
                                                            <td width="30"><p style="margin:0; font-size:1px; line-height:1px;">&nbsp;</p>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <!-- fin contenido --> 
                                                <table style="margin:0; font-size:5px; line-height:5px;" bgcolor="#DDDDDD" width="600" cellpadding="0" cellspacing="0"><tr><td height="30">&nbsp;</td></tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                
                                <p style="margin:0; padding:20px 0 20px 0; text-align:center; font-size:11px;line-height:13px; color:#333333;">
                                    Si no quiere seguir recibiendo emails puede <a href="[unsubscribe_url_direct]" style="color:#3399cc; text-decoration:underline; font-weight:bold;">darse de baja</a>
                                </p>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <!-- end main block -->
            </td>
        </tr>
    </tbody>
</table>
</body>
</html>
