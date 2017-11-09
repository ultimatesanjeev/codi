<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
error_reporting(0);
class Welcomemodel extends CI_Model{
					
				
						
						
						
							/*echo '<pre>';
							print_r($this->db->queries[0]);
							echo '</pre>';exit;*/
							//$row=$query->result();
							//return $row[0]->email;
							/*	echo '<pre>';
								print_r($this->db->queries);
								echo '</pre>';*/
															/*echo '<pre>';
								print_r($this->db->queries);
								echo '</pre>';exit;*/

						public function changePassword($postdata,$uid)
						{
							$this->db->where('password',sha1($this->input->post('old_password')));
							$this->db->where('id',$uid);
							//$this->db->where('password',$password);
							$query=$this->db->get('user');
							
							if($query->num_rows>0){
								
								$data=array('password'=>sha1($this->input->post('new_password',FALSE)));	
								$this->db->where('id',$uid);
								$query=$this->db->update('user',$data);
							/*echo '<pre>';
								print_r($this->db->queries);
								echo '</pre>';exit;*/
							
							return true;
							}else{
								return false;
							}
						}
							
							
							public function checkchatboxusages($uid)
							{
								//echo $uid;
								$this->releaseUnusedChat($uid);
								
								
								$chatboxname=array($uid.'a',$uid.'b',$uid.'c',$uid.'d',$uid.'e',$uid.'f',$uid.'g',$uid.'h');
								//$this->db->where('aucid',$uid);
								//$this->db->select('count(auid) as totalauid');
									$this->db->where('auid',$uid);
									$query=$this->db->get('admin_users_chatbox_usages');
									$result=$query->result();
									foreach($result as $res){
									 $allaucid[]=$res->aucid;
									}
										
									
										for($i=0;$i<count($chatboxname);$i++)
										{
										
											if(!in_array($chatboxname[$i],$allaucid)){
											return $chatboxname[$i];
											//	echo $chatboxname[$i].'<br/>';
											}
											
										
											
										}
								

							return false;
						}
						
						
						
						public function releaseUnusedChat($uid)
						{	
							//Update time in chatbox to show Telecaller present
							$data=array('date_time'=>now());
							$this->db->where('auid',$uid);
							$update=$this->db->update('admin_users_chatbox_usages',$data);	
							
							$this->db->select('auid,date_time');
							$query=$this->db->get('admin_users_chatbox_usages');
							$result=$query->result();
							
							
							foreach($result as $res){
							$timediff=$this->GetMinDiff($res->date_time);
								
								if($timediff>=1){
									$data=array('auid'=>'0','aucid'=>'');
									$this->db->where('auid',$res->auid);
									$update=$this->db->update('admin_users_chatbox_usages',$data);	
								}
							}
						}
							
							
							
							
							
							
							public function checkNotAssignedChats($chatbox,$uid)
							{
								$this->db->where('auid',0);
								$query=$this->db->get('admin_users_chatbox_usages');
								$this->db->limit(1);
								
								if($query->num_rows>0){
								
								
								$result=$query->result();
								$aucu_id=$result[0]->aucu_id;
								
									if($query->num_rows>0)
									{
											$data=array(
											'auid'=>$uid,
											'aucid'=>$chatbox,
											'date_time'=>now());
											
											
											
										//print_r($data);exit;
										
										
										$this->db->where('aucu_id',$aucu_id);
										$update=$this->db->update('admin_users_chatbox_usages',$data);
									
										if($update)
												{
												return true;
												}
									}
								
								}	else
												{
													return false;
												}
						
						}
									
						
						public function viewLoginDetails($emailid,$password)
						{
							$this->db->where('user_email',$emailid);
							$this->db->where('password',$password);
							$this->db->where('status','active');
							$query=$this->db->get('user');
							/*echo '<pre>';
							print_r($this->db->queries[0]);
							echo '</pre>';*/
							if($query->num_rows>0){
							
							return $query->result();
							}else{
								return false;
							}
						}
						
					
					
					
						public function checkUserExistance($email)
						{
							$this->db->where('user_email',$email);
							$query=$this->db->get('user');
							/*echo '<pre>';
							print_r($this->db->queries[0]);
							echo '</pre>';exit;*/
							if($query->num_rows>0){
								 
							$password=RANDNUM;
							$data=array('password'=>sha1($password));								
							$this->db->where('user_email',$email);
							$update=$this->db->update('user',$data);
							return $password;
							}else{
								return false;
							}
						}
						
						
public function GetMinDiff($timestamp) 
{
    $how_log_ago = '';
    $seconds = time() - $timestamp; 
    $minutes = (int)($seconds / 60);
    return $minutes;
}						
							
						
						
						
public function GetTimeDiff($timestamp) 
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
						
						
	//=====================================================For Get Chat Function============================================
	
	
				public function androidNotification($token,$messageid,$message,$type,$time)
				{
				
					
				define('API_ACCESS_KEY', 'AIzaSyAJ_UTrvUJAPgUj_HhhJCFKwr7UV7TffsQ');
				
				$registrationIds = array($token);
				//$registrationIds = array("APA91bGvpKQpewk9xp1TcDzt5Q65Clcck4-uIpK-oJh0A8a79zPpYsujBbYEZqZPRL95A9t-eZzIf-qrjYHaOZYebhsN7bNbbAWsm40p8GgKfQVAjOGiZOiWZo9KY3qEysAj_FOp_VLb");
				//print_r($registrationIds);
				//echo $registrationIds = $deviceToken;exit;
				//print_r($registrationIds);exit;
				// prep the bundle
				
				$msg = array
				(
				'message' =>$message,
				'message_id'=>$messageid,
				'message_timestamp'=>$time,	
				'messageType'=>$type,	
				'tickerText'=> 'Ticker ',
				'vibrate'=> 1,
				'sound'=> 1,
				'smallIcon'=>'small_icon');				
				
				$fields = array
				(
				'registration_ids'=>$registrationIds,	
				'data'	=> $msg
				);
				
				// print_r($fields);
				$headers = array
				(
				'Authorization: key=' . API_ACCESS_KEY,
				'Content-Type: application/json'
				);
				//print_r($headers);
				$ch = curl_init();
				curl_setopt( $ch,CURLOPT_URL, 'https://android.googleapis.com/gcm/send' );
				curl_setopt( $ch,CURLOPT_POST, true );
				curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
				curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
				curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
				curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
				echo $result = curl_exec($ch );
				curl_close( $ch );
				}
	
	
	
						/*public function appleNotification($token,$messageid,$message,$type,$time)
						{
							// API access key from Google API's Console
							define( 'API_ACCESS_KEY', 'AIzaSyAuEDq6XK4Xw8iLh5R837CmaHnzEEKSN5g');							
							$registrationIds = array("nVFjO2SZN7U:APA91bEqaZbEatu7Jwjd_sX4dnC1ztWyuN6gh3gex-ZMT0RdrkyKH4ch-56Og92x_0k1rXNoLStLgecVQhPntPKzlEIhHrexb2Lb-IXXsmVi0f8tTgwCwz5ropsk8lGoEHKfwZm7Eb1e" );
							//$message='Test by gautam';
							// prep the bundle
							$msg = array
							(
							'messageid'       => $messageid,
							'title'         => $message,
							'type'      => 'text',
							'tickerText'    => $message,
							'vibrate'   => 1,
							'sound'     => 'default'
							);
							
							$fields = array
							(
							'registration_ids'  => $registrationIds,
							'data'              => $msg,
							'content_available'=> true,
							'priority' => "high"
							);
							
							$headers = array
							(
							'Authorization: key=' . API_ACCESS_KEY,
							'Content-Type: application/json'
							);
							
							$ch = curl_init();
							curl_setopt( $ch,CURLOPT_URL, 'https://android.googleapis.com/gcm/send' );
							curl_setopt( $ch,CURLOPT_POST, true );
							curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
							curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
							curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
							curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
							$result = curl_exec($ch );
							curl_close( $ch );*/
							
							//echo $result;
												
					

				/*	
					// API access key from Google API's Console
					//define( 'API_ACCESS_KEY', 'AIzaSyA0aFvdSNRgMRkPVT64hDrQXPKfaMir9EQ');
					define( 'API_ACCESS_KEY', 'AIzaSyAuEDq6XK4Xw8iLh5R837CmaHnzEEKSN5g');
					
												
					
					$registrationIds = array($token);
					//$message='This is a test';
					// prep the bundle
					$msg = array
					(
					 'messageid'       => $messageid,
					 'title'         => $message,
					 'messageType'=>$type,	
					 'tickerText'    => $message,
					 'vibrate'   => 1,
					 'sound'     => 1
					);
					
					$fields = array
					(
					 'registration_ids'  => $registrationIds,
					 'data'              => $msg,
					 'content_available' =>true,
					 'priority'		 =>'high');
					
					
					$headers = array
					('Authorization: key='.API_ACCESS_KEY,
					 'Content-Type: application/json'
					 );
					
					
					$ch = curl_init();
					curl_setopt( $ch,CURLOPT_URL, 'https://android.googleapis.com/gcm/send' );
					curl_setopt( $ch,CURLOPT_POST, true );
					curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
					curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
					curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
					curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
					$result = curl_exec($ch );
					curl_close( $ch );
					*/
					//echo $result;

			
			
		//	}
			
			
			
			
			
				function appleNotification($token,$messageid,$message,$type)//($deviceToken, $mgsid, $message)
                {             // Put your device token here (without spaces):

                              //  $deviceToken = '5a5c60a3d4e1083f4a42851d9907391cf9128d1c75e7eadf1ca9718914644579';
								$deviceToken =$token;
                               

                                // Put your private key's passphrase here:

                                $passphrase = '654321';
                                ////////////////////////////////////////////////////////////////////////////////
                                $ctx = stream_context_create();
                                stream_context_set_option($ctx, 'ssl', 'local_cert', 'apns-pro.pem');
                                stream_context_set_option($ctx, 'ssl', 'passphrase', $passphrase);
                                // Open a connection to the APNS server
                                $fp = stream_socket_client(
                                  'ssl://gateway.push.apple.com:2195', $err,
                                  $errstr, 60, STREAM_CLIENT_CONNECT|STREAM_CLIENT_PERSISTENT, $ctx);
                                if (!$fp)
                                  exit("Failed to connect: $err $errstr" . PHP_EOL);
                                //echo 'Connected to APNS' . PHP_EOL;
                                // Create the payload body
                                $body['aps'] = array(
                                  'content-available' => '1',
                                  );
                                $pa['aps'] = array('content-available' => 1, 'messageid' => $messageid, 'messageType'=>$type,'title' => $message, 'alert' => $message, 'badge' => 1, 'sound' => 'default');
                                // Encode the payload as JSON
                                $payload = json_encode($pa);
                                // Build the binary notification
                                $msg = chr(0) . pack('n', 32) . pack('H*', $deviceToken) . pack('n', strlen($payload)) . $payload;
                                // Send it to the server
                                $result = fwrite($fp, $msg, strlen($msg));                 
                                fclose($fp);
                		}		
			
			
	
	
	
public function ClearText($str)
{

$clean= trim($str,"\n");

$clean= trim($clean," ");

//$clean= trim($clean,"&amp;");


$clean= htmlentities($clean);

$clean=utf8_encode($clean);

   $clean=utf8_decode($clean);


return $clean;

}

	
	
	
	
	
		public function  sendChat($chat,$last,$message)
		{  //$message,
		//echo '1';
		//echo $chat.'----'.$last.'-----'.$message;		
	

				//Send some headers to keep the user's browser from caching the response.
				header("Expires: Mon, 26 Jul 1997 05:00:00 GMT" ); 
				header("Last-Modified: " . gmdate( "D, d M Y H:i:s" ) . "GMT" ); 
				header("Cache-Control: no-cache, must-revalidate" ); 
				header("Pragma: no-cache" );
				header("Content-Type: text/xml; charset=utf-8");
				
				
				//Check to see if a message was sent.
				//if(isset($_POST['message']) && $_POST['message'] != '') {
				if(isset($message) && !empty($message) && isset($chat) && !empty($chat)) {
				$posttype='text';
				
				//$message=str_replace('%26','&',$messageval);
				

				$this->db->where('aucid',$chat);
				$query=$this->db->get('admin_users_chatbox_usages');
								/*echo '<pre>';
								print_r($this->db->queries);
								echo '</pre>';*/
								
				if($query->num_rows>0)
				{
						$row=$query->result();
						$uid=$row[0]->uid;
						$msgdata=array(
						'user_id'=>$uid,
						'message'=>$message,
						'type'=>$posttype,
						'sent_from'=>'0',
						'post_time'=>now());
						
						$insertmsg=$this->db->insert('message',$msgdata);
						$insertedid=$this->db->insert_id();
						
						//Sending notification to device token
						$this->db->where('uid',$uid);
						$query=$this->db->get('customers_device_token');
						$res=$query->result();
						//	echo $res[0]->type==1;
						if($res[0]->type==1){
						//for android
							$this->androidNotification($res[0]->token,$insertedid,$message,$posttype,now());
						
						}
						else{
						//for apple
						 $this->appleNotification($res[0]->token,$insertedid,$message,$posttype,now());
						
						
						}
							//Create the XML response.
							$xml = '<?xml version="1.0" ?><root>';
							//Check to ensure the user is in a chat room.	
								$this->db->select('*');
								$this->db->from('admin_users_chatbox_usages');
								$this->db->join('customers','customers.uid = admin_users_chatbox_usages.uid');
								$this->db->where('aucid',$chat);
								$query = $this->db->get();
								if($query->num_rows>0){
									$resdata=$query->result();
									//$uid=$resdata[0]->uid;
								}
						
										/*echo '<pre>';
										print_r($this->db->queries);
										echo '</pre>';*/
							
							
								//$last = (isset($_GET['last']) && $_GET['last'] != '') ? $_GET['last'] : 0;
								$lastrec = (isset($last) && $last != '') ? $last : 0;
								$this->db->where('user_id',$uid);
								$this->db->where('message_id >',$lastrec);
								$query=$this->db->get('message');
								
										/*echo '<pre>';
										print_r($this->db->queries);
										echo '</pre>';*/
									$messageres=$query->result();
									foreach($messageres as $msgval){
									//$datetime = date('H:i:s', round(strtotime($msgval->post_time)/60)*60);
									//$datetime = date('H:i:s',floor($msgval->post_time/60)*60);
									$datetime = $this->GetTimeDiff($msgval->post_time);
									$xml .= '<message id="' . $msgval->message_id . '">';
									$xml .= '<mobile>' .htmlspecialchars('9999999999'). '</mobile>';
									$xml .= '<user>' . htmlspecialchars($resdata[0]->name) . '</user>';
									$xml .= '<text>' . htmlspecialchars($msgval->message) . '</text>';
									$xml .= '<time>'.htmlspecialchars($datetime).'</time>';
									$xml .= '<sender>'.htmlspecialchars($msgval->sent_from).'</sender>';
									$xml .= '<msgid>'.htmlspecialchars($msgval->message_id ).'</msgid>';
									$xml .= '<uid>'.htmlspecialchars($uid).'</uid>';
									//$xml .= '<time>' . $message_array['post_time'] . '</time>';
									$xml .= '</message>';
								}
						}
						else
						{
								$xml = '<?xml version="1.0" ?><root>';
								$xml .='Your are not currently in a chat session.  <a href="">Enter a chat session here</a>';
								$xml .= '<message id="0">';
								$xml .= '<user>Admin</user>';
								$xml .= '<text>Your are not currently in a chat session.  &lt;a href=""&gt;Enter a chat session here&lt;/a&gt;</text>';
								$xml .= '<time>' . date('h:i') . '</time>';
								$xml .= '</message>';
						}
						$xml .= '</root>';
						echo $xml;
				}

		
		}
						
			public function  getChat($chat,$last)
		{ 
				//Send some headers to keep the user's browser from caching the response.
				header("Expires: Mon, 26 Jul 1997 05:00:00 GMT" ); 
				header("Last-Modified: " . gmdate( "D, d M Y H:i:s" ) . "GMT" ); 
				header("Cache-Control: no-cache, must-revalidate" ); 
				header("Pragma: no-cache" );
				header("Content-Type: text/xml; charset=utf-8");
				
				
				//Check to see if a message was sent.
				//if(isset($_POST['message']) && $_POST['message'] != '') {
				if(isset($chat) && !empty($chat)) {
				$posttype='text';

				$this->db->where('aucid',$chat);
				$query=$this->db->get('admin_users_chatbox_usages');
				/*echo '<pre>';
										print_r($this->db->queries);
										echo '</pre>';*/
				$row=$query->result();
				//$uid=;
				$flag=1;
				if(isset($row[0]->uid) && !empty($row[0]->uid))
				{
							$uid=$row[0]->uid;
							//Create the XML response.
							$xml = '<?xml version="1.0" ?><root>';
							//Check to ensure the user is in a chat room.	
								$this->db->select('*');
								$this->db->from('admin_users_chatbox_usages');
								$this->db->join('customers','customers.uid = admin_users_chatbox_usages.uid');
								$this->db->where('aucid',$chat);
								$query = $this->db->get();
								if($query->num_rows>0){
									$resdata=$query->result();
									//$uid=$resdata[0]->uid;
								}
						
										/*echo '<pre>';
										print_r($this->db->queries);
										echo '</pre>';*/
							
							
								//$last = (isset($_GET['last']) && $_GET['last'] != '') ? $_GET['last'] : 0;
								$lastrec = (isset($last) && $last != '') ? $last : 0;
								
								//$query=$this->db->get('message');
								$this->db->select('*');
								$this->db->from('message');
								$this->db->join('customers','customers.uid = message.user_id');
								$this->db->where('user_id',$uid);
								$this->db->where('message_id >',$lastrec);
								$query = $this->db->get();
								
								
									/*	echo '<pre>';
										print_r($this->db->queries);
										echo '</pre>';exit;*/
									$messageres=$query->result();
									foreach($messageres as $msgval){
								//	print_R($msgval);
									//$datetime = date('H:i:s', round(strtotime($msgval->post_time)/60)*60);
									//$datetime = date('H:i:s',floor($msgval->post_time/60)*60);
									$datetime = $this->GetTimeDiff($msgval->post_time);
									$xml .= '<message id="' . $msgval->message_id . '">';
									//$xml .= '<userid>' .$message_array['user_id']. '</userid>';
									$xml .= '<user>' . htmlspecialchars($resdata[0]->name) . '</user>';
									$xml .= '<mobile>' .htmlspecialchars($msgval->mobile). '</mobile>';
									$xml .= '<text>' . htmlspecialchars($msgval->message). '</text>';
									$xml .= '<time>'.htmlspecialchars($datetime).'</time>';
									$xml .= '<sender>'.htmlspecialchars($msgval->sent_from).'</sender>';
									$xml .= '<msgid>'.htmlspecialchars($msgval->message_id ).'</msgid>';
									$xml .= '<uid>'.htmlspecialchars($uid).'</uid>';
									//$xml .= '<time>' . $message_array['post_time'] . '</time>';
									$xml .= '</message>';
								}
						}
						else
						{
							$flag=0;
								$xml = '<?xml version="1.0" ?><root>';
								$xml .='Your are not currently in a chat session.  <a href="">Enter a chat session here</a>';
								//$xml .= '<message id="0">';
								//$xml .= '<user>Admin</user>';
								//$xml .= '<text>Your are not currently in a chat session.  &lt;a href=""&gt;Enter a chat session here&lt;/a&gt;</text>';
								//$xml .= '<time>' . date('h:i') . '</time>';
								//$xml .= '</message>';
						}
						$xml .= '</root>';
						echo $xml;
				}
		
		}				
					
					
					
				
//*******End	
}
?>