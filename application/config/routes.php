<?php
defined('BASEPATH') OR exit('No direct script access allowed');



$route['post_view/(:any)/(:num)'] = 'vishal/post_view/$1/$2';


$route['default_controller'] = 'Vishal/index';
$route['about'] = 'Vishal/about';

$route['display'] = 'Vishal/display';

$route['display/(:num)'] = 'Vishal/display/$1';

$route['login'] = 'Vishal/login';
$route['signup'] = 'Vishal/signup';

$route['auth'] = "Vishal/auth";
$route['dashboard'] = "Vishal/dashboard";
$route['Vishal'] = "Vishal/logout";
$route['Vishal'] = "Vishal/registration";

$route['frontEnd'] = 'Vishal/frontEnd';


$route['Add_post'] = 'Vishal/Add_post';
$route['save_post'] = 'Vishal/save_post';

// $route['post_view/(:any)'] = 'vishal/post_view/$1';



     // Default login page
// $routes->post('auth', 'LoginController::auth');      // Login form submission

// $routes->get('signup', 'LoginController::signup');         // Default login page
// $routes->post('registration', 'LoginController::registration');      // Login form submission