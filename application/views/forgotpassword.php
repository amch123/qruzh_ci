<?php
require('header.php');
?>
	<div role="main" class="main shop">

        <div role="main" class="main">
            <section class="page-header page-header-light page-header-more-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1>Recuperar contraseña<span></span></h1>
                            <ul class="breadcrumb breadcrumb-valign-mid">
                                <li><a href="{{ url('/') }}">Inicio</a></li>
                                <li class="active">Recuperar contraseña</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
        </div>


        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <?php 
                    if(isset($_SESSION['update_status']) && ($_SESSION['update_status'] == 1))
                    {
                    ?>
                        <div class="alert alert-success">
                            <strong>Exito!</strong> Se ha enviado un correo para la recuperación de la contraseña.
                        </div>
                    <?php 
                        unset($_SESSION['update_status']);
                    }
                    ?>
                    <?php 
                    if(isset($_SESSION['update_status']) && ($_SESSION['update_status'] == 0))
                    {
                    ?>
                        <div class="alert alert-danger">
                            <strong>Error!</strong> No se ha conseguido el usuario en el sistema.
                        </div>
                    <?php 
                        unset($_SESSION['update_status']);
                    }
                    ?>
                    <div class="featured-boxes">
                        <div class="row">
                            <div class="col-sm-4">
                            </div>
                            <div class="col-sm-4">
                                <div class="featured-box featured-box-primary align-left mt-xlg">
                                    <div class="box-content">
                                        <h4 class="heading-primary text-uppercase mb-md">¿Olvido Contraseña?</h4>
                                        <form action="<?php echo base_url(); ?>index.php/user/recoverpassword" id="frmSignIn" method="post">
                                            <div class="row">
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <label>Correo</label>
                                                        <input type="text" name="email" value="" class="form-control input-lg">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <input type="submit" value="Recuperar" class="btn btn-warning btn-lg btn-block pull-right mb-xl" data-loading-text="Loading...">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-4">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
<?php
require('footer.php');
?>