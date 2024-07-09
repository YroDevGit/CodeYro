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
    function SET_VALIDATION($inputname, $label, $rules){
        $CY =& get_instance();
        $CY->form_validation->set_rules($inputname, $label, $rules);
        return $CY;
    }
}


if(! function_exists("VALIDATION_FAILED")){
    function VALIDATION_FAILED(){
        $CY =& get_instance();
        return $CY->form_validation->run() == false;
    }
}

if(! function_exists("VALIDATION_ERROR_LIST")){
    function VALIDATION_ERROR_LIST(){
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
        $CY =& get_instance();
        $CY->session->set_userdata($key,$value);
    }
}

if(! function_exists("GET_SESSION")){
    function GET_SESSION($key){
        $CY =& get_instance();
        return $CY->session->userdata($key);
    }
}

if(! function_exists("GET_ALL_SESSION")){
    function GET_ALL_SESSION(){
        $CY =& get_instance();
        return $CY->session->all_userdata();
    }
}

if(! function_exists("REMOVE_SESSION")){
    function REMOVE_SESSION($key){
        $CY =& get_instance();
        $CY->session->unset_userdata($key);
    }
}

if(! function_exists("REMOVE_ALL_SESSION")){
    function REMOVE_ALL_SESSION($key){
        $CY =& get_instance();
        $CY->session->sess_destroy();
    }
}

if(! function_exists("SET_COKIE")){
    function SET_COKIE($key, $value, $expiration = 86500){
        $CY =& get_instance();
        $cokie_data = array(
            'name'   => $key,  
            'value'  => $value,  
            'expire' => 86500,  
            'secure' => FALSE,  // TRUE if the cookie should only be transmitted over secure HTTPS connections
            'httponly' => FALSE,  // TRUE to make the cookie accessible only through the HTTP protocol
            'domain' => '',  
            'path'   => '/', 
        );
        $CY->input->set_cookie($cokie_data);
    }
}

if(! function_exists("GET_COKIE")){
    function GET_COKIE($key){
        $CY =& get_instance();    
        return $CY->input->cookie($key, TRUE);
    }
}

if(! function_exists("REMOVE_COKIE")){
    function REMOVE_COKIE($key){
        $CY =& get_instance();    
        $CY->input->set_cookie($key, '', 0, '/');
    }
}

if(! function_exists("SET_FLASHDATA")){
    function SET_FLASHDATA($key, $value){
        $CY =& get_instance();    
        $CY->session->set_flashdata($key, $value);
    }
}
if(! function_exists("GET_FLASHDATA")){
    function GET_FLASHDATA($key){
        $CY =& get_instance();    
        return $CY->session->flashdata($key);
    }
}







?>