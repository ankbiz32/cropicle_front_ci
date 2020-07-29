<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Edit extends MY_Controller {

    function __construct()
    {
        parent:: __construct();
        $this->redirectIfNotLoggedIn();
        $this->load->model('GetModel','fetch');
        $this->load->model('EditModel','edit');
        $this->load->model('AddModel','add');
        $this->load->model('DeleteModel','delete');
    }

    
    public function img_upload()
    {
        $path ='assets/images';
        $initialize = array(
            "upload_path" => $path,
            "allowed_types" => "jpg|jpeg|png|bmp",
            "remove_spaces" => TRUE,
            "max_size" => 820
        );
        $this->load->library('upload', $initialize);
        if (!$this->upload->do_upload('file')) {
            $error=trim(strip_tags($this->upload->display_errors()));
            $this->session->set_flashdata('failed',trim(strip_tags($this->upload->display_errors())));
        }
        else {
            $imgdata = $this->upload->data();
            $data['profile_img'] = $imgdata['file_name'];
            $data['modified'] = date('Y-m-d H:i:s');
            $t= $this->fetch->getInfoByColId('user_id',$this->session->user->id,'user_info');
            $status= $this->edit->updateInfoById('user_info',$data,'user_id',$this->session->user->id);
            if($status){
                if($t->profile_img=='user.png'){
                }
                else{
                    unlink('assets/images/'.$t->profile_img);
                }
                $this->session->set_flashdata('success','Profile image updated');
            }
        }
       
    }
    
    public function userInfo()
    {
        $data = $this->input->post();
        $data2['name']= $data['name'];
        $data2['mobile_no']= $data['mobile_no'];
        $data2['email']= $data['email'];
        unset($data['name']);
        unset($data['mobile_no']);
        unset($data['email']);
        // echo '<pre>';var_dump($data, $data2);exit;
        $data['modified'] = date('Y-m-d H:i:s');
        $data2['modified'] = date('Y-m-d H:i:s');
        $status= $this->edit->updateInfoById('user_info',$data,'user_id',$this->session->user->id);
        $status= $this->edit->updateInfoById('users',$data2,'id',$this->session->user->id);
        if($status){
            $this->session->user->name=$data2['name'];
            $this->session->user->mobile_no=$data2['mobile_no'];
            $this->session->user->email=$data2['email'];
            $this->session->location_id=$data['location_id'];
            $l= $this->fetch->getInfoByColId('id',$data['location_id'],'locations_master');
            $this->session->location_name=$l->area;
            $this->session->set_flashdata('success','Profile updated');
            redirect('profile');
        }
        else{ 
            $this->session->set_flashdata('failed','Error');
            redirect('profile');
        }
       
    }


    




















}
