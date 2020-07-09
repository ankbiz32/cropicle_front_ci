<?php
class AddModel extends CI_Model{

    
    public function saveInfo($d, $table)
    {
        $flag = $this->db->insert($table , $d);
        if($flag){
            return true;
        }
        else{
            return false;
        }
    }


    public function saveEnquiry($d)
    {
        $flag = $this->db->insert('enquiries',$d);
        if($flag){
            return true;
        }
        else{
            return false;
        }
    }


    
}