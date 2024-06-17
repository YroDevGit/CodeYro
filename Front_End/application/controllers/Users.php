<?php 

//You can rename the controller_template as filename
//Please do not forget to rename classname
class Users extends CI_Controller {

    public function __construct() {
        parent::__construct();
        /**
         *  you can load libraries and files here..
         * $this->load->library('session');
         */
           
    }

    public function index()
    {
        echo "Hello world";
        
    }

    /**
     * You can add more functions here
     * 
     */

}