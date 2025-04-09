<?php
defined('BASEPATH') or exit('No direct script access allowed');

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
|	https://codeigniter.com/userguide3/general/routing.html
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

$route['user/create_user_view'] = 'UserViewController';
$route['api/get_user'] = 'api/Get_User/index';
$route['api/store_user'] = 'api/User_Controller/storeuser';
$route['login/login_user'] = 'Login_Controller_View';
$route['success_message'] = 'api/User_Controller/success_message';
$route['admin/dashboard'] = 'admin/Dashboard';
$route['login_controller'] = 'Login_Controller/login';
$route['default_controller'] = 'Login_Controller_View';
$route['add_post_view'] = 'Add_Post_View';
$route['getposts'] = 'api/Dashboard_controller/getPosts';
$route['profile/(:num)'] = 'Profile_Controller/index/$1';
$route['deletepost/(:num)/(:num)'] = 'Profile_Controller/deletePost/$1/$2';
$route['updatelike'] = 'api/Add_Post_Controller/updateLike/$1/$2/$3';
$route['getpostlikes/(:num)'] = 'admin/Dashboard/getPostLikes/$1';
$route['header/myprofile'] = 'Profile_Controller/myprofile';
$route['header/contact_us'] = 'Contact_Us_Controller/index';
$route['contact_us/store_user_messages'] = 'Contact_Us_Controller/store_user_messages';
