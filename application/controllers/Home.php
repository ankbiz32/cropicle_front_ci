<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {
	function __construct(){
		parent:: __construct();
		$this->load->model('GetModel','fetch');
		$this->load->model('AddModel','save');
	}

	public function index()
	{	
		if(isset($this->session->location_id)){
			$this->fetchItems($this->session->location_id);
		}
		else{
			$loc=$this->fetch->getActiveInfo('locations_master');
			$this->load->view('header',['title' => 'Home',
										'loc'=>$loc
									]
								);
			$this->load->view('index');
			$this->load->view('footer');
			$this->load->view('cart_scripts');
		}
	}

	public function About()
	{
		$loc=$this->fetch->getActiveInfo('locations_master');
		$this->load->view('header',['title' => 'Home',
									'loc'=>$loc
								]
							);
		$this->load->view('about');
		$this->load->view('footer');
	}

	public function Contact()
	{
		$loc=$this->fetch->getActiveInfo('locations_master');
		$this->load->view('header',['title' => 'Home',
									'loc'=>$loc
								]
							);
		$this->load->view('contact');
		$this->load->view('footer');
	}

	public function Profile()
	{
		$this->redirectIfNotLoggedIn();
		$profile=$this->fetch->getInfoByColId('user_id',$this->session->user->id, 'user_info');
		$loc=$this->fetch->getActiveInfo('locations_master');
		$this->load->view('header',['title' => 'Home',
									'loc'=>$loc,
									'profile'=>$profile
								]
							);
		$this->load->view('profile');
		$this->load->view('footer');
	}

	public function fetchItems($id)
	{
		$this->session->set_userdata(['location_id' =>  $id]);
		$res=$this->fetch->fetchProds($id);
		$location=$this->fetch->getInfoById($id,'locations_master')->area;
		$this->session->set_userdata(['location_name' =>  $location]);
		// echo'<pre>';var_dump($res['items']);exit;
		if($res){
			$loc=$this->fetch->getActiveInfo('locations_master');
			$this->load->view('header',['title' => 'Home',
										'loc'=>$loc,
										'prods'=>$res['items'],
										'location'=>$location,
										'hawker_count'=>$res['hawker_count']
									]
								);
			$this->load->view('index.php');
			$this->load->view('footer');
			$this->load->view('cart_scripts');
		}else{
			$loc=$this->fetch->getActiveInfo('locations_master');
			$this->load->view('header',['title' => 'Home',
										'loc'=>$loc,
										'location'=>$location
									]
								);
			$this->load->view('index.php');
			$this->load->view('footer');
		}
	}

}
?>
