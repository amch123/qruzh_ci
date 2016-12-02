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
                <div class="col-md-3">
                    <aside class="sidebar">
                    <h4 class="heading-primary">Menú</h4>
                        <ul class="nav nav-list mb-xlg">
                            <li><a href="#">Datos de usuario</a></li>
                            <li class="active">
                                <a href="#">Datos de tienda</a>
                            </li>
                        </ul>
                    </aside>     
                </div>
                <div class="col-md-9">
                    <div class="featured-boxes">
                        <div class="row">
                            <div class="col-sm-2">
                            </div>
                            <div class="col-sm-8">
                                <div class="featured-box featured-box-primary align-left mt-xlg">
                                    <div class="box-content">
                                        <h4 class="heading-primary text-uppercase mb-md">Editar datos de usuario</h4>
                                        <form action="" id="frmSignUp" method="post">
                                            <div class="row">
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <label>Nombre Completo</label>
                                                        <input type="text" name="name" value="" class="form-control input-lg">
                                                            <span class="help-block">
                                                                <strong>nombre</strong>
                                                            </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <label>Correo</label>
                                                        <input type="email" name="email" value="" class="form-control input-lg">
                                                            <span class="help-block">
                                                                <strong>email</strong>
                                                            </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <label>Contraseña</label>
                                                        <input type="password" name="password" value="" class="form-control input-lg">
                                                            <span class="help-block">
                                                                <strong>password</strong>
                                                            </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <input type="submit" value="Editar" class="btn btn-primary pull-right mb-xl" data-loading-text="Loading...">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2">
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