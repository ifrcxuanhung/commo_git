<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
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
  |	http://codeigniter.com/user_guide/general/routing.html
  |
  | -------------------------------------------------------------------------
  | RESERVED ROUTES
  | -------------------------------------------------------------------------
  |
  | There area two reserved routes:
  |
  |	$route['default_controller'] = 'welcome';
  |
  | This route indicates which controller class should be loaded if the
  | URI contains no data. In the above example, the "welcome" class
  | would be loaded.
  |
  |	$route['404_override'] = 'errors/page_missing';
  |
  | This route will tell the Router what URI segments to use if those provided
  | in the URL cannot be matched to a valid route.
  |
 */
//$route['start/(:any)/(:any)'] = "welcome/start/index/$1/$2";
$route['jq_loadtable/(:any)'] = "welcome/jq_loadtable/index/$1";


$route['dashboard'] = "welcome/dashboard/index";
$route['analysis'] = "welcome/analysis/index";
$route['news'] = "welcome/news/index";

$route['module/(:any)'] = "welcome/module/index/$1";
$route['table/(:any)'] = "welcome/table/index/$1";
$route['market/(:any)'] = "welcome/market/index/$1";
$route['category/(:any)'] = "welcome/category/index/$1";
/*$route['product/(:any)/(:any)'] = "welcome/product/index/$1/$2";*/
$route['product/futures/(:any)/(:any)'] = "welcome/product/index/$1/$2";
$route['product/futures/quote/(:any)'] = "welcome/product/quote/$1";
$route['vnxindex/(:any)'] = "welcome/vnxindex/index/$1";  
$route['portfolio/(:any)'] = "welcome/portfolio/index/$1";
$route['cleanarticle'] = "welcome/cleanarticle";
$route['default_controller'] = "welcome";
$route['404_override'] = '';
$route['auth'] = "auth";
$route['auth/(:any)'] = "auth/$1";
$route['(:any)'] = "welcome/$1";


/* End of file routes.php */
/* Location: ./application/config/routes.php */






