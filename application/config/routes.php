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
$route['cms/createMenu/(:any)'] = 'cms/createMenu/$1';
$route['cms/dragNdrop'] = 'cms/dragNdrop';
$route['cms/ordre/(:any)/(:num)'] = 'cms/ordre/$1/$2';
$route['cms/delete/(:any)'] = 'cms/delete/$1';
$route['cms/delete'] = 'cms/delete';
$route['cms/create'] = 'cms/create';
$route['cms/(:any)'] = 'cms/view/$1';
$route['cms'] = 'cms';
$route['environnement/create'] = 'environnement/create';
$route['environnement/(:any)'] = 'environnement/view/$1';
$route['environnement'] = 'environnement';
$route['histoire/create'] = 'histoire/create';
$route['histoire/(:any)'] = 'histoire/view/$1';
$route['histoire'] = 'histoire';
$route['ArretesMunicipaux/create'] = 'ArretesMunicipaux/create';
$route['ArretesMunicipaux/(:any)'] = 'ArretesMunicipaux/view/$1';
$route['ArretesMunicipaux'] = 'ArretesMunicipaux';
$route['deliberations/create'] = 'deliberations/create';
$route['deliberations/(:any)'] = 'deliberations/view/$1';
$route['deliberations'] = 'deliberations';
$route['acceuil/create'] = 'acceuil/create';
$route['acceuil/(:any)'] = 'acceuil/view/$1';
$route['acceuil'] = 'acceuil';
$route['elus/create'] = 'elus/create';
$route['elus/(:any)'] = 'elus/view/$1';
$route['elus'] = 'elus';
//$route['pages/view/(:any)'] = 'pages/view/$1';
$route['pages'] = 'pages/view';
$route['pages/(.*)'] = 'pages/view/$1';
$route['default_controller'] = 'pages/';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
