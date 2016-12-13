<?php
require('header.php');
?>
    <div role="main" class="main">

        <div role="main" class="main">
            <section class="page-header page-header-light page-header-more-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1>Estados<span></span></h1>
                            <ul class="breadcrumb breadcrumb-valign-mid">
                                <li><a href="<?php echo base_url(); ?>index.php/account/state">Estados</a></li>
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
                    <a href="<?php echo base_url(); ?>index.php/account/state/create"><button type="button" class="btn btn-default mr-xs mb-sm">Agregar Estado</button></a></i></button>
                    <hr>
                    <?php 
                    if(isset($_SESSION['store_status']))
                    {
                    ?>
                        <div class="alert alert-success">
                            <strong>Exito!</strong> Se ha guardado el estado.
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
                            <strong>Exito!</strong> Se ha borrado el estado.
                        </div>
                    <?php 
                        unset($_SESSION['delete_status']);
                    }
                    ?>
                    <table id="crud" class="table table-responsive">
                        <thead>
                            <tr>
                                <th>
                                    Id
                                </th>
                                <th>
                                    Estado
                                </th>
                                <th>
                                    Tienda
                                </th>
                                <th>
                                    
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if($states != "")
                            {
                                foreach($states->result() as $state)
                                {
                            ?>
                                    <tr>
                                        <td>
                                            <?php echo $state->id_state; ?>
                                        </td>
                                        <td>
                                            <?php echo $state->state; ?>
                                        </td>
                                        <td>
                                            <?php echo $state->shop_name; ?>
                                        </td>
                                         <td>
                                            <a href="<?php echo base_url(); ?>index.php/account/state/edit/<?php echo $state->id_state; ?>">
                                                <i class="fa fa-pencil" aria-hidden="true"></i></a>
                                            <a href="<?php echo base_url(); ?>index.php/account/state/delete/<?php echo $state->id_state; ?>">
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