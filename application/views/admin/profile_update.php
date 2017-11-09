<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/font-awesome.css');?>" />
 <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/chat.css');?>" />
<style>
.chat-popup-header { border-radius:0px; -webkit-border-radius:0px; -moz-border-radius:0px; -o-border-radius:0px; -ms-border-radius:0px;-khtml-border-radius:0px; }
.alert-1 { font-size:12px; padding:10px; background: #D6FEC5; color:#009900; border:1px #009900 solid; margin:10px 0px; }
.alert-2 { font-size:12px; padding:10px; background: #FEC2C4 ; color:red; border:1px red solid; margin:10px 0px; }

</style>





<div class="chat-popup-header">
<i class="icon-user" ></i> Profile 

<?php  if($this->session->flashdata('profile_update_data')){?>
<div class="custom-alerts alert alert-success fade in alert-1" id="prefix_921267107268"><i class="fa-lg fa fa-check"></i>  <?=$this->session->flashdata('profile_update_data');?></div>

<?php }else?>

<?php  if($this->session->flashdata('profile_not_update_data')){?>
<div class="custom-alerts alert alert-warning fade in alert-2" id="prefix_921267107268"><i class="fa-lg fa fa-warning"></i>
&nbsp;&nbsp; <?=$this->session->flashdata('profile_not_update_data');?> </div>
<?php }?>   


</div>

<?   //print_r($user_details);
if(isset($user_details[0]->name) && !empty($user_details[0]->name)){
$user_name=$user_details[0]->name;}else{$user_name='';}

if(isset($user_details[0]->mobile) && !empty($user_details[0]->mobile)){
$user_mobile=$user_details[0]->mobile;}else{$user_mobile='';}

if(isset($user_details[0]->email) && !empty($user_details[0]->email)){
$user_email=$user_details[0]->email;}else{$user_email='';}

if(isset($user_details[0]->home_address) && !empty($user_details[0]->home_address)){
$user_home_address=$user_details[0]->home_address;}else{$user_home_address='';}

if(isset($user_details[0]->office_address) && !empty($user_details[0]->office_address)){
$user_office_address=$user_details[0]->office_address;}else{$user_office_address='';}

if(isset($user_details[0]->peer_address) && !empty($user_details[0]->peer_address)){
$user_peer_address=$user_details[0]->peer_address;}else{$user_peer_address='';}

?>




 <?php echo form_open('admin/welcome/profileupdate/'.$user_id); ?>
<div class="chat-form">

<div class="chat-form-re">
 <div class="chat-form-re-title">Name</div> 
<div class="chat-form-icon"><i class="icon-user"></i></div>
<div class="chat-form-text"><input type="text" name="username" id="username" value="<?=$user_name;?>" required />
 <span id="form_control_1-error" class="help-block help-block-error error"><?php echo form_error('username'); ?></span>

</div>
</div>


<div class="chat-form-re">
<div class="chat-form-re-title">Mobile</div> 
<div class="chat-form-icon"><i class="icon-mobile-phone"></i></div>
<div class="chat-form-text"><input type="text" name="mobileno" id="mobileno" value="<?=$user_mobile;?>" required />
<span id="form_control_1-error" class="help-block help-block-error error"><?php echo form_error('mobileno'); ?></span>
</div>
</div>



<div class="chat-form-re">
<div class="chat-form-re-title">Email</div> 
<div class="chat-form-icon"><i class="icon-envelope"></i></div>
<div class="chat-form-text"><input type="email" name="emailid" id="emailid" value="<?=$user_email;?>" required  pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$"/>
<span id="form_control_1-error" class="help-block help-block-error error"><?php echo form_error('emailid'); ?></span>
</div>
</div>


<div class="chat-form-re">
<div class="chat-form-re-title">Home Address</div> 
<div class="chat-form-icon"><i class="icon-home"></i></div>
<div class="chat-form-text"><input type="text" name="home_address" id="" value="<?=$user_home_address;?>" required />
<span id="form_control_1-error" class="help-block help-block-error error"><?php echo form_error('home_address'); ?></span>
</div>
</div>



<div class="chat-form-re">
<div class="chat-form-re-title">Work Address</div> 
<div class="chat-form-icon"><i class="icon-map-marker"></i></div>
<div class="chat-form-text"><input type="text" name="work_address" id="work_address" value="<?=$user_office_address;?>" required />
<span id="form_control_1-error" class="help-block help-block-error error"><?php echo form_error('work_address'); ?></span>
</div>
</div>


<div class="chat-form-re">
<div class="chat-form-re-title">Peer Address</div> 
<div class="chat-form-icon"><i class="icon-map-marker"></i></div>
<div class="chat-form-text"><input type="text" name="peer_address" id="peer_address" value="<?=$user_peer_address;?>" required />
<span id="form_control_1-error" class="help-block help-block-error error"><?php echo form_error('peer_address'); ?></span>
</div>
</div>


<div class="clear"></div>
<div class="chat-form-btn">
<input type="submit" value="Update" />
</div>
<div class="clear"></div>

</div>
 <?php echo form_close();?> 
