<?php
defined('BASEPATH') OR exit('No direct script access allowed');


if(! function_exists("API_INPUT")){
    function API_INPUT(){
        $input = json_decode(get_instance()->input->raw_input_stream, true);
        return $input;
    }
}

if(! function_exists("json_response")){
    function json_response($result, $direct=false){
      
       if(is_array($result)){
        $ret = [
            "status" => 200,
            "message" => "SUCCESS",
            "data" => $result,
            "text" => "Has Data"
        ];
       }
       else{
        if($result=="ERROR"){
            $ret = [
                "status" => -1,
                "message" => "ERROR",
                "data" =>[],
                "text" => $result
            ];
        } else if($result=="NOTUSER"){
            $ret = [
                "status" => 401,
                "message" => "NOT AUTHORIZED USER, Please check API KEY",
                "data" =>[],
                "text" => $result
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
       }
       if($direct==false){return json_encode($ret);exit;}
       if($direct==true){echo json_encode($ret);exit;}
    }
}
?>