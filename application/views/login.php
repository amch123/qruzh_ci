<?php
require('header.php');
?>
	<div role="main" class="main shop">

        <div role="main" class="main">
            <section class="page-header page-header-light page-header-more-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1>Ingresar<span></span></h1>
                            <ul class="breadcrumb breadcrumb-valign-mid">
                                <li><a href="{{ url('/') }}">Inicio</a></li>
                                <li class="active">Ingresar</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
        </div>


        <div class="container">
            <?php 
            if(isset($_SESSION['activate_status']))
            {
            ?>
                <div class="alert alert-success">
                    <strong>Exito!</strong> Se ha activado la cuenta. Ya puede iniciar sesión.
                </div>
            <?php 
                unset($_SESSION['activate_status']);
            }
            ?>
            <?php 
            if(isset($_SESSION['update_status']))
            {
            ?>
                <div class="alert alert-success">
                    <strong>Exito!</strong> La contraseña se ha editado con éxito.
                </div>
            <?php 
                unset($_SESSION['update_status']);
            }
            ?>
            <?php 
            if(isset($_SESSION['login_status']) && ($_SESSION['login_status'] == 0))
            {
            ?>
                <div class="alert alert-danger">
                    <strong>Error!</strong> El usuario aún no está activado. Verifique el correo.
                </div>
            <?php 
                unset($_SESSION['login_status']);
            }
            ?>
            <?php 
            if(isset($_SESSION['login_status']) && ($_SESSION['login_status'] == 2))
            {
            ?>
                <div class="alert alert-danger">
                    <strong>Error!</strong> Ingrese correctamente los datos.
                </div>
            <?php 
                unset($_SESSION['login_status']);
            }
            ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="featured-boxes">
                        <div class="row">
                            <div class="col-sm-4">
                            </div>
                            <div class="col-sm-4">
                                <div class="featured-box featured-box-primary align-left mt-xlg">
                                    <div class="box-content">
                                        <h4 class="heading-primary text-uppercase mb-md">Ingresa</h4>
                                        <form action="<?php echo base_url(); ?>index.php/user/sessionStart" id="frmSignIn" method="post">
                                            <div class="row">
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <label>Correo</label>
                                                        <input type="text" name="email" value="" class="form-control input-lg">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <a class="pull-right" href="<?php echo base_url(); ?>index.php/user/forgotpassword">(Olvidó la contraseña?)</a>
                                                        <label>Contraseña</label>
                                                        <input type="password" name="password" value="" class="form-control input-lg">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <span class="remember-box checkbox">
                                                        <label for="rememberme">
                                                            <input type="checkbox" name="remember"> Recordarme
                                                        </label>
                                                    </span>
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="hidden" name="checkout" value="<?php if($this->uri->segment(2) == "checkout") { ?> 1<?php } ?>">
                                                    <input type="submit" value="Ingresar" class="btn btn-warning btn-lg btn-block pull-right mb-xl" data-loading-text="Loading...">
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