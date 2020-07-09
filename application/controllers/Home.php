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
		
		// $banners=$this->fetch->getInfo('bannerimages');
		// $feedbacks=$this->fetch->getInfo('feedbacks');
		// $patients=$this->fetch->getInfoType('patients','featured','1');
		// $treatments=$this->fetch->getInfo('services');
		// $web=$this->fetch->getWebProfile('webprofile');
		// $this->load->view('header',['title' => 'Home',
		// 							'banners'=>$banners,
		// 							'feedbacks'=>$feedbacks,
		// 							'treatments'=>$treatments,
		// 							'patients'=>$patients,
		// 							'web'=>$web
		// 						]
		// 					);
		$this->load->view('header');
		$this->load->view('index');
		$this->load->view('footer');
	}

	public function About()
	{
		$treatments=$this->fetch->getInfo('services');
		$web=$this->fetch->getWebProfile('webprofile');
		$this->load->view('headerSubpage',['title' => 'About Us',
									'treatments'=>$treatments,
									'web'=>$web
								]
							);
		$this->load->view('about');
		$this->load->view('getInTouch');
		$this->load->view('footer');
	}

	public function Albums()
	{
		$treatments=$this->fetch->getInfo('services');
		$gallery=$this->fetch->getInfo('gallery');
		$album=$this->fetch->getAlbum();
		$web=$this->fetch->getWebProfile('webprofile');
		$this->load->view('headerSubpage',['title' => 'Gallery albums',
									'treatments'=>$treatments,
									'gallery'=>$gallery,
									'album'=>$album,
									'web'=>$web
								]
							);
		$this->load->view('gallery');
		$this->load->view('getInTouch');
		$this->load->view('footer');
	}

	public function Album($albm)
	{
		$albm=urldecode($albm);
		$treatments=$this->fetch->getInfo('services');
		$gallery=$this->fetch->getInfoType('gallery','album',$albm);
		$web=$this->fetch->getWebProfile('webprofile');
		$this->load->view('headerSubpage',['title' => 'Gallery albums',
									'treatments'=>$treatments,
									'gallery'=>$gallery,
									'web'=>$web
								]
							);
		$this->load->view('galleryInner');
		$this->load->view('getInTouch');
		$this->load->view('footer');
	}

	public function Cases($filter=null)
	{
		$treatments=$this->fetch->getInfo('services');
		$patients=$this->fetch->getInfo('patients');
		if($filter){
			$arr[]=$filter;
		}
		else{
			foreach($patients as $p){
				$arr[]=$p->services_id;
			}
		}
		$web=$this->fetch->getWebProfile('webprofile');
		$this->load->view('headerSubpage',['title' => 'Cases',
									'treatments'=>$treatments,
									'patients'=>$patients,
									'arr'=>$arr,
									'web'=>$web
								]
							);
		$this->load->view('cases');
		$this->load->view('getInTouch');
		$this->load->view('footer');
	}

	public function Case($id)
	{
		$treatments=$this->fetch->getInfo('services');
		$patient=$this->fetch->getPatientsById($id);
		$web=$this->fetch->getWebProfile('webprofile');
		$this->load->view('headerSubpage',['title' => 'Case',
									'treatments'=>$treatments,
									'p'=>$patient,
									'web'=>$web
								]
							);
		$this->load->view('fullCase');
		$this->load->view('getInTouch');
		$this->load->view('footer');
	}

	public function Team()
	{
		$treatments=$this->fetch->getInfo('services');
		$web=$this->fetch->getWebProfile('webprofile');
		$this->load->view('headerSubpage',['title' => 'Our Team',
									'treatments'=>$treatments,
									'web'=>$web
								]
							);
		$this->load->view('team');
		$this->load->view('getInTouch');
		$this->load->view('footer');
	}

	public function Contact()
	{
		$treatments=$this->fetch->getInfo('services');
		$web=$this->fetch->getWebProfile('webprofile');
		$this->load->view('headerSubpage',['title' => 'Contact us',
									'treatments'=>$treatments,
									'web'=>$web
								]
							);
		$this->load->view('contact');
		$this->load->view('getInTouch');
		$this->load->view('footer');
	}

	public function Treatment($id)
	{
		$treatments=$this->fetch->getInfo('services');
		$s=$this->fetch->getInfoById($id,'services');
		$web=$this->fetch->getWebProfile('webprofile');
		$this->load->view('headerSubpage',['title' => 'Case',
									'treatments'=>$treatments,
									's'=>$s,
									'web'=>$web
								]
							);
		$this->load->view('servicesmain');
		$this->load->view('getInTouch');
		$this->load->view('footer');
	}


	public function Booking()
	{
		$this->form_validation->set_rules('phone', 'Contact no.', 'required|max_length[10]|min_length[10]');
		$this->form_validation->set_rules('name', 'Name', 'required|max_length[30]');
		$this->form_validation->set_rules('date', 'Date', 'required');
		$this->form_validation->set_rules('time', 'Time', 'required');
		if($this->form_validation->run() == true){
			$data=$this->input->post();
			$data['date']=date('Y-m-d',strtotime($this->input->post('date')));
			$data['enq_date']=date('Y-m-d');
			$status= $this->save->saveInfo($data,'bookings');
			$guest_email=$this->input->post('email');
			$name=$this->input->post('name');
			$phone=$this->input->post('phone');
			$date=$this->input->post('date');
			$time=$this->input->post('time');
			$message=$this->input->post('message');
			$mail_arr = $this->fetch->getWebProfile();
			$landing_mail = $mail_arr->email;
			$to=$landing_mail;
			$msg ="You have an appointment request from- \n\r Name:".$name."\n\r Contact no. :".$phone."\n\r E-mail:".$guest_email."\n\r Appointment date :".$date."\n\r Appointment time :".$time."\n\r Mesage:".$message;
			$subject = "New appointment - Nakoda dental clinic";
			$headers = "From:" . $guest_email;
			if(mail($to, $subject, $msg, $headers)){
				$this->session->set_flashdata('success','Request for appointment received ! We will contact you soon.' );
				redirect('Home');
			}
			else{
				$this->session->set_flashdata('success','Enquiry received !');
				redirect('Home');
			}
		}
		else{
			$this->session->set_flashdata('failed',strip_tags(trim(validation_errors())));
			redirect('Home');
		}
	}

	public function Callback()
	{
		$this->form_validation->set_rules('phone', 'Contact no.', 'required|max_length[10]|min_length[10]');
		$this->form_validation->set_rules('name', 'Name', 'required|max_length[30]');
		if($this->form_validation->run() == true){
			$data=$this->input->post();
			$data['enq_date']=date('Y-m-d');
			$status= $this->save->saveInfo($data,'enquiries');
			$guest_email=$this->input->post('email');
			$name=$this->input->post('name');
			$phone=$this->input->post('phone');
			$mail_arr = $this->fetch->getWebProfile();
			$landing_mail = $mail_arr->email;
			$to=$landing_mail;
			$msg ="You have a callback request from- \n\r Name:".$name."\n\r Contact no. :".$phone."\n\r E-mail:".$guest_email;
			$subject = "New request for callback - Nakoda dental clinic";
			$headers = "From:" . $guest_email;
			if(mail($to, $subject, $msg, $headers)){
				$this->session->set_flashdata('success','Request received ! We will contact you soon.' );
				redirect('Home');
			}
			else{
				$this->session->set_flashdata('success','Enquiry received !');
				redirect('Home');
			}
		}
		else{
			$this->session->set_flashdata('failed',strip_tags(trim(validation_errors())));
			redirect('Home');
		}
	}


}
?>
