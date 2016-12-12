<!DOCTYPE html>
<html>
    <head>
        <!-- Basic -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">   

        <title><?php echo $_SESSION['title']; ?></title>  

        <meta name="keywords" content="HTML5 Template" />
        <meta name="description" content="Porto - Responsive HTML5 Template">
        <meta name="author" content="okler.net">

        <!-- Favicon -->
        <link rel="shortcut icon" href="<?php echo base_url(); ?>template/img/favicon.ico" type="image/x-icon" />
        <link rel="apple-touch-icon" href="<?php echo base_url(); ?>template/img/apple-touch-icon.png">

        <!-- Mobile Metas -->
        <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

        <!-- Web Fonts  -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light" rel="stylesheet" type="text/css">

        <!-- Vendor CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>template/vendor/bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>template/vendor/font-awesome/css/font-awesome.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>template/vendor/simple-line-icons/css/simple-line-icons.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>template/vendor/owl.carousel/assets/owl.carousel.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>template/vendor/owl.carousel/assets/owl.theme.default.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>template/vendor/magnific-popup/magnific-popup.css">

        <!-- Theme CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>template/css/theme.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>template/css/theme-elements.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>template/css/theme-blog.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>template/css/theme-shop.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>template/css/theme-animate.css">

        <!-- Current Page CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>template/vendor/rs-plugin/css/settings.css" media="screen">
        <link rel="stylesheet" href="<?php echo base_url(); ?>template/vendor/rs-plugin/css/layers.css" media="screen">
        <link rel="stylesheet" href="<?php echo base_url(); ?>template/vendor/rs-plugin/css/navigation.css" media="screen">
        <link rel="stylesheet" href="<?php echo base_url(); ?>template/vendor/circle-flip-slideshow/css/component.css" media="screen">

        <!-- Skin CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>template/css/skins/default.css">

        <!-- Theme Custom CSS -->
        <link href="//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
        <link href="//cdn.datatables.net/responsive/2.1.0/css/dataTables.responsive.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>template/css/custom.css">

        <!-- Head Libs -->
        <script src="<?php echo base_url(); ?>template/vendor/modernizr/modernizr.js"></script>

    </head>
    <body>
        <div class="body">
            <header id="header" data-plugin-options='{"stickyEnabled": true, "stickyEnableOnBoxed": true, "stickyEnableOnMobile": true, "stickyStartAt": 57, "stickySetTop": "-57px", "stickyChangeLogo": true}'>
                <div class="header-body">
                    <div class="header-container container">
                        <div class="header-row">
                            <div class="header-column">
                                <div class="header-logo">
                                    <a href="#">
                                    <img src="<?php echo base_url(); ?>template/img/logo.png" width="141" height="74" data-sticky-width="82" data-sticky-height="40" data-sticky-top="33"></img>
                                    </a>
                                </div>
                            </div>
                            <div class="header-column">
                                <div class="header-row">
                                    <div class="header-search hidden-xs">
                                        <form id="searchForm" action="<?php echo base_url(); ?>index.php/product/search" method="post">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="search" id="q" placeholder="Buscar..." required>
                                                <span class="input-group-btn">
                                                    <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                                                </span>
                                            </div>
                                        </form>
                                    </div>
                                    <nav class="header-nav-top">
                                        <ul class="nav nav-pills">
                                            <li class="hidden-xs">
                                                <a href="<?php echo base_url(); ?>index.php/state/create"><i class="fa fa-angle-right"></i> Selecciona tu estado</a>
                                            </li>
                                            <?php
                                            if(!isset($_SESSION['id_user']))
                                            {
                                            ?>
                                                <li class="hidden-xs">
                                                    <a href="<?php echo base_url(); ?>index.php/login"><i class="fa fa-angle-right"></i> Ingresa</a>
                                                </li>
                                                <li class="hidden-xs">
                                                    <a href="<?php echo base_url(); ?>index.php/register"><i class="fa fa-angle-right"></i> Registrate</a>
                                                </li>
                                            <?php
                                            }
                                            else
                                            {
                                            ?>
                                                <li class="hidden-xs">
                                                    <a href="<?php echo base_url(); ?>index.php"><i class="fa fa-angle-right"></i> Mi Cuenta</a>
                                                </li>
                                            <?php
                                            }
                                            ?>
                                        </ul>
                                    </nav>
                                </div>
                                <div class="header-row">
                                    <div class="header-nav">
                                        <button class="btn header-btn-collapse-nav" data-toggle="collapse" data-target=".header-nav-main">
                                            <i class="fa fa-bars"></i>
                                        </button>
                                        <ul class="header-social-icons social-icons hidden-xs">
                                            <li class="social-icons-facebook"><a href="<?php echo $_SESSION['facebook']; ?>" target="_blank" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                                            <li class="social-icons-twitter"><a href="<?php echo $_SESSION['twitter']; ?>" target="_blank" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                                        </ul>
                                        <div class="header-nav-main header-nav-main-effect-1 header-nav-main-sub-effect-1 collapse">
                                            <nav>
                                                <ul class="nav nav-pills" id="mainNav">
                                                    <li <?php if($_SESSION['button'] == 1) { ?> class="active" <?php } ?>>
                                                        <a href="<?php echo base_url(); ?>index.php">
                                                            Inicio
                                                        </a>
                                                    </li>
                                                    <li <?php if($_SESSION['button'] == 2) { ?> class="active" <?php } ?>>
                                                        <a href="<?php echo base_url(); ?>index.php/aboutus">
                                                            Nosotros
                                                        </a>
                                                    </li>
                                                    <li <?php if($_SESSION['button'] == 3) { ?> class="active" <?php } ?>>
                                                        <a href="<?php echo base_url(); ?>index.php/product">
                                                            Productos
                                                        </a>
                                                    </li>
                                                    <li <?php if($_SESSION['button'] == 4) { ?> class="active" <?php } ?>>
                                                        <a href="<?php echo base_url(); ?>index.php/wholesale">
                                                            Mayor
                                                        </a>
                                                    </li>
                                                    <li <?php if($_SESSION['button'] == 5) { ?> class="active" <?php } ?>>
                                                        <a href="<?php echo base_url(); ?>index.php/branch">
                                                            Sucursales
                                                        </a>
                                                    </li>
                                                    <li <?php if($_SESSION['button'] == 6) { ?> class="active" <?php } ?>>
                                                        <a href="<?php echo base_url(); ?>index.php/contact">
                                                            Contáctanos
                                                        </a>
                                                    </li>
                                                    <li class="dropdown dropdown-mega dropdown-mega-shop" id="headerShop">
                                                        <a class="dropdown-toggle" href="#">
                                                            <i class="fa fa-shopping-cart"></i> Carro (<?php echo $this->shop1->total_articles(); ?>) - <?php echo $_SESSION['currency']; ?> <?php echo $this->shop1->total_cart(); ?>
                                                        </a>
                                                        <ul class="dropdown-menu">
                                                            <li>
                                                                <div class="dropdown-mega-content">
                                                                    <table class="cart">
                                                                        <tbody>
                                                                            <?php
                                                                            if($this->shop1->total_articles() > 0)
                                                                            {
                                                                                $i = 0;

                                                                                foreach($this->shop1->get_content() as $items)
                                                                                {
                                                                            ?>
                                                                            <tr>
                                                                                <td class="product-thumbnail">
                                                                                    <a href="<?php echo base_url(); ?>index.php/product/show/<?php echo $items['id']; ?>">
                                                                                        <img width="100" height="100" src="<?php echo base_url(); ?>uploads/<?php echo $items['options']['image']; ?>" class="img-responsive"></img>
                                                                                    </a>
                                                                                </td>
                                                                                <td class="product-name">
                                                                                    <a href="<?php echo base_url(); ?>index.php/product/show/<?php echo $items['id']; ?>"><?php echo $items['name']; ?>
                                                                                    <br>
                                                                                    <span class="amount"><strong><?php echo $_SESSION['currency']; ?> <?php echo $items['price']; ?></strong></span></a>
                                                                                </td>
                                                                                <td class="product-actions">
                                                                                    <a title="Remove this item" class="remove" href="<?php echo base_url(); ?>index.php/cart/destroy/<?php echo $items['rowid']; ?>">
                                                                                        <i class="fa fa-times"></i>
                                                                                    </a>
                                                                                </td>
                                                                            </tr>
                                                                            <?php
                                                                                    $i = $i + 1;

                                                                                    if ($i == 2) 
                                                                                    {
                                                                                        break;
                                                                                    }
                                                                                }
                                                                            }
                                                                            ?>
                                                                            <tr>
                                                                                <td class="actions" colspan="6">
                                                                                    <div class="actions-continue">
                                                                                        <a href="<?php echo base_url(); ?>index.php/cart"><button type="button" class="btn btn-default">Ver Todo</button></a>
                                                                                    </div>
                                                                                </td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </nav>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>