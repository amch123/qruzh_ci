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
$route['login/checkout'] = 'user/login';
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
$route['wholesalecart/store'] = 'wholesalecart/store';
$route['wholesalecart/destroy/:any'] = 'wholesalecart/destroy';
$route['product/search'] = 'product/search';
$route['product/search/:any/page/:num'] = 'product/search';
$route['product/page/:num'] = 'product/index';
$route['product/page'] = 'product/index';
$route['cart/destroy/:any'] = 'cart/destroy';
$route['cart/totalCheck'] = 'cart/totalCheck';
$route['shipping/sessionshipping'] = 'shipping/sessionShipping';
$route['user/forgotpassword'] = 'user/forgotPassword';
$route['user/recoverpassword'] = 'user/recoverPassword';
$route['user/activate/:any'] = 'user/activateUser';
$route['user/newpassword/:any'] = 'user/newPassword';
$route['state/storeState/:num'] = 'state/storeState';
$route['state/selectState'] = 'state/selectState';
//////////////
$route['account/product'] = 'product/index';
$route['account/product/create'] = 'product/create';
$route['account/product/store'] = 'product/store';
$route['account/product/delete/:num'] = 'product/destroy';
$route['account/product/edit/:num'] = 'product/edit';
$route['account/product/update'] = 'product/update';
$route['account/image/store'] = 'image/store';
$route['account/image/edit/:num'] = 'image/store';
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
$route['account/payment/create'] = 'payment/create';
$route['account/payment/getValues/:num'] = 'payment/getValues';
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
$route['account/order/checkout'] = 'order/checkout';
$route['account/order/store'] = 'order/store';
$route['account/order/update'] = 'order/update';
//////////////
$route['account/category'] = 'category/index';
$route['account/category/create'] = 'category/create';
$route['account/category/edit/:num'] = 'category/edit';
$route['account/category/delete/:num'] = 'category/destroy';
$route['account/category/store'] = 'category/store';
$route['account/category/update'] = 'category/update';
//////////////
$route['account/shop'] = 'shop/index';
$route['account/shop/create'] = 'shop/create';
$route['account/shop/store'] = 'shop/store';
$route['account/shop/delete/:num'] = 'shop/destroy';
$route['account/shop/edit/:num'] = 'shop/edit';
$route['account/shop/update'] = 'shop/update';
//////////////
$route['account/state'] = 'state/index';
$route['account/state/create'] = 'state/create';
$route['account/state/store'] = 'state/store';
$route['account/state/delete/:num'] = 'state/destroy';
$route['account/state/edit/:num'] = 'state/edit';
$route['account/state/update'] = 'state/update';
