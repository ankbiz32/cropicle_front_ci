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

	public function Cart()
	{	
		$this->redirectIfNotLoggedIn();
		$loc=$this->fetch->getActiveInfo('locations_master');
		$this->load->view('header',['title' => 'Demand Cart',
									'loc'=>$loc
								]
							);
		$this->load->view('cart');
		$this->load->view('footer');
		$this->load->view('cart_scripts');
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

	public function userDemands()
	{
		$this->redirectIfNotLoggedIn();
		$demands=$this->fetch->getInfoParams('customer_demands',array('user_id'=>$this->session->user->id));
		$loc=$this->fetch->getActiveInfo('locations_master');
		$this->load->view('header',['title' => 'Your demands',
									'loc'=>$loc,
									'demands'=>$demands
								]
							);
		$this->load->view('demands');
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


	public function saveDemand()
	{	
		$this->redirectIfNotLoggedIn();
		$items=$this->session->cart;
		$amt=0;
		foreach($items as $i){
			$amt+=$i['quantity']*$i['price'];
		}
		$data=['user_id'=>$this->session->user->id,
				'demand_amount'=>$amt,
				'customer_remarks'=>$this->input->post('cust_remarks'),
				'status'=>'PENDING'
			];
		// echo 'in save <pre>';var_dump($data,$items,$this->input->post());exit;
		
		$this->db->trans_start();
			$did= $this->save->saveInfo('customer_demands',$data);
			if($did){
				foreach($items as $i){
					$data2=['customer_demand_id'=>$did,
							'item_id'=>$i['product_id'],
							'item_price_customer'=>$i['price'],
							'item_quantity'=>$i['quantity']
						];
					$flag=$this->save->saveInfo('customer_demand_details',$data2);
				}
			}
		$this->db->trans_complete();
		if($this->db->trans_status() === FALSE)
		{
			$this->session->set_flashdata('failed','some error occured');
			redirect('Home');
		}
		else{
			$this->session->set_flashdata('success','Demand list sent !');
			$this->session->unset_userdata('cart');
			redirect('Home');
		}
	}

	public function demandDetails()
	{
		$demand=$this->fetch->demandDetailsById($this->input->post('id'));
		$info=$this->fetch->getInfoById($this->input->post('id'),'customer_demands');
		// echo'<pre>';var_dump($demand,$info);exit;
		$response='
			<div class="row mx-0">
				<p class="text-dark col-sm-5 pl-1"> Demand id. : <strong>'.$this->input->post('id').'</strong></p>
				<p class="text-dark col-sm-7 text-sm-right pl-0 pl-sm-1">Demand date : '.date('d-M-Y',strtotime($info->created)).'</p>
			</div>
			<div class="row mx-0">
				<p class="ml-1 text-dark">Status : <strong class="text-dark">'.$info->status.'</strong></p>
			</div>
			<div class="row mx-0 pb-0 mb-0">
				<p class="ml-1 text-dark">No. of items : '.sizeof($demand).'</p>
			</div>
			<hr class="my-0">
				<div class="row">
					<div class="col-12 p-0 my-2 d-flex bg-light py-2">
						<div class="col-3"><strong>Item</strong></div>
						<div class="col-4"><strong>Price</strong></div>
						<div class="col-2"><strong>Quantity</strong></div>
						<div class="col-3"><strong>Total</strong></div>
					</div>';
		foreach($demand as $i){
			$response.='
						<div class="col-12 p-0 my-2 d-flex">
							<div class="col-3">'.$i->item_name.' -</div>
							<div class="col-4">₹'.$i->item_price_customer.'/Kg</div>
							<div class="col-2">'.$i->item_quantity.' Kg</div>
							<div class="col-3">₹'.$i->item_price_customer*$i->item_quantity.'</div>
						</div>';
		}	
		$response.='
				</div>
				<div class="row mt-2 mx-0">
					<mark class="col py-1">Amount: ₹'.$info->demand_amount.'/-</mark> 
				</div>
				<div class="row mt-3 px-0 mx-0">
					<div class="col py-1">Your remarks: '.$info->customer_remarks.'</div>
				</div>
				<div class="modal-footer px-0">
					<button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
				</div>';
		echo $response;
	}

}
?>
