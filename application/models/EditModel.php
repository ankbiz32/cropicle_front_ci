<?php
class EditModel extends CI_Model{

    // Update Info
    public function updateInfo($data, $id, $table)
    {
        $this->db->where('id', $id);
        $wpflag = $this->db->update($table , $data);
        if($wpflag){
            return true;
        }
        else{
            return false;
        }
    }

    
    public function notifStatusSeen($user_id)
    {
        $this->db->where('user_id', $user_id);
        $wpflag = $this->db->update('customer_demands' , ['notify'=>'0']);
        if($wpflag){
            return true;
        }
        else{
            return false;
        }
    }

    // Update Info
    public function updateInfoById($table,$data,$col,$id)
    {
        $this->db->where($col, $id);
        $wpflag = $this->db->update($table , $data);
        if($wpflag){
            return true;
        }
        else{
            return false;
        }
    }

    // Update patients
    public function updateInfoType($data,$column, $id, $table)
    {
        $this->db->where($column, $id);
        $wpflag = $this->db->update($table , $data);
        if($wpflag){
            return true;
        }
        else{
            return false;
        }
    }

    public function updateCareer($data, $id, $table)
    {
        $this->db->where('career_id', $id);
        $wpflag = $this->db->update($table , $data);
        if($wpflag){
            return true;
        }
        else{
            return false;
        }
    }
    public function updateRole($data, $id, $table)
    {
        $this->db->where('role_id', $id);
        $wpflag = $this->db->update($table , $data);
        if($wpflag){
            return true;
        }
        else{
            return false;
        }
    }

   


   // Update Website Profile
   public function updateWebProfile($data)
   {
       $this->db->where('id',$data['id']);
       $wpflag = $this->db->update('webprofile',$data);
       if($wpflag){
           return true;
       }
       else{
           return false;
       }
   }

    // Update Enquiry Status
    public function updateEnqStatus($id)
    {
        $data['status']="seen";
        $this->db->where('id',$id);
        $flag = $this->db->update('bookings',$data);
        if($flag){
            return true;
        }
        else{
            return false;
        }
    }

    // Update Enquiry Status
    public function updateCbStatus($id)
    {
        $data['status']="seen";
        $this->db->where('id',$id);
        $flag = $this->db->update('enquiries',$data);
        if($flag){
            return true;
        }
        else{
            return false;
        }
    }

    // Update Website Profile
    public function updateAdminProfile($data, $id)
    {
        $this->db->where('user_id',$id);
        $flag = $this->db->update('users',$data);
        if($flag){
            return true;
        }
        else{
            return false;
        }
    }
    

}
?>
     