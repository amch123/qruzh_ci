<?php
require('header.php');
?>
    <div role="main" class="main">

        <div role="main" class="main">
            <section class="page-header page-header-light page-header-more-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1>Productos<span></span></h1>
                            <ul class="breadcrumb breadcrumb-valign-mid">
                                <li><a href="{{ url('/product') }}">Porductos</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <div class="container">

            <div class="row">
                <div class="col-md-3">
                    <aside class="sidebar">

                        <h4 class="heading-primary">Menu</h4>
                        <ul class="nav nav-list mb-xlg">
                            <?php
                            if($_SESSION['id_role'] == 1)
                            {
                            ?>
                                <li class="active">
                                    <a href="#">Productos</a>
                                </li>
                                <li>
                                    <a href="#">Pagos</a>
                                </li>
                                <li class="active">
                                    <a href="#">Envios</a>
                                </li>
                                <li>
                                    <a href="#">Usuarios</a>
                                </li>
                                <li>
                                    <a href="#">Configuraciones</a>
                                </li>
                                <li>
                                    <a href="#">Mi Cuenta</a>
                                </li>
                                <li >
                                    <a href="#">Cerrar Sesión</a>
                                </li>
                            <?php
                            } 
                            else if($_SESSION['id_role'] == 2)
                            {
                            ?>
                                <li class="active">
                                    <a href="#">Tus Compras</a>
                                </li>
                                <li class="active">
                                    <a href="#">Tus Pagos</a>
                                </li>
                                <li class="active">
                                    <a href="#">Envios</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>index.php/user/sessionDestroy">Cerrar Sesión</a>
                                </li>
                            <?php
                            }
                            ?>
                        </ul>
                    </aside>
                </div>
                <div class="col-md-9">
                    <a href="<?php echo base_url(); ?>product/create"><button type="button" class="btn btn-default mr-xs mb-sm">Agregar Producto</button></a></i></button>
                    <hr>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>
                                    Id
                                </th>
                                <th>
                                    Titulo
                                </th>
                                <th>
                                    Precio Unitario
                                </th>
                                <th>
                                    Precio al Mayor
                                </th>
                                <th>
                                    
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                     
                                </td>
                                <td>
                                
                                </td>
                                <td>
                    
                                </td>
                                <td>
                    
                                </td>
                                <td>
                                    <i class="fa fa-pencil" aria-hidden="true"></i>
                                    <i class="fa fa-times" aria-hidden="true"></i>
                                </td>
                            </tr>         
                        </tbody>
                    </table>
                </div>

            </div>

        </div>

    </div>
<?php
require('footer.php');
?>