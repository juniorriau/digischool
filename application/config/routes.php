<?php

defined('BASEPATH') or exit('No direct script access allowed');
/*
 Default route Digischool
 */
$route['default_controller'] = 'web/Home';
$route['web'] = 'web/Home';

$route['app'] = 'app/Home';
$route['auth'] = 'auth/Authentication';
$route['404_override'] = 'web/Error404';
$route['translate_uri_dashes'] = FALSE;
