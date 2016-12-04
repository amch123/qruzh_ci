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
                                <li><a href="<?php echo base_url(); ?>index.php/account/product">Productos</a></li>
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
                    <a href="<?php echo base_url(); ?>index.php/account/user/create"><button type="button" class="btn btn-default mr-xs mb-sm">Agregar Usuario</button></a></i></button>
                    <hr>
                    <?php 
                    if(isset($_SESSION['store_status']))
                    {
                    ?>
                        <div class="alert alert-success">
                            <strong>Exito!</strong> Se ha guardado el usuario.
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
                            <strong>Exito!</strong> Se ha borrado el usario.
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
                                    Nombre
                                </th>
                                <th>
                                    Correo
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
                            if($users != "")
                            {
                                foreach($users->result() as $user)
                                {
                            ?>
                                    <tr>
                                        <td>
                                            <?php echo $user->id_user; ?>
                                        </td>
                                        <td>
                                            <?php echo $user->name; ?>
                                        </td>
                                        <td>
                                            <?php echo $user->email; ?>
                                        </td>
                                        <td>
                                            <?php echo $user->custom_created_at; ?>
                                        </td>
                                        <td>
                                            <a href="<?php echo base_url(); ?>index.php/account/user/edit/<?php echo $user->id_user; ?>">
                                                <i class="fa fa-pencil" aria-hidden="true"></i></a>
                                            <a href="<?php echo base_url(); ?>index.php/account/user/delete/<?php echo $user->id_user; ?>">
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