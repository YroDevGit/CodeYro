<?php

if(! function_exists("CY_VIEW")){
    function CY_VIEW($view, $data=[]){
        $CY =& get_instance();
        if(empty($data)){
            $CY->load->view($view);
        }
        else{
            $CY->load->view($view,$data);
        }
    }
}


if(! function_exists("POST")){
    function POST($inputname){
        $CY =& get_instance();
        return $CY->POST[$inputname];
    }
}

if(! function_exists("POST_DATA")){
    function POST_DATA(){
        $CY =& get_instance();
        return $CY->POST;
    }
}

if(! function_exists("SET_VALIDATION")){
    /** => Void
     * set validation to the specific form input
     */
    function SET_VALIDATION($inputname, $label, $rules){
        $CY =& get_instance();
        $CY->form_validation->set_rules($inputname, $label, $rules);
        return $CY;
    }
}


if (!function_exists('VALIDATION_FAILED')) {
    function VALIDATION_FAILED() {
        /** => Boolean
         * Check if there is input validation that fails
         * Required SET_VALIDATION function
         */
        $CY =& get_instance();
        if ($CY->form_validation->run() == false) {
            $CY->session->set_flashdata('cy_validation_error_1005CodeYro05', VALIDATION_ERROR_LIST());
            return true;
        }

        return false; 
    }
}


if(! function_exists("VALIDATION_GET_FLASH_ERROR")){
    function VALIDATION_GET_FLASH_ERROR($inputname){
        /** => Array
         * This is effective in both load view and redirects
         * This will required VALIDATION_FAILED() to be effective
         * CodeYro
         */
        $all_error = (!empty(GET_FLASHDATA("cy_validation_error_1005CodeYro05"))?GET_FLASHDATA("cy_validation_error_1005CodeYro05"): []);
        $ret = "";
        if(isset($all_error[$inputname])){
            $ret = $all_error[$inputname];
        }
        else{
            $ret = "";
        }
        return $ret;
    }
}

if(! function_exists("VALIDATION_FAILED_MESSAGE")){
    function VALIDATION_FAILED_MESSAGE($inputname){ //String
        /** => String
         * This is effective in both load view and redirects
         * This will required VALIDATION_FAILED() to be effective
         * CodeYro
         */
        return VALIDATION_GET_FLASH_ERROR($inputname);
    }
}

if(! function_exists("VALIDATION_ALL_FAILED_LIST")){ 
    function VALIDATION_ALL_FAILED_LIST(){
        /** => array
         * This is effective in both load view and redirects
         * This will required VALIDATION_FAILED() to be effective
         * CodeYro
         */
        $all_error = (!empty(GET_FLASHDATA("cy_validation_error_1005CodeYro05"))?GET_FLASHDATA("cy_validation_error_1005CodeYro05"): []);
        return $all_error;
    }
}



if(! function_exists("VALIDATION_ERROR_LIST")){
    function VALIDATION_ERROR_LIST(){
        /**
         *  => Array
         */
        $CY =& get_instance();
        return $CY->form_validation->validation_errors();
    }
}

if(! function_exists("CY_USE_MODEL")){
    function CY_USE_MODEL($modelname){
        $CY =& get_instance();
        $CY->load->model($modelname);
    }
}

if(! function_exists("SET_SESSION_ARRAY")){
    function SET_SESSION_ARRAY($session){
        /**
         *  => Void
         */
        $CY =& get_instance();
        if(is_array($session)){
            $CY->session->set_userdata($session);
        }
        else{
            $CY->session->set_userdata($session,"null");
        }
    }
}

if(! function_exists("SET_SESSION")){
    function SET_SESSION($key, $value){
        /**
         *  => Void
         */
        $CY =& get_instance();
        $CY->session->set_userdata($key,$value);
    }
}

if(! function_exists("GET_SESSION")){
    function GET_SESSION($key){
        /**
         *  => Array or String
         */
        $CY =& get_instance();
        return $CY->session->userdata($key);
    }
}

if(! function_exists("GET_ALL_SESSION")){
    function GET_ALL_SESSION(){
        /**
         *  => Array
         */
        $CY =& get_instance();
        return $CY->session->all_userdata();
    }
}

if(! function_exists("REMOVE_SESSION")){
    function REMOVE_SESSION($key){
        /**
         *  => Void
         */
        $CY =& get_instance();
        $CY->session->unset_userdata($key);
    }
}

if(! function_exists("REMOVE_ALL_SESSION")){
    /**
         *  => Void
         */
    function REMOVE_ALL_SESSION($key){
        $CY =& get_instance();
        $CY->session->sess_destroy();
    }
}

if(! function_exists("SET_COOKIE")){
    function SET_COOKIE($key, $value, $expiration = 86500){
        /**
         *  => Void
         */
        $CY =& get_instance();
        $cokie_data = array(
            'name'   => $key,  
            'value'  => $value,  
            'expire' => $expiration,  
            'secure' => FALSE,  // TRUE if the cookie should only be transmitted over secure HTTPS connections
            'httponly' => FALSE,  // TRUE to make the cookie accessible only through the HTTP protocol
            'domain' => '',  
            'path'   => '/', 
        );
        $CY->input->set_cookie($cokie_data);
    }
}

if(! function_exists("COOKIE_EXIST")){
    function COOKIE_EXIST($input){
        /**
         * Boolean
         */
        $ret = false;
        $cookie_value = get_cookie($input);
        if ($cookie_value !== NULL) {
            $ret = true;
        } else {
            $ret = false;
        }
        return $ret;
    }
}

if(! function_exists("GET_COOKIE")){
    function GET_COOKIE($key){
        /**
         *  => String or Array
         */
        $CY =& get_instance();    
        return $CY->input->cookie($key, TRUE);
    }
}

if(! function_exists("REMOVE_COOKIE")){
    function REMOVE_COOKIE($key){
        /**
         *  => Void
         */
        setcookie($key, '', time() - 9999999999, '/');
    }
}

if(! function_exists("SET_FLASHDATA")){
    function SET_FLASHDATA($key, $value){
        /**
         *  => Void
         */
        $CY =& get_instance();    
        $CY->session->set_flashdata($key, $value);
    }
}
if(! function_exists("GET_FLASHDATA")){
    function GET_FLASHDATA($key){
        /**
         *  => Array or String
         */
        $CY =& get_instance();    
        return $CY->session->flashdata($key);
    }
}







?>