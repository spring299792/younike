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

$route['^huodong'] = "welcome/huodong";
$route['^huodong/(:num)'] = "welcome/view/$1";
$route['^fuwu'] = "welcome/fuwu";
$route['^fuwu_(:num)'] = "welcome/fuwu/$1";
$route['^fuwu/(:num)'] = "welcome/product/$1";
$route['^order'] = "welcome/order";
$route['^(:any)/(:num)'] = "welcome/view/$2";
$route['^(:any)'] = "welcome/page/$1";


$route['^zhaopin'] = "welcome/page/zhaopin";
$route['^zizhi'] = "welcome/page/zizhi";
$route['^news'] = "welcome/news";
$route['^news/(:num)'] = "welcome/view/$1";
$route['^locked'] = "welcome/locked";
$route['^support'] = "welcome/support";
$route['^product'] = "welcome/product";
$route['^product-(:num)'] = "welcome/product/$1";
$route['^product/(:num)'] = "welcome/pview/$1";
$route['^fangan'] = "welcome/fangan";
$route['^fangan-(:num)'] = "welcome/fangan/$1";
$route['^fangan/(:num)'] = "welcome/pview/$1";
