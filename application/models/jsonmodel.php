<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Jsonmodel extends CI_Model{
					 
				 
						public function checkToken($imei,$token,$type)
						{
							$this->db->where('token',$token);
							$query=$this->db->get('user_token');
							if($query->num_rows>0){							
							$data=array('imei'=>$imei,'type'=>$type); 
							$this->db->where('token',$token);
							$updatetoken=$this->db->update('user_token',$data);
							if($updatetoken){
									return true;
									}else{
									return false;
									}
							}else{
							$data=array('imei'=>$imei,'type'=>$type,'token'=>$token);							
							$updatetoken=$this->db->insert('user_token',$data);
								if($updatetoken){
									return true;
									}else{
									return false;
									}
							
								}
						}
						
						public function allColorBookCat()
						{
							$this->db->order_by('sortOrder','asc');
							$query=$this->db->get('master_colorbook_cat');
							/*echo '<pre>';
							print_r($this->db->queries);
							echo '</pre>';*/
							if($query->num_rows>0){
								return $query->result();
							}else{
								return false;
							}
						}		 
						
						public function allColorBook($catid)
						{
							$this->db->where('mccID',$catid);
							$this->db->order_by('sortNumber','asc');
							$query=$this->db->get('color_book');
							if($query->num_rows>0){
								return $query->result();
							}else{
								return false;
							}
						}	
						
						
						public function viewColorBookImages($id)
						{		
							$this->db->select('colorbook_images.*');
							$this->db->from('colorbook_images');
							//$this->db->join('color_book','color_book.cbID = colorbook_images.cbID','left');
							$this->db->where('colorbook_images.cbID',$id);	
							$this->db->order_by('colorbook_images.sortNumber','asc');	
												
							$query=$this->db->get();

							if($query->num_rows>0){							
							return $query->result();
							}else{
								return false;
							}
						}	
						
						
						
						public function checkShare($uid,$cbiid,$image)
						{
							/*$this->db->where('uID',$uid);
							$this->db->where('cbiID',$cbiid);							
							$query=$this->db->get('share');
							if($query->num_rows>0){				
								return false;
							}else{*/
							$data=array('uID'=>$uid,'cbiID'=>$cbiid,'image'=>$image); 
							$updatetoken=$this->db->insert('share',$data);
							$insert_id = $this->db->insert_id();
							if($updatetoken){
									return $insert_id;
									}
							
							//}
						}
						
						public function checkLike($uid,$sid)
						{
							$this->db->where('uID',$uid);
							$this->db->where('sID',$sid);							
							$query=$this->db->get('likes');
							if($query->num_rows>0){				
								//return false;
								$this->db->where('uID',$uid);
								$this->db->where('sID',$sid);
								$query=$this->db->delete('likes');
								return 'unlike';
								
							}else{
							$data=array('uID'=>$uid,'sID'=>$sid); 
							$updatetoken=$this->db->insert('likes',$data);
							$insert_id = $this->db->insert_id();
							if($updatetoken){
									return $insert_id;
									}else{
									return false;
									}
							
								}
						}
							
						public function checkComments($uid,$sid,$comment)
						{
							/*$this->db->where('uiID',$uid);
							$this->db->where('sID',$sid);
							$query=$this->db->get('comments');
							if($query->num_rows>0){				
								return false;
							}else{*/
							$data=array('uiID'=>$uid,'sID'=>$sid,'comment'=>$comment); 
							$updatetoken=$this->db->insert('comments',$data);
							$insert_id = $this->db->insert_id();
							if($updatetoken){
									return $insert_id;
									}else{
									return false;
									}
							
								//}
						}
						
						
						public function getComments($sid)
						{//uiID
							$this->db->select('comments.*,users.*');
							$this->db->from('comments');
							$this->db->join('users','users.fID = comments.uiID');
							$this->db->where('comments.sID',$sid);
							$query=$this->db->get();
							if($query->num_rows>0){			
									return $query->result();
								}else{
									return false;
									}
						}
						
						
						public function getUserData_old_17_1_2017($uid,$pagenum,$limit='10')
						{  //,count(likes.uID) as totallikes,count(comments.uiID) as totalcomments
						$this->db->select('users.iD,users.userName,users.images as userimg,share.sID as sid,share.image as simage,count(likes.uID) as totallikes');
						$this->db->from('users');
						$this->db->join('likes','likes.uID = users.fID','left');
						$this->db->join('share','share.uID = users.fID','left');
						//$this->db->join('comments','comments.uiID = users.iD','left');
						//$this->db->where('comments.uiID',$uid);
						if($uid>0){
						$this->db->where('users.fID',$uid);
						}/*else{
						$this->db->or_where('users.fID','0');	
						}*/
						//$this->db->order_by('comments.dateTime','desc');
						$this->db->limit($limit,$pagenum);
						
						$query=$this->db->get();
						
							echo '<pre>';
							print_r($this->db->queries);
							echo '</pre>'; // exit; 
	
							if($query->num_rows>0){			
									return $query->result();
								}else{
									return false;
									}
						}
						
				
				
						public function checkLikeByUserId($uid,$sid)
						{
							$this->db->where('uID',$uid);
							$this->db->where('sID',$sid);							
							$query=$this->db->get('likes');
							/*echo '<pre>';
							print_r($this->db->queries);
							echo '</pre>';*/ 
							if($query->num_rows>0){				
								return '1';
							}else{
								return '0';
								}
						}	
						
		public function getUserData($uid='',$pagenum,$limit='10')
		{  //,count(likes.uID) as totallikes,count(comments.uiID) as totalcomments  ....users.iD,users.userName,users.images as userimg,...,count(comments.sID) as totalcomments
			$this->db->select('users.fID as uid,users.userName,users.images as userimg,share.uID,share.sID as sid,share.image as simage,count(likes.sID) as totallikes,count(comments.sID) as totalcomments');
						$this->db->from('share');
						$this->db->join('likes','likes.sID = share.sID','left');
						$this->db->join('users','users.fID = share.uID','left');						
						$this->db->join('comments','comments.sID = share.sID','left');					
						
						if($uid>0){
							$this->db->where('share.uID',$uid);
						}
						/*else{
						$this->db->or_where('users.fID','0');	
						}*/
						//$this->db->order_by('comments.dateTime','desc');
						$this->db->group_by('share.sID');
						
						$this->db->limit($limit,$pagenum);
						
						$query=$this->db->get();
						
							/*echo '<pre>';
							print_r($this->db->queries);
							echo '</pre>'; */
							// exit; 
	
	
								
	
							if($query->num_rows>0){	
							//	
								$res=$query->result();
								//$data=array();
								$resultArray= array();
								foreach($res as $allres){
										///$allcomments=$this->getCommentsByUserId($allres->sid);
									/*if(isset($allcomments) && !empty($allcomments) && $allcomments[0]->totalcomments!= '0'){										
										$commentdata=$allcomments;	
									}else{
										$commentdata=array();
										}*/
										
									$liked=$this->checkLikeByUserId($allres->uid,$allres->sid);
									
									$resultArray[]= array('uid'=>$allres->uid,
														'userName'=>$allres->userName,
														'userimg'=>$allres->userimg,
														'sid'=>$allres->sid,
														'liked'=>$liked,
														'simage'=>$allres->simage,
														'totallikes'=>$allres->totallikes,
														'totalcomments'=>$allres->totalcomments);
														
									/*$data['uid'][]=$allres->uid;
									$data['userName'][]=$allres->userName;
									$data['userimg'][]=$allres->userimg;
									$data['sid'][]=$allres->sid;
									$data['simage'][]=$allres->simage;
									$data['totallikes'][]=$allres->totallikes;*/				
									
									
								/*	
									foreach($allcomments as $comments){
										
										$data['totalcomments'][]=$comments->totalcomments;
										$data['lastCommentsiD'][]=$comments->iD;
										$data['lastCommentsID'][]=$comments->sID;
										$data['lastCommentuiID'][]=$comments->uiID;
										$data['lastComment'][]=$comments->comment;
										$data['lastCommentUserName'][]=$comments->userName;
										$data['lastCommentUserImages'][]=$comments->images;
									}*/
									
									
									
							
								}
							
							/*echo '<pre>';
							//print_r($res);
							//print_r($comments);
							print_r($resultArray);
							echo '</pre>';	*/
							return $resultArray;		
									//return $query->result();
								}else{
									return false;
									}
						}
						
				
				
				
					
						public function getCommentsByUserId($sid)
						{
							//,users.userName,users.images
							$this->db->select('count(comments.uiID) as totalcomments,comments.*,users.userName,users.images');
							$this->db->from('comments');
							$this->db->join('users','users.fID = comments.uiID','left');
							$this->db->where('comments.sID',$sid);
						//	$this->db->where('comments.uiID',$uid);
							$this->db->order_by('comments.dateTime','desc');
							//$this->db->group_by('comments.sID');
							$this->db->limit(1);
							
							$query=$this->db->get();
							/*echo '<pre>';
print_r($this->db->queries);
echo '</pre>';*/
				
							if($query->num_rows>0){			
									return $query->result();
								}else{
									return false;
									}
						}
				
						
			public function getTotalComments($sid,$uid)
			{ 	
						$this->db->select('count(comments.sID) as totalcomments');
						$this->db->from('comments');
						//$this->db->where('comments.uiID',$uid);	
						$this->db->where('comments.sID',$sid);
						$query=$this->db->get();
						/*echo '<pre>';
							print_r($this->db->queries);
							echo '</pre>';*/
						
						if($query->num_rows>0){	
						$res=$query->result();
						return $res[0]->totalcomments;
						}else{
							return 0;
							}		
			
			}	
						
			public function getUserArt($uid,$pagenum,$limit='10')
			{  //,count(comments.sID) as totalcomments
						$this->db->select('share.*,count(likes.sID) as totallikes');
						$this->db->from('share');
						$this->db->join('likes','likes.sID = share.sID','left');
						$this->db->join('users','users.fID = share.uID','left');
						//$this->db->join('comments','comments.sID = share.sID','left');						
						$this->db->where('share.uID',$uid);	
						//$this->db->where('likes.uID',$uid);	
						//$this->db->where('comments.uiID',$uid);					
						$this->db->limit($limit,$pagenum);	
						$this->db->group_by('share.sID');					
						$query=$this->db->get();						
							/*echo '<pre>';
							print_r($this->db->queries);
							echo '</pre>'; */
							// exit; 
							
							
							
							
							if($query->num_rows>0){	
							
							$res=$query->result();
							foreach($res as $resulttot)
							{
								$total_comments=$this->getTotalComments($resulttot->sID,$resulttot->uID);
								
								$data[]=array('sID'=>$resulttot->sID,'uID'=>$resulttot->uID,'image'=>$resulttot->image,'cbiID'=>$resulttot->cbiID,'dateTime'=>$resulttot->dateTime,'totallikes'=>$resulttot->totallikes,'totalcomments'=>$total_comments);
							}
							
							
							return $data;
														
								// return $query->result();
								}else{
									return false;
									}
						}			
						
					
						 
						
						
						public function getCommentsByUserId_old($uid)
						{
							$this->db->select('count(comments.uiID) as totalcomments,comments.*,users.userName,users.images');
							$this->db->from('comments');
							$this->db->join('users','users.fID = comments.uiID','left');
							$this->db->where('comments.uiID',$uid);
							$this->db->order_by('comments.dateTime','desc');
							$query=$this->db->get();
/*							echo '<pre>';
print_r($this->db->queries);
echo '</pre>';*/
				
							if($query->num_rows>0){			
									return $query->result();
								}else{
									return false;
									}
						}
						
						
						
						
						
						public function loginCheck($fuid,$name,$userimage,$friend)
						{
							$this->db->where('fID',$fuid);
							$query=$this->db->get('users');
							if($query->num_rows>0){								
							$data=array('type'=>'1','userName'=>$name,'images'=>$userimage,'addedDate'=>NOW());
							$this->db->where('fID',$fuid);
							$update=$this->db->update('users',$data);	
							}else{
								$data=array('fID'=>$fuid,'userName'=>$name,'images'=>$userimage,'type'=>'1');
								$insert=$this->db->insert('users',$data);
							}
								$friend_list=explode(',',$friend);
									foreach($friend_list as $friend){
										$this->db->where('uID',$fuid);
										$this->db->where('friendID',$friend);
										$insert=$this->db->get('user_friends');

										if($query->num_rows<=0)
										{	
											$frnddata=array('uID'=>$fuid,'friendID'=>$friend);
											$insfrnd=$this->db->insert('user_friends',$frnddata);
										}
									}
									
									return $query->result();	
									
						}
						
						
						
						
						
	/*	echo '<pre>';
print_r($this->db->queries);
echo '</pre>';*/					
						
//*******End	
}
?>