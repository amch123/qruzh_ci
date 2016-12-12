<?php
require('header.php');
?>
	<div role="main" class="main shop">

        <div role="main" class="main">
            <section class="page-header page-header-light page-header-more-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1>Nueva Contraseña<span></span></h1>
                            <ul class="breadcrumb breadcrumb-valign-mid">
                                <li><a href="{{ url('/') }}">Inicio</a></li>
                                <li class="active">Nueva Contraseña</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
        </div>


        <div class="container">

            <div class="row">
                <div class="col-md-12">
                    <div class="featured-boxes">
                        <div class="row">
                            <div class="col-sm-4">
                            </div>
                            <div class="col-sm-4">
                                <div class="featured-box featured-box-primary align-left mt-xlg">
                                    <div class="box-content">
                                        <h4 class="heading-primary text-uppercase mb-md">Crea Una Nueva Contraseña</h4>
                                        <form action="<?php echo base_url(); ?>index.php/user/updatepassword" id="frmSignIn" method="post">
                                            <div class="row">
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <label>Ingrese su nueva contraseña</label>
                                                        <input type="password" name="password" value="" class="form-control input-lg" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <input type="hidden" name="activation_code" value="<?php echo $this->uri->segment(3); ?>">
                                                    <input type="submit" value="Editar" class="btn btn-warning btn-lg btn-block pull-right mb-xl" data-loading-text="Loading...">
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