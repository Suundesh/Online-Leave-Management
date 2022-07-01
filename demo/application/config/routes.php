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

$route['admin/login'] = 'welcome/admin_login';
$route['admin/dashboard'] = 'admin_controller';
$route['admin/approved_leave']='admin_controller/approved_leave';
$route['admin/Profile_Page']='admin_controller/Profile_Page';
$route['admin/Details_Page']='admin_controller/Details_Page';
$route['admin/AddUser_Page']='admin_controller/AddUser_Page';
$route['admin/rejected_page']='admin_controller/rejected_page';
// $route['employee/store']='admin_controller/store';
// $route['employee/deleteemp/(:any)']='admin_controller/deleteemp/$Email';

// Employee Page

$route['employee/dashboard']='employee_controller';
$route['employee/leavestatus']='employee_controller/leavestatus';
$route['employee/Profile_Page']='employee_controller/Profile_Page';
$route['employee/timetable_page']='employee_controller/timetable_page';

$route['employee/verify/(:any)']='verify_controller/index/$1';