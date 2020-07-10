<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * @author Ankur Agrawal 
**/

class Auth_model extends CI_Model {

    public function authenticate($data) 
    {
        $this->db->where(['mobile_no' => $data['mob'] , 'is_active' => 1, 'role_id' => 3 ]); /* Role ID 3 is for Users */
        $query = $this->db->get('users');
        if($query->num_rows() == 0)
            return false;

        $user = $query->row();
        // echo password_hash($data['pwd'], PASSWORD_DEFAULT);
        // echo "<br>".$data['uname'];
        // exit;
        return password_verify($data['pwd'], $user->password) ? $user : FALSE;
    }


    public function changeLoginPassword($h, $user_id) {
		$this->db->where('user_id', $user_id);
		$flag=$this->db->update('users', $h);
		if($flag){
            return true;
        }
        else{
            return false;
        }
    }
    
    
}
