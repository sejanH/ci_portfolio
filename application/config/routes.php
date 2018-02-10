<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['admin'] 							= 'admin/panel';
$route['admin/login'] 						= 'admin/login';
$route['admin/logout']						= 'admin/login/logout';
$route['admin/register']					= 'admin/action/addNewUser';
$route['admin/edit/(:any)']					= 'admin/action/editOld/$1';
$route['admin/edit/checkEmailExists'] 		= "admin/action/checkEmailExists";
$route['admin/editUser'] 					= "admin/action/editUser";
$route['admin/editUser/(:any)'] 			= "admin/action/editUser/$1";
$route['admin/section/add']					= "admin/panel/addNewSection";
$route['admin/section/addNow']				= "admin/panel/addNewSectionNow";
$route['admin/section/remove']				= "admin/panel/remove";
$route['admin/section/remove/sectionLoad']	= "admin/panel/sectionLoad";
$route['admin/section/remove/(:any)']		= "admin/panel/remove/$1";
$route['admin/section/(:any)']				= "admin/panel/section/$1";
$route['admin/section/edit/(:any)']			= "admin/panel/editSection/$1";
$route['admin/section_order']               = "admin/action/section_order";
$route['admin/changeTheme']					= "admin/panel/changeTheme";
$route['admin/browser/upload']				= "admin/panel/upload";

$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
