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
                    </div>
                    
                    


                         			   <div class="row">
                                                    <div class="col-md-12">
                                                        <!-- BEGIN EXAMPLE TABLE PORTLET-->
                                                        <div class="portlet light bordered">
                                                            <div class="portlet-title">
                                         <?php  if($this->session->flashdata('del_data_inactive')){?>
                                           <div class="custom-alerts alert alert-danger fade in" id="prefix_866536685506"><button aria-hidden="true" data-dismiss="alert" class="close" type="button"></button><i class="fa-lg fa fa-times"></i>  <?=$this->session->flashdata('del_data_inactive');?></div>                 
                                        <?php }?>      
                                        
                                        <?php  if($this->session->flashdata('del_data_active')){?>
                                     <div class="custom-alerts alert alert-success fade in" id="prefix_921267107268"><button aria-hidden="true" data-dismiss="alert" class="close" type="button"></button><i class="fa-lg fa fa-check"></i>  <?=$this->session->flashdata('del_data_active');?></div>
                                    
                                     <?php }?>
                                     
                                      <?php  if($this->session->flashdata('not_del_data')){?>
                                       <div class="custom-alerts alert alert-warning fade in" id="prefix_921267107268"><button aria-hidden="true" data-dismiss="alert" class="close" type="button"></button><i class="fa-lg fa fa-warning"></i>
                                       &nbsp;&nbsp; <?=$this->session->flashdata('not_del_data');?> </div>
                                        <?php }?>   
                                     
                                                      
                                         
                                                                <div class="caption font-dark">
                                                                    <i class="font-dark"></i>
                                                                    <span class="caption-subject bold uppercase"> Manage Users</span>
                                                                </div>
                                                                <!--<div class="actions">
                                                                    <div class="btn-group btn-group-devided" data-toggle="buttons">
                                                                        <label class="btn btn-transparent dark btn-outline btn-circle btn-sm active">
                                                                            <input type="radio" name="options" class="toggle" id="option1">Actions</label>
                                                                        <label class="btn btn-transparent dark btn-outline btn-circle btn-sm">
                                                                            <input type="radio" name="options" class="toggle" id="option2">Settings</label>
                                                                    </div>
                                                                </div>-->
                                                            </div>
                                                            <div class="portlet-body">
                                                                <div class="table-toolbar">
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <div class="btn-group">
                         		 <?php //echo anchor('admin/user/add','Add New<i class="fa fa-plus"></i> ',array('class'=>'btn sbold green','id'=>'sample_editable_1_new'));?>
                                                                            
                                                                                <!--<button id="sample_editable_1_new" class="btn sbold green"> Add New
                                                                                    <i class="fa fa-plus"></i>
                                                                                </button>-->
                                                                            </div>
                                                                        </div>
                                                                        <!--<div class="col-md-6">
                                                                            <div class="btn-group pull-right">
                                                                                <button class="btn green  btn-outline dropdown-toggle" data-toggle="dropdown">Tools
                                                                                    <i class="fa fa-angle-down"></i>
                                                                                </button>
                                                                                <ul class="dropdown-menu pull-right">
                                                                                    <li>
                                                                                        <a href="javascript:;">
                                                                                            <i class="fa fa-print"></i> Print </a>
                                                                                    </li>
                                                                                    <li>
                                                                                        <a href="javascript:;">
                                                                                            <i class="fa fa-file-pdf-o"></i> Save as PDF </a>
                                                                                    </li>
                                                                                    <li>
                                                                                        <a href="javascript:;">
                                                                                            <i class="fa fa-file-excel-o"></i> Export to Excel </a>
                                                                                    </li>
                                                                                </ul>
                                                                            </div>
                                                                        </div>-->
                                                                    </div>
                                                                </div>
                                                                <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">
                                                                    <thead>
                                                                        <tr>
                                                                             <th><input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" /> </th>
                                                                             <th> User Name </th>
                                                                             <th> Image </th>
                                                                             <th> Type </th>                                                                            
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
																	<?php
                                                                     
                                                                     if (isset($record) && !empty($record)){
                                                                        $j=1;
                                                                        foreach($record as $row){ ?> 
                                                                    
                                                                    
                                                                        <tr class="odd gradeX">                                                                           
                                                                               <td>  <input type="checkbox" class="checkboxes" value="<?php echo $row->iD;?>" /> </td>
                                                                            <td> <?=$row->userName;?> </td>
                                                                            <td> 
                                                                            <img src="https://graph.facebook.com/<?=$row->images?>/picture?type=square"  />
                                                                             </td>                                                                          
                                                                            <td> <?php if($row->type=='0'){echo 'Friend';}else{echo 'Registered';}?> </td>
                                                                            
                                                                 <?php /*?><td><?php if($row->status=='active'){?><span class="label label-sm label-success"><?=ucfirst($row->status);?> </span><?php }else{?> <span class="label label-sm label-warning"> <?=ucfirst($row->status);?> </span> <?php }?> </td>
                                                                            <td>
                                                                           <!-- <button class="btn blue" type="button"><i class="fa fa-edit"></i>&nbsp;Edit</button>-->
                                                                           <!-- <i class="fa fa-edit"></i>-->
                                                                            
                                                                            <?php echo anchor('admin/user/edit/'.$row->id,'Edit <i class="fa fa-edit"></i> ',array('class'=>'btn blue','id'=>'sample_editable_1_new'));?>
                                                                        <?php if($row->status=='active'){?>   	
                                                                             
                                                                   <?php echo anchor('admin/user/deletetelecaller/'.$row->id,'Deactivate <i class="fa fa-remove"></i> ',array('class'=>'btn yellow','id'=>'sample_editable_1_new','onclick'=>"return confirm('Are you sure you want to Deactivate the record ?')"));?>
                                                                   <?php }else{?>
                                                                   <?php echo anchor('admin/user/deletetelecaller/'.$row->id,'Activate <i class="fa fa-remove"></i> ',array('class'=>'btn green','id'=>'sample_editable_1_new','onclick'=>"return confirm('Are you sure you want to Activate the record ?')"));?>
                                                                   
                                                                   <?php }?>
                                                                             
                                                                             
                                                                       </td>
                                                                               <?php */?>
                                                                           
                                                                        </tr>
                                                                        <?php }}?>
                                                                        
                                                                       
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        <!-- END EXAMPLE TABLE PORTLET-->
                                                    </div>
                                                </div>
                    
                    
  				 </div>
                <!-- END CONTENT BODY -->
            </div>                  
                    
                    
            </div>
        <!-- END CONTAINER -->        
                    