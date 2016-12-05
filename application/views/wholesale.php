<?php
require('header.php');
?>
	<div role="main" class="main shop">

        <div role="main" class="main">
            <section class="page-header page-header-light page-header-more-padding">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <h1>Mayoreo<span></span></h1>
                            <ul class="breadcrumb breadcrumb-valign-mid">
                                <li><a href="#">Inicio</a></li>
                                <li>Mayoreo</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <div role="main" class="main shop">

            <div class="container">

                <div class="row">
                    <div class="col-md-12">
                        <hr class="tall">
                    </div>
                </div>

                <table class="table">
                    <thead>
                        <tr>
                            <th>
                                Producto
                            </th>
                            <th>
                                Descripción
                            </th>
                            <th>
                                Precio Detal
                            </th>
                            <th>
                                Precio Mayor
                            </th>
                            <th>
                                
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr class="active">
                            <td scope="row">
                                <img src="<?php echo base_url(); ?>template/img/benefits/benefits-1-thumb.jpg" class="img-responsive">
                            </td>
                            <td>
                                Column content
                            </td>
                             <td>
                                Column content
                            </td>
                            <td>
                                Column content
                            </td>
                            <td>
                                <div class="quantity">
                                    <input type="button" class="minus" value="-">
                                    <input id="quantity" type="text" class="input-text qty text" title="Qty" value="0" name="quantity" min="1" step="1">
                                    <input type="button" class="plus" value="+">
                                </div>
                                <button type="submit" class="btn btn-primary btn-icon">Agregar al carro</button>
                            </td>
                        </tr>
                        <tr>
                            <td scope="row">
                                <img src="<?php echo base_url(); ?>template/img/benefits/benefits-1-thumb.jpg" class="img-responsive">
                            </td>
                            <td>
                                Column content
                            </td>
                            <td>
                                Column content
                            </td>
                            <td>
                                Column content
                            </td>
                            <td>
                                <div class="quantity">
                                    <input type="button" class="minus" value="-">
                                    <input id="quantity" type="text" class="input-text qty text" title="Qty" value="0" name="quantity" min="1" step="1">
                                    <input type="button" class="plus" value="+">
                                </div>
                                <button type="submit" class="btn btn-primary btn-icon">Agregar al carro</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
               
                <div class="row">
                    <div class="col-md-12">
                        <hr class="tall">
                    </div>
                </div>
            </div> 
        </div>
    </div>
    
<?php
require('footer.php');
?>