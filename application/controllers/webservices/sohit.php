<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//error_reporting(0);



class Json extends CI_Controller {



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

				 $this->load->model('jsonmodel');

				  //$this->load->model('mastersmodel');

				

   		 }



	

	

	

	

//==============================================		

		

		

		

			public function token()

			{

				$token=urldecode($this->input->get('token'));	

				$imei=urldecode($this->input->get('imei'));	

				$type=urldecode($this->input->get('type'));	

				$outh=urldecode($this->input->get('outh'));		

				$success=0;				

					

					

				

				

				if (!empty($imei) && !empty($token) && !empty($type) && isset($outh) && !empty($outh))

				{ 

				

							$check_oauth=sha1($imei.SALT);

					

							if($outh==$check_oauth)

							{

						

								$insertdata=$this->jsonmodel->checkToken($imei,$token,$type);

								if($insertdata)

								{

										$success=1;

										$output['success']=1;

								}else{

										$success=0;

										$output['success']=0;

								}

						  }

				}

				

				

				

				

				

				

				

				if($success==1){					

						echo json_encode($output);

					}else{

						$output=array('success'=>0);

						echo json_encode($output);

					}	

		}

	

	

			public function colorbookcat()

			{

			 $colorbook_cat_array = array();

			  

			  $outh=urldecode($this->input->get('outh'));

			  $imei=urldecode($this->input->get('imei'));	

			  if(!empty($outh) && !empty($imei))

			  {

					$check_oauth=sha1($imei.SALT);

					if($outh==$check_oauth)

					{ 

						$colobookcatdata=$this->jsonmodel->allColorBookCat();

						if(isset($colobookcatdata) && !empty($colobookcatdata))

						{

								foreach($colobookcatdata as $colobook_cat)

								{

									$colorbook_cat_array[] = array("id"=>$colobook_cat->mccID,"name"=>$colobook_cat->catName,'image'=>$colobook_cat->image,'color'=>$colobook_cat->borderColor);

								}

								

								    $colorbookcat_array['success']=1;

									$colorbookcat_array['msg']='data found';

									$colorbookcat_array['timthumb']=TIMTHUMB;

									$colorbookcat_array['path']=UPLOADCOLORBOOKCAT;

									$colorbookcat_array['data']=$colorbook_cat_array;

							 		echo json_encode($colorbookcat_array);

								

					}

			

			

				   }else{

					    

				   		 $colorbookcat_array['success']=0;

						 $colorbookcat_array['msg']='outh code not matched';

						 echo json_encode($colorbookcat_array);

				   }

			}else{

				

				 		 $colorbookcat_array['success']=0;

						 $colorbookcat_array['msg']='outh code is empty';

						 echo json_encode($colorbookcat_array);

				}

			

			}

	

			public function colorbook()

			{

				$outh=urldecode($this->input->get('outh'));

			    $imei=urldecode($this->input->get('imei'));

				$catid=urldecode($this->input->get('catid'));

				

				 if(!empty($outh) && !empty($imei) && !empty($catid))

				{

					$check_oauth=sha1($imei.SALT);

					if($outh==$check_oauth)

					{

					 $colorbook_image_array = array();

					 $colobookdata=$this->jsonmodel->allColorBook($catid);

						if(isset($colobookdata) && !empty($colobookdata)){

							foreach($colobookdata as $colobookcat)

							{

							 $colobookimgdata=$this->jsonmodel->viewColorBookImages($colobookcat->cbID);	

							 foreach($colobookimgdata as $colobookimg){

							

									$colorbook_image_array[] = array("image"=>$colobookimg->image);

								 }

								$category_array[]= array("cbID"=>$colobookcat->cbID,"name"=>$colobookcat->name,'is_paid'=>$colobookcat->isPaid,"colorbook_images"=>$colorbook_image_array);

							 }

								$colorbook_array['success']=1;

								$colorbook_array['timthumb']=TIMTHUMB;

								$colorbook_array['path']=UPLOADCOLORBOOKIMG;

								$colorbook_array['data']=$category_array;

						  echo json_encode($colorbook_array);

						  

						}else{

						 $colorbook_array['success']=0;

						//$colorbook_array['data']='no data found';

						echo json_encode($colorbook_array);

						

						}

					}else{

						 $colorbook_array['success']=0;

						 $colorbook_array['msg']='outh code not matched';

						 echo json_encode($colorbook_array);

						}

						

				}else{

					 	 $colorbook_array['success']=0;

						 $colorbook_array['msg']='outh code not matched';

						 echo json_encode($colorbook_array);

					}

				 

		}

				 



			public function share()

			{

				$uid=urldecode($this->input->post('uid'));	

				$image=urldecode($this->input->post('image'));	

				$cbiid=urldecode($this->input->post('cbiid'));	

				$outh=urldecode($this->input->post('outh'));

			    $imei=urldecode($this->input->post('imei'));

				

				

//	http://webdior.co.in/ovoccolor/webservices/json/share?uid=2&cbiid=3&image=gxdhgfhd&imei=9891936168&outh=444ca1483af58820a1b5b1b3dde1dc79ace8fc81

					

				$success=0;	

				if (!empty($uid) && !empty($image) && !empty($cbiid) && !empty($outh) && !empty($imei))

				{ 

				

					$check_oauth=sha1($imei.SALT);

					if($outh==$check_oauth)

					{

						 $imagename=$this->message_image_upload($image);

						

						

						$insertdata=$this->jsonmodel->checkShare($uid,$cbiid,$imagename);

							//$insertdata=$this->jsonmodel->checkShare($uid,$cbiid,$image);

							if($insertdata)

							{

							$success=1;

							$output['success']=1;

							$output['msg']='data inserted';

							echo json_encode($output);

					}else{

						$success=0;

						$output['success']=0;

						$output['msg']='data already exist';

						echo json_encode($output);

						

					}

					}else{

						$success==0;

						 $output['success']=0;

						 $output['msg']='outh code not matched';

						 echo json_encode($output);

						

						}

						

					}else{

						$success==0;

						 $output['success']=0;

						 $output['msg']='outh code empty';

						echo json_encode($output);

						}

				

				

				

				/*if($success==1){					

						echo json_encode($output);

					}else{

						$output=array('success'=>0);

						echo json_encode($output);

					}*/	

		}

			

			public function like()

			{

				$uid=urldecode($this->input->get('uid'));			

				$sid=urldecode($this->input->get('sid'));	

				 $outh=urldecode($this->input->get('outh'));

			     $imei=urldecode($this->input->get('imei'));

	

				$success=0;	

				if (!empty($uid) && !empty($sid) && !empty($outh) && !empty($imei))

				{ 

				

					$check_oauth=sha1($imei.SALT);

					if($outh==$check_oauth)

					{

				

					$insertdata=$this->jsonmodel->checkLike($uid,$sid);

					if($insertdata)

					{

						$success=1;

						$output['success']=1;

						$output['msg']='Liked';

						echo json_encode($output);

					}else if($insertdata=='unlike'){

						$success=0;

						$output['success']=0;

						$output['msg']='UnLiked';

						echo json_encode($output);

					}

				

				}else{

						$success==0;

						 $output['success']=0;

						 $output['msg']='outh code not matched';

						 echo json_encode($output);

						

						}

						

					}else{

						$success==0;

						 $output['success']=0;

						 $output['msg']='outh code empty';

						echo json_encode($output);

						}

				

				/*if($success==1){					

						echo json_encode($output);

					}else{

						$output=array('success'=>0);

						echo json_encode($output);

					}*/	

		}

			

			

			public function comment()

			{

				$uid=urldecode($this->input->get('uid'));			

				$sid=urldecode($this->input->get('sid'));	

				$comment=urldecode($this->input->get('comment'));	

				 $outh=urldecode($this->input->get('outh'));

			     $imei=urldecode($this->input->get('imei'));



					

				$success=0;	

				if (!empty($uid) && !empty($sid) && !empty($comment) && !empty($outh) && !empty($imei))

				{ 

					$check_oauth=sha1($imei.SALT);

					if($outh==$check_oauth)

					{

					$insertdata=$this->jsonmodel->checkComments($uid,$sid,$comment);

					if($insertdata)

					{

						$success=1;

						$output['success']=1;

						$output['msg']='Comment has been posted';

						echo json_encode($output);

					/*}else{

						$success=0;

						$output['success']=0;

						$output['msg']='data already exist';

						echo json_encode($output);*/

					}

					

					

				}else{

						$success==0;

						 $output['success']=0;

						 $output['msg']='outh code not matched';

						 echo json_encode($output);

						

						}

						

					}else{

						$success==0;

						 $output['success']=0;

						 $output['msg']='outh code empty';

						echo json_encode($output);

						}

				

				

				/*if($success==1){					

						echo json_encode($output);

					}else{

						$output=array('success'=>0);

						echo json_encode($output);

					}*/	

		}

			

			public function getcomment()

			{

				

				

//http://webdior.co.in/ovoccolor/webservices/json/getcomment?sid=7&page_num=1&imei=9891936168&outh=444ca1483af58820a1b5b1b3dde1dc79ace8fc81

				

				

						

				$sid=urldecode($this->input->get('sid'));	

				$outh=urldecode($this->input->get('outh'));

			    $imei=urldecode($this->input->get('imei'));



				

				$success=0;	

				if (!empty($sid) && !empty($outh) && !empty($imei))

				{ 

						$check_oauth=sha1($imei.SALT);

						if($outh==$check_oauth)

						{

					$getdata=$this->jsonmodel->getComments($sid);

					if($getdata)

					{

						$success=1;

						$output['data']=$getdata;

						$output['success']=1;

						$output['msg']='data found';

						echo json_encode($output);

					}else{

						$success=0;

						$output['success']=0;

						$output['msg']='data not found';

						echo json_encode($output);

					}

				}else{

						$success==0;

						 $output['success']=0;

						 $output['msg']='outh code not matched';

						 echo json_encode($output);

						

						}

						

					}else{

						$success==0;

						 $output['success']=0;

						 $output['msg']='outh code empty';

						echo json_encode($output);

						}

				

				

				/*if($success==1){					

						echo json_encode($output);

					}else{

						$output=array('success'=>0);

						echo json_encode($output);

					}	*/

		}

		

		

			public function getmyartlist()

			{

				

				

	//http://webdior.co.in/ovoccolor/webservices/json/getmyartlist?uid=1246490895416846&page_num=1&imei=9891936168&outh=444ca1483af58820a1b5b1b3dde1dc79ace8fc81

				

				$uid=urldecode($this->input->get('uid'));	

				$outh=urldecode($this->input->get('outh'));

			    $imei=urldecode($this->input->get('imei'));

				$page_num=urldecode($this->input->get('page_num'));

				$success=0;	

				

				if(!empty($outh) && !empty($imei) && !empty($uid))

				{ 

						$check_oauth=sha1($imei.SALT);

						if($outh==$check_oauth)

						{

							

							$getuserdata=$this->jsonmodel->getUserArt($uid,$page_num);

								if($getuserdata)

								{							

								

										$output['success']=1;

										$output['msg']='data found';

										$output['myart']=$getuserdata;							

										echo json_encode($output);

								

								

								

								

								}else{

								$success=0;

								$output['success']=0;

								$output['msg']='data not found';

								echo json_encode($output);

									}

							

						}else{

							$success==0;

							 $output['success']=0;

							 $output['msg']='outh code not matched';

							 echo json_encode($output);

							

							}

				}else{

					 $success==0;

					 $output['success']=0;

					 $output['msg']='outh code empty';

					 echo json_encode($output);

					}

			

		}

		

		

		

		

			public function inspiration2()

			{

						

			 	$uid=urldecode($this->input->get('uid'));	

				$outh=urldecode($this->input->get('outh'));

			    $imei=urldecode($this->input->get('imei'));

				$page_num=urldecode($this->input->get('page_num'));

				$success=0;	

				

				if(!empty($outh) && !empty($imei))

				{ 

						$check_oauth=sha1($imei.SALT);

						if($outh==$check_oauth)

						{

								$getuserdata=$this->jsonmodel->getUserData2($uid,$page_num);

								if($getuserdata)

								{

										$output['success']=1;

										$output['msg']='data found';

										//$output['inspiration']=$user_array;		

										$output['inspiration']=$getuserdata;							

										echo json_encode($output);

								}else{

									$success=0;

									$output['success']=0;

									$output['msg']='data not found';

									echo json_encode($output);

									}

						}else{

							$success==0;

							 $output['success']=0;

							 $output['msg']='outh code not matched';

							 echo json_encode($output);

							

							}

							

				}else{

					 $success==0;

					 $output['success']=0;

					 $output['msg']='outh code empty';

					 echo json_encode($output);

					}

		}	

		

		

		

				 

			public function inspiration()

			{

						

			 	$uid=urldecode($this->input->get('uid'));	

				$outh=urldecode($this->input->get('outh'));

			    $imei=urldecode($this->input->get('imei'));

				$page_num=urldecode($this->input->get('page_num'));

				$success=0;	

				

				if(!empty($outh) && !empty($imei))

				{ 

						$check_oauth=sha1($imei.SALT);

						if($outh==$check_oauth)

						{

								$getuserdata=$this->jsonmodel->getUserData($uid,$page_num);

								//$commantdata=$this->jsonmodel->getCommentsByUserId($uid);

								if($getuserdata)

								{

										/*$user_array=array('uid'=>$getuserdata[0]->iD,

										'username'=>$getuserdata[0]->userName,

										'uimage'=>$getuserdata[0]->userimg,

										'sid'=>$getuserdata[0]->sid,

										'simage'=>$getuserdata[0]->simage,

										'totallike'=>$getuserdata[0]->totallikes,

										'totalcomment'=>$commantdata[0]->totalcomments,

										'lastcommentuserimage'=>$commantdata[0]->images,

										'lastcomment'=>$commantdata[0]->comment,

										'lastcommentusername'=>$commantdata[0]->userName);*/

										

										

										$output['success']=1;

										$output['msg']='data found';

										//$output['inspiration']=$user_array;		

										$output['inspiration']=$getuserdata;							

										echo json_encode($output);

								}else{

									$success=0;

									$output['success']=0;

									$output['msg']='data not found';

									echo json_encode($output);

									}

						}else{

							$success==0;

							 $output['success']=0;

							 $output['msg']='outh code not matched';

							 echo json_encode($output);

							

							}

							

				}else{

					 $success==0;

					 $output['success']=0;

					 $output['msg']='outh code empty';

					 echo json_encode($output);

					}

		}	

		

		

		

//9555872458		

			public function login()

			{

				$fuid=urldecode($this->input->get('fuid'));	

				$name=urldecode($this->input->get('name'));	

				$userimage=urldecode($this->input->get('userimage'));

				$friend=urldecode($this->input->get('friend'));				

				$imei=urldecode($this->input->get('imei'));	

				$outh=urldecode($this->input->get('outh'));		

				$success=0;				

				

				

				if (!empty($fuid) && !empty($name) && isset($outh) && !empty($imei))

				{ 

				

							$check_oauth=sha1($imei.SALT);

					

							if($outh==$check_oauth)

							{

								$insertdata=$this->jsonmodel->loginCheck($fuid,$name,$userimage,$friend);

								if($insertdata)

								{

										$success=1;

										$output['success']=1;

										$output['data']=$insertdata;

								}else{

										$success=0;

										$output['success']=0;

								}

						  }

				}

				

				

				

				

				

				

				

				if($success==1){					

						echo json_encode($output);

					}else{

						$output=array('success'=>0);

						echo json_encode($output);

					}	

		}

		

			 public function readcomment()

			{

						

				$sid=urldecode($this->input->get('sid'));	



				$outh=urldecode($this->input->get('outh'));

			    $imei=urldecode($this->input->get('imei'));



				

				$success=0;	

				if (!empty($sid) && !empty($outh) && !empty($imei))

				{ 

						$check_oauth=sha1($imei.SALT);

						if($outh==$check_oauth)

						{

					$getdata=$this->jsonmodel->getComments($sid);

					if($getdata)

					{

						$success=1;

						$output['data']=$getdata;

						$output['success']=1;

						$output['msg']='data found';

						echo json_encode($output);

					}else{

						$success=0;

						$output['success']=0;

						$output['msg']='data not found';

						echo json_encode($output);

					}

				}else{

						$success==0;

						 $output['success']=0;

						 $output['msg']='outh code not matched';

						 echo json_encode($output);

						



						}

						

					}else{

						$success==0;

						 $output['success']=0;

						 $output['msg']='outh code empty';

						echo json_encode($output);

						}

				

				

				/*if($success==1){					

						echo json_encode($output);

					}else{

						$output=array('success'=>0);

						echo json_encode($output);

					}	*/

		}

				 

			public function message_image_upload($msgimg)	

			{



	$img = $msgimg;

	if($img!=''){

		$img = str_replace('data:image/jpeg;base64,', '', $img);

		$img = str_replace(' ', '+', $img);

		$data = base64_decode($img);

		$img_name=uniqid()."-".time();

		$file = UPLOADSHAREIMG . $img_name . '.jpeg';

		$success = file_put_contents($file, $data);

		$imgdata = str_replace(UPLOADSHAREIMG,'', $file);

		if($imgdata){

			/*echo '<br/>';

			echo SHAREIMG.$imgdata;exit;

			echo '<br/>';*/

			return SHAREIMG.$imgdata;

			}else{

				return false;				

				}

			}

	 }	

		

		

//=======================================================		

		//http://webdior.co.in/ovoccolor/webservices/json/getimages?img=9891936168&imei=9891936168&outh=444ca1483af58820a1b5b1b3dde1dc79ace8fc81

			public function getimages()

			{

						

					

				$outh=urldecode($this->input->post('outh'));

			    $imei=urldecode($this->input->post('imei'));

				$image=urldecode($this->input->post('img'));



				

				$success=0;	

				if (!empty($outh) && !empty($imei))

				{ 

						$check_oauth=sha1($imei.SALT);

						if($outh==$check_oauth)

						{

						

					if($image!='')

					{

								

							$img = str_replace('data:image/png;base64,', '', $image);

							$img = str_replace(' ', '+', $img);

							$data = base64_decode($img);

							$img_name=uniqid()."-".time();

							$file = UPLOADBASEIMAGE . $img_name . '.png';

							$success = file_put_contents($file, $data);

							$imgdata = str_replace(UPLOADBASEIMAGE,'', $file);	

							exec("/usr/bin/convert ".UPLOADBASEIMAGE.$imgdata." -alpha on -edge 1 -negate -normalize -gravity center -bordercolor white -border 0 -morphology edgeout diamond:1 -shave 5x5 -negate ".UPLOADBASEIMAGE.$imgdata);

						$success=1;

						$output['data']=VIEWBASEIMAG.$imgdata;

						$output['success']=1;

						$output['msg']='data found';

						echo json_encode($output);

						

					}else{

						$success=0;

						$output['success']=0;

						$output['msg']='data not found';

						echo json_encode($output);

					}

				}else{

						$success==0;

						 $output['success']=0;

						 $output['msg']='outh code not matched';

						 echo json_encode($output);

						

						}

						

					}else{

						$success==0;

						 $output['success']=0;

						 $output['msg']='outh code empty';

						echo json_encode($output);

						}

				

				

$dir = UPLOADBASEIMAGE;

foreach (glob($dir."*") as $file) {

/*** if file is 24 hours (86400 seconds) old then delete it ***/

if (filemtime($file) < time() - 300) {

    unlink($file);

    }

}

				

				

		}

		

		

				 

			

	

 // End of class

}



/* End of file welcome.php */

/* Location: ./application/controllers/welcome.php */