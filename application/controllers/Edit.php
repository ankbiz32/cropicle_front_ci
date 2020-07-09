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

    public function Banner_image($id)
    {
        $path="";
        if($_FILES['img']['name']!=null){
            $path ='assets/images';
            $initialize = array(
                "upload_path" => $path,
                "allowed_types" => "jpg|jpeg|png|bmp|webp",
                "remove_spaces" => TRUE,
                "max_size" => 1100
            );
            $this->load->library('upload', $initialize);
            if (!$this->upload->do_upload('img')) {
                $this->session->set_flashdata('failed',trim(strip_tags($this->upload->display_errors())) );
                redirect('Admin/Banner_images');
            }
            else {
                $imgdata = $this->upload->data();
                $data['img_src'] = $imgdata['file_name'];
                $r= $this->fetch->getInfoById($id,'bannerimages');
                $path= 'assets/images/'.$r->img_src;
                $status= $this->edit->updateInfo($data, $id, 'bannerimages');
                if($status==true){
                    if ($path!=""){
                        unlink($path);
                    }
                    $this->session->set_flashdata('success','Banner changed !' );
                    redirect('Admin/Banner_images');
                }
                else{
                    $this->session->set_flashdata('failed','Error !');
                    redirect('Admin/Banner_images');
                }
            } 
        }
        else{
            $this->session->set_flashdata('failed','No image selected !');
            redirect('Admin/Banner_images');
        } 
    }

    public function Cases($id)
    {
            $data=$this->fetch->getInfo('services');
            $pat=$this->fetch->getPatientsById($id);
            $this->load->view('admin/adminheader',['title'=>'Edit Patient case', 'data'=>$data , 'd'=>$pat, 'submit'=>base_url('Edit/updateCase/'.$id)]); 
            $this->load->view('admin/adminaside'); 
            $this->load->view('admin/caseform'); 
            $this->load->view('admin/adminfooter');  
    }

    public function updateCase($id)
    {
        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('descr', 'Brief', 'required');
        $this->form_validation->set_rules('longDescr', 'Details', 'required');
        $this->form_validation->set_rules('services_id', 'Treatment', 'required');
        if($this->form_validation->run() == true){
            $data=$this->input->post();
            if(!isset($data['featured'])){
                $data['featured']='0';
            }
            // echo'<pre>';var_dump($this->input->post());var_dump($_FILES);exit;
            $path ='assets/images';
            $unlink_obj= $this->fetch->getInfoByIdType('pid',$id,'patients');
            $unlink="";
            $unlink2="";
            $initialize = array(
                "upload_path" => $path,
                "allowed_types" => "jpg|jpeg|png|bmp|webp",
                "remove_spaces" => TRUE,
                "max_size" => 1100
            );
            if($_FILES['preimg']['name']!=null){
                $this->load->library('upload', $initialize);
                if (!$this->upload->do_upload('preimg')) {
                    $this->session->set_flashdata('failed',trim(strip_tags($this->upload->display_errors())) );
                    redirect('Admin/Cases');
                }
                else {
                    $imgdata = $this->upload->data();
                    $imagename = $imgdata['file_name'];
                    $data['beforeimgsrc']=$imagename;
                    $unlink= 'assets/images/'.$unlink_obj->beforeimgsrc;
                }
            }
            if($_FILES['postimg']['name']!=null){
                $this->load->library('upload', $initialize);
                if (!$this->upload->do_upload('postimg')) {
                    $this->session->set_flashdata('failed',trim(strip_tags($this->upload->display_errors())) );
                    redirect('Admin/Cases');
                }
                else {
                    $imgdata = $this->upload->data();
                    $imagename = $imgdata['file_name'];
                    $data['afterimgsrc']=$imagename;
                    $unlink2= 'assets/images/'.$unlink_obj->afterimgsrc;
                }
            }
            $status= $this->edit->updateInfoType($data,'pid',$id,'patients');
            if($status==true){
                if($unlink!=""){
                    unlink($unlink);
                }
                if($unlink2!=""){
                    unlink($unlink2);
                }
                $this->session->set_flashdata('success','Case updated !' );
                redirect('Admin/Cases');
            }
            else{
                $this->session->set_flashdata('failed','Error !');
                redirect('Admin/Cases');
            }
        }
        else{
            $err=trim(strip_tags(validation_errors()));
            $this->session->set_flashdata('failed',$err);
            redirect('Admin/Cases');
        }   
    }

    public function Album()
    {
        $data=$this->input->post();
        $id=$data['oldalbum'];
        unset($data['oldalbum']);
        $status= $this->edit->updateInfoType($data,'album', $id, 'gallery');
        if($status){
            $this->session->set_flashdata('success','Album name changed !');
            redirect('Admin/Album');
        }
        else{
            $this->session->set_flashdata('failed','Error !');
            redirect('Admin/Album');
        }
    }

    public function Photo($id)
    {
        $data=$this->input->post();
        $album=$data['album'];
        unset($data['album']);
        if($_FILES['img']['name']!=null){
            $path ='assets/images';
            $initialize = array(
                "upload_path" => $path,
                "allowed_types" => "jpg|jpeg|png|bmp|webp",
                "remove_spaces" => TRUE,
                "max_size" => 1020
            );
            $this->load->library('upload', $initialize);
            if (!$this->upload->do_upload('img')) {
                $this->session->set_flashdata('failed',trim(strip_tags($this->upload->display_errors())) );
                redirect('Admin/Albumname/'.$album);
            } 
            else {
                $imgdata = $this->upload->data();
                $data['galleryimgsrc'] = $imgdata['file_name'];
                $p= $this->fetch->getInfoById($id,'gallery');
                $path= 'assets/images/'.$p->galleryimgsrc;
            }
        }

        $status= $this->edit->updateInfo($data, $id, 'gallery');
        if($status){
            unlink($path);
            $this->session->set_flashdata('success','Photo Updated !');
            redirect('Admin/Albumname/'.$album);
        }
        else{
            $this->session->set_flashdata('failed','Error !');
            redirect('Admin/Albumname/'.$album);
        }
    }

    public function Header_images($name){
        if($_FILES['img']['name']!=null){
            $path ='assets/images/';
            $initialize = array(
                "upload_path" => $path,
                "allowed_types" => "jpg|jpeg|png|bmp|webp",
                "remove_spaces" => TRUE,
                "max_size" => 500,
                "overwrite" => true,
                'file_name' => $name.'.jpg'
            );
            $this->load->library('upload', $initialize);
            if (!$this->upload->do_upload('img')) {
                $this->session->set_flashdata('failed',trim(strip_tags($this->upload->display_errors())) );
                redirect('Admin/Header_images');
            } 
            else {
                $this->session->set_flashdata('success',"Image updated" );
                redirect('Admin/Header_images');
            }
        }
        else{
            $this->session->set_flashdata('failed','No file selected' );
            redirect('Admin/Header_images');
        }
    }


    public function Feedback($id)
    {
        $data=$this->input->post();
        $status= $this->edit->updateInfo($data, $id, 'feedbacks');
        if($status){
            $this->session->set_flashdata('success','Feedback Updated !');
            redirect('Admin/Feedbacks');
        }
        else{
            $this->session->set_flashdata('failed','Error !');
            redirect('Admin/Feedbacks');
        }
    }

    public function webProfile()
    {
        $data=$this->input->post();
        $status= $this->edit->updateWebProfile($data);

        if($status){
            $this->session->set_flashdata('success','Web Profile Updated !');
            redirect('Admin/webProfile');
        }
        else{
            $this->session->set_flashdata('failed','Error !');
            redirect('Admin/webProfile');
        }
    }

    public function Career($id)
    {
        $data=$this->input->post();
        // echo '<pre>'; var_dump($data); exit;
        $status= $this->edit->updateCareer($data, $id, 'careers');
        
        if($status==true){
            $this->session->set_flashdata('success','Career Updated !');
            redirect('Admin/Careers');
        }
        else{
            $this->session->set_flashdata('failed','Error !');
            redirect('Admin/Careers');
        }
    }

    public function enqStatus($id)
    {
        $status= $this->edit->updateEnqStatus($id);
        if($status){
            redirect('Admin');
        }
        else{
            redirect('Admin');
        }
    }

    public function cbStatus($id)
    {
        $status= $this->edit->updateCbStatus($id);
        if($status){
            redirect('Admin');
        }
        else{
            redirect('Admin');
        }
    }

    public function adminProfile($id)
    {
        $data=$this->input->post();
        $status= $this->edit->updateAdminProfile($data,$id);
        $user=$this->fetch->getAdminProfile();
        $this->session->set_userdata(['user' =>  $user]);

        if($status){
            $this->session->set_flashdata('success','Admin Panel Profile Updated !');
            redirect('Admin/adminProfile');
        }
        else{
            $this->session->set_flashdata('failed','Error !');
            redirect('Admin/adminProfile');
        }
    }
    




















}
