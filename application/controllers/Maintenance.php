<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Maintenance extends MY_Controller {
	function __construct(){
		parent:: __construct();
	}

	public function index()
	{
		$this->load->view('coming_soon');
	}

}
?>
