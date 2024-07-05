<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('FE_setQuery')) {
    function FE_setQuery($sql, $params = []) {
        $CI =& get_instance();
        try {
            if (empty($params)) {
                $query = $CI->db->query($sql);
            } else {
                $query = $CI->db->query($sql, $params);
            }
            if (!$query) {
                $error = $CI->db->error();
                return $error; exit;
            }
            if (stripos(trim($sql), 'select') === 0) {
                return $query->result();
            } else {
                return $query; //pwde mn $CI->db->affected_rows() for INSERT/UPDATE
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


if(!function_exists("FE_SQL_INSERT")){
    function FE_SQL_INSERT($tablename, $params=[]){
        $CI =& get_instance();
        try {
            if (empty($params)) {
                log_message('error', "Please add parameters <--Tyrone CI, Note this is the main error");
            } else {
                $query = $CI->db->insert($tablename, $params);
            }
            if (!$query) {
                $error = $CI->db->error();
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

if(!function_exists("FE_SQL_UPDATE")){
    function FE_SQL_UPDATE($tablename, $condition=[], $parameters =[]){
        $CI =& get_instance();
        try {
            if (empty($condition)||empty($parameters)) {
                log_message('error', "Please add parameters <--Tyrone CI, Note this is the main error");
            } else {
                 $CI->db->where($condition);
                 $query = $CI->db->update($tablename, $parameters);
            }
            if (!$query) {
                $error = $CI->db->error();
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


if(!function_exists("FE_SQL_DELETE")){
    function FE_SQL_DELETE($tablename, $condition=[]){
        $CI =& get_instance();
        try {
            if (empty($condition)) {
                log_message('error', "Please add condition <--Tyrone CI, Note this is the main error");
            } else {
                 $CI->db->where($condition);
                 $query = $CI->db->delete($tablename);
            }
            if (!$query) {
                $error = $CI->db->error();
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

if(! function_exists("SQL_SUCCESS")){
    function SQL_SUCCESS(){
        return 1;
    }
}

if(! function_exists("SQL_DUPLICATE_CODE")){
    function SQL_DUPLICATE_CODE(){
        return 1062;
    }
}
?>
