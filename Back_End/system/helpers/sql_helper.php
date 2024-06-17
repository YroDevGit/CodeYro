<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (!function_exists('setQuery')) {
    function setQuery($sql, $params = []) {
        $CI =& get_instance();
        try {
            if (empty($params)) {
                $query = $CI->db->query($sql);
            } else {
                $query = $CI->db->query($sql, $params);
            }
            if (!$query) {
                $error = $CI->db->error();
                throw new Exception($error['message'] . ' - ' . $error['code']);
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
            return false;
        }
    }
}


if(!function_exists("SQL_INSERT")){
    function SQL_INSERT($tablename, $params=[]){
        $CI =& get_instance();
        try {
            if (empty($params)) {
                log_message('error', "Please add parameters <--Tyrone CI, Note this is the main error");
            } else {
                $query = $CI->db->insert($tablename, $params);
            }
            if (!$query) {
                $error = $CI->db->error();
                throw new Exception($error['message'] . ' - ' . $error['code']);
            }
            return $query;
        } catch (Exception $e) {
            log_message('error', 'SQL Error: ' . $e->getMessage());
            if (ENVIRONMENT !== 'production') {
                echo 'Database error: ' . $e->getMessage();
            }
            return false;
        }
    }
}

if(!function_exists("SQL_UPDATE")){
    function SQL_UPDATE($tablename, $condition=[], $parameters =[]){
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
                throw new Exception($error['message'] . ' - ' . $error['code']);
            }
            return $query;
        } catch (Exception $e) {
            log_message('error', 'SQL Error: ' . $e->getMessage());
            if (ENVIRONMENT !== 'production') {
                echo 'Database error: ' . $e->getMessage();
            }
            return false;
        }
    }
}


if(!function_exists("SQL_DELETE")){
    function SQL_DELETE($tablename, $condition=[]){
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
                throw new Exception($error['message'] . ' - ' . $error['code']);
            }
            return $query;
        } catch (Exception $e) {
            log_message('error', 'SQL Error: ' . $e->getMessage());
            if (ENVIRONMENT !== 'production') {
                echo 'Database error: ' . $e->getMessage();
            }
            return false;
        }
    }
}
?>
