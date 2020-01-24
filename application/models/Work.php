<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Work extends CI_Model{
    public function login($table = null, $data = null){
        $val = $this->db->where($data)
                        ->get($table);
        return $val;               
    }
    public function insert_data($table, $data){
        $val = $this->db->insert($table, $data);
        return $val;
    }
    
}
?>