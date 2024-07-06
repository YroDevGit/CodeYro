<?php
 
 if(! function_exists("UPLOAD_FILE")){
    function UPLOAD_FILE($inputname, $rename = "FALSE"){
        $filename = "";
        switch($rename){
            case "FALSE": $filename = basename($_FILES[$inputname]["name"]);break;
            case "TRUE": $filename = AUTO_RENAME_FILE($inputname); break;
            default: $filename = $rename.".".GET_FILE_TYPE($inputname);break;
        }
        $ret = [];
        if(file_exists(STORAGE.$filename)){
            $ret = ['code' => '1062', 'message'=>'File already exist', 'filename' => $_FILES[$inputname]["name"], 'filesize' => $_FILES[$inputname]["size"]];
        }
        else{
            if (move_uploaded_file($_FILES[$inputname]["tmp_name"], STORAGE.$filename)) {
                $ret = ['code' => '200', 'message'=>'File uploaded suuccessfully', 'filename' => $_FILES[$inputname]["name"], 'filesize' => $_FILES[$inputname]["size"]];
            } else {
                $ret = ['code' => '-1', 'message'=>'Failed to upload file', 'filename' => $_FILES[$inputname]["name"], 'filesize' => $_FILES[$inputname]["size"]];
            }
        }
        return $ret;
    }
 }

 if(! function_exists("GET_FILE_NAME")){
    function GET_FILE_NAME($input){
        return basename($_FILES[$input]["name"]);
    }
 }

 if(! function_exists("GET_FILE_PATH")){
    function GET_FILE_PATH($input){
        return $_FILES[$input]["tmp_name"];
    }
 }

 if(! function_exists("GET_FILE")){
    function GET_FILE($inputname){
        return $_FILES[$inputname];
    }
 }

 if(! function_exists("GET_FILE_TYPE")){
    function GET_FILE_TYPE($inputname){
        $filename = $_FILES[$inputname]['name'];
        $fileExtension = pathinfo($filename, PATHINFO_EXTENSION);
        return $fileExtension;
    }
 }

 if(! function_exists("GET_FILE_SIZE")){
    function GET_FILE_SIZE($inputname){
        return $_FILES[$inputname]["size"];
    }
 }

 if(! function_exists("FILE_VALIDATE")){
    function FILE_VALIDATE($inputfile, $accept = []){
        $ret = false;
        if(empty($accept)){
            $ret = false;
        }
        else{
            $type = GET_FILE_TYPE($inputfile);
            if(in_array($type, $accept)){
                $ret = true;
            }
        }
        return $ret;
    }
 }

 if(! function_exists("AUTO_RENAME_FILE")){
    function AUTO_RENAME_FILE($inputfile){
        $arr = ["A","B","C","D","F","G","H","I","J","K","L","M"];
        shuffle($arr);
        $arr1 = ["T","Y","R","O","N","E"];
        shuffle($arr1);
        $dt = date('Y-m-d');
        return $arr[0].$arr[1].$arr[2].$arr[3].$arr[4].$dt.$arr1[0].$arr1[1].$arr1[2].".".GET_FILE_TYPE($inputfile);
    }
 }

 if(! function_exists("FILE_EXIST")){
    function FILE_EXIST(){
        return 1062;
    }
 }

?>