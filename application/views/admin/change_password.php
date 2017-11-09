  <script type="text/javascript" src="<?php echo base_url('assets/js/jquery-ui-1.8.1.custom.min.js');?>"></script>

  <script type="application/javascript">
  
  var password = document.getElementById("password")
  if(password!=''){
  , confirm_password = document.getElementById("confirm_password");

function validatePassword(){
  if(password.value != confirm_password.value) {
    confirm_password.setCustomValidity("Passwords Don't Match");
  } else {
    confirm_password.setCustomValidity('');
  }
}

password.onchange = validatePassword;
confirm_password.onkeyup = validatePassword;
  }
  
  </script>
  
  
        <!-- END HEADER -->
        <!-- BEGIN HEADER & CONTENT DIVIDER -->
        <div class="clearfix"> </div>
        <!-- END HEADER & CONTENT DIVIDER -->
        <!-- BEGIN CONTAINER -->
        <div class="page-container">
            <!-- BEGIN SIDEBAR -->
             <?php $this->load->view('admin/includes/left'); ?>   
            <!-- END SIDEBAR -->
            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEAD-->
                    <div class="page-head">
                        <!-- BEGIN PAGE TITLE -->
                       <!-- <div class="page-title">
                            <h1>Materil Design Form Validation
                                <small>material design form validation</small>
                            </h1>
                        </div>-->
                        <!-- END PAGE TITLE -->
                        <!-- BEGIN PAGE TOOLBAR -->
                        <?php //$this->load->view('admin/includes/toolbar');
						?>
                        <!-- END PAGE TOOLBAR -->
                        
                        
                    </div>
                    <!-- END PAGE HEAD-->
                    <!-- BEGIN PAGE BREADCRUMB -->
                    <!--<ul class="page-breadcrumb breadcrumb">
                        <li>
                            <a href="index.html">Home</a>
                            <i class="fa fa-circle"></i>
                        </li>
                        <li>
                            <span class="active">SchoolForm</span>
                        </li>
                    </ul>-->
                    <!-- END PAGE BREADCRUMB -->
                    <!-- BEGIN PAGE BASE CONTENT -->
                    
                    
                    
                    
                    
                                          
                                                    
                                          
                    
                    
                    
                    <div class="m-heading-1 border-green m-bordered">
                        <!--<h3>jQuery Validation Plugin</h3>-->
                        <div class="col-md-6 m-left"> 
                       <ul class="page-breadcrumb breadcrumb">
                        <li>
                         <?php echo anchor('admin/welcome/dashboard','<i class="icon-home"></i> <span class="title">Home</span>
                                <span class="selected"></span>');?>
                            <!--<a href="index.html">Home</a>-->
                            <i class="fa fa-circle"></i>
                        </li>
                        <li>
                            <span class="active">Level</span>
                        </li>
                    </ul> 
                    </div>
                    
                      <div class="col-md-6 m-right"> 
                       
                        <!--<button type="button"  class="btn btn-sm green-jungle dropdown-toggle m-btn-right" data-toggle="dropdown" aria-expanded="false">
                          <i class="fa fa-eye">&nbsp;</i>View                                                           
                        </button>-->
                      </div>
                   <div class="clearfix"></div>
                    </div>
                    
                    
                    
                    <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN VALIDATION STATES-->
                            <div class="portlet light portlet-fit portlet-form bordered">
                                <div class="portlet-title">
                                    <!--<div class="caption">
                                        <i class=" icon-layers font-red"></i>
                                        <span class="caption-subject font-red sbold uppercase">Floating Label Validation</span>                                                             
                                    </div>-->
                                   
                              
                                  
                                  
                                   
                                     <?php  if($this->session->flashdata('change_data')){?>
                                     <div class="custom-alerts alert alert-success fade in" id="prefix_921267107268"><button aria-hidden="true" data-dismiss="alert" class="close" type="button"></button><i class="fa-lg fa fa-check"></i>  <?=$this->session->flashdata('change_data');?></div>
                                    
                                     <?php }?> 
                                     
                                     
                                     <?php  if($this->session->flashdata('not_change_data')){?>
                                       <div class="custom-alerts alert alert-warning fade in" id="prefix_921267107268"><button aria-hidden="true" data-dismiss="alert" class="close" type="button"></button><i class="fa-lg fa fa-warning"></i>
                                       &nbsp;&nbsp; <?=$this->session->flashdata('not_change_data');?> </div>
                                        <?php }?>   
                                  
                                  
                                  
                                  
                                  
                                 
                                    <div class="caption">
                                        <i class=" icon-layers font-red"></i>
                                        <span class="caption-subject font-red sbold uppercase">Change Password</span>                                                             
                                    </div>
                                   
                                    
                                    
                                    
                                </div>
                                
                                
                                <div class="portlet-body">
                                     
                                    
                                    <!-- BEGIN FORM-->
                                   
                                    <!--<form action="#" id="form_sample_1">-->
                                 	 <?php echo form_open('admin/welcome/changepassword/', array('class' => 'form_sample_3', 'name' => 'schools_add','method'=>'post')); ?>
                                       
                                      
                                      
                                      
             <div class="form-body">
                                        
                        <div class="row">
                        
                 						<div class="form-group form-md-line-input form-md-floating-label col-md-6">
                                                  <div class="input-group">
                                             <input type="password" class="form-control" name="old_password" id="old_password" required value="<?=$record[0]->lavel_name;?>"  >
                                     <span id="form_control_1-error" class="help-block help-block-error error"><?php echo form_error('old_password'); ?></span>
                                                    <label class="control-label" for="form_control_1">Old Password</label>
                                                     <span class="input-group-addon"><i class=""></i></span>                                                     
                                                    </div>
                                                </div>
                                                  
                                                
                                        <div class="form-group form-md-line-input form-md-floating-label col-md-6">
                                                                                          <div class="input-group">
                                                                                     <input type="password" class="form-control" name="new_password" id="new_password" required value=""  >
                                                                             <span id="form_control_1-error" class="help-block help-block-error error"><?php echo form_error('password'); ?></span>
                                                                                            <label class="control-label" for="form_control_1">New Password</label>
                                                                                             <span class="input-group-addon"><i class=""></i></span>                                                     
                                                                                            </div>
                                                                                        </div> 
                                                                                        
                                                                                                               
                                     									<!--   <div class="form-group form-md-line-input form-md-floating-label col-md-4">
                                                                                          <div class="input-group">
                                                                                     <input type="password" class="form-control" name="confirm_password" id="confirm_password" required value=""  >
                                                                             <span id="form_control_1-error" class="help-block help-block-error error"><?php //echo form_error('confirm_password'); ?></span>
                                                                                            <label class="control-label" for="form_control_1">Re-Password</label>
                                                                                             <span class="input-group-addon"><i class=""></i></span>                                                     
                                                                                            </div>
                                                                                        </div>   -->
                                                                                        
                                                                                        
                                                                                                                                     
                                                
                                                
                            		</div>
                            
            </div>    
                                            
                                         
                                            
                                            	<div class="form-actions">
                                            <div class="row">
                                                <div class="col-md-12">
                                                   <!-- <button type="submit" class="btn dark">Update</button>-->
                                                   <button type="submit" class="btn dark pure-button pure-button-primary">Change Password</button>
                                                  
                                                </div>
                                            </div>
                                        </div>
                                            
                                         
                                        
                                        <?php echo form_close();?> 
                                    <!--</form>-->
                                    <!-- END FORM-->
                                  
                                </div>
                            </div>
                            <!-- END VALIDATION STATES-->
                        </div>
                    </div>
                    <!-- END PAGE BASE CONTENT -->
                </div>
                <!-- END CONTENT BODY -->
            </div>
        
			
        </div>
        <!-- END CONTAINER -->
