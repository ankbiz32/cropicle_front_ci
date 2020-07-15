<?php

defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Login controller
 * @author Ankur Agrawal
 */
class Login extends MY_Controller {

    public function __construct(){
        parent::__construct();
        $this->load->model('Auth_model', 'auth');
        $this->load->model('GetModel', 'fetch');
    }

    public function index(){
        $this->redirectIfLoggedIn();
        redirect('Home');
    }

    public function authenticate(){
        // echo'<pre>';var_dump($this->input->post());exit;
        $this->redirectIfLoggedIn();
        $this->form_validation->set_rules('mob', 'Mobile no.', 'required|min_length[10]|max_length[10]|numeric');
        $this->form_validation->set_rules('pwd', 'Password', 'required');
        $response ['errors'] = '';
        if($this->form_validation->run() == FALSE){
            $this->session->set_flashdata('failed',trim(strip_tags(validation_errors() )));
            redirect('Home');
            // $response[ 'errors' ]= validation_errors() ;
        }
        else{
            if($user = $this->auth->authenticate($this->input->post()) ){
                $this->session->set_userdata(['user' =>  $user]);
                $this->session->set_flashdata('success','You are now logged in !');
                redirect('Home');
                // $this->redirectIfLoggedIn();
            }else{
                $this->session->set_flashdata('failed','Invalid Mobile no. or Password');
                redirect('Home');
                // $response['errors'] .= "Invalid Username or Password";
            }
        }
        
        // echo validation_errors();
        $this->load->view('admin/login',$response);
    }

    public function register(){
        $this->form_validation->set_rules('mobile_no', 'Mobile no.', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
        $this->form_validation->set_rules('name', 'Name', 'required');
        if($this->form_validation->run() == FALSE){
            return false;
        }
        else{
            $data=$this->input->post();
            $data['password']=password_hash($data['password'], PASSWORD_DEFAULT);
            $data['role_id']=3;
            $this->load->model('AddModel', 'add');
            if($id=$this->add->saveInfo('users',$data) ){
                $_SESSION["regID"] = $id;
                $_SESSION["vno"] = rand(1000,9999);
                echo $_SESSION["vno"];
                return true;
            }else{
                return false;
            }
        }
    }
    
    public function registerFinish(){
        $data['is_verified']=1;
        $data['otp_verified']=1;
        $data['modified']=date('Y-m-d H:i:s');
        $data['is_active']=1;
        $this->load->model('EditModel', 'edit');
        if($this->edit->updateInfo($data,$_SESSION["regID"],'users') ){
            $info=['user_id'=>$_SESSION["regID"],'profile_img'=>'user.png'];
            $this->load->model('AddModel', 'add');
            $id=$this->add->saveInfo('user_info',$info);

            unset($_SESSION["regID"]);
            unset($_SESSION["vno"]);
            $this->session->set_flashdata('success','You have successfully registered with Cropicle !');
            redirect('Home');
        }else{
            unset($_SESSION["regID"]);
            unset($_SESSION["vno"]);
            $this->session->set_flashdata('failed','Error !');
            redirect('Home');
        }
    }

    public function changePwd(){
        $this->form_validation->set_rules('oldp', 'Old Password', 'required|min_length[6]');
        $this->form_validation->set_rules('newp', 'New Password', 'required|min_length[6]');
        $this->form_validation->set_rules('cnfp', 'Confirm Password', 'required|min_length[6]');
        if($this->form_validation->run() == TRUE){
            $data=$this->input->post();
            $admProfile=$this->fetch->getAdminProfile();
            if($data['newp']==$data['cnfp']){
                if( password_verify($data['oldp'], $admProfile->pwd) ){
                    $hash['pwd'] = password_hash( $this->input->post('cnfp'), PASSWORD_DEFAULT );
                    $status=$this->auth->changeLoginPassword($hash, $admProfile->user_id);

                    if($status){
                        $this->session->set_flashdata('success','Password Updated !');
                        redirect('Admin/adminProfile');
                    }
                    else{
                        $this->session->set_flashdata('failed','Error !');
                        redirect('Admin/adminProfile');
                    }
                }
                else{
                    $this->session->set_flashdata('failed','Invalid old password !');
                    redirect('Admin/adminProfile');
                }
            }
            else{
                $this->session->set_flashdata('failed','New & confirm password should be same !');
                redirect('Admin/adminProfile');
            }

            
        }
        else{
            $admProfile=$this->fetch->getAdminProfile();
            $this->load->view( 'admin/adminheader', ['admProfile' => $admProfile, 'errors'=> validation_errors()] ); 
            $this->load->view('admin/adminaside'); 
            $this->load->view('admin/adminProfile'); 
            $this->load->view('admin/adminfooter');  
        }
    }

    public function logout(){
        $this->session->unset_userdata(['user']);
        $this->session->sess_destroy();
        $this->index();
    }


}

