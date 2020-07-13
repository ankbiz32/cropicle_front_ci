<?php
class AddModel extends CI_Model{

    
    public function saveInfo($table,$d)
    {
        if(!empty($d)){
            $this->db->insert($table,$d);
            return $this->db->insert_id();
        }
		return false;
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