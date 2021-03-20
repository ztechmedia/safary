<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'appcontroller';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['admin'] = 'AppController';

$route['login'] = "auth/authcontroller";
$route['check-login'] = "auth/authcontroller/checkLogin";

$route['admin/home'] = "admin/admincontroller/home";
