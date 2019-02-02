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
$route['default_controller'] = 'UserController';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

// Routes User
$route['login/auth']['POST'] = 'UserController/auth';
$route['user/dept'] = 'UserController/listDept';
$route['user/region'] = 'UserController/listRegion';
$route['user/store'] = 'UserController/listStore';

// Routes Home
$route['home'] = 'HomeController/index';

// ------ Routes Item Checklist -----------
$route['item'] = 'ItemController/index';
$route['item/select'] = 'ItemController/select';
$route['item/store']['POST'] = 'ItemController/store';
$route['item/edit/(:any)']['GET'] = 'ItemController/edit/$1';
$route['item/update/(:any)']['POST'] = 'ItemController/update/$1';

// ------ Routes Category Checklist -----------
$route['category'] = 'CategoryController/index';
$route['category/select'] = 'CategoryController/select';
$route['category/selectByRegion/(:any)']['GET'] = 'CategoryController/selectByRegion/$1';
$route['category/store']['POST'] = 'CategoryController/store';
$route['category/edit/(:any)']['GET'] = 'CategoryController/edit/$1';
$route['category/update/(:any)']['POST'] = 'CategoryController/update/$1';

/* ----- Routes Schedule ----- */
$route['schedule'] = 'ScheduleController/index';
$route['schedule/create'] = 'ScheduleController/create';
$route['schedule/show']['POST'] = 'ScheduleController/showSchedule';
$route['schedule/store']['POST'] = 'ScheduleController/store';
$route['schedule/cekstorechecklist']['POST'] = 'ScheduleController/cekStoreChecklist';

/* ----- Routes Checklist ----- */
$route['checklist'] = 'ChecklistController/index';
$route['checklist/(:any)']['GET'] = 'ChecklistController/checklistCategory/$1';
$route['checklist/store']['POST'] = 'ChecklistController/store';