<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//error_reporting(0);

class Welcome extends CI_Controller {
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	 
	 
	   public function __construct() {
        		parent::__construct();
				  $this->load->model('welcomemodel');
				  $this->load->model('requestmodel');
				  $this->load->model('jsonmodel');
				   $this->load->model('mastersmodel');
    }
	 
	 
	 
	public function forgetpassword()
	{	
	
			if (isset($_POST) && !empty($_POST))
			{
				$this->form_validation->set_rules('emailid','Email ID','required|valid_email');
					if ($this->form_validation->run() == FALSE)
					{
						 $this->load->view('admin/forget_password');	
					}
					 else{ 
						//$this->load->model('welcomemodel');
						$userDetails=$this->welcomemodel->checkUserExistance($this->input->post('emailid'));
						if($userDetails){
						$this->load->helper('email');
						$this->load->library('email');
						
						if (valid_email($this->input->post('emailid')))
						{
						$this->email->from('admin@test.com', 'Administrator');
						$this->email->to($this->input->post('emailid')); 
						$this->email->subject('Foget Password');
						$this->email->message('Your Password is...'.$userDetails);	
						$this->email->send();
						$this->email->print_debugger();
						//redirect('admin/welcome/login');
						$data['msg']='Password sent in your mail id !...';
						$this->load->view('admin/forget_password',$data);
						
						
						}
						}else{
						$data['msg']='This email ID is not exists !...';
						 $this->load->view('admin/forget_password',$data);	
						}
					}

				}else{
			 $this->load->view('admin/forget_password');	
			}	
	}
	
	
	public function login()
	{

			if (isset($_POST) && !empty($_POST))
			{
				$this->form_validation->set_rules('username','User Name','required');
				$this->form_validation->set_rules('password', 'Password', 'required');
		
					if ($this->form_validation->run() == FALSE)
					{
						 $this->load->view('admin/user_login');	
					}
					 else{
						//$this->load->model('welcomemodel');
						$lognDetails=$this->welcomemodel->viewLoginDetails($this->input->post('username'),sha1($this->input->post('password')));
						if($lognDetails){
						
						
						
					$data=array('username'=>$this->input->post('username'),'is_logged_in'=>true,$lognDetails[0]->id,'name'=>$lognDetails[0]->username,'uid'=>$lognDetails[0]->id,'login_type'=>$lognDetails[0]->login_type,'user_image'=>$lognDetails[0]->image);
						$this->session->set_userdata($data);
						//	$this->welcomemodel->addLoginDetails($data);
						redirect('admin/welcome/dashboard');
						
						}else{
						$data['msg']='The user id or password you entered is incorrect...';
						 $this->load->view('admin/user_login',$data);	
						}
					}

				}else{
			 $this->load->view('admin/user_login');	
			}	
	}
	
	public function logout()
	{
						$array_items = array('username' => '', 'is_logged_in' => '','name'=>'','uid'=>'','login_type'=>'');
						$this->session->unset_userdata($array_items);
						redirect('admin/welcome/login');
	}
					
//==================================================END USER CHECKING and FOGET Password==========================================================================	
	
	
	
	
	
	
	
	
	
	
		public function dashboard()
		{	
				$user=$this->session->userdata('username');$loggedin=$this->session->userdata('is_logged_in');
				if (isset($user) && !empty($user) && isset($loggedin) && !empty($loggedin)){
				
				
				
				 $this->load->view('admin/includes/top_header');
				 $this->load->view('admin/dashboard');		
				 $this->load->view('admin/includes/footer');
				 
				 
				 	
				}else{
					redirect('admin/welcome/login');
				}
		
	}
	
	public function changepassword()
	{	
	
	
			$user=$this->session->userdata('username');$loggedin=$this->session->userdata('is_logged_in');
			$uid=$this->session->userdata('login_id');
				if (isset($user) && !empty($user) && isset($loggedin) && !empty($loggedin)){
	
			if (isset($_POST) && !empty($_POST))
			{
				$this->form_validation->set_rules('old_password','old password','required');
				$this->form_validation->set_rules('new_password','new password','required');
				
				
					if ($this->form_validation->run() == FALSE)
					{
						
						 $this->load->view('admin/includes/top_header');
						 $this->load->view('admin/change_password',$data);		 
						 $this->load->view('admin/includes/footer');	
					}
					 else{ 
						
								$changepassword=$this->welcomemodel->changePassword($this->input->post(),$this->session->userdata('uid'));
								if($changepassword){
								$this->session->set_flashdata('change_data','Password Changed successfully...');
								
								}else{
									$this->session->set_flashdata('not_change_data','Password Not Changed!');
									}
								redirect('admin/welcome/changepassword/');	
						
						
						}
						
					}else{
						
						
							 $this->load->view('admin/includes/top_header');
							 $this->load->view('admin/change_password',$data);		 
							 $this->load->view('admin/includes/footer');
						}
						
						
				}else{
					redirect('admin/welcome/login');
					
					}

				
	}	
	
	
	
//###############end of Class#####################	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */