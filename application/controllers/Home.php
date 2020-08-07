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
		$redirect=base_url();

		include_once "application/libraries/vendor/autoload.php";

		$google_client = new Google_Client();

		$google_client->setClientId(G_AUTH_ID);
		$google_client->setClientSecret(G_AUTH_KEY);
		$google_client->setRedirectUri($redirect);

		$google_client->addScope('email');
		$google_client->addScope('profile');

		if(isset($_GET["code"]))
		{
			$token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);

			if(!isset($token["error"]))
			{
				
				$this->load->model('Auth_model','auth');

				$google_client->setAccessToken($token['access_token']);

				$this->session->set_userdata('access_token', $token['access_token']);

				$google_service = new Google_Service_Oauth2($google_client);

				$data = $google_service->userinfo->get();

				$current_datetime = date('Y-m-d H:i:s');

				$check=array(
					'login_oauth_uid' => $data['id'],
					'role_id' => 3
				);
				$registered=$this->auth->Is_already_register($check);
				if($registered){

					if(!isset($this->session->location_id)){
						$loc_arr=$this->fetch->getInfoByColId('user_id',$this->session->user->id,'user_info');
						$this->session->set_userdata(['location_id' =>  $loc_arr->location_id]);
						
						$loc_info_arr=$this->fetch->getInfoByColId('id',$this->session->location_id,'locations_master');
						$this->session->set_userdata(['location_name' =>  $loc_info_arr->area]);
					}

					$this->session->set_userdata('user', $registered);
					$this->session->set_flashdata('success','You are now logged in !');
					
					if(isset($this->session->cart)){
						redirect('cart');
					}
				}
				else{
					//insert data
					$user_data = array(
						'login_oauth_uid' => $data['id'],
						'name' => $data['name'],
						'email'  => $data['email'],
						'role_id'  => 3,
						'is_active'  => 1,
						'created'  => $current_datetime
					);
					$new_id=$this->auth->Insert_user_data($user_data);
					if($new_id){
						$user_data2 = array(
							'user_id' => $new_id,
							'profile_img' => 'user.png'
						);
						$id=$this->save->saveInfo('user_info',$user_data2);
					}

					
					if(!isset($this->session->location_id)){
						$loc_arr=$this->fetch->getInfoByColId('user_id',$this->session->user->id,'user_info');
						$this->session->set_userdata(['location_id' =>  $loc_arr->location_id]);
						
						$loc_info_arr=$this->fetch->getInfoByColId('id',$this->session->location_id,'locations_master');
						$this->session->set_userdata(['location_name' =>  $loc_info_arr->area]);
					}

					$data=$this->fetch->getInfoByColId('login_oauth_uid',$data['id'],'users');
					$this->session->set_userdata('user', $data);
					$this->session->set_flashdata('success','You are now logged in !');
				}
			}
		}

		if($this->session->flashdata('success')){
			$this->session->set_flashdata('success',$this->session->flashdata('success'));
		}
		if($this->session->flashdata('failed')){
			$this->session->set_flashdata('failed',$this->session->flashdata('failed'));
		}

		redirect('home');
	}

	public function afterGoogleLogin()
	{

		if(isset($this->session->location_id)){
			$this->fetchItems($this->session->location_id);
		}
		else{
			
			if(!$this->session->userdata('user')){
				$auth_url=$this->getOAutLoginhUrl();
			}
			else{
				$auth_url="#";
			}

			$loc=$this->fetch->getActiveInfo('locations_master');
			$this->load->view('header',['title' => $this->session->location_id.'Home',
										'auth_url'=>$auth_url,
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
		$profile="";
		if(!$this->session->userdata('user')){
			$auth_url=$this->getOAutLoginhUrl();
		}
		else{
			$auth_url="#";
			$profile=$this->fetch->getInfoByColId('user_id',$this->session->user->id, 'user_info');
		}
		if(isset($this->session->location_id)){
			$location=$this->fetch->getInfoById($this->session->location_id,'locations_master');
			if(!empty($location)){
				$location=$location->area;
			}
			else{
				$location='Select area';
			}
		}
		else{
			$location='Select area';
		}
		$loc=$this->fetch->getActiveInfo('locations_master');
		$this->load->view('header',['title' => 'Demand Cart',
									'loc'=>$loc,
									'profile'=>$profile,
									'location'=>$location,
									'auth_url'=>$auth_url
								]
							);
		$this->load->view('cart');
		$this->load->view('footer');
		$this->load->view('cart_scripts');
		$this->load->view('demand_scripts');
	}

	public function About()
	{
		if(!$this->session->userdata('user')){
			$auth_url=$this->getOAutLoginhUrl();
		}
		else{
			$auth_url="#";
		}
		$loc=$this->fetch->getActiveInfo('locations_master');
		$this->load->view('header',['title' => 'Home',
									'auth_url'=>$auth_url,
									'loc'=>$loc
								]
							);
		$this->load->view('about');
		$this->load->view('footer');
	}

	public function Gallery()
	{
		if(!$this->session->userdata('user')){
			$auth_url=$this->getOAutLoginhUrl();
		}
		else{
			$auth_url="#";
		}
		$loc=$this->fetch->getActiveInfo('locations_master');
		$this->load->view('header',['title' => 'Home',
									'auth_url'=>$auth_url,
									'loc'=>$loc
								]
							);
		$this->load->view('gallery');
		$this->load->view('footer');
	}

	public function Contact()
	{
		if(!$this->session->userdata('access_token')){
			$auth_url=$this->getOAutLoginhUrl();
		}
		else{
			$auth_url="#";
		}
		$loc=$this->fetch->getActiveInfo('locations_master');
		$this->load->view('header',['title' => 'Home',
									'auth_url'=>$auth_url,
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

		if(!$this->session->userdata('user')){
			$auth_url=$this->getOAutLoginhUrl();
		}
		else{
			$auth_url="#";
		}

		$location=$this->fetch->getInfoById($id,'locations_master');
		if(!empty($location)){
			$location=$location->area;
		}
		else{
			$location='Select area';
		}
		$this->session->set_userdata(['location_id' =>  $id]);
		$this->session->set_userdata(['location_name' =>  $location]);
		$res=$this->fetch->getInfoParams('items_master',['is_active'=>1]);
		$hawker_count=$this->fetch->hawkerCount($id);
		// echo'<pre>';var_dump($res['items']);exit;
		if($res){
			$loc=$this->fetch->getActiveInfo('locations_master');
			$this->load->view('header',['title' => 'Home',
										'loc'=>$loc,
										'auth_url'=>$auth_url,
										'location'=>$location,
										'prods'=>$res,
										'hawker_count'=>$hawker_count
									]
								);
			$this->load->view('index.php');
			$this->load->view('footer');
			$this->load->view('cart_scripts');
		}else{
			$loc=$this->fetch->getActiveInfo('locations_master');
			$this->load->view('header',['title' => 'Home',
										'loc'=>$loc,
										'auth_url'=>$auth_url,
										'location'=>$location
									]
								);
			$this->load->view('index.php');
			$this->load->view('footer');
		}
	}

	public function fetchItems_old($id)
	{

		if(!$this->session->userdata('user')){
			$auth_url=$this->getOAutLoginhUrl();
		}
		else{
			$auth_url="#";
		}

		$this->session->set_userdata(['location_id' =>  $id]);
		$res=$this->fetch->fetchProds($id);
		$location=$this->fetch->getInfoById($id,'locations_master');
		if(!empty($location)){
			$location=$location->area;
		}
		else{
			$location='Select area';
		}
		$this->session->set_userdata(['location_name' =>  $location]);
		// echo'<pre>';var_dump($res['items']);exit;
		if($res){
			$loc=$this->fetch->getActiveInfo('locations_master');
			$this->load->view('header',['title' => 'Home',
										'loc'=>$loc,
										'auth_url'=>$auth_url,
										'location'=>$location,
										'prods'=>$res['items'],
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
										'auth_url'=>$auth_url,
										'location'=>$location
									]
								);
			$this->load->view('index.php');
			$this->load->view('footer');
		}
	}

	public function getOAutLoginhUrl(){
			$redirect=base_url();
	
			include_once "application/libraries/vendor/autoload.php";
	
			$google_client = new Google_Client();
	
			$google_client->setClientId(G_AUTH_ID);
			$google_client->setClientSecret(G_AUTH_KEY);
			$google_client->setRedirectUri($redirect);
	
			$google_client->addScope('email');
			$google_client->addScope('profile');
			$url = $google_client->createAuthUrl();
			return $url;
	}


	public function saveDemand()
	{	
		$this->redirectIfNotLoggedIn();
		$items=$this->session->cart;
		$amt=0;
		foreach($items as $i){
			$amt+=$i['quantity']*$i['price'];
		}
		$info=[
				'email'=>$this->input->post('email'),
				'mobile_no'=>$this->input->post('mobile_no')
			];
		$data=['user_id'=>$this->session->user->id,
				'demand_amount'=>$amt,
				'location_id'=>$this->input->post('location_id'),
				'address'=>$this->input->post('address'),
				'customer_remarks'=>$this->input->post('cust_remarks'),
				'status'=>'PENDING'
			];
		// echo 'in save <pre>';var_dump($data,$items,$this->input->post());exit;
		
		$this->db->trans_start();
		
			$this->load->model('EditModel','edit');
			$uid= $this->edit->updateInfo($info,$this->session->user->id,'users');

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
