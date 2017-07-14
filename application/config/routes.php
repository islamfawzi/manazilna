<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

$route['default_controller'] = "en/welcome";
$route['404_override'] = 'en/welcome/error_404';

/** ########################################################## Admincp Routes ############# * */
$route['admin'] = "admincp";
$route['admincp/(:any)'] = "admincp/$1";
$route['admincp/(:any)/(:any)'] = "admincp/$1/$1";
$route['admincp/(:any)/(:num)'] = "admincp/$1/$2";
$route['login'] = "login";
$route['login/(:any)'] = "login/$1";
$route['gallery/(:any)'] = "gallery/$1";
/** ########################################################## Arabic Site Routes ############# * */

$route['ar'] = "ar/welcome";

$route['ar/signup'] = "ar/clients_controller/signup";
$route['ar/signin'] = "ar/clients_controller/signin";
$route['ar/signout'] = "ar/clients_controller/signout";
$route['ar/newsletter'] = "ar/clients_controller/newsletter";

$route['ar/properties'] = "ar/welcome/products";
$route['ar/properties/(:any)'] = "ar/welcome/products/$1";
$route['ar/properties/(:any)/(:any)'] = "ar/welcome/products/$1/$1";

$route['ar/contact-us'] = "ar/welcome/contact";
$route['ar/contact-us/(:any)'] = "ar/welcome/contact/$1";

$route['ar/about'] = "ar/welcome/about";
$route['ar/about/(:any)'] = "ar/welcome/about/$1";

$route['ar/news/(:any)'] = "ar/welcome/news/$1";

$route['ar/map-search'] = "ar/welcome/mapSearch";
$route['ar/advanced-search'] = "ar/welcome/advancedSearch";
$route['ar/search'] = "ar/welcome/search";
$route['ar/save_search_query'] = "ar/welcome/save_search_query";
$route['ar/saved_search'] = "ar/welcome/saved_search";

$route['ar/getProjects'] = "ar/welcome/getProjectsAjax";
$route['ar/getProjects/(:any)'] = "ar/welcome/getProjectsAjax/$1";

$route['ar/add-to-compare/(:any)/(:any)'] = "ar/welcome/addToCompare/$1";
$route['ar/add-to-wishlist/(:any)/(:any)'] = "ar/welcome/addToWishList/$1";

/** ########################################################## English Site Routes ############# * */
$route['signup'] = "en/clients_controller/signup";
$route['signin'] = "en/clients_controller/signin";
$route['signout'] = "en/clients_controller/signout";
$route['newsletter'] = "en/clients_controller/newsletter";

$route['properties'] = "en/welcome/products";
$route['properties/(:any)'] = "en/welcome/products/$1";
$route['properties/(:any)/(:any)'] = "en/welcome/products/$1/$1";

$route['contact-us'] = "en/welcome/contact";
$route['contact-us/(:any)'] = "en/welcome/contact/$1";

$route['about'] = "en/welcome/about";
$route['about/(:any)'] = "en/welcome/about/$1";

$route['news/(:any)'] = "en/welcome/news/$1";

$route['map-search'] = "en/welcome/mapSearch";
$route['advanced-search'] = "en/welcome/advancedSearch";
$route['search'] = "en/welcome/search";
$route['save_search_query'] = "en/welcome/save_search_query";
$route['saved_search'] = "en/welcome/saved_search";

$route['getProjects'] = "en/welcome/getProjectsAjax";
$route['getProjects/(:any)'] = "en/welcome/getProjectsAjax/$1";

$route['add-to-compare/(:any)/(:any)'] = "en/welcome/addToCompare/$1";
$route['add-to-wishlist/(:any)/(:any)'] = "en/welcome/addToWishList/$1";

/** ########################################################################################### * */
$route['robots.txt'] = "robots.txt";
$route['sitemap.xml'] = "sitemap.xml";
$route['BingSiteAuth.xml'] = "BingSiteAuth.xml";
/* End of file routes.php */
/* Location: ./application/config/routes.php */
