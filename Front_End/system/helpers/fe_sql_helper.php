<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('CY_SetQuery')) {
    function CY_SetQuery($sql, $params = []) {
        $CY =& get_instance();
        try {
            if (empty($params)) {
                $query = $CY->db->query($sql);
            } else {
                $query = $CY->db->query($sql, $params);
            }
            if (!$query) {
                $error = $CY->db->error();
                return $error; exit;
            }
            if (stripos(trim($sql), 'select') === 0) {
                return $query->result();
            } else {
                return $query; //pwde mn $CY->db->affected_rows() for INSERT/UPDATE
            }
        } catch (Exception $e) {
            log_message('error', 'SQL Error: ' . $e->getMessage());
            if (ENVIRONMENT !== 'production') {
                echo 'Database error: ' . $e->getMessage();
            }
            return $e->getMessage(); exit;
        }
    }
}


if(!function_exists("CY_DB_INSERT")){
    function CY_DB_INSERT($tablename, $params=[]){
        $CY =& get_instance();
        try {
            if (empty($params)) {
                log_message('error', "Please add parameters <--Tyrone CI, Note this is the main error");
            } else {
                $query = $CY->db->insert($tablename, $params);
            }
            if (!$query) {
                $error = $CY->db->error();
                return $error; exit;
            }
            return $query;
        } catch (Exception $e) {
            log_message('error', 'SQL Error: ' . $e->getMessage());
            if (ENVIRONMENT !== 'production') {
                echo 'Database error: ' . $e->getMessage();
            }
            return $e->getMessage(); exit;
        }
    }
}

if(!function_exists("CY_DB_UPDATE")){
    function CY_DB_UPDATE($tablename, $condition=[], $parameters =[]){
        $CY =& get_instance();
        try {
            if (empty($condition)||empty($parameters)) {
                log_message('error', "Please add parameters <--Tyrone CI, Note this is the main error");
            } else {
                 $CY->db->where($condition);
                 $query = $CY->db->update($tablename, $parameters);
            }
            if (!$query) {
                $error = $CY->db->error();
                return $error; exit;
            }
            return $query;
        } catch (Exception $e) {
            log_message('error', 'SQL Error: ' . $e->getMessage());
            if (ENVIRONMENT !== 'production') {
                echo 'Database error: ' . $e->getMessage();
            }
            return $e->getMessage(); exit;
        }
    }
}


if(!function_exists("CY_DB_DELETE")){
    function CY_DB_DELETE($tablename, $condition=[]){
        $CY =& get_instance();
        try {
            if (empty($condition)) {
                log_message('error', "Please add condition <--Tyrone CI, Note this is the main error");
            } else {
                 $CY->db->where($condition);
                 $query = $CY->db->delete($tablename);
            }
            if (!$query) {
                $error = $CY->db->error();
                return $error; exit;
            }
            return $query;
        } catch (Exception $e) {
            log_message('error', 'SQL Error: ' . $e->getMessage());
            if (ENVIRONMENT !== 'production') {
                echo 'Database error: ' . $e->getMessage();
            }
            return $e->getMessage();exit;
        }
    }
}

if(! function_exists("CY_DB_SUCCESS")){
    function CY_DB_SUCCESS(){
        return 1;
    }
}

if(! function_exists("CY_DB_DUPLICATE_CODE")){
    function CY_DB_DUPLICATE_CODE(){
        return 1062;
    }
}
?>
