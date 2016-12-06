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
                                <li><a href="<?php echo base_url(); ?>index.php/account/product/edit/<?php echo $this->uri->segment(4); ?>">Editar Producto</a></li>
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
                    <?php 
                    if(isset($_SESSION['update_status']))
                    {
                    ?>
                        <div class="alert alert-success">
                            <strong>Exito!</strong> Se ha editado el producto.
                        </div>
                    <?php 
                        unset($_SESSION['update_status']);
                    }
                    ?>
                    <?php 
                    if(isset($_SESSION['error']))
                    {
                    ?>
                        <div class="alert alert-danger">
                            <?php echo $_SESSION['error']; ?>
                        </div>
                    <?php 
                        unset($_SESSION['error']);
                    }
                    ?>
                    <div class="featured-boxes">
                        <div class="row">
                            <div class="col-sm-1">
                            </div>
                            <div class="col-sm-10">
                                <div class="featured-box featured-box-primary align-left mt-xlg">
                                    <div class="box-content">
                                        <form action="<?php echo base_url(); ?>index.php/account/product/update" id="frmSignUp" method="post">
                                            <div class="row">
                                                <div class="form-group">
                                                    <div class="col-md-3">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <?php
                                                        if($product[0]->image == $_SESSION['image'])
                                                        {
                                                        ?>
                                                            <img src="<?php echo base_url(); ?>uploads/<?php echo $_SESSION['image']; ?>" class="img-responsive"></img>
                                                        <?php
                                                        }
                                                        else
                                                        {
                                                        ?>
                                                            <img src="<?php echo base_url(); ?>pre_uploads/<?php echo $_SESSION['image']; ?>" class="img-responsive"></img>
                                                        <?php
                                                        }
                                                        ?>
                                                    </div>
                                                    <div class="col-md-3">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#defaultModal">
                                                            Editar Imagen
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <label>Categoría</label>
                                                        <select class="form-control" name="id_category" required>
                                                            <option value="">-Seleccione-</option>
                                                            <?php
                                                            foreach($categories->result() as $category)
                                                            {
                                                            ?>
                                                                <option <?php if($category->id_category == $product[0]->id_category) {?> selected <?php } ?> value="<?php echo $category->id_category; ?>"><?php echo $category->category_name; ?></option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <label>Titulo</label>
                                                        <input type="text" name="title" value="<?php echo $product[0]->title; ?>" class="form-control input-lg" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <label>Descripción</label>
                                                        <textarea class="form-control" rows="5" class="form-control input-lg" name="description" required><?php echo $product[0]->description; ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <label>Precio Unitario</label>
                                                        <input type="text" name="unit_price" value="<?php echo $product[0]->unit_price; ?>" class="form-control input-lg" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <label>Precio al Mayor</label>
                                                        <input type="text" name="wholesale_price" value="<?php echo $product[0]->wholesale_price; ?>" class="form-control input-lg" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <label>Stock</label>
                                                        <input type="text" name="wholesale_price" value="<?php echo $product[0]->stock; ?>" class="form-control input-lg" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <input type="hidden" name="image" value="<?php echo $_SESSION['image']; ?>" class="form-control input-lg" required>
                                                    <input type="hidden" name="id_product" value="<?php echo $product[0]->id_product; ?>">
                                                    <input type="submit" value="Editar" class="btn btn-warning btn-lg btn-block pull-right mb-xl" data-loading-text="Loading...">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-1">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>
    <div class="modal fade" id="defaultModal" tabindex="-1" role="dialog" aria-labelledby="defaultModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="defaultModalLabel">Agregar Imagen</h4>
                </div>
                <div class="modal-body">
                    <form action="<?php echo base_url(); ?>index.php/account/image/edit/<?php echo $this->uri->segment(4); ?>" id="frmSignUp" enctype="multipart/form-data" method="post">
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input type="file" name="image">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <input type="submit" value="Guardar" class="btn btn-warning btn-lg btn-block pull-right mb-xl" data-loading-text="Loading...">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php
require('footer.php');
?>