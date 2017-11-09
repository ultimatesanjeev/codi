<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//error_reporting(0);
class Servicemodel extends CI_Model{
					
				
						/*echo '<pre>';
													print_r($this->db->queries);
													echo '</pre>';exit;*/
		//================================Add Services Details================================================================
		
				public function addServices($postdata,$imgres='')
				{
	
							if(isset($imgres) && !empty($imgres)){
							$img=$imgres;
							}else{
							$img='';
							}
							if(isset($postdata['servicemsg']) && !empty($postdata['servicemsg'])){
							$service_msg=$postdata['servicemsg'];
							}else{
							$service_msg='';
							}
							
						
							$this->db->where('service_name',$postdata['servicename']);
							$query=$this->db->get('services');	
							if($query->num_rows>0){
								return false;
							}else
							{
								$data=array(
									'service_name'=>$postdata['servicename'],
									'service_img'=>$img,
									'service_msg'=>$service_msg);
									
									$insert=$this->db->insert('services',$data);
									if($insert){									
									return $this->db->insert_id();
									}else{
										return false;
									}
							}
						}
		
		//****************************End Add Services Details****************************************************************
		
		
				//================================Update Services Details================================================================
		
		public function updateServices($postdata,$id,$img_result){
						if(isset($img_result) && !empty($img_result)){
							$img=$img_result;
							}else{
							$img='';
							}
						if(isset($postdata['servicemsg']) && !empty($postdata['servicemsg'])){
							 $service_msg=$postdata['servicemsg'];
							}else{
							$service_msg='';
							}
						$data=array(
									'service_name'=>$postdata['servicename'],
									'service_img'=>$img,
									'service_msg'=>$service_msg);
				
							$this->db->where('id',$id);
							$updatetelecaller=$this->db->update('services',$data);
													/*echo '<pre>';
													print_r($postdata);
													print_r($this->db->queries);
													echo '</pre>';*/
							
							if($updatetelecaller){
								return true;
							}else{
								return false;
							}
							
						
						}
		
		//****************************End Update Services Details****************************************************************

		
		
		
		
			//================================Delete Services ================================================================
					
						public function deleteServices($uid)
						{
							
							$this->db->where('id',$uid);
							$deleteservices=$this->db->delete('services');
							
												/* echo '<pre>';
													print_r($this->db->queries);
													echo '</pre>';exit;*/
							if($deleteservices){
							return true;
							}else{
								return false;
							}
						}
			//****************************End Delete Services ****************************************************************			
				
		//================================View Services ================================================================			
						public function viewServices($uid='')
						{
							if(isset($uid) && !empty($uid)){
							$this->db->where('id',$uid);
							}
							$query=$this->db->get('services');
													/*echo '<pre>';
													print_r($this->db->queries);
													echo '</pre>';*/
							if($query->num_rows>0){
							
							return $query->result();
							}else{
								return false;
							}
						}
	//****************************End View Services ****************************************************************	
	
	
	
	
	
	
	
							
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