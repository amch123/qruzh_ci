<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['aboutus'] = 'about/index';
$route['contact'] = 'message/index';
$route['login'] = 'user/login';
$route['user/sessionStart'] = 'user/sessionStart';
$route['register'] = 'user/create';
$route['user/store'] = 'user/store';
$route['product/show/:num'] = 'product/show';
$route['cart/store'] = 'cart/store';
$route['message/store'] = 'message/store';
$route['account'] = 'welcome';
$route['user/sessionDestroy'] = 'user/sessionDestroy';
$route['payment'] = 'payment/index';
$route['newletters/store'] = 'newletters/store';
$route['product/category/:num'] = 'category/show';
//////////////
$route['account/product'] = 'product/index';
$route['account/product/create'] = 'product/create';
$route['account/product/store'] = 'product/store';
$route['account/product/delete/:num'] = 'product/destroy';
$route['account/product/edit/:num'] = 'product/edit';
$route['account/product/update'] = 'product/update';
//////////////
$route['account/user'] = 'user/index';
$route['account/user/create'] = 'user/create';
$route['account/user/store'] = 'user/store';
$route['account/user/delete/:num'] = 'user/destroy';
$route['account/user/edit/:num'] = 'user/edit';
$route['account/user/update'] = 'user/update';
//////////////
$route['account/payment'] = 'payment/index';
$route['account/payment/show/:num'] = 'payment/show';
$route['account/payment/delete/:num'] = 'payment/destroy';
//////////////
$route['account/shipping'] = 'shipping/index';
$route['account/shipping/create'] = 'shipping/create';
$route['account/shipping/store'] = 'shipping/store';
$route['account/shipping/delete/:num'] = 'shipping/destroy';
//////////////
$route['account/setting'] = 'setting/index';
$route['account/setting/update'] = 'setting/update';
//////////////
$route['account/order'] = 'order/index';
$route['account/order/show/:num'] = 'order/show';
$route['account/order/delete/:num'] = 'order/destroy';
//////////////
$route['account/category'] = 'category/index';
$route['account/category/create'] = 'category/create';
$route['account/category/edit/:num'] = 'category/edit';
$route['account/category/delete/:num'] = 'category/destroy';
$route['account/category/store'] = 'category/store';
$route['account/category/update'] = 'category/update';