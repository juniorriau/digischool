<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/*
  Default route Digischool
 */
$route['default_controller'] = 'home/Home';

$route['m'] = 'm/Home';
$route['m/ticketorders'] = 'm/Ticketorders';
$route['m/categories/(:any)'] = 'm/Categories';
$route['m/categories/(:any)/(:int)'] = 'm/Categories/?q = (:int)';

$route['web'] = 'web/Home';
$route['web/categories/(:any)'] = 'web/Categories';
$route['web/categories/(:any)/(:int)'] = 'web/Categories/?q = (:int)';
$route['web/post/read/(:any)'] = 'web/Post/read';
$route['web/post/search'] = 'web/Post/search/';
$route['web/pages/(:any)'] = 'web/Pages';
$route['web/comments/(:any)'] = 'web/Comments';
$route['web/galleries/(:any)'] = 'web/Galleries';
$route['web/galleries/(:any)/(:int)'] = 'web/Galleries/?q = (:int)';

$route['app'] = 'app/Home';
$route['auth'] = 'auth/Authentication';
$route['404_override'] = 'web/Error404';
$route['translate_uri_dashes'] = FALSE;

