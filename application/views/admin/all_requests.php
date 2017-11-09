
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

 <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/chat.css');?>" />
 <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/font-awesome.css');?>" />
  <script src="<?php echo base_url('assets/js/all_request.js');?>" type="text/javascript"></script>

<script type="text/javascript">

$(document).ready(function() {

	//Default Action
	$(".tab_content").hide(); //Hide all content
	$("ul.tabs li:first").addClass("active").show(); //Activate first tab
	$(".tab_content:first").show(); //Show first tab content
	
	//On Click Event
	$("ul.tabs li").click(function() {
		$("ul.tabs li").removeClass("active"); //Remove any "active" class
		$(this).addClass("active"); //Add "active" class to selected tab
		$(".tab_content").hide(); //Hide all tab content
		var activeTab = $(this).find("a").attr("href"); //Find the rel attribute value to identify the active tab + content
		$(activeTab).fadeIn(); //Fade in the active content
		return false;
	});

});
</script>

<style>
.chat-popup-header { border-radius:0px; -webkit-border-radius:0px; -moz-border-radius:0px;-o-border-radius:0px; -ms-border-radius:0px; -khtml-border-radius:0px; }

.mm-re-2 { width:70%; float:left; }
.mm-re-3 { width:25%; float:right; }
.mm-re-3 input[type="submit"] {  width:100% !important;  }
.alert-1 { font-size:12px; padding:10px; background: #D6FEC5; color:#009900; border:1px #009900 solid; margin:10px 0px; }
.alert-2 { font-size:12px; padding:10px; background: #FEC2C4 ; color:red; border:1px red solid; margin:10px 0px; }

</style>

<body>
<div class="chat-popup-header">
<i class="icon-calendar" ></i> Requests

<?php /*?><?php 
if(isset($reques_data) && !empty($reques_data)){
?>
<div class="custom-alerts alert alert-success fade in alert-1" id="prefix_921267107268">
   
     <i class="icon-ok"></i> 
        <?=$reques_data;?></div>  
<? }?><?php */?>


<?php  if($this->session->flashdata('reques_update_data')){?>
<div class="custom-alerts alert alert-success fade in alert-1" id="prefix_921267107268"><i class="fa-lg fa fa-check"></i>  <?=$this->session->flashdata('reques_update_data');?></div>

<?php }else?>

<?php  if($this->session->flashdata('reques_not_update_data')){?>
<div class="custom-alerts alert alert-warning fade in alert-2" id="prefix_921267107268"><i class="fa-lg fa fa-warning"></i>
&nbsp;&nbsp; <?=$this->session->flashdata('reques_not_update_data');?> </div>
<?php }?>   

</div>

<div style="overflow:hidden">


<div class="tabs-left">

<ul class="tabs">


	 <?
	 	//print_r($all_request);
        if(isset($all_request) && !empty($all_request)){
		$tb=1;
		foreach($all_request as $request){
		//print_r($request);
		$ur_id[]=$request->ur_id;
		$statusid[]=$request->status_id;
		?>

      <!--  <li class="active">-->
          <li>
       
        
        <a href="#tab<?=$tb;?>">
         <div class="tabs-left-data">
          <div class="title"><?=$request->title;?></div>
          <div class="date"><?=$this->requestmodel->GetTimeDiff($request->date_time);?></div>
         </div>
         
         
          <div class="tabs-right-data">
          <div class="title"><?=$request->status;?></div>
          <div class="row-icon"><i class="icon-chevron-right"></i></div>
         </div>
         
        
        <div class="clear"></div>
        </a>
        
        </li>
        
        <? 
		$messageid[$tb]=$request->message_id;
		//$mesgdata[]=$this->requestmodel->viewMessageDetails($request->message_id,$request->uid);
		?>
        
       
        
        <? $tb++;}
		
	?>
        
    </ul>
  </div>
  
  
  <div class="tabs-right">  
    
    
    
    
    <div class="tabs_box">
   
    <div class="tab_container">
   <? 
	for($i=1;$i<$tb;$i++)
	{ 
	//print_r($ur_id);
	
	/*echo $statusid[$i-1];
	echo '<br/>';
	 echo $ur_id[$i-1];
	echo '<br/>';*/
	?>
     
  <? //echo $statusid[$i].'--'.$ur_id[$i].'--'.$i.'---'.$tb; ?>
  				<div style="display: block;" id="tab<?=$i;?>" class="tab_content">
       
        
      		<div class="chat-form">

            <div class="chat-form-re" style="margin-bottom:0px;">
            
             <div class="chat-form-re-title">Select Status  <? //print_r($messageid);print_r($statuslist); ?></div> 
             
             <div class="clear"></div>
             <div class="mm-re-2">
            <div class="chat-form-icon"><i class="icon-list"></i></div>
             <?php echo form_open('admin/welcome/allrequests/'.$userid.'/'.$msgid,array('name' => 'reuestupdate','method'=>'post')); ?>
			
			 
             
            <div class="chat-form-text" >
            <select style="padding-left:0px;" name="status<?=$i;?>" id="status<?=$i;?>" required >
            <option value="">Select Status</option>
			<? foreach($statuslist as $status){?>
             <option value="<?=$status->ms_id;?>"<? if($statusid[$i-1]==$status->ms_id){echo 'selected="selected"';}?> ><?=$status->status;?></option>
             <? }?>

            
            </select></div>
            
            
            </div>
           
            <div class="mm-re-3">
             <input type="hidden" name="selectid" value="<?=$i?>"  />
            <input type="hidden" name="requedid" value="<?=$ur_id[$i-1]?>"  />
            <input type="submit" value="Update" name="updatereq" />
            </div>
            
            <div class="clear"></div>
            </div>
            <?php echo form_close();?> 
            
            <div class="clear"></div>
            
            
            </div>
                    
                    
                    
                    
                      <!--------------- data ---------------------->
             <div class="chat-data" style="height:auto; overflow:visible"> 
             
             
             
              <?
		  empty($mesgdata);
		  $mesgdata=$this->requestmodel->viewMessageDetails($messageid[$i],$request->uid);
		  $co=count($mesgdata);
          for($j=0;$j<$co;$j++)
          {
		  	  //print '==>'.$j;
			  if($mesgdata[$j]->sent_from==0)
			  { //print 'sent from - 0>'.$j;
			  ?>
               <!-- 1 -->
                  <div class="chat-chat-1">
                   <div class="chat-chat-data">
                  <?=$mesgdata[$j]->message;?>
                  
                   </div>
                    <div class="chat-chat-time"><i class="icon-time"></i> <?=$this->requestmodel->GetTimeDiff($mesgdata[$j]->post_time);?></div>
                  </div>
                  <!-- 1 / -->
			  <? }
			  
			  else{ //print 'sent from - 1>'.$j; ?>
                   <!-- 2 -->
                  <div class="chat-chat-2">
                   <div class="chat-chat-data">
                   <?=$mesgdata[$j]->message;?>
                   </div>
                    <div class="chat-chat-time"><i class="icon-time"></i> <?=$this->requestmodel->GetTimeDiff($mesgdata[$j]->post_time);?> </div>
                  </div>
                   <!-- 2 / -->
                 
			  <? 
			  }
			  
			  }?>
             
                       
              
              </div>
              <!--------------- data / ------------------->
                     
                </div>
        
		
		<? } }?> 
   
 </div>


 </div>

</div>
<div class="clear"></div>
</body>

</html>
