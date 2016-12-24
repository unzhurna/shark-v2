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
//Front website
$route['about'] = 'home/about';
$route['our_client/(:num)'] = 'home/our_client/1';
$route['our_parner/(:num)'] = 'home/our_parner/1';
$route['our_project/(:num)'] = 'home/our_project/1';
$route['news/(:num)'] = 'home/news/$1';
$route['news_category/(:any)/(:num)'] = 'home/news_category/$1/$2';
$route['read/(:any)'] = 'home/read/$1';
$route['our_product/(:num)'] = 'home/our_product/$1';
$route['category_product/(:any)/(:num)'] = 'home/category_product/$1/$2';
$route['detail_product/(:any)'] = 'home/detail_product/$1';
$route['support/(:any)'] = 'home/support/$1';
$route['sales_team'] = 'home/sales_team';
$route['cs_form'] = 'home/cs_form';
$route['shark_career'] = 'home/shark_career';
$route['apply_career/(:any)'] = 'home/apply_career/$1';
$route['apply_career/(:any)'] = 'home/apply_career/$1';
$route['contact_us'] = 'home/contact_us';

$route['secret'] = 'auth';
$route['dashboard'] = 'dashboard';

$route['login'] = 'auth/login';
$route['logout'] = 'auth/logout';
// Article Module
$route['articles'] = 'blog/article';
$route['article/new'] = 'blog/article/submit';
$route['article/edit/(:num)'] = 'blog/article/submit/$1';
$route['article/delete/(:num)'] = 'blog/article/delete/$1';
// Article Category Module
$route['categories'] = 'blog/category';
$route['category/new'] = 'blog/category/submit';
$route['category/edit/(:num)'] = 'blog/category/submit/$1';
$route['category/delete/(:num)'] = 'blog/category/delete/$1';
// Product Module
$route['products'] = 'product';
$route['product/new'] = 'product/submit';
$route['product/edit/(:num)'] = 'product/submit/$1';
$route['product/delete/(:num)'] = 'product/delete/$1';
// Sparepart Module
$route['spareparts'] = 'product/sparepart';
$route['sparepart/new'] = 'product/sparepart/submit';
$route['sparepart/edit/(:num)'] = 'product/sparepart/submit/$1';
$route['sparepart/delete/(:num)'] = 'product/sparepart/delete/$1';
// Product Category Module
$route['product_categories'] = 'product/category';
$route['product_category/new'] = 'product/category/submit';
$route['product_category/edit/(:num)'] = 'product/category/submit/$1';
$route['product_category/delete/(:num)'] = 'product/category/delete/$1';
// Career Module
$route['careers'] = 'career';
$route['career/new'] = 'career/submit';
$route['career/edit/(:num)'] = 'career/submit/$1';
$route['career/delete/(:num)'] = 'career/delete/$1';
// Partner Module
$route['partners'] = 'partner';
$route['partner/new'] = 'partner/submit';
$route['partner/edit/(:num)'] = 'partner/submit/$1';
$route['partner/delete/(:num)'] = 'partner/delete/$1';
// Client Module
$route['clients'] = 'client';
$route['client/new'] = 'client/submit';
$route['client/edit/(:num)'] = 'client/submit/$1';
$route['client/delete/(:num)'] = 'client/delete/$1';
// Project Module
$route['projects'] = 'project';
$route['project/new'] = 'project/submit';
$route['project/edit/(:num)'] = 'project/submit/$1';
$route['project/delete/(:num)'] = 'project/delete/$1';
// Testimony Module
$route['testimony'] = 'testimony';
$route['testimony/new'] = 'testimony/submit';
$route['testimony/edit/(:num)'] = 'testimony/submit/$1';
$route['testimony/delete/(:num)'] = 'testimony/delete/$1';
// Sales Module
$route['sales'] = 'sales';
$route['sales/new'] = 'sales/submit';
$route['sales/edit/(:num)'] = 'sales/submit/$1';
$route['sales/delete/(:num)'] = 'sales/delete/$1';
// Slider Banner Module
$route['banners'] = 'banner';
$route['banner/new'] = 'banner/submit';
$route['banner/edit/(:num)'] = 'banner/submit/$1';
$route['banner/delete/(:num)'] = 'banner/delete/$1';
// Page Banner Module
$route['pagebanners'] = 'pagebanner';
$route['pagebanner/new'] = 'pagebanner/submit';
$route['pagebanner/edit/(:num)'] = 'pagebanner/submit/$1';
$route['pagebanner/delete/(:num)'] = 'pagebanner/delete/$1';
// User Module
$route['users'] = 'user';
$route['user/new'] = 'user/add_user';
$route['user/edit/(:num)'] = 'user/edit_user/$1';
$route['user/delete/(:num)'] = 'user/delete/$1';
$route['user/profile/(:num)'] = 'user/edit_user/$1';
// User Module
$route['pages'] = 'page';
$route['page/new'] = 'page/submit';
$route['page/edit/(:num)'] = 'page/submit/$1';
$route['page/delete/(:num)'] = 'page/delete/$1';
// Setting Module
$route['general_setting'] = 'setting/index';
$route['contact_setting'] = 'setting/contact';
$route['sosmed_setting'] = 'setting/sosmed';
$route['seo_setting'] = 'setting/seo';
$route['email_setting'] = 'setting/email';
$route['subscription_setting'] = 'setting/subscription';

$route['default_controller'] = 'home/index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
