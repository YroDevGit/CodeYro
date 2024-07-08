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

?>