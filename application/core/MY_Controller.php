<?php

class MY_Controller extends CI_Controller
{
    public function __construct(){
        parent::__construct();
    }

    public function loggedIn(){
        return isset($this->session->user->user_id) ? true : false;
    }

    public function redirectIfNotLoggedIn($uri = 'Login'){
        if(!$this->loggedIn()){
            redirect($uri);
        }
    }

    public function redirectIfLoggedIn($uri = 'Admin'){
        if($this->loggedIn()){
            redirect($uri);
        }
    }
    
    protected function getPaginitionConfig($uri, $total_count, $rows =10){
        // for creating paginition configuration
        $config['base_url'] = site_url().$uri;
        $config['total_rows'] = $total_count;
        $config['per_page'] = $rows;
        $config['full_tag_open'] = '<ul class="pagination pagination-sm no-margin pull-right">';
        $config['full_tag_close'] = '</ul>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"> <a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        return $config;
    }

}