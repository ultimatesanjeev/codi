<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
//error_reporting(0);
class Requestmodel extends CI_Model{
					
				
				
				
function GetTimeDiff($timestamp) 
{
    $how_log_ago = '';
    $seconds = time() - $timestamp; 
    $minutes = (int)($seconds / 60);
    $hours = (int)($minutes / 60);
    $days = (int)($hours / 24);
    if ($days >= 1) {
      $how_log_ago = $days . ' day' . ($days != 1 ? 's' : '');
    } else if ($hours >= 1) {
      $how_log_ago = $hours . ' hr' . ($hours != 1 ? 's' : '');
    } else if ($minutes >= 1) {
      $how_log_ago = $minutes . ' min' . ($minutes != 1 ? 's' : '');
    } else {
      $how_log_ago = $seconds . ' sec' . ($seconds != 1 ? 's' : '');
    }
    return $how_log_ago;
}	

				
				
						
							public function addRequestDetails($postdata,$telecallerid)
							{
								/*echo '<pre>';
								print_r($postdata);
								echo '</pre>';*/
								//exit;
								$data=array(
									'title'=>$postdata['request_title'],
									'status_id'=>$postdata['request_status'],
									'message_id'=>$postdata['messageid'],
									'uid'=>$postdata['userid'],
									'telecaller_id'=>$telecallerid,
									'date_time'=>now());
									
									$insert=$this->db->insert('customers_requests',$data);
									
									/*echo '<pre>';
									print_r($this->db->queries);
									echo '</pre>';exit;*/
									
									if($insert){
										 return $this->db->insert_id();
										//return true;
									}else{
										return false;
									}
						}
		
							
							
							
					
							public function viewRequestDetails($userid)
							{
							
								$this->db->select('*');
								$this->db->from('customers_requests');
								$this->db->join('master_status','master_status.ms_id = customers_requests.status_id');
								$this->db->where('uid',$userid);
								$query=$this->db->get();
							
							
								//$this->db->where('telecaller_id',$uid);
							//$this->db->where('uid',$userid);
								//$this->db->where('message_id >=',$msgid);
							//	$query=$this->db->get('customers_requests');
									
							if($query->num_rows>0){
							
							return $query->result();
							}else{
								return false;
							}
						}
						
									
							public function updateRequestStatus($postdata)
							{
								$i=$postdata['selectid'];
									$data=array('status_id'=>$postdata['status'.$i]);
									$this->db->where('ur_id',$postdata['requedid']);
									$insert=$this->db->update('customers_requests',$data);
									/*echo '<pre>';
									print_r($this->db->queries);
									echo '</pre>';
									exit;*/
									
									if($insert){
										 return true;
									}else{
										return false;
									}
						}
						
							public function updateProfile($postdata,$uid)
							{
									$data=array(
									'name'=>$postdata['username'],
									'mobile'=>$postdata['mobileno'],
									'email'=>$postdata['emailid'],
									'home_address'=>$postdata['home_address'],
									'office_address'=>$postdata['work_address'],
									'peer_address'=>$postdata['peer_address']);									
									
									$this->db->where('uid',$uid);
									$update=$this->db->update('customers',$data);
									/*echo '<pre>';
									print_r($this->db->queries);
									echo '</pre>';
									exit;*/
									
									if($update){
										 return true;
									}else{
										return false;
									}
						}
						
						
						
						public function updateChatBox($uid,$boxid)
						{
							
							$this->db->where('uid',$uid);
							$this->db->where('aucid',$boxid);
							$delquery=$this->db->delete('admin_users_chatbox_usages');
									/*echo '<pre>';
									print_r($this->db->queries);
									echo '</pre>';*/
							if($delquery){
								return true;
							}else{
								return false;
							}
						}
						
						
						
						
						
						
						
						
						
						
					
					
						
						public function viewMessageDetails($msgid,$userid)
							{
								$this->db->where('user_id',$userid);
							//	$this->db->where('uid',$userid);
								$this->db->where('message_id >=',$msgid);
								$this->db->order_by('message_id ASC');
									/*echo '<pre>';
									print_r($this->db->queries);
									echo '</pre>';*/
								$query=$this->db->get('message');
								/*echo '<pre>';
								print_r($this->db->queries);
								echo '</pre>';//exit;*/
							if($query->num_rows>0){
							
							return $query->result();
							}else{
								return false;
							}
						}
						
							
							public function viewStatusList()
							{			$this->db->order_by('status','ASC');
								$query=$this->db->get('master_status');
								/*echo '<pre>';
								print_r($this->db->queries);
								echo '</pre>';//exit;*/
							if($query->num_rows>0){
								return $query->result();
								}else{
									return false;
								}
						}
						
						
			
					
					
					
				
//*******End	
}
?>