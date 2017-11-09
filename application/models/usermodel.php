<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//error_reporting(0);
class Usermodel extends CI_Model{
					
				
						
		//================================Add School Details================================================================
		
		public function addCustomers($postdata){
		/*echo '<pre>';
		print_r($postdata);
		echo '</pre>';
						exit;*/
						
						
					
						$data=array(
							'name'=>$postdata['username'],
							'mobile'=>$postdata['mobile'],
							'email'=>$postdata['emailid'],
							'home_address'=>$postdata['homeaddress'],
							'office_address'=>$postdata['officeaddress'],
							'peer_address'=>$postdata['peeraddress'],
							'otp'=>rand(111111,999999));											
							
							$insert=$this->db->insert('customers',$data);
							
							if($insert){
								 return $this->db->insert_id();
								//return true;
							}else{
								return false;
							}
							
						
						}
		
		//****************************End Add Schools Details****************************************************************
		
		
				//================================Update School Details================================================================
		
		public function updateCustomers($postdata,$uid){
					/*echo '<pre>';
					print_r($postdata);
					echo '</pre>';*/
					//exit;
						
					$data=array(
							'name'=>$postdata['username'],
							'mobile'=>$postdata['mobile'],
							'email'=>$postdata['emailid'],
							'home_address'=>$postdata['homeaddress'],
							'office_address'=>$postdata['officeaddress'],
							'peer_address'=>$postdata['peeraddress']);
							//'otp'=>rand(111111,999999)				
							$this->db->where('uid',$uid);
							$updateschool=$this->db->update('customers',$data);
							
							if($updateschool){
								return true;
							}else{
								return false;
							}
							
						
						}
		
		//****************************End Update Schools Details****************************************************************

		
		
		
		
			//================================Delete School ================================================================
					
						public function deleteUser($uid)
						{
							$this->db->where('uid',$uid);
							$query=$this->db->delete('customers');
												/* echo '<pre>';
													print_r($this->db->queries);
													echo '</pre>';exit;*/
							if($query){
							return true;
							}else{
								return false;
							}
						}
			//****************************End Delete Schools ****************************************************************			
				
		//================================View School Image================================================================			
						public function viewUsersList($uid='')
						{
							if(isset($uid) && !empty($uid)){
							$this->db->where('uid',$uid);
							}
							$query=$this->db->get('customers');
													/*echo '<pre>';
													print_r($this->db->queries);
													echo '</pre>';*/
							if($query->num_rows>0){
							
							return $query->result();
							}else{
								return false;
							}
						}
	//****************************End View Schools image****************************************************************	
	
	
	
	
	
	
	
							
	//================================Delete School Image ================================================================
					
						public function deleteSchoolImageList($sid)
						{
							$this->db->where('mimg_id',$sid);
							$query=$this->db->delete('image');
												/* echo '<pre>';
													print_r($this->db->queries);
													echo '</pre>';exit;*/
							if($query){
							return true;
							}else{
								return false;
							}
						}
			//****************************End Delete Schools Image ****************************************************************	
			
			
			//================================Delete School Image ================================================================
					
						public function deleteSchoolImageListAjax($imgid,$sid)
						{
							$this->db->where('mimg_id',$imgid);
							$this->db->where('master_id',$sid);
							$query=$this->db->delete('image');
												/* echo '<pre>';
													print_r($this->db->queries);
													echo '</pre>';exit;*/
							if($query){
							return true;
							}else{
								return false;
							}
						}
			//****************************End Delete Schools Image ****************************************************************	
			
			
								
									
				
//*******End	
}
?>