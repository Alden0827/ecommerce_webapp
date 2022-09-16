<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'google_auth_m';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['logout'] = 'google_auth_m/logout';
