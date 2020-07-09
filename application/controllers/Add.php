<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Add extends MY_Controller {

        function __construct(){
                parent:: __construct();
                $this->redirectIfNotLoggedIn();
                $this->load->model('AddModel','save');
                $this->load->model('GetModel','fetch');
        }

        public function Banner_image()
        {
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
                    $imagename = $imgdata['file_name'];
                    $data['img_src']=$imagename;
                    $status= $this->save->saveInfo($data, 'bannerimages');
                    if($status==true){
                        $this->session->set_flashdata('success','New banner added !' );
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

        public function Feedback()
        {
            $this->form_validation->set_rules('dialogue', 'Feedback', 'required');
            $this->form_validation->set_rules('name', 'Name', 'required');
            $this->form_validation->set_rules('designation', 'Designation', 'required');
            if($this->form_validation->run() == true){
                $data=$this->input->post();
                $status= $this->save->saveInfo($data, 'feedbacks');
                if($status==true){
                    $this->session->set_flashdata('success','New Feedback added !' );
                    redirect('Admin/Feedbacks');
                }
                else{
                    $this->session->set_flashdata('failed','Error !');
                    redirect('Admin/Feedbacks');
                }
            }
            else{
                $err=trim(strip_tags(validation_errors()));
                $this->session->set_flashdata('failed',$err);
                redirect('Admin/Feedbacks');
            } 
        }

        public function Cases()
        {
                $data=$this->fetch->getInfo('services');
                $this->load->view('admin/adminheader',['title'=>'Add Patient case', 'data'=>$data , 'submit'=>base_url('Add/saveCase')]); 
                $this->load->view('admin/adminaside'); 
                $this->load->view('admin/caseform'); 
                $this->load->view('admin/adminfooter');  
        }

        public function saveCase()
        {
            $this->form_validation->set_rules('title', 'Title', 'required');
            $this->form_validation->set_rules('descr', 'Brief', 'required');
            $this->form_validation->set_rules('longDescr', 'Details', 'required');
            $this->form_validation->set_rules('services_id', 'Treatment', 'required');
            if($this->form_validation->run() == true){
                $data=$this->input->post();
                // echo'<pre>';var_dump($this->input->post());var_dump($_FILES);exit;
                $path ='assets/images';
                $initialize = array(
                    "upload_path" => $path,
                    "allowed_types" => "jpg|jpeg|png|bmp|webp",
                    "remove_spaces" => TRUE,
                    "max_size" => 1100
                );
                if($_FILES['preimg']['name']==null || $_FILES['postimg']['name']==null){
                    $this->session->set_flashdata('failed','Image not selected !');
                    redirect('Admin/Cases');
                }
                else{
                    $this->load->library('upload', $initialize);
                    if (!$this->upload->do_upload('preimg')) {
                        $this->session->set_flashdata('failed',trim(strip_tags($this->upload->display_errors())) );
                        redirect('Admin/Cases');
                    }
                    else {
                        $imgdata = $this->upload->data();
                        $imagename = $imgdata['file_name'];
                        $data['beforeimgsrc']=$imagename;
                    }

                    $this->load->library('upload', $initialize);
                    if (!$this->upload->do_upload('postimg')) {
                        $this->session->set_flashdata('failed',trim(strip_tags($this->upload->display_errors())) );
                        redirect('Admin/Cases');
                    }
                    else {
                        $imgdata = $this->upload->data();
                        $imagename = $imgdata['file_name'];
                        $data['afterimgsrc']=$imagename;
                    }
                }
                  
                $status= $this->save->saveInfo($data, 'patients');
                if($status==true){
                    $this->session->set_flashdata('success','New Case added !' );
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
            $this->form_validation->set_rules('album', 'Album name', 'required');
            if($this->form_validation->run() == true){
                $data=$this->input->post();
                // echo'<pre>';var_dump($this->input->post());var_dump($_FILES);exit;
                $path ='assets/images';
                $initialize = array(
                    "upload_path" => $path,
                    "allowed_types" => "jpg|jpeg|png|bmp|webp",
                    "remove_spaces" => TRUE,
                    "max_size" => 1100
                );
                if($_FILES['img']['name']!=null){
                    $this->load->library('upload', $initialize);
                    if (!$this->upload->do_upload('img')) {
                        $this->session->set_flashdata('failed',trim(strip_tags($this->upload->display_errors())) );
                        redirect('Admin/Album');
                    }
                    else {
                        $imgdata = $this->upload->data();
                        $imagename = $imgdata['file_name'];
                        $data['galleryimgsrc']=$imagename;
                  
                        $status= $this->save->saveInfo($data, 'gallery');
                        if($status==true){
                            $this->session->set_flashdata('success','New Album added !' );
                            redirect('Admin/Album');
                        }
                        else{
                            $this->session->set_flashdata('failed','Error !');
                            redirect('Admin/Album');
                        }
                    }
                }
                else{
                    $this->session->set_flashdata('failed','Image not selected !');
                    redirect('Admin/Album');
                }
            }
            else{
                $err=trim(strip_tags(validation_errors()));
                $this->session->set_flashdata('failed',$err);
                redirect('Admin/Album');
            }   
        }


        public function Photo()
        {
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
                    redirect('Admin/Albumname/'.$data['album']);
                }
                else {
                    $imgdata = $this->upload->data();
                    $imagename = $imgdata['file_name'];
                    $data= $this->input->post();
                    $data['galleryimgsrc']=$imagename;
                    $status= $this->save->saveInfo($data, 'gallery');
                    if($status==true){
                        $this->session->set_flashdata('success','New photo added !' );
                        redirect('Admin/Albumname/'.$data['album']);
                    }
                    else{
                        $this->session->set_flashdata('failed','Error !');
                        redirect('Admin/Albumname/'.$data['album']);
                    }
                } 
            }
            else{
                $this->session->set_flashdata('failed','No image selected !');
                redirect('Admin/Albumname/'.$data['album']);
            } 
        }

        function generate_url_slug($string,$table,$field='url_slug',$key=NULL,$value=NULL){
            $t =& get_instance();
            $slug = url_title($string);
            $slug = strtolower($slug);
            $i = 0;
            $params = array ();
            $params[$field] = $slug;
            if($key)$params["$key !="] = $value; 
            while ($t->db->where($params)->get($table)->num_rows())
            {
                if (!preg_match ('/-{1}[0-9]+$/', $slug )){
                    $slug .= '-' . ++$i;
                }
                else{
                    $slug = preg_replace ('/[0-9]+$/', ++$i, $slug );
                }
                $params [$field] = $slug;
            }
                return $slug;
        }
        
        public function Career()
        {
            $status= $this->save->saveInfo($this->input->post(), 'careers');
            if($status==true){
                $this->session->set_flashdata('success','New Career added !' );
                redirect('Admin/Careers');
            }
            else{
                $this->session->set_flashdata('failed','Error !');
                redirect('Admin/Careers');
            }
        }


}
