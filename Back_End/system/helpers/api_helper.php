<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if(! function_exists("API_INPUT")){
    function API_INPUT(){
        $input = json_decode(get_instance()->input->raw_input_stream, true);
        
        return $input;
    }
}

if(! function_exists("json_response")){
    function json_response($result){
      
       if(is_array($result)){
        $ret = [
            "status" => 200,
            "message" => "SUCCESS",
            "data" => $result,
            "text" => "Has Data"
        ];
       }
       else{
        $ret = [
            "status" => 200,
            "message" => "SUCCESS",
            "data" =>[],
            "text" => $result
        ];
       }
       return json_encode($ret);
    }
}
?>