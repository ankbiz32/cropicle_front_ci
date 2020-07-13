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
		$loc=$this->fetch->getActiveInfo('locations_master');
		$this->load->view('header',['title' => 'Home',
									'loc'=>$loc
								]
							);
		$this->load->view('index');
		$this->load->view('footer');
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
		$loc=$this->fetch->getActiveInfo('locations_master');
		$this->load->view('header',['title' => 'Home',
									'loc'=>$loc
								]
							);
		$this->load->view('profile');
		$this->load->view('footer');
	}

	public function fetchItems($id)
	{
		$prods=$this->fetch->fetchProds($id);
		$loc=$this->fetch->getActiveInfo('locations_master');
		$this->load->view('header',['title' => 'Home',
									'loc'=>$loc,
									'prods'=>$prods
								]
							);
		$this->load->view('index');
		$this->load->view('footer');
	}



}
?>
