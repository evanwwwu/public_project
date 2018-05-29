<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
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
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = "welcome";
$route['404_override'] = '';
$route['article/author/(:any)/more/(:any)'] = 'ajax/article_author/$1/$2';
$route['article/author/(:any)'] = 'article/author/$1';
$route['article/recommend/(:any)'] = 'article/recommend/$1';
$route['article/tag/(:any)/more/(:any)'] = 'article/tag/$1/more/$2';
$route['article/tag/(:any)'] = 'article/tag/$1';
// $route['article/about/(:any)/more/(:any)'] = 'article/about/$1/more/$2';
$route['about/(:any)'] = 'article/about/$1';
$route['article/more/(:any)'] = 'ajax/article/more/$1';
$route['article/(:any)'] = 'article/posts/$1';
$route['more/(:any)'] = 'ajax/article/more/$1';


$route['event/author/(:any)/more/(:any)'] = 'ajax/event_author/$1/$2';
$route['event/author/(:any)'] = 'event/author/$1';
$route['event/recommend/(:any)'] = 'event/recommend/$1';
$route['event/month/(:any)/more/(:any)'] = 'event/month/$1/more/$2';
$route['event/tag/(:any)'] = 'event/tag/$1';
$route['event/more/(:any)'] = 'ajax/event/more/$1';
$route['event/month/(:any)'] = 'event/month/$1';
$route['event/(:any)'] = 'event/posts/$1';

$route['people/more/(:any)'] = 'people/more//$1';
$route['people/east/more/(:any)'] = 'people/more/east/$1';
$route['people/west/more/(:any)'] = 'people/more/west/$1';
$route['people/recommend/(:any)'] = 'people/recommend/$1';
$route['people/west'] = 'people/west';
$route['people/east'] = 'people/east';
$route['people/letter/(:any)/more/(:any)'] = 'people/more_letter/$1/$2';
$route['people/letter/(:any)'] = 'people/letter/$1';
$route['people/tag/(:any)/more/(:any)'] = 'people/tag/$1/more/$2';
$route['people/tag/(:any)'] = 'people/tag/$1';
$route['people/(:any)'] = 'people/posts/$1';


$route['brand/more/(:any)'] = 'brand/more/$1';
$route['brand/letter/(:any)/more/(:any)'] = 'brand/more_letter/$1/$2';
$route['brand/recommend/(:any)'] = 'brand/recommend/$1';
$route['brand/letter/(:any)'] = 'brand/letter/$1';
$route['brand/tag/(:any)/more/(:any)'] = 'brand/tag/$1/more/$2';
$route['brand/tag/(:any)'] = 'brand/tag/$1';
$route['brand/(:any)'] = 'brand/posts/$1';

$route['gallery/tag/(:any)'] = 'gallery/tag/$1';
$route['gallery/month/(:any)'] = 'gallery/month/$1';
$route['gallery/recommend/(:any)'] = 'gallery/recommend/$1';
$route['gallery/(:any)'] = 'gallery/posts/$1';

$route['calendar/month/(:any)'] = 'calendar/month/$1';
$route['calendar/recommend/(:any)'] = 'calendar/recommend/$1';
$route['calendar/(:any)'] = 'calendar/posts/$1';


$route['author/celebrity'] = 'author/celebrity';
$route['author/contributor'] = 'author/contributor';
$route['author/team'] = 'author/team';
$route['author/recommend/(:any)'] = 'author/recommend/$1';
$route['author/(:any)'] = 'author/posts/$1';

/* End of file routes.php */
/* Location: ./application/config/routes.php */