<?php
try{
if(! file_exists("data.php")){
    header('Location: generate/');
    exit;
}
// Define application paths
// Please don't change value below.
$front_end_path = 'Front_End/';
$back_end_path = 'Back_End/';

/** 
 * 
 * @package	CodeIgniter
 * @author	Tyrone Lee Emz
 * @copyright	Copyright (c) 2024 - Tyrone Lee Emz
 * @copyright	Copyright (c) 2019 - 2022, CodeIgniter Foundation (https://codeigniter.com/)
 * @link	https://codeigniter.com
 * @since	Version 1.0.0
 * @filesource
 * 
*/

// Set the environment
define('ENVIRONMENT', isset($_SERVER['CI_ENV']) ? $_SERVER['CI_ENV'] : 'development');

// Detect if the request is for the Back_End
$uri = $_SERVER['REQUEST_URI'];
$is_backend = strpos($uri, '/back_end') !== false || strpos($uri, '/BACK_END') !== false;

$st = 0;
include "data.php";

if ($is_backend) {
    header("Location: Back_end/index.php");
} else {

    define("SERVERNAME", $SERVER_NAME);
    define("APPNAME", $APP_NAME);
    define("MAIN_PAGE", $MAIN_PAGE);

    define('BASEPATH', $front_end_path . 'system/');
    define('APPPATH', $front_end_path . 'application/');
    define('VIEWPATH', $front_end_path . 'application/views/');
    define('PUBLICPATH', $front_end_path . 'public/');

    define('APP_TITLE', $APP_TITLE);
    define('APP_DESCRIPTION', $APP_DESCRIPTION);

    define('ENCRYPTION_CODE', "1234567891031420");
    define("SECURE_KEY", "CodeYro");

    define('ROOT_PATH', SERVERNAME."/".APPNAME);
    define('API', SERVERNAME."/".APPNAME."/back_end/index.php/");
    
    require_once BASEPATH . 'core/CodeIgniter.php';
}
}
catch(Exception $e){
    header("Refresh: 0; url=generate");
}
?>
