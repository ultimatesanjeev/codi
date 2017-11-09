<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(0);
class Masters extends CI_Controller {

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
				 $this->load->model('mastersmodel');
				 
				
   		 }

	
	function img_upload($image_name,$temp_name,$url){
	$image_name=explode(".",$image_name);
	 $tot=count($image_name);
	/* print_r($image_name);
	  print_r($temp_name);
	   print_r($url);*/
	 // $img_name=time().".".$image_name[$tot-1];
	 $img_name=str_replace(' ','-',$image_name[$tot-2])."-".time().".".$image_name[$tot-1];
	 $target = $url."/".basename($img_name) ; 
		
	if(move_uploaded_file($temp_name,$target)){
		return $img_name;
	}
 }
	
//========================================== Start of manage Color Book Cat section =============================================	
	
	public function addcolorbookcat()
	{	
		$user=$this->session->userdata('username');$loggedin=$this->session->userdata('is_logged_in');
			if (isset($user) && !empty($user) && isset($loggedin) && !empty($loggedin)){
			
			if (isset($_POST) && !empty($_POST))
			{			
				$this->form_validation->set_rules('cat_name','Cat Name','required');
				//$this->form_validation->set_rules('border_color','Border color','required');
				$this->form_validation->set_rules('sort_order','Sort order','required');
					
					if ($this->form_validation->run() == FALSE)
					{ 
					 $this->load->view('admin/includes/top_header');
					 $this->load->view('admin/master_colorbook_cat');		 
					 $this->load->view('admin/includes/footer');	
					}
					 else{
			
					if(!empty($_FILES['cat_img']['name'])){
								 $path = UPCOLORBOOKCAT;
								 $image_name = $_FILES['cat_img']['name'];
								 $temp_name = $_FILES['cat_img']['tmp_name'];
								 $imgresult=$this->img_upload($image_name,$temp_name,$path);
					}
			
			
			
					 $addrecord=$this->mastersmodel->addColorBookCategory($this->input->post(),$imgresult);
						  if($addrecord){
							  
								  $this->session->set_flashdata('add_data','Color Book Cat added successfully...');
								
								}else{
								
								$this->session->set_flashdata('not_add_data','Color Book Cat not added!...');
								}
								redirect('admin/masters/addcolorbookcat/');
							  
							  
								//$this->session->set_flashdata('school_add',TRUE);
								/*$data['add_data']='Color Book Cat added successfully...';
								}else{
								//$this->session->set_flashdata('school_not_add',FALSE);
								$data['add_data']='Color Book Cat not added!...';
								}*/
								
								
					  	
					}
					 
				
				}else{
					 $this->load->view('admin/includes/top_header');
					 $this->load->view('admin/master_colorbook_cat');		 
					 $this->load->view('admin/includes/footer');	
				}
	
				}else{
				redirect('admin/welcome/login');
				}
		
		
	}

	public function viewcolorbookcat()
	{	
		$user=$this->session->userdata('username');$loggedin=$this->session->userdata('is_logged_in');
			if (isset($user) && !empty($user) && isset($loggedin) && !empty($loggedin)){
			
				$data['record']=$this->mastersmodel->viewColorBookCategory();
			/*echo '<pre>';
			print_r($schoollist);
			echo '</pre>';*/
					 $this->load->view('admin/includes/top_header');
					 $this->load->view('admin/master_colorbook_cat_list',$data);		 
					 $this->load->view('admin/includes/footer');	
				
				}else{
				redirect('admin/welcome/login');
				}
		
		
	}
	
	public function editcolorbookcat($id)
	{	
		$user=$this->session->userdata('username');$loggedin=$this->session->userdata('is_logged_in');
			if (isset($user) && !empty($user) && isset($loggedin) && !empty($loggedin)){
				
				$data['record']=$this->mastersmodel->viewColorBookCategory($id);
				//print_r($data);
			if (isset($_POST) && !empty($_POST))
			{			
				$this->form_validation->set_rules('cat_name','Cat Name','required');
				//$this->form_validation->set_rules('border_color','Border color','required');
				$this->form_validation->set_rules('sort_order','Sort order','required');
					
					
					if ($this->form_validation->run() == FALSE)
					{ 
					 $this->load->view('admin/includes/top_header');
					 $this->load->view('admin/master_colorbook_cat',$data);		 
					 $this->load->view('admin/includes/footer');	
					}
					 else{
			
			
								$path = UPCOLORBOOKCAT;
									 $image_name = $_FILES['cat_img']['name'];
									 $temp_name = $_FILES['cat_img']['tmp_name'];
								
								
									if($image_name!=''){
										  $img_result=$this->img_upload($image_name,$temp_name,$path);
										
										  if($img_result!=''){
											  @unlink($path.$_POST['old_img']);
											}
											
										} else {
											$img_result='';
											$img_result=$_POST['old_img'];
										}
			
			
			
			
						 $updaterecord=$this->mastersmodel->updateColorBookCategory($this->input->post(),$id,$img_result);
						  if($updaterecord){
								//$this->session->set_flashdata('school_add',TRUE);
								$this->session->set_flashdata('update_data','Color Book Cat updated successfully...');
								//$data['update_data']='Color Book Cat updated successfully...';
								}else{
								//$this->session->set_flashdata('school_not_add',FALSE);
								//$data['update_data']='Color Book Cat not updated !...';
								$this->session->set_flashdata('not_update_data','Color Book Cat not updated !...');
								}
								redirect('admin/masters/editcolorbookcat/'.$id);	
					}
					 
				
				}else{
					 $this->load->view('admin/includes/top_header');
					 $this->load->view('admin/master_colorbook_cat',$data);		 
					 $this->load->view('admin/includes/footer');	
				}
	
				}else{
				redirect('admin/welcome/login');
				}
		
		
	}
	
	public function deletecolorbookcat($id)
	{	
		$user=$this->session->userdata('username');$loggedin=$this->session->userdata('is_logged_in');
			if (isset($user) && !empty($user) && isset($loggedin) && !empty($loggedin)){
			if (isset($id) && !empty($id))
			{
				
				$record=$this->mastersmodel->viewColorBookCategory($id);
				  @unlink(UPCOLORBOOKCAT.$record['0']->image);
			$dellist=$this->mastersmodel->deleteColorBookCategoryList($id);
			if (isset($dellist) && !empty($dellist))
			{
			$this->session->set_flashdata('del_data','Record deleted successfully...');
			redirect('admin/masters/viewcolorbookcat');
			}
			
			
			}else{
			$this->session->set_flashdata('del_data','Record not deleted !...');
			redirect('admin/masters/viewcolorbookcat');
			}
	
				}else{
				redirect('admin/welcome/login');
				}
		
		
	}
	
//========================================== End of manage Color Book Cat section =========================================
	
//========================================== Start of manage Color Book section =============================================	
	public function addcolorbook()
	{	
		$user=$this->session->userdata('username');$loggedin=$this->session->userdata('is_logged_in');
			if (isset($user) && !empty($user) && isset($loggedin) && !empty($loggedin)){
			$data['colorbool_cat_record']=$this->mastersmodel->viewColorBookCategory();
			if (isset($_POST) && !empty($_POST))
			{			
				$this->form_validation->set_rules('colorbook_cat','Color Book Cat','required');
				$this->form_validation->set_rules('cat_name','Cat Name','required');				
				$this->form_validation->set_rules('sort_order','Sort Number','required');
				$this->form_validation->set_rules('is_paid','Is Paid','required');
					
					if ($this->form_validation->run() == FALSE)
					{ 
					 $this->load->view('admin/includes/top_header');
					 $this->load->view('admin/master_colorbook',$data);		 
					 $this->load->view('admin/includes/footer');	
					}
					 else{
			
						 $inseted_id=$this->mastersmodel->addColorBook($this->input->post());
							
						  if($inseted_id>0){		
						 				  
							$sort=$this->input->post('sort_number');	
							$cb='';							
							for($cb=0;$cb<count($_FILES['cat_img']['name']);$cb++){								
						
								if(!empty($_FILES['cat_img']['name'][$cb])){						
								 $image_name[$cb] = $_FILES['cat_img']['name'][$cb];
								 $temp_name[$cb]= $_FILES['cat_img']['tmp_name'][$cb];
								 $imgresult[$cb]=$this->img_upload($image_name[$cb],$temp_name[$cb],UPCOLORBOOKIMG);
								 $addrecord=$this->mastersmodel->addColorBookImages($inseted_id,$imgresult[$cb],$sort[$cb]);
								}
							}	
								$this->session->set_flashdata('add_data','Color Book added successfully...');
								
								}else{
								
								$this->session->set_flashdata('not_add_data','Color Book not added!...');
								}
								redirect('admin/masters/addcolorbook/');
					}
					 
				
				}else{
					 $this->load->view('admin/includes/top_header');
					 $this->load->view('admin/master_colorbook',$data);		 
					 $this->load->view('admin/includes/footer');	
				}
	
				}else{
				redirect('admin/welcome/login');
				}
		
		
	}
	
	public function viewcolorbook()
	{	
		$user=$this->session->userdata('username');$loggedin=$this->session->userdata('is_logged_in');
			if (isset($user) && !empty($user) && isset($loggedin) && !empty($loggedin)){
			
				$data['record']=$this->mastersmodel->viewColorBook();
			/*echo '<pre>';
			print_r($schoollist);
			echo '</pre>';*/
					 $this->load->view('admin/includes/top_header');
					 $this->load->view('admin/master_colorbook_list',$data);		 
					 $this->load->view('admin/includes/footer');	
				
				}else{
				redirect('admin/welcome/login');
				}
		
		
	}
	
	public function editcolorbook($id)
	{	
		$user=$this->session->userdata('username');$loggedin=$this->session->userdata('is_logged_in');
			if (isset($user) && !empty($user) && isset($loggedin) && !empty($loggedin)){
				$data['colorbool_cat_record']=$this->mastersmodel->viewColorBookCategory();
				$data['record']=$this->mastersmodel->viewColorBook($id);
				//print_r($data);
			if (isset($_POST) && !empty($_POST))
			{			
				$this->form_validation->set_rules('colorbook_cat','Color Book Cat','required');
				$this->form_validation->set_rules('cat_name','Cat Name','required');				
				$this->form_validation->set_rules('sort_order','Sort Number','required');
				$this->form_validation->set_rules('is_paid','Is Paid','required');
					
					if ($this->form_validation->run() == FALSE)
					{ 
					 $this->load->view('admin/includes/top_header');
					 $this->load->view('admin/master_colorbook',$data);		 
					 $this->load->view('admin/includes/footer');	
					}
					 else{
			
						 $updaterecord_id=$this->mastersmodel->updateColorBook($this->input->post(),$id);
						  if($updaterecord_id){
							  
							  
							$sort=$this->input->post('sort_number');	
							$cb='';							
							for($cb=0;$cb<count($_FILES['cat_img']['name']);$cb++){								
						
								if(!empty($_FILES['cat_img']['name'][$cb])){						
								 $image_name[$cb] = $_FILES['cat_img']['name'][$cb];
								 $temp_name[$cb]= $_FILES['cat_img']['tmp_name'][$cb];
								 $imgresult[$cb]=$this->img_upload($image_name[$cb],$temp_name[$cb],UPCOLORBOOKIMG);
								 $addrecord=$this->mastersmodel->addColorBookImages($id,$imgresult[$cb],$sort[$cb]);
								}
							}	
							  
							  
							
							  
								//$this->session->set_flashdata('school_add',TRUE);
								$this->session->set_flashdata('update_data','Color Book updated successfully...');
								//$data['update_data']='Color Book Cat updated successfully...';
								}else{
								//$this->session->set_flashdata('school_not_add',FALSE);
								//$data['update_data']='Color Book Cat not updated !...';
								$this->session->set_flashdata('not_update_data','Color Book not updated !...');
								}
								redirect('admin/masters/editcolorbook/'.$id);	
					}
					 
				
				}else{
					 $this->load->view('admin/includes/top_header');
					 $this->load->view('admin/master_colorbook',$data);		 
					 $this->load->view('admin/includes/footer');	
				}
	
				}else{
				redirect('admin/welcome/login');
				}
		
		
	}
	
	public function deletecolorbook($id)
	{	
		$user=$this->session->userdata('username');$loggedin=$this->session->userdata('is_logged_in');
			if (isset($user) && !empty($user) && isset($loggedin) && !empty($loggedin)){
			if (isset($id) && !empty($id))
			{
				
			$colorbookimaes=$this->mastersmodel->viewColorBookImages($id);
			foreach($colorbookimaes as $colorbookimg){
			
			@unlink(UPCOLORBOOKIMG.$colorbookimg->image);
			$dellist=$this->mastersmodel->deleteColorBookImagesList($colorbookimg->cbiID);					
			}
			$dellist=$this->mastersmodel->deleteColorBookList($id);
			if (isset($dellist) && !empty($dellist))
			{
			$this->session->set_flashdata('del_data','Record deleted successfully...');
			redirect('admin/masters/viewcolorbook');
			}
			
			
			}else{
			$this->session->set_flashdata('del_data','Record not deleted !...');
			redirect('admin/masters/viewcolorbook');
			}
	
				}else{
				redirect('admin/welcome/login');
				}
		
		
	}
	
	
	
	public function deletecolorbookimages($id,$cbid)
	{	
		$user=$this->session->userdata('username');$loggedin=$this->session->userdata('is_logged_in');
			if (isset($user) && !empty($user) && isset($loggedin) && !empty($loggedin)){
			if (isset($id) && !empty($id))
			{
				
				$imglist=$this->mastersmodel->viewColorBookImagesById($id);
				 @unlink(UPCOLORBOOKIMG.$imglist['0']->image);
			$dellist=$this->mastersmodel->deleteColorBookImagesList($id);
			if (isset($dellist) && !empty($dellist))
			{
			$this->session->set_flashdata('del_data','Record deleted successfully...');
			redirect('admin/masters/editcolorbook/'.$cbid);
			}
			
			
			}else{
			$this->session->set_flashdata('del_data','Record not deleted !...');
			redirect('admin/masters/editcolorbook/'.$cbid);
			}
	
				}else{
				redirect('admin/welcome/login');
				}
	}
	
	
//========================================== End of manage Color Book  section =============================================


//========================================== Start of manage Color Book Images section ======================================	
	/*public function addcolorbookimages()
	{	
			$user=$this->session->userdata('username');$loggedin=$this->session->userdata('is_logged_in');
			if (isset($user) && !empty($user) && isset($loggedin) && !empty($loggedin)){
			$data['colorbook_record']=$this->mastersmodel->viewColorBook();
			
			if (isset($_POST) && !empty($_POST))
			{			
				$this->form_validation->set_rules('colorbook_cat','Color Book Cat','required');
				
					
					if ($this->form_validation->run() == FALSE)
					{ 
					 $this->load->view('admin/includes/top_header');
					 $this->load->view('admin/master_colorbook_images',$data);		 
					 $this->load->view('admin/includes/footer');	
					}else{
						
							$title=$this->input->post('image_title');	
							$sort=$this->input->post('sort_number');								
							for($a=0;$a<count($_FILES['cat_img']['name']);$a++){	
								if(!empty($_FILES['cat_img']['name'][$a])){						
								 $image_name[$a] = $_FILES['cat_img']['name'][$a];
								 $temp_name[$a]= $_FILES['cat_img']['tmp_name'][$a];
								 $imgresult[$a]=$this->img_upload($image_name[$a],$temp_name[$a],UPCOLORBOOKIMG);
								 $addrecord=$this->mastersmodel->addColorBookImages($this->input->post('colorbook_cat'),$imgresult[$a],$title[$a],$sort[$a]);
								}
							}	
						
		
					
						  if($addrecord){
							  
								  $this->session->set_flashdata('add_data','Color Book Images added successfully...');
								
								}else{
								
								$this->session->set_flashdata('not_add_data','Color Book Images not added!...');
								}
								redirect('admin/masters/addcolorbookimages/');
					}
					 
				
				}else{
					 $this->load->view('admin/includes/top_header');
					 $this->load->view('admin/master_colorbook_images',$data);		 
					 $this->load->view('admin/includes/footer');	
				}
	
				}else{
				redirect('admin/welcome/login');
				}
		}
	
	public function viewcolorbookimages()
	{	
		$user=$this->session->userdata('username');$loggedin=$this->session->userdata('is_logged_in');
			if (isset($user) && !empty($user) && isset($loggedin) && !empty($loggedin)){
			
				$data['record']=$this->mastersmodel->viewColorBook();
		
					 $this->load->view('admin/includes/top_header');
					 $this->load->view('admin/master_colorbook_list',$data);		 
					 $this->load->view('admin/includes/footer');	
				
				}else{
				redirect('admin/welcome/login');
				}
		
		
	}
	
	public function editcolorbookimages($id)
	{	
		$user=$this->session->userdata('username');$loggedin=$this->session->userdata('is_logged_in');
			if (isset($user) && !empty($user) && isset($loggedin) && !empty($loggedin)){
				$data['colorbool_cat_record']=$this->mastersmodel->viewColorBookCategory();
				$data['record']=$this->mastersmodel->viewColorBook($id);
				//print_r($data);
			if (isset($_POST) && !empty($_POST))
			{			
				$this->form_validation->set_rules('colorbook_cat','Color Book Cat','required');
				$this->form_validation->set_rules('cat_name','Cat Name','required');				
				$this->form_validation->set_rules('sort_order','Sort Number','required');
				$this->form_validation->set_rules('is_paid','Is Paid','required');
					
					if ($this->form_validation->run() == FALSE)
					{ 
					 $this->load->view('admin/includes/top_header');
					 $this->load->view('admin/master_colorbook',$data);		 
					 $this->load->view('admin/includes/footer');	
					}
					 else{
			
			
							
			
			
			
						 $updaterecord=$this->mastersmodel->updateColorBook($this->input->post(),$id);
						  if($updaterecord){
								//$this->session->set_flashdata('school_add',TRUE);
								$this->session->set_flashdata('update_data','Color Book updated successfully...');
								//$data['update_data']='Color Book Cat updated successfully...';
								}else{
								//$this->session->set_flashdata('school_not_add',FALSE);
								//$data['update_data']='Color Book Cat not updated !...';
								$this->session->set_flashdata('not_update_data','Color Book not updated !...');
								}
								redirect('admin/masters/editcolorbook/'.$id);	
					}
					 
				
				}else{
					 $this->load->view('admin/includes/top_header');
					 $this->load->view('admin/master_colorbook',$data);		 
					 $this->load->view('admin/includes/footer');	
				}
	
				}else{
				redirect('admin/welcome/login');
				}
		
		
	}
	
	public function deletecolorbookimages($id)
	{	
		$user=$this->session->userdata('username');$loggedin=$this->session->userdata('is_logged_in');
			if (isset($user) && !empty($user) && isset($loggedin) && !empty($loggedin)){
			if (isset($id) && !empty($id))
			{
			$dellist=$this->mastersmodel->deleteColorBookList($id);
			if (isset($dellist) && !empty($dellist))
			{
			$this->session->set_flashdata('del_data','Record deleted successfully...');
			redirect('admin/masters/viewcolorbook');
			}
			
			
			}else{
			$this->session->set_flashdata('del_data','Record not deleted !...');
			redirect('admin/masters/viewcolorbook');
			}
	
				}else{
				redirect('admin/welcome/login');
				}
		
		
	}*/
	
//========================================== End of manage Color Book Images section ========================================

// End Of Class	
}
/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */