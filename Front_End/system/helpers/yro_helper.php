<?php
defined('BASEPATH') OR exit('No direct script access allowed');
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
if(! function_exists("DISPLAY")){
    function DISPLAY($array){
        if(is_array($array)){
            print_r($array);
        }
        else{
            echo "DISPLAY function only works for array display.";
        }
    }
}

if (! function_exists("P")){
    function P($text){
        if(is_array($text)){
            print_r($text);
        }
        else{
            echo $text;
        }
    }
}

if (!function_exists('dd')) {
    function dd(...$vars) {
        foreach ($vars as $var) {
            echo '<pre>';
            var_dump($var);
            echo '</pre>';
        }
        die;
    }
}



?>