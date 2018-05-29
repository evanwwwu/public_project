<?php
/*
*author: evanwu
*
*變動過的SITE CI:
=======
*	router, autoload, Image_lib,databace
*
*	libraries:
*	helper -> MY_File_helper;
*	libraries -> MY_Image_moo, MY_Image_lib, Cart
* config.php -> csrf_expire
*
*    autoload : databace 關掉了~
*/
ob_start();
// session_start(3600);
date_default_timezone_set("Asia/Taipei");
//測試網站 https://payment-stage.allpay.com.tw/Cashier/AioCheckOut/V2
//正式網站 https://payment.allpay.com.tw/Cashier/AioCheckOut/V2
define("EC_ServiceURL","https://payment-stage.allpay.com.tw/Cashier/AioCheckOut/V2");
			//測試 5294y06JbISpM5x9 正式 Zpp3krvIDgRMgwdm
define("EC_HashKey","5294y06JbISpM5x9");
			//測試 v77hoKGq4kWxNNIS 正式 pgoLJiOg986u8D7O
define("EC_HashIV","v77hoKGq4kWxNNIS");
			//測試 2000132 正式 1119915
define("EC_MerchantID","2000132");
/*----------------------------------------------------*/
define('SITE_URL','http://192.168.0.117/www/nakedmarket/web_git/php/');  
define('ASSETS_URL','http://192.168.0.117/www/nakedmarket/web_git/php/assets/');  
define("IMG_URL","http://192.168.0.117/www/nakedmarket/web_git/php/upload/");
define("DB_USER","root");
define("DB_PW","1111");
define("DATABASE","nakedmarket");
//admin:
define('ADMIN_ASSETS','http://192.168.0.117/www/nakedmarket/web_git/php/assets/admin/'); 
define('ADMIN_URL','http://192.168.0.117/www/nakedmarket/web_git/php/admin/');
define("UPLOAD_URL",SITE_URL."admin/"); //執行上傳動作路徑   *跨網域可用

define('SITE_TITLE_ADMIN','nakedmarket admin');  //for admin_title
define('ADMIN_ACTIVE','nakedmarket_active'); // admin active 權限 0:停用 1:總管理 2:一般使用者
define('ADMIN_NAME','nakedmarket_name');
define('USER_ID',"");
define("SALES_PATH","./sales/");
define("WAREHOUSE_PATH","./warehouse/");

if(!isset($_SESSION[ADMIN_ACTIVE]))
{
	$_SESSION[ADMIN_NAME]=0;	
	$_SESSION[ADMIN_ACTIVE]=0;
}
/*
 *---------------------------------------------------------------
 * APPLICATION ENVIRONMENT
 *---------------------------------------------------------------
 *
 * You can load different configurations depending on your
 * current environment. Setting the environment also influences
 * things like logging and error reporting.
 *
 * This can be set to anything, but default usage is:
 *
 *     development
 *     testing
 *     production
 *
 * NOTE: If you change these, also change the error_reporting() code below
 */
define('ENVIRONMENT', isset($z['CI_ENV']) ? $_SERVER['CI_ENV'] : 'development');

/*
 *---------------------------------------------------------------
 * ERROR REPORTING
 *---------------------------------------------------------------
 *
 * Different environments will require different levels of error reporting.
 * By default development will show errors but testing and live will hide them.
 */
switch (ENVIRONMENT)
{
	case 'development':
	error_reporting(-1);
	ini_set('display_errors', 1);
	break;

	case 'testing':
	case 'production':
	ini_set('display_errors', 0);
	if (version_compare(PHP_VERSION, '5.3', '>='))
	{
		error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_STRICT & ~E_USER_NOTICE & ~E_USER_DEPRECATED);
	}
	else
	{
		error_reporting(E_ALL & ~E_NOTICE & ~E_STRICT & ~E_USER_NOTICE);
	}
	break;

	default:
	header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
	echo 'The application environment is not set correctly.';
		exit(1); // EXIT_ERROR
	}

/*
 *---------------------------------------------------------------
 * SYSTEM FOLDER NAME
 *---------------------------------------------------------------
 *
 * This variable must contain the name of your "system" folder.
 * Include the path if the folder is not in the same directory
 * as this file.
 */
$system_path = 'system';

/*
 *---------------------------------------------------------------
 * APPLICATION FOLDER NAME
 *---------------------------------------------------------------
 *
 * If you want this front controller to use a different "application"
 * folder than the default one you can set its name here. The folder
 * can also be renamed or relocated anywhere on your server. If
 * you do, use a full server path. For more info please see the user guide:
 * http://codeigniter.com/user_guide/general/managing_apps.html
 *
 * NO TRAILING SLASH!
 */
$application_folder = 'application';

/*
 *---------------------------------------------------------------
 * VIEW FOLDER NAME
 *---------------------------------------------------------------
 *
 * If you want to move the view folder out of the application
 * folder set the path to the folder here. The folder can be renamed
 * and relocated anywhere on your server. If blank, it will default
 * to the standard location inside your application folder. If you
 * do move this, use the full server path to this folder.
 *
 * NO TRAILING SLASH!
 */
$view_folder = '';


/*
 * --------------------------------------------------------------------
 * DEFAULT CONTROLLER
 * --------------------------------------------------------------------
 *
 * Normally you will set your default controller in the routes.php file.
 * You can, however, force a custom routing by hard-coding a
 * specific controller class/function here. For most applications, you
 * WILL NOT set your routing here, but it's an option for those
 * special instances where you might want to override the standard
 * routing in a specific front controller that shares a common CI installation.
 *
 * IMPORTANT: If you set the routing here, NO OTHER controller will be
 * callable. In essence, this preference limits your application to ONE
 * specific controller. Leave the function name blank if you need
 * to call functions dynamically via the URI.
 *
 * Un-comment the $routing array below to use this feature
 */
	// The directory name, relative to the "controllers" folder.  Leave blank
	// if your controller is not in a sub-folder within the "controllers" folder
	// $routing['directory'] = '';

	// The controller class file name.  Example:  mycontroller
	// $routing['controller'] = '';

	// The controller function you wish to be called.
	// $routing['function']	= '';


/*
 * -------------------------------------------------------------------
 *  CUSTOM CONFIG VALUES
 * -------------------------------------------------------------------
 *
 * The $assign_to_config array below will be passed dynamically to the
 * config class when initialized. This allows you to set custom config
 * items or override any default config values found in the config.php file.
 * This can be handy as it permits you to share one application between
 * multiple front controller files, with each file containing different
 * config values.
 *
 * Un-comment the $assign_to_config array below to use this feature
 */
	// $assign_to_config['name_of_config_item'] = 'value of config item';



// --------------------------------------------------------------------
// END OF USER CONFIGURABLE SETTINGS.  DO NOT EDIT BELOW THIS LINE
// --------------------------------------------------------------------

/*
 * ---------------------------------------------------------------
 *  Resolve the system path for increased reliability
 * ---------------------------------------------------------------
 */

	// Set the current directory correctly for CLI requests
if (defined('STDIN'))
{
	chdir(dirname(__FILE__));
}

if (($_temp = realpath($system_path)) !== FALSE)
{
	$system_path = $_temp.'/';
}
else
{
		// Ensure there's a trailing slash
	$system_path = rtrim($system_path, '/').'/';
}

	// Is the system path correct?
if ( ! is_dir($system_path))
{
	header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
	echo 'Your system folder path does not appear to be set correctly. Please open the following file and correct this: '.pathinfo(__FILE__, PATHINFO_BASENAME);
		exit(3); // EXIT_CONFIG
	}

/*
 * -------------------------------------------------------------------
 *  Now that we know the path, set the main path constants
 * -------------------------------------------------------------------
 */
	// The name of THIS file
define('SELF', pathinfo(__FILE__, PATHINFO_BASENAME));

	// Path to the system folder
define('BASEPATH', str_replace('\\', '/', $system_path));

	// Path to the front controller (this file)
define('FCPATH', dirname(__FILE__).'/');

	// Name of the "system folder"
define('SYSDIR', trim(strrchr(trim(BASEPATH, '/'), '/'), '/'));

	// The path to the "application" folder
if (is_dir($application_folder))
{
	if (($_temp = realpath($application_folder)) !== FALSE)
	{
		$application_folder = $_temp;
	}

	define('APPPATH', $application_folder.DIRECTORY_SEPARATOR);
}
else
{
	if ( ! is_dir(BASEPATH.$application_folder.DIRECTORY_SEPARATOR))
	{
		header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
		echo 'Your application folder path does not appear to be set correctly. Please open the following file and correct this: '.SELF;
			exit(3); // EXIT_CONFIG
		}

		define('APPPATH', BASEPATH.$application_folder.DIRECTORY_SEPARATOR);
	}

	// The path to the "views" folder
	if ( ! is_dir($view_folder))
	{
		if ( ! empty($view_folder) && is_dir(APPPATH.$view_folder.DIRECTORY_SEPARATOR))
		{
			$view_folder = APPPATH.$view_folder;
		}
		elseif ( ! is_dir(APPPATH.'views'.DIRECTORY_SEPARATOR))
		{
			header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
			echo 'Your view folder path does not appear to be set correctly. Please open the following file and correct this: '.SELF;
			exit(3); // EXIT_CONFIG
		}
		else
		{
			$view_folder = APPPATH.'views';
		}
	}

	if (($_temp = realpath($view_folder)) !== FALSE)
	{
		$view_folder = $_temp.DIRECTORY_SEPARATOR;
	}
	else
	{
		$view_folder = rtrim($view_folder, '/\\').DIRECTORY_SEPARATOR;
	}

	define('VIEWPATH', $view_folder);

/*
 * --------------------------------------------------------------------
 * LOAD THE BOOTSTRAP FILE
 * --------------------------------------------------------------------
 *
 * And away we go...
 */
require_once BASEPATH.'core/CodeIgniter.php';
/* End of file index.php */
/* Location: ./index.php */
// 設定session 
// function start_session($expire = 0)
// {
// 	if ($expire == 0) {
// 		$expire = ini_get('session.gc_maxlifetime');
// 	} else {
// 		ini_set('session.gc_maxlifetime', $expire);
// 	}

// 	if (empty($_COOKIE['PHPSESSID'])) {
// 		session_set_cookie_params($expire);
// 		session_start();
// 	} else {
// 		session_start();
// 		setcookie('PHPSESSID', session_id(), time() + $expire);
// 	}
// }