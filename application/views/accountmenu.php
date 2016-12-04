                    <aside class="sidebar">
                        <h4 class="heading-primary">Menu</h4>
                        <ul class="nav nav-list mb-xlg">
                            <?php
                            if($_SESSION['id_role'] == 1)
                            {
                            ?>
                                <li <?php if($_SESSION['account_button'] == 1) { ?> class="active" <?php } ?>>
                                    <a href="<?php echo base_url(); ?>index.php/account/product">Productos</a>
                                </li>
                                <li <?php if($_SESSION['account_button'] == 2) { ?> class="active" <?php } ?>>
                                    <a href="<?php echo base_url(); ?>index.php/account/payment">Pagos</a>
                                </li>
                                <li <?php if($_SESSION['account_button'] == 3) { ?> class="active" <?php } ?>>
                                    <a href="#">Envios</a>
                                </li>
                                <li <?php if($_SESSION['account_button'] == 4) { ?> class="active" <?php } ?>>
                                    <a href="<?php echo base_url(); ?>index.php/account/user">Usuarios</a>
                                </li>
                                <li>
                                    <a href="#">Configuraciones</a>
                                </li>
                                <li>
                                    <a href="<?php echo base_url(); ?>index.php/user/sessionDestroy">Cerrar Sesión</a>
                                </li>
                            <?php
                            } 
                            else if($_SESSION['id_role'] == 2)
                            {
                            ?>
                                <li>
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