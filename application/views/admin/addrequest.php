<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/font-awesome.css');?>" />
 <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/chat.css');?>" />
 

<style>
.chat-popup-header { border-radius:0px; -webkit-border-radius:0px; -moz-border-radius:0px; -o-border-radius:0px; -ms-border-radius:0px;-khtml-border-radius:0px; }




.alert-1 { font-size:12px; padding:10px; background: #D6FEC5; color:#009900; border:1px #009900 solid; margin:10px 0px; }
.alert-2 { font-size:12px; padding:10px; background: #FEC2C4 ; color:red; border:1px red solid; margin:10px 0px; }

</style>



  

<div style="margin:10px;">
<div class="chat-popup-header">


<a href="<?=FULLURLINC;?>user-chat.php?chat_box_id=<?=$boxid;?>" id="closewin" class="login-right-back"  ><i class="icon-arrow-left" style="color:#FFFFFF"></i></a>


<!--<input type="button" value="Back"  class="login-right-back" id="closewin" />-->request


</div>

<?php // if($this->session->flashdata('reques_data')){
if(isset($add_data) && !empty($add_data)){
?>

<div class="custom-alerts alert alert-success fade in alert-1" id="prefix_921267107268">
   
     <i class="icon-ok"></i> 
        <?=$add_data;?></div>  
<? }?>

 <?php echo form_open_multipart('admin/welcome/addrequest', array('class' => 'form_sample_3', 'name' => 'schools_add','method'=>'post')); ?>
 

<div class="chat-form">

<div class="chat-form-re">
 <div class="chat-form-re-title">Request Title</div> 
<div class="chat-form-icon"><i class="icon-align-left"></i></div>



<div class="chat-form-text">

<input type="text" name="request_title" id="request_title" value="" required  /></div>
<span id="form_control_1-error" class="help-block help-block-error error"><?php echo form_error('request_title'); ?></span>
</div>
<input type="hidden" name="messageid" value="<?=$msgid;?>" />
<input type="hidden" name="userid" value="<?=$userid;?>" />
<input type="hidden" name="boxid" value="<?=$boxid;?>" />

<div class="chat-form-re">
<div class="chat-form-re-title">Status</div> 
<div class="chat-form-icon"><i class="icon-align-justify"></i></div>
<div class="chat-form-text">


<select name="request_status" id="request_status" required>
<option value="">Select Status</option>
<? foreach($statuslist as $status){?>
 <option value="<?=$status->ms_id;?>"><?=$status->status;?></option>
 <? }?>
 </select>
</div>
<span id="form_control_1-error" class="help-block help-block-error error"><?php echo form_error('request_status'); ?></span>
</div>

<div class="clear"></div>
<div class="chat-form-btn">
<input type="submit" value="Submit" />
</div>
<div class="clear"></div>

</div>
</div>
   <?php echo form_close();?> 
	