<?php
class GetModel extends CI_Model{


    public function fetchProds($loc_id)
    {
        $users= $this->db->select('ui.user_id')
                        ->from('user_info ui')
                        ->join('users u','u.id=ui.user_id','LEFT')
                        ->where('u.role_id',2)
                        ->where('u.is_active',1)
                        ->where('ui.location_id',$loc_id)
                        ->get()
                        ->result();
        if(!empty($users)){
            $hawker_count=sizeof($users);
            $orders=array();
            foreach($users as $u){
                $orders[]=$this->getLastDelivered($u->user_id);
            }
            // echo'<pre>';var_dump($orders);exit;
            if(!empty($orders)){
                $arr=array();
                $arr2=array();
                foreach($orders as $o){
                    if(!empty($o)){
                        if($o->updated_by_hawker==0){
                            $prms=['order_id'=>$o->id];
                            $arr[]=$this->getOrderDetailsForLoc('order_details',$prms);
                        }
                        else{
                            $prms=['order_id'=>$o->id,'remaining_qty >'=>0];
                            $arr2[]=$this->getOrderDetailsForLoc2('order_details',$prms);   
                        }
                    }
                }
                $merged = call_user_func_array('array_merge', $arr);
                $merged = array_unique($merged,SORT_REGULAR);

                $merged2= call_user_func_array('array_merge', $arr2);
                $merged2= array_unique($merged2,SORT_REGULAR);

                $merged3= array_merge($merged,$merged2);
                $merged3= array_unique($merged3,SORT_REGULAR);
              
                foreach($merged as $mer){
                    $items[]=$this->getItemInfo($mer->item_id,'items_master');
                }
                $result['hawker_count']=$hawker_count;
                $result['items']=$items;
                // echo'<pre>';var_dump($merged3);exit;
                return $result;
            }
            else{
                return false;
            }
        }
        else{
            return false;
        }
        
    }

    public function getOrderDetailsForLoc($table, $where)
    {
        return $this->db->select('item_id')
                        ->where($where)
                        ->get($table)
                        ->result();
    }

    public function getOrderDetailsForLoc2($table, $where)
    {
        return $this->db->select('item_id')
                        ->where($where)
                        ->get($table)
                        ->result();
    }

    public function getLastDelivered($uid)
    {
        $last_order=$this->db->select('id, updated_by_hawker')
                ->where('user_id',$uid)
                ->where('status','DELIVERED')
                ->order_by('id','desc')
                ->limit(1)
                ->get('orders')
                ->row();
        if(!empty($last_order)){
            return $last_order;
        }
        else{
            return NULL;
        }
    }

    // Fetch info
    public function getItemInfo($id,$table)
    {
        return $this->db->select('id, item_name, item_price_customer, item_img')
                    ->where('id',$id)
                    ->where('is_active',1)
                    ->get($table)
                    ->row();
    }

    // Fetch info
    public function getInfo($table)
    {
        return $this->db->get($table)->result();
    }


    // Fetch info by id
    public function getInfoById($id, $table)
    {
        $this->db->where('id', $id);
        return $this->db->get($table)->row();
    }

    
    public function getInfoByColId($col,$id, $table)
    {
        $this->db->where($col, $id);
        return $this->db->get($table)->row();
    }

    public function getInfoParams($table, $where)
    {
        return $this->db->where($where)
                        ->get($table)
                        ->result();
    }


    // Fetch info by order
    public function getInfoByOrder($table)
    {
        return $this->db->order_by('id', 'desc')
                        ->get($table)
                        ->result();
    }


    // Fetch limited info by order
    public function getLimInfo($table,$lim,$order)
    {
        return $this->db->limit($lim)
                        ->order_by('id', $order)
                        ->get($table)
                        ->result();
    }


    // Fetch visible Info
    public function getVisibleInfo($table)
    {
        $this->db->where('visibility', '1');
        return $this->db->get($table)->result();
    }


    // Fetch visible Info
    public function getActiveInfo($table)
    {
        $this->db->where('is_active', '1');
        return $this->db->get($table)->result();
    }


    // Fetch Enquiries
    public function getEnquiries()
    {
        return $this->db->get('enquiries')->result();
    }


    // Count no. of rows in table 
    public function record_count($table,$column,$key) 
    {
        return $this->db->where($column,$key)->get($table)->num_rows();
    }

    
    // Fetch Admin Profile
    public function getAdminProfile()
    {
        return $this->db->get('users')->row();
    }


    // Fetch Website Profile
    public function getWebProfile()
    {
        return $this->db->get('webprofile')->row();
    }

}
?>