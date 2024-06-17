<?php
defined('BASEPATH') OR exit('No direct script access allowed');



// API for back_end
if(! function_exists("API")){
    function API($url){
       return API.$url;
    }
}

// separated classname and function name. we can use API_NAME("classname", "functionname");
if(! function_exists("API_NAME")){
   function API_NAME($class, $name, $parameters=null){
      $ret = null;
      if($parameters==null){
         $ret = API.$class."/".$name;
      }
      else{
         $ret = API.$class."/".$name."?".$parameters;
      }
      return $ret;
   }
}

//Global api
if(! function_exists("API_URL")){
   function API_URL($url){
      return $url;
   }
}


if(! function_exists("API_REQUEST")){
   function API_REQUEST($api, $parameters=[], $type = "PHP"){
      $ret  = null;
      $ch = curl_init($api);
      $parameters = json_encode($parameters);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $parameters);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Content-Length: ' . strlen($parameters)
        ]);

        $response = curl_exec($ch);
        curl_close($ch);

        if($type=="PHP"){
         
        }

        switch($type){
         case "PHP": $ret = json_decode($response, true); break;
         case "JS": $ret = $response; break;
        }
        
        return $ret;
   }
}
?>