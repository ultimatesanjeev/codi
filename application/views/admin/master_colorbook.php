		<script type="text/javascript" src="<?php echo base_url('assets/js/jquery-ui-1.8.1.custom.min.js');?>"></script> 
        <link href="<?php echo base_url('assets/css/fileinput.css');?>" media="all" rel="stylesheet" type="text/css" />
        <script src="<?php echo base_url('assets/js/fileinput2.js');?>" type="text/javascript"></script>
        
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
                            <i class="fa fa-circle"></i>
                        </li>
                        <li>
                            <span class="active">Manage Color Book </span>
                        </li>
                    </ul> 
                    </div>
                    <? if($this->session->userdata('login_type')==1){?>
                      <div class="col-md-6 m-right"> 
                       <?php echo anchor('admin/masters/viewcolorbook','<i class="fa fa-eye">&nbsp;</i>View ',array('class'=>'btn btn-sm green-jungle dropdown-toggle m-btn-right'));?>
                        <!--<button type="button"  class="btn btn-sm green-jungle dropdown-toggle m-btn-right" data-toggle="dropdown" aria-expanded="false">
                          <i class="fa fa-eye">&nbsp;</i>View                                                           
                        </button>-->
                      </div>
                      <? }?>
                      
                   <div class="clearfix"></div>
                    </div>
                    
                    
                    
                    <div class="row">
                        <div class="col-md-12">
                            <!-- BEGIN VALIDATION STATES-->
                            <div class="portlet light portlet-fit portlet-form bordered">
                                <div class="portlet-title">
                                   
                                     <?php  if($this->session->flashdata('add_data')){?>
                                     <div class="custom-alerts alert alert-success fade in" id="prefix_921267107268"><button aria-hidden="true" data-dismiss="alert" class="close" type="button"></button><i class="fa-lg fa fa-check"></i> <?=$this->session->flashdata('add_data');?> </div>
                                    
                                     <?php }?>
                                     
                                     
                                     
                                        <?php  if($this->session->flashdata('not_add_data')){?>
                                       <div class="custom-alerts alert alert-warning fade in" id="prefix_921267107268"><button aria-hidden="true" data-dismiss="alert" class="close" type="button"></button><i class="fa-lg fa fa-warning"></i>
                                       &nbsp;&nbsp; <?=$this->session->flashdata('not_add_data');?> </div>
                                        <?php }?>   
                                     
                                     
                                   
                                 
                                     
                                     
                                      <?php  if($this->session->flashdata('update_data')){?>
                                     <div class="custom-alerts alert alert-success fade in" id="prefix_921267107268"><button aria-hidden="true" data-dismiss="alert" class="close" type="button"></button><i class="fa-lg fa fa-check"></i>
                                       <?=$this->session->flashdata('update_data');?></div>
                                     <?php }?>
                                     
                                       <?php  if($this->session->flashdata('not_update_data')){?>
                                       <div class="custom-alerts alert alert-warning fade in" id="prefix_921267107268"><button aria-hidden="true" data-dismiss="alert" class="close" type="button"></button><i class="fa-lg fa fa-warning"></i>
                                       &nbsp;&nbsp; <?=$this->session->flashdata('not_update_data');?> </div>
                                        <?php }?>   
                                     
                                  <?php  if($this->session->flashdata('del_data')){?>
                                     <div class="custom-alerts alert alert-danger fade in" id="prefix_921267107268"><button aria-hidden="true" data-dismiss="alert" class="close" type="button"></button><i class="fa-lg fa fa-remove"></i>
                                       <?=$this->session->flashdata('del_data');?></div>
                                     <?php }?>
                                    <div class="caption">
                                        <i class=" icon-layers font-red"></i>
                                        <span class="caption-subject font-red sbold uppercase"><?php if(isset($record) && !empty($record)){echo 'Edit';}else{echo 'Add';}?> Color Book  </span>                                                             
                                    </div>
                                    
                                
                                    
                                </div>
                                
                                
                              <!--  <div class="portlet-body">-->
                              

									 
                                  
                    <!--<form action="#" id="form_sample_1">-->
                    
                  <?php if(isset($record) && !empty($record)){?>                              
                  <?php echo form_open_multipart('admin/masters/editcolorbook/'.$record[0]->cbID, array('class' => 'form_sample_3', 'name' => 'schools_add','method'=>'post')); ?>
                      <?php }else {?>
                   <?php echo form_open_multipart('admin/masters/addcolorbook', array('class' => 'form_sample_3', 'name' => 'user_add','method'=>'post')); ?>                               
                   <? } ?>                                 
                             <div class="form-body">                                                    
                                                    
                             		<div class="row">
                                    				<div class="form-group form-md-line-input form-md-floating-label col-md-6 <?php if (form_error('colorbook_cat')!=''){echo 'has-error';} ?>">
                                                            <div class="input-group">
                                                            
                                                                <select name="colorbook_cat" id="colorbook_cat"  class="form-control" >
                                                                <option value="" ></option>
                                                                <? if(isset($colorbool_cat_record) && !empty($colorbool_cat_record)){
																	foreach($colorbool_cat_record as $colorbool_cat){?>																	
                                                                <option value="<?=$colorbool_cat->mccID;?>" <? if($record[0]->mccID==$colorbool_cat->mccID){echo 'selected="selected"';}?>><?=$colorbool_cat->catName;?></option>
                                                                <? }} ?>
                                                                </select>
                                                                 <span id="form_control_1-error" class="help-block help-block-error error"><?php echo form_error('colorbook_cat'); ?></span>
                                          					  <label for="form_control_1">Color Book Cat</label>                                                            
                                          					  <span class="input-group-addon"><i class=""></i></span>
                                                        </div>
                                                    </div>
                                                            
                                                            
                                    
                                    
                                    
                                         			<div class="form-group form-md-line-input form-md-floating-label col-md-6 <?php if (form_error('cat_name')!=''){echo 'has-error';} ?>">
                                                         <div class="input-group">
                                                            <input type="text" class="form-control" name="cat_name" id="form_control_1" required value="<?php echo $record[0]->name;?>">
                                                           <span id="form_control_1-error" class="help-block help-block-error error"><?php echo form_error('cat_name'); ?></span>
                                                            <label class="control-label" for="form_control_1">Name</label>
                                                             <span class="input-group-addon"><i class=""></i></span>
                                                        	</div>                                       
                                                         </div>
                                          				             
                                                	 </div>
                                                        
                                                   <div class="row">
                                                        <div class="form-group form-md-line-input form-md-floating-label col-md-6 <?php if (form_error('sort_order')!=''){echo 'has-error';} ?>">
                                                            <div class="input-group">
                                                                <input type="text" class="form-control" name="sort_order" value="<?php echo $record[0]->sortNumber;?>">
                                                                 <span id="form_control_1-error" class="help-block help-block-error error"><?php echo form_error('sort_order'); ?></span>
                                                                <label for="form_control_1">Sort Number</label>
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-sort"></i>
                                                                </span>
                                                                
                                                            </div>
                                                        </div>  
                                                        
                                                        
                                                        <div class="form-group form-md-line-input form-md-floating-label col-md-6 <?php if (form_error('is_paid')!=''){echo 'has-error';} ?>">
                                                            <div class="input-group">
                                                            
                                                                <select name="is_paid" id="is_paid"  class="form-control" >
                                                                <option value="" ></option>                                                                																
                                                                <option value="0" <? if($record[0]->isPaid=='0'){echo 'selected="selected"';}?>>False</option>
                                                                <option value="1" <? if($record[0]->isPaid=='1'){echo 'selected="selected"';}?>>True</option>
                                                               
                                                                </select>
                                                                 <span id="form_control_1-error" class="help-block help-block-error error"><?php echo form_error('is_paid'); ?></span>
                                          					  <label for="form_control_1">Is Paid</label>                                                            
                                          					  <span class="input-group-addon"><i class="fa fa-sort"></i></span>
                                                        </div>
                                                    </div>
                                                        
                                                    </div>
                                                    
                                                    
                                                    <div class="row">
                                                          
                                                        <div class="form-group form-md-line-input form-md-floating-label col-md-12 <?php if (form_error('cat_img')!=''){echo 'has-error';} ?>">
                                             
                                                          <div class="input-group">
                                                           <label class="control-label">Select File</label>
                                                            <input id="cat_img" type="file" class="file-loading" multiple name="cat_img[]" value="">
                                                             <input type="hidden" class="form-control" name="old_img" id="old_img" value="<?php  if($record[0]->image){echo $record[0]->image;}?>"  >    
                                                             <?php if (form_error('cat_img')!=''){?>
                                                        <div class="alert alert-danger error"><?php echo form_error('cat_img'); ?></div>
                                                        <? } ?>
                                                             
                                                         <?php if(isset($record) && !empty($record)){ 
														 
														$colorbookimaes=$this->mastersmodel->viewColorBookImages($record[0]->cbID);
														if(isset($colorbookimaes) && !empty($colorbookimaes)){
															?>												
                                                         
                                                          <div class="file-preview">
                                                              <!--<div class="close fileinput-remove">×</div> -->
                                                            
                                                            <div class="file-drop-disabled">
                                                          
                                                            <div class="file-preview-thumbnails">    
                                                              <? foreach($colorbookimaes as $colorbookimg){?>      
                                                                                                               
                                     						<div data-fileindex="0" id="preview-1468221349749-0" class="file-preview-frame">                                                         
                                                           <img style="width:auto;height:160px;" alt="<?=$colorbookimg->image;?>" title="<?=$colorbookimg->image;?>" class="file-preview-image" src="<?php echo TIMTHUMB;?>src=<?=UPLOADCOLORBOOKIMG.$colorbookimg->image;?>&w=150&h=150&zc=1&f=0|0|0|0|0">
                                                           <div class="file-thumbnail-footer">
                                                            <div title="<?=$colorbookimg->sortNumber;?>" class="file-footer-caption"><h5>Sort-order : <?=$colorbookimg->sortNumber;?></h5></div>
                                                             <?php echo anchor('admin/masters/deletecolorbookimages/'.$colorbookimg->cbiID.'/'.$record[0]->cbID,'Delete <i class="fa fa-remove"></i> ',array('class'=>'btn red','id'=>'sample_editable_1_new','onclick'=>"return confirm('Are you sure you want to Delete the record ?')"));?>
                                                       		 </div>
                                                       		 </div>
                                                             <? } ?>
                                                        </div>                                                        
                                                       		 
                                                            <div class="clearfix"></div>  
                                                              <div class="file-preview-status text-center text-success"></div>
                                                            <div class="kv-fileinput-error file-error-message" style="display: none;"></div>
                                                            </div>
                                                        </div>
                                                        <? }} ?>
                                                             
                                                             
                                                             
                                                             
                                                            </div>
                                                        </div>
                                                        
                                                        
                                                        
                                                        
                                                        
                                                         
                                                        
                                                    </div>
            
                                                    </div>   
                                                    
                                                    <?php if(isset($record) && !empty($record)){?>    
                                                    <div class="form-actions">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <button type="submit" class="btn dark">Update</button>
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                  <? }else{?>  
                                                    <div class="form-actions">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <button type="submit" class="btn dark">Save</button>
                                                                <button type="reset" class="btn default">Reset</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <? } ?>
                                                    
                                                    <?php echo form_close();?> 
                                                <!--</form>-->
                                   			
                                   
  															<script>
                                                            $(document).on('ready', function() {
                                                                $("#cat_img").fileinput({
                                                                    browseClass: "btn btn-primary btn-block",
                                                                    showCaption: false,
                                                                    showRemove: false,
                                                                    showUpload: false
                                                                });
                                                            });
                                                            </script>

        
