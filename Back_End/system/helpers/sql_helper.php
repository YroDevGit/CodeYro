<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('DB_SET_QUERY')) {
    function DB_SET_QUERY($sql, $params = []) {
        $CY =& get_instance();
        try {
            if (empty($params)) {
                $query = $CY->db->query($sql);
            } else {
                $query = $CY->db->query($sql, $params);
            }
            if (!$query) {
                $error = $CY->db->error();
                return ["code"=>-1, "status"=> $error, "message"=>"Error"]; exit;
            }
            if (stripos(trim($sql), 'select') === 0) {
                $result_array = $query->result_array();
                $first_row = [];
                if(! empty($result_array)){
                    $first_row = $result_array[0];
                }
                return ["code"=>CY_SUCCESS, "status"=>$query, "message"=> "SUCCESS", "data"=>$result_array,"first_row"=>$first_row]; exit;
            }else if(stripos(trim($sql), 'insert') === 0){
                return ["code"=>CY_SUCCESS, "status" => $query, "message" => "Data inserted successfully", "insert_id"=>$CY->db->insert_id(), "parameters"=>$params];
                exit;
            } else {
                return ["code"=>CY_SUCCESS, "status"=>$query, "message" => "SUCCESS", "parameters"=>$params];
                //pwde mn $CY->db->affected_rows() for INSERT/UPDATE
            }
        } catch (Exception $e) {
            log_message('error', 'SQL Error: ' . $e->getMessage());
            if (ENVIRONMENT !== 'production') {
                //echo 'Database error: ' . $e->getMessage();
            }
            return ["code"=>-1, "status"=> $e->getMessage(), "message"=>"Error"]; exit;
        }
    }
}


if(!function_exists("DB_INSERT")){
    function DB_INSERT($tablename, $params=[]){
        $CY =& get_instance();
        try {
            if (empty($params)) {
                log_message('error', "Please add parameters <--Tyrone CI, Note this is the main error");
            } else {
                $query = $CY->db->insert($tablename, $params);
            }
            if (!$query) {
                $error = $CY->db->error();
                return ["code"=>-1, "status"=> $error, "message"=>$error]; exit;
            }
            return ["code"=>CY_SUCCESS, "status"=>$query, "message" => "Data inserted successfully", "insert_id"=>$CY->db->insert_id(), "parameters"=>$params];
        } catch (Exception $e) {
            log_message('error', 'SQL Error: ' . $e->getMessage());
            if (ENVIRONMENT !== 'production') {
                //echo 'Database error: ' . $e->getMessage();
            }
            return ["code"=>-1, "status"=> $e->getMessage(), "message"=>$e->getMessage()]; exit;
        }
    }
}

if(!function_exists("DB_UPDATE")){
    function DB_UPDATE($tablename, $condition=[], $parameters =[]){
        $CY =& get_instance();
        try {
            if (empty($condition)||empty($parameters)) {
                log_message('error', "Please add parameters <--Tyrone CI, Note this is the main error");
                return ["code"=>-1, "status"=>"void", "message"=>"Please add conditions and parameters"];exit;
            } else {
                 $CY->db->where($condition);
                 $query = $CY->db->update($tablename, $parameters);
            }
            if (!$query) {
                $error = $CY->db->error();
                return ["code"=>-1, "status"=>$error, "message"=>$error]; exit;
            }
            return ['code'=>CY_SUCCESS, "status"=>$query, "message"=>"SUCCESS"] ;
        } catch (Exception $e) {
            log_message('error', 'SQL Error: ' . $e->getMessage());
            if (ENVIRONMENT !== 'production') {
                //echo 'Database error: ' . $e->getMessage();
            }
            return ["code"=>-1, "status"=>$e->getMessage(), "message"=>$e->getMessage()]; exit;
        }
    }
}


if(!function_exists("DB_DELETE")){
    function DB_DELETE($tablename, $condition=[]){
        $CY =& get_instance();
        try {
            if (empty($condition)) {
                log_message('error', "Please add condition <--Tyrone CI, Note this is the main error");
                return ["code"=>-1, "status"=>"void", "message"=>"Please add condition"];exit;
            } else {
                 $CY->db->where($condition);
                 $query = $CY->db->delete($tablename);
            }
            if (!$query) {
                $error = $CY->db->error();
                return ["code"=>-1, "status"=> $error, "message"=> $error];exit;
            }
            return ['code'=>CY_SUCCESS,"status"=>$query,"message"=>"SUCCESS"];
        } catch (Exception $e) {
            log_message('error', 'SQL Error: ' . $e->getMessage());
            if (ENVIRONMENT !== 'production') {
                //echo 'Database error: ' . $e->getMessage();
            }
            return ["code"=>-1, "status"=> $e->getMessage(), "message"=> $e->getMessage()];exit;
        }
    }
}

if(! function_exists("DB_SUCCESS")){
    function DB_SUCCESS(){
        return 1;
    }
}

if(! function_exists("DB_DUPLICATE_CODE")){
    function DB_DUPLICATE_CODE(){
        return 1062;
    }
}


if(! function_exists("DB_TRACKER_START")){
    function DB_TRACKER_START(){
        $CY =& get_instance();
        return $CY->db->trans_start();
    }
}

if(! function_exists("DB_TRACKER_COMPLETE")){// No need to rollback, it is automatic rollback when there is a fail queries.
    function DB_TRACKER_COMPLETE(){
        $CY =& get_instance();
        return $CY->db->trans_complete(); 
    }
}

if(! function_exists("DB_TRACKER_STOP")){// Need to roleback manually when there is an error, must use CY_DB_TRACKER_CHECK function.
    function DB_TRACKER_STOP(){
        $CY =& get_instance();
        return $CY->db->trans_commit();
    }
}

if(! function_exists("DB_ROLLBACK")){
    function DB_ROLLBACK(){
        $CY =& get_instance();
        return $CY->db->trans_rollback();
    }
}

if(! function_exists("DB_TRACKER_CHECK")){
    function DB_TRACKER_CHECK($result){
        if($result['code']!=CY_SUCCESS){
            CY_DB_ROLLBACK();
            exit;
        }
    }
}

if(! function_exists("DB_TRACKER_STATUS")){
    function DB_TRACKER_STATUS(){
        $ret = "";
        $CY =& get_instance();
        if ($CY->db->trans_status() === FALSE) {
            $ret = ["code"=>-1, "status" => $CY->db->trans_status(), "message" => "ERROR"];
        } else {
            $ret = ["code"=>CY_SUCCESS, "status" => $CY->db->trans_status(), "message" => "SUCCESS"];
        }
        return $ret;
    }
}
?>
