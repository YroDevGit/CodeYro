<?php

/** 
 * 
 * @package	CodeYRO
 * @author	Tyrone Lee Emz
 * @copyright	Copyright (c) 2024 - Tyrone Lee Emz
 * @since	Version 1.0.0
 * @filesource
 * 
*/

//Change app details
$APP_TITLE = ""; // Optional
$APP_DESCRIPTION = ""; // Optional
$YEAR = date("Y-m-d"); // Optional



//When using apache, might need to use the default http://localhost/, might need to rename when server is changed
$SERVER_NAME = "http://localhost/"; //Mandatory//this is the first thing you need to rename
$APP_NAME = "project"; //Mandatory//this is the second thing you need to rename


/**
 * $MAIN_PAGE
 * Welcome is found at application\controllers\Welcome.php 
 * Open Welcome.php inside controllers folder to modify view, if you want to change the main page, you can create new controller and rename the MAIN_PAGE value
 */
$MAIN_PAGE = "Welcome";
/**END OF MAIN_PAGE */
 

?>

