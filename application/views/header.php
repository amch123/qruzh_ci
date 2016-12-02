<!DOCTYPE html>
<html>
    <head>
        <!-- Basic -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">   

        <title>Qruzh</title>  

        <meta name="keywords" content="HTML5 Template" />
        <meta name="description" content="Porto - Responsive HTML5 Template">
        <meta name="author" content="okler.net">

        <!-- Favicon -->
        <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
        <link rel="apple-touch-icon" href="img/apple-touch-icon.png">

        <!-- Mobile Metas -->
        <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

        <!-- Web Fonts  -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light" rel="stylesheet" type="text/css">

        <!-- Vendor CSS -->
        <link rel="stylesheet" href="template/vendor/bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="template/vendor/font-awesome/css/font-awesome.css">
        <link rel="stylesheet" href="template/vendor/simple-line-icons/css/simple-line-icons.css">
        <link rel="stylesheet" href="template/vendor/owl.carousel/assets/owl.carousel.min.css">
        <link rel="stylesheet" href="template/vendor/owl.carousel/assets/owl.theme.default.min.css">
        <link rel="stylesheet" href="template/vendor/magnific-popup/magnific-popup.css">

        <!-- Theme CSS -->
        <link rel="stylesheet" href="template/css/theme.css">
        <link rel="stylesheet" href="template/css/theme-elements.css">
        <link rel="stylesheet" href="template/css/theme-blog.css">
        <link rel="stylesheet" href="template/css/theme-shop.css">
        <link rel="stylesheet" href="template/css/theme-animate.css">

        <!-- Current Page CSS -->
        <link rel="stylesheet" href="template/vendor/rs-plugin/css/settings.css" media="screen">
        <link rel="stylesheet" href="template/vendor/rs-plugin/css/layers.css" media="screen">
        <link rel="stylesheet" href="template/vendor/rs-plugin/css/navigation.css" media="screen">
        <link rel="stylesheet" href="template/vendor/circle-flip-slideshow/css/component.css" media="screen">

        <!-- Skin CSS -->
        <link rel="stylesheet" href="template/css/skins/default.css">

        <!-- Theme Custom CSS -->
        <link rel="stylesheet" href="template/css/custom.css">

        <!-- Head Libs -->
        <script src="template/vendor/modernizr/modernizr.js"></script>

    </head>
    <body>
        <div class="body">
            <header id="header" data-plugin-options='{"stickyEnabled": true, "stickyEnableOnBoxed": true, "stickyEnableOnMobile": true, "stickyStartAt": 57, "stickySetTop": "-57px", "stickyChangeLogo": true}'>
                <div class="header-body">
                    <div class="header-container container">
                        <div class="header-row">
                            <div class="header-column">
                                <div class="header-logo">
                                    <a href="{{ url('/') }}">
                                    <img src="template/img/logo.png" width="141" height="74" data-sticky-width="82" data-sticky-height="40" data-sticky-top="" 33 ></img>
                                    </a>
                                </div>
                            </div>
                            <div class="header-column">
                                <div class="header-row">
                                    <div class="header-search hidden-xs">
                                        <form id="searchForm" action="page-search-results.html" method="get">
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="q" id="q" placeholder="Buscar..." required>
                                                <span class="input-group-btn">
                                                    <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                                                </span>
                                            </div>
                                        </form>
                                    </div>
                                    <nav class="header-nav-top">
                                        <ul class="nav nav-pills">
                                            <li class="hidden-xs">
                                                <a href="#"><i class="fa fa-angle-right"></i> Ingresa</a>
                                            </li>
                                            <li class="hidden-xs">
                                                <a href="#"><i class="fa fa-angle-right"></i> Registrate</a>
                                            </li>
                                        </ul>
                                    </nav>
                                </div>
                                <div class="header-row">
                                    <div class="header-nav">
                                        <button class="btn header-btn-collapse-nav" data-toggle="collapse" data-target=".header-nav-main">
                                            <i class="fa fa-bars"></i>
                                        </button>
                                        <ul class="header-social-icons social-icons hidden-xs">
                                            <li class="social-icons-facebook"><a href="http://www.facebook.com/" target="_blank" title="Facebook"><i class="fa fa-facebook"></i></a></li>
                                            <li class="social-icons-twitter"><a href="http://www.twitter.com/" target="_blank" title="Twitter"><i class="fa fa-twitter"></i></a></li>
                                        </ul>
                                        <div class="header-nav-main header-nav-main-effect-1 header-nav-main-sub-effect-1 collapse">
                                            <nav>
                                                <ul class="nav nav-pills" id="mainNav">
                                                    <li class="active">
                                                        <a href="#">
                                                            Inicio
                                                        </a>
                                                    </li>
                                                    <li class="active">
                                                        <a href="#">
                                                            Nosotros
                                                        </a>
                                                    </li>
                                                    <li class="active">
                                                        <a href="#">
                                                            Productos
                                                        </a>
                                                    </li>
                                                    <li class="active">
                                                        <a href="#">
                                                            Mayoreo
                                                        </a>
                                                    </li>
                                                    <li class="active">
                                                        <a href="#">
                                                            Sucursales
                                                        </a>
                                                    </li>
                                                    <li class="active">
                                                        <a href="#">
                                                            Contáctanos
                                                        </a>
                                                    </li>
                                                    <li class="dropdown dropdown-mega dropdown-mega-shop" id="headerShop">
                                                        <a class="dropdown-toggle" href="page-login.html">
                                                            <i class="fa fa-shopping-cart"></i> Carro (1) - $299
                                                        </a>
                                                        <ul class="dropdown-menu">
                                                            <li>
                                                                <div class="dropdown-mega-content">
                                                                    <table class="cart">
                                                                        <tbody>
                                                                            <tr>
                                                                                <td class="product-thumbnail">
                                                                                    <a href="shop-product-sidebar.html">
                                                                                        <img width="100" height="100" alt="" class="img-responsive" src="template/img/products/product-1.jpg">
                                                                                    </a>
                                                                                </td>
                                                                                <td class="product-name">
                                                                                    <a href="shop-product-sidebar.html">Photo Camera
                                                                                    <br>
                                                                                    <span class="amount"><strong>$299</strong></span></a>
                                                                                </td>
                                                                                <td class="product-actions">
                                                                                    <a title="Remove this item" class="remove" href="#">
                                                                                        <i class="fa fa-times"></i>
                                                                                    </a>
                                                                                </td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td class="actions" colspan="6">
                                                                                    <div class="actions-continue">
                                                                                        <button type="submit" class="btn btn-default">View All</button>
                                                                                        <button type="submit" class="btn pull-right btn-primary">Proceed to Checkout <i class="fa fa-angle-right ml-xs"></i></button>
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
