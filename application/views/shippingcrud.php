<?php
require('header.php');
?>
    <div role="main" class="main">

        <div role="main" class="main">
            <section class="page-header page-header-light page-header-more-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1>Envios<span></span></h1>
                            <ul class="breadcrumb breadcrumb-valign-mid">
                                <li><a href="<?php echo base_url(); ?>index.php/account/shipping">Envios</a></li>
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
                    <a href="<?php echo base_url(); ?>index.php/account/user/create"><button type="button" class="btn btn-default mr-xs mb-sm">Agregar Envio</button></a></i></button>
                    <hr>
                    <?php 
                    if(isset($_SESSION['store_status']))
                    {
                    ?>
                        <div class="alert alert-success">
                            <strong>Exito!</strong> Se ha guardado el envio.
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
                            <strong>Exito!</strong> Se ha borrado el envio.
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
                                    Id Orden
                                </th>
                                <th>
                                    Cliente
                                </th>
                                <th>
                                    Empresa de Envio
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
                            if($shippings != "")
                            {
                                foreach($shippings->result() as $shipping)
                                {
                            ?>
                                    <tr>
                                        <td>
                                            <?php echo $shipping->id_shipping; ?>
                                        </td>
                                        <td>
                                            <?php echo $shipping->name; ?>
                                        </td>
                                        <td>
                                            <?php echo $shipping->shipping_company; ?>
                                        </td>
                                        <td>
                                            <?php echo $user->custom_created_at; ?>
                                        </td>
                                        <td>
                                            <a href="<?php echo base_url(); ?>index.php/account/shipping/edit/<?php echo $shipping->id_shipping; ?>">
                                                <i class="fa fa-pencil" aria-hidden="true"></i></a>
                                            <a href="<?php echo base_url(); ?>index.php/account/shipping/delete/<?php echo $shipping->id_shipping; ?>">
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