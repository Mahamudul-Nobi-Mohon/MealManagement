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
$route['default_controller'] = 'LoginController';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
$route['login'] ='LoginController/user_login_data_check';
$route['logout'] = 'LoginController/logout';
$route['changepassword'] = 'UserController/goToChangePasswordPage';


      $route['addUserPage'] = 'UserController/addUserPage';
   $route['editUserPage'] = 'UserController/Read';
   
$route['addMealPage'] = 'MealController/addMealPage';
$route['addMeal'] = 'MealController/addMeal';
//$route['editMeal/(:num)'] = 'MealController/editMeal/$1';
$route['editMealPage'] = 'MealController/editMealPage';
$route['editMealByDate'] = 'MealController/editMealByDate';
$route['updateMeal'] = 'MealController/updateMeal';
$route['goToShowReportPage'] = 'MealController/goToShowReportPage';
$route['showReportBySearchDate'] = 'MealController/showReportBySearchDate';
$route['goToShowAllReportPage'] = 'MealController/goToShowAllReportPage';
$route['showAllMemberReportBySearchDate'] = 'MealController/showAllMemberReportBySearchDate';
$route['currentMonthPersonMeal'] = 'MealController/currentMonthPersonMeal';
$route['currentMonthPersonBazar'] = 'MealController/currentMonthPersonBazar';
$route['currentMonthMealRate'] = 'MealController/currentMonthMealRate';