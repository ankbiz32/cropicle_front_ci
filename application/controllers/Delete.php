<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Delete extends MY_Controller {

    function __construct(){
            parent:: __construct();
            $this->redirectIfNotLoggedIn();
            $this->load->model('GetModel','fetch');
            $this->load->model('DeleteModel','delete');
    }
    
    public function Banner_image($id)
    {
        $res= $this->fetch->getInfoById($id,"bannerimages");
        $path= 'assets/images/'.$res->img_src;
        $status= $this->delete->deleteInfo($id, 'bannerimages');

        if($status==true){
            unlink($path);
            $this->session->set_flashdata('success','Banner deleted!');
            redirect('Admin/Banner_images');
        }
        else{
            $this->session->set_flashdata('failed','Error!');
            redirect('Admin/Banner_images');
        }
    }

    public function Cases($id)
    {
        $res= $this->fetch->getInfoByIdType('pid',$id,"patients");
        $path= 'assets/images/'.$res->beforeimgsrc;
        $path2= 'assets/images/'.$res->afterimgsrc;
        $status= $this->delete->deleteInfoType('pid',$id, 'patients');

        if($status==true){
            unlink($path);
            unlink($path2);
            $this->session->set_flashdata('success','Case deleted!');
            redirect('Admin/Cases');
        }
        else{
            $this->session->set_flashdata('failed','Error!');
            redirect('Admin/Cases');
        }
    }

    public function Album($id)
    {
        $id=urldecode($id);
        $res= $this->fetch->getInfoType('gallery','album',$id);
        foreach($res as $r){
            unlink('assets/images/'.$r->galleryimgsrc);
        }
        $status= $this->delete->deleteInfoType('album',$id, 'gallery');
        if($status==true){
            $this->session->set_flashdata('success','Album deleted!');
            redirect('Admin/Album');
        }
        else{
            $this->session->set_flashdata('failed','Error!');
            redirect('Admin/Album');
        }
    }

    public function Feedback($id)
    {
        $status= $this->delete->deleteInfo($id, 'feedbacks');
        if($status){
            $this->session->set_flashdata('success','Feedback deleted!');
            redirect('Admin/Feedbacks');
        }
        else{
            $this->session->set_flashdata('failed','Error!');
            redirect('Admin/Feedbacks');
        }
    }
    
    public function Photo($id)
    {
        $res= $this->fetch->getInfoById($id,"gallery");
        $path= 'assets/images/'.$res->galleryimgsrc;
        $count=$this->fetch->record_count('gallery','album',$res->album);
        // echo'<pre>';var_dump($res,$count);exit;
        if($count>1){
            $redir='Admin/Albumname/'.$res->album;
        }
        else{
            $redir='Admin/Album';
        }
        $status= $this->delete->deleteInfo($id, 'gallery');
        if($status==true){
            unlink($path);
            $this->session->set_flashdata('success', 'Photo deleted!');
            redirect($redir);
        }
        else{
            $this->session->set_flashdata('failed','Error!');
            redirect($redir);
        }
    }

    public function Career($id)
    {
        $status= $this->delete->deleteCareer($id, 'careers');

        if($status==true){
            $this->session->set_flashdata('success','Career Deleted!');
            redirect('Admin/Careers');
        }
        else{
            $this->session->set_flashdata('failed','Error!');
            redirect('Admin/Careers');
        }
    }



}
