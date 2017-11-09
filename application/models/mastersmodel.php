<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mastersmodel extends CI_Model{
					
					
						
		//================================Add colorbook cat================================================================
		
					public function addColorBookCategory($postdata,$imgres)
					{
						
							$data=array('catName'=>$this->input->post('cat_name',FALSE),
							'image'=>$imgres,							
							'sortOrder'=>$this->input->post('sort_order',FALSE));							
														
							$insert=$this->db->insert('master_colorbook_cat',$data);
							if($insert){
								 return $this->db->insert_id();
								//return true;
							}else{
								return false;
							}
						}
		
		//****************************End Add colorbook cat****************************************************************
					
			//================================View School Type================================================================
					
						public function viewColorBookCategory($id='')
						{
						
							if(isset($id) && !empty($id)){
								$this->db->where('mccID',$id);
							}
							$query=$this->db->get('master_colorbook_cat');
													/* echo '<pre>';
													print_r($this->db->queries);
													echo '</pre>';*/
							if($query->num_rows>0){
							
							return $query->result();
							}else{
								return false;
							}
						}
			//****************************End View colorbook cat****************************************************************		
			
			
			//================================Delete colorbook cat================================================================
					
						public function deleteColorBookCategoryList($id)
						{
							$this->db->where('mccID',$id);
							$query=$this->db->delete('master_colorbook_cat');
							/* echo '<pre>';
													print_r($this->db->queries);
													echo '</pre>';exit;*/
							if($query){
							return true;
							}else{
								return false;
							}
						}
			//****************************End Delete colorbook cat****************************************************************		
					
					
	//================================Update colorbook cat================================================================
		
						public function updateColorBookCategory($postdata,$id,$imgres)
						{
							$data=array('catName'=>$this->input->post('cat_name',FALSE),
							'image'=>$imgres,							
							'sortOrder'=>$this->input->post('sort_order',FALSE));
							$this->db->where('mccID',$id);
							$update=$this->db->update('master_colorbook_cat',$data); 			
							if($update){
								// return $this->db->insert_id();
								return true;
							}else{
								return false;
							}
							
						
						}
		
		//****************************End Upadate colorbook cat****************************************************************						
					
					
					
//============================ Add Color Book ==========================

						public function addColorBook($postdata)
						{
						
							$data=array(
							'mccID'=>$this->input->post('colorbook_cat',FALSE),
							'name'=>$this->input->post('cat_name',FALSE),							
							'sortNumber'=>$this->input->post('sort_order',FALSE),
							'isPaid'=>$this->input->post('is_paid',FALSE));														
							$insert=$this->db->insert('color_book',$data);
							if($insert){
								$insid=$this->db->insert_id();
								 return $insid;
								//return true;
							}else{
								return false;
							}
						}
		
		
						public function viewColorBook($id='')
						{
						
							if(isset($id) && !empty($id)){
								$this->db->where('cbID',$id);
							}
							$query=$this->db->get('color_book');
													/* echo '<pre>';
													print_r($this->db->queries);
													echo '</pre>';*/
							if($query->num_rows>0){
							
							return $query->result();
							}else{
								return false;
							}
						}
		



						public function viewColorBookCatName($id)
						{
						
							if(isset($id) && !empty($id)){
								$this->db->where('mccID',$id);
							}
							$query=$this->db->get('master_colorbook_cat');
													/* echo '<pre>';
													print_r($this->db->queries);
													echo '</pre>';*/
							if($query->num_rows>0){
							$res=$query->result();
							return $res[0]->catName;
							}else{
								return false;
							}
						}



						public function deleteColorBookList($id)
						{
							$this->db->where('cbID',$id);
							$query=$this->db->delete('color_book');
							/* echo '<pre>';
													print_r($this->db->queries);
													echo '</pre>';exit;*/
							if($query){
							return true;
							}else{
								return false;
							}
						}




						public function updateColorBook($postdata,$id)
						{
							$data=array(
							'mccID'=>$this->input->post('colorbook_cat',FALSE),
							'name'=>$this->input->post('cat_name',FALSE),							
							'sortNumber'=>$this->input->post('sort_order',FALSE),
							'isPaid'=>$this->input->post('is_paid',FALSE));	
							$this->db->where('cbID',$id);
							$update=$this->db->update('color_book',$data); 			
							if($update){
								// return $this->db->insert_id();
								return true;
							}else{
								return false;
							}
							
						
						}
		

//=========================== End of add Color Book ====================					
					
					
					
	//============================ Add Color Book Images==========================
	
					public function addColorBookImages($cbid,$image,$sortnumber)
					{
							$data=array(
							'cbID'=>$cbid,
							'image'=>$image,												
							'sortNumber'=>$sortnumber);
																					
							$insert=$this->db->insert('colorbook_images',$data);
							if($insert){
								 return $this->db->insert_id();
								//return true;
							}else{
								return false;
							}
						}
						
					public function viewColorBookImages($id)
					{
						
							if(isset($id) && !empty($id)){
								$this->db->where('cbID',$id);
							}
							$query=$this->db->get('colorbook_images');
													/* echo '<pre>';
													print_r($this->db->queries);
													echo '</pre>';*/
							if($query->num_rows>0){							
							return $query->result();
							}else{
								return false;
							}
						}	
						
					public function viewColorBookImagesById($cbiid)
					{
							$this->db->where('cbiID',$cbiid);							
							$query=$this->db->get('colorbook_images');
													/* echo '<pre>';
													print_r($this->db->queries);
													echo '</pre>';*/
							if($query->num_rows>0){							
							return $query->result();
							}else{
								return false;
							}
						}
					
					
						public function deleteColorBookImagesList($id)
						{
							$this->db->where('cbiID',$id);
							$query=$this->db->delete('colorbook_images');
							/* echo '<pre>';
													print_r($this->db->queries);
													echo '</pre>';exit;*/
							if($query){
							return true;
							}else{
								return false;
							}
						}
					
	//=========================== End of add Color Book Images====================			
					
					
					
					
					
	//==================================================================
	
	
	
	
						public function viewTotalUser()
						{
							$query=$this->db->get('users');
							if($query->num_rows>0){
							return $query->num_rows();
							}else{
								return false;
							}
						}				
					
						public function viewTotalColorBook()
						{
							$query=$this->db->get('color_book');
							if($query->num_rows>0){
							return $query->num_rows();
							}else{
								return false;
							}
						}
					
						public function viewTotalColorBookCat()
						{
							$query=$this->db->get('master_colorbook_cat');
							if($query->num_rows>0){
							return $query->num_rows();
							}else{
								return false;
							}
						}
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					
					

					
				
//*******End	
}
?>