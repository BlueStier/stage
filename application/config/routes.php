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
$route['header/(:any)'] = 'header/view/$1';
$route['header'] = 'header';
$route['travaux/create'] = 'travaux/create';
$route['travaux/(:any)'] = 'travaux/view/$1';
$route['travaux'] = 'travaux';
$route['test/create'] = 'test/create';
$route['test/(:any)'] = 'test/view/$1';
$route['test'] = 'test';
$route['seniors/create'] = 'seniors/create';
$route['seniors/(:any)'] = 'seniors/view/$1';
$route['seniors'] = 'seniors';
$route['cms/supBulle/(:any)/(:num)'] = 'cms/supBulle/$1/$2';
$route['cms/supPhoto/(:num)/(.*)'] = 'cms/supPhoto/$1/$2';
$route['cms/supDoc/(:num)/(:num)/(.*)'] = 'cms/supDoc/$1/$2/$3';
$route['cms/validatePage'] = 'cms/validatePage/';
$route['cms/updatePage/(:any)'] = 'cms/updatePage/$1';
$route['cms/validUpPage/(:any)'] = 'cms/validUpPage/$1';
$route['cms/createPages'] = 'cms/createPages/';
$route['cms/createArticle'] = 'cms/createArticle/';
$route['cms/validateArticle/'] = 'cms/validateArticle/';
$route['cms/validUpArticle'] = 'cms/validUpArticle';
$route['cms/deleteArticle'] = 'cms/deleteArticle';
$route['cms/updateArticle/(:any)'] = 'cms/updateArticle/$1';
$route['cms/configAlert/(:any)'] = 'cms/configAlert/$1';
$route['cms/supAlert/(:any)'] = 'cms/supAlert/$1';
$route['cms/homePage'] = 'cms/homePage/';
$route['cms/updateGenHome'] = 'cms/updateGenHome';
$route['cms/updateIntroHome'] = 'cms/updateIntroHome';
$route['cms/updateLienHome/(:any)'] = 'cms/updateLienHome/$1';
$route['cms/deleteLien/(:num)'] = 'cms/deleteLien/$1';
$route['cms/cutLink/(:any)'] = 'cms/cutLink/$1';
$route['cms/updateLink/(:any)'] = 'cms/updateLink/$1';
$route['cms/createMenu/(:any)'] = 'cms/createMenu/$1';
$route['cms/updateMenu/(:any)'] = 'cms/updateMenu/$1';
$route['cms/dragNdrop'] = 'cms/dragNdrop';
$route['cms/ordre/(:any)/(:num)'] = 'cms/ordre/$1/$2';
$route['cms/delete/(:any)'] = 'cms/delete/$1';
$route['cms/deletePage'] = 'cms/deletePage';
$route['cms/delete'] = 'cms/delete';
$route['cms/updateUser/(:num)'] = 'cms/updateUser/$1';
$route['cms/validupUser/(:any)/(:num)'] = 'cms/validupUser/$1/$2';
$route['cms/createUser'] = 'cms/createUser';
$route['cms/deleteUser'] = 'cms/deleteUser';
$route['cms/destroy'] = 'cms/destroy';
$route['cms/dodo'] = 'cms/dodo';
$route['cms/(:any)'] = 'cms/view/$1';
$route['cms'] = 'cms';
$route['login'] = 'login';
$route['login/connect'] = 'login/connect';
$route['ArretesMunicipaux/create'] = 'ArretesMunicipaux/create';
$route['ArretesMunicipaux/(:any)'] = 'ArretesMunicipaux/view/$1';
$route['ArretesMunicipaux'] = 'ArretesMunicipaux';
$route['deliberations/create'] = 'deliberations/create';
$route['deliberations/(:any)'] = 'deliberations/view/$1';
$route['deliberations'] = 'deliberations';
$route['pages'] = 'pages/view';
$route['pages/(.*)'] = 'pages/view/$1';
$route['default_controller'] = 'pages/';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
