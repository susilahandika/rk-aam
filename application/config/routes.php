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
$route['default_controller'] = 'ChecklistController';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['administrator'] = 'UserController';

// Routes User
$route['login/auth']['POST'] = 'UserController/auth';
$route['login/checklist'] = 'UserController/loginChecklist';
$route['login/checklist/auth']['POST'] = 'UserController/authChecklist';
$route['user/dept'] = 'UserController/listDept';
$route['user/region'] = 'UserController/listRegion';
$route['user/position'] = 'UserController/listPosition';
$route['user/user'] = 'UserController/listUser';
$route['user/store']['GET'] = 'UserController/listStore';
$route['user/storebyregion']['POST'] = 'UserController/listStoreByRegion';
$route['user/list']['GET'] = 'UserController/userList';
$route['user/select'] = 'UserController/select';
$route['user/store']['POST'] = 'UserController/store';
$route['user/edit/(:any)']['GET'] = 'UserController/edit/$1';
$route['user/update/(:any)']['POST'] = 'UserController/update/$1';
$route['user/find']['POST'] = 'UserController/userHrisByNik';
$route['user/listStoreByNik']['POST'] = 'UserController/listStoreByNik';
$route['user/saveUserStore']['POST'] = 'UserController/saveUserStore';

// Routes UserMenu
$route['usermenu'] = 'UserMenuController/index';

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
$route['schedule/schedulepending'] = 'ScheduleController/listSchedulePending';
$route['schedule/selectpending/(:any)'] = 'ScheduleController/selectPending/$1';
$route['schedule/select'] = 'ScheduleController/select';
$route['schedule/create'] = 'ScheduleController/create';
$route['schedule/show']['POST'] = 'ScheduleController/showSchedule';
$route['schedule/edit/(:any)']['GET'] = 'ScheduleController/edit/$1';
$route['schedule/store']['POST'] = 'ScheduleController/store';
$route['schedule/update']['POST'] = 'ScheduleController/update';
$route['schedule/approve']['POST'] = 'ScheduleController/approve';
$route['schedule/cekstorechecklist']['POST'] = 'ScheduleController/cekStoreChecklist';
$route['schedule/getAppBy/(:any)']['POST'] = 'ScheduleController/cekApproveBy/$1';

/* ----- Routes Checklist ----- */
$route['checklist'] = 'ChecklistController/index';
$route['checklist/(:any)/(:any)']['GET'] = 'ChecklistController/checklistCategory/$1/$2';
$route['checklist/store']['POST'] = 'ChecklistController/store';
$route['checklist/start']['POST'] = 'ChecklistController/startChecklist';
$route['checklist/cek_already_exist']['GET'] = 'ChecklistController/isAlreadyChecklist';
$route['checklist/checklistDone']['GET'] = 'ChecklistController/checklistDone';

/* ----- Routes Matriks App ----- */
$route['matriksapp'] = 'MatriksappController/index';
$route['matriksapp/getMatriks'] = 'MatriksappController/getMatriks';
$route['matriksapp/store']['POST'] = 'MatriksappController/store';

/* ----- Routes Report Checklist ----- */
$route['report/checklist'] = 'ReportChecklistController/index';
$route['report/detailCountOk'] = 'ReportChecklistController/detailCountOk';
$route['report/detailCountNo'] = 'ReportChecklistController/detailCountNo';
$route['report/detailCountNa'] = 'ReportChecklistController/detailCountNa';
$route['report/checklist/selectbyaam'] = 'ReportChecklistController/checklistAmm';
$route['report/countperstorelimit'] = 'ReportChecklistController/countPerStoreLimit';
$route['report/countpermonthyear'] = 'ReportChecklistController/countPerMonthYear';
$route['report/countperitem'] = 'ReportChecklistController/countPerItem';
$route['report/selectdetailCountOk'] = 'ReportChecklistController/selectdetailCountOk';
$route['report/selectdetailCountNo'] = 'ReportChecklistController/selectdetailCountNo';
$route['report/selectdetailCountNa'] = 'ReportChecklistController/selectdetailCountNa';
