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
                                                                    <span class="caption-subject bold uppercase"> Manage Color Book</span>
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
                         		 <?php echo anchor('admin/masters/addcolorbook','Add New<i class="fa fa-plus"></i> ',array('class'=>'btn sbold green','id'=>'sample_editable_1_new'));?>
                                                                            
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
                                                                             <th> Color Book Cat Name </th>
                                                                             <th> Name </th>
                                                                              <th> Sort Order </th> 
                                                                               <th> Is Paid </th>
                                                                               
                                                                               <th>View Images</th>
                                                                                
                                                                               <th> Action </th>                                                                            
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
																	<?php
                                                                    
                                                                     if (isset($record) && !empty($record)){
                                                                        $j=1;
                                                                        foreach($record as $row){ ?> 
                                                                    
                                                                    
                                                                        <tr class="odd gradeX">                                                                           
                                                                               <td>  <input type="checkbox" class="checkboxes" value="<?php echo $row->cbID;?>" /> </td>
                                                                               <td> <?=$this->mastersmodel->viewColorBookCatName($row->mccID);?> </td>
                                                                            <td> <?=$row->name;?> </td>                                                                                                                                                  
                                                                            <td> <?=$row->sortNumber;?> </td>
                                                                            <td> <? if(!empty($row->isPaid)){echo 'True';}else{echo 'False';}?> </td>
                                                                          
<td>
<? $colorbookimaes=$this->mastersmodel->viewColorBookImages($row->cbID);
if(isset($colorbookimaes) && !empty($colorbookimaes)){

?>
<!-- Trigger the modal with a button -->
<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#myModal<?=$j;?>">View Images</button>
<!-- Modal -->
<div id="myModal<?=$j;?>" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><?=$row->name;?></h4>
      </div>
      <div class="modal-body">
     
      <? 
	  foreach($colorbookimaes as $colorbookimg){
	  ?>
       <div class="row" style="border-bottom:1px #CCCCCC solid; margin-bottom:10px; padding-bottom:10px;">
       
       
       
       <div class="col-sm-4">
        <img src="<?php echo TIMTHUMB;?>src=<?=UPLOADCOLORBOOKIMG.$colorbookimg->image;?>&w=100&h=100&zc=1&f=0|0|0|0|0" >
      </div>
      
      
         <div class="col-sm-8">      
        <h6>Sort Number :<?=$colorbookimg->sortNumber;?></h6>
        </div>
        
        <div class="clearfix"></div>
        
        </div>
        <? } ?>
        
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>   
                                                                        
 <? } ?>                                                                       
</td> 
                                                                          
                                                                          
                                                                            <td>                                                                         
                                                                            <?php echo anchor('admin/masters/editcolorbook/'.$row->cbID,'Edit <i class="fa fa-edit"></i> ',array('class'=>'btn blue','id'=>'sample_editable_1_new'));?>
                                                                       
                                                                             
                                                                   			<?php echo anchor('admin/masters/deletecolorbook/'.$row->cbID,'Delete <i class="fa fa-remove"></i> ',array('class'=>'btn red','id'=>'sample_editable_1_new','onclick'=>"return confirm('Are you sure you want to Delete the record ?')"));?>
                                                                  
                                                                             
                                                                             
                                                                       </td>
                                                                               
                                                                         
                                                                        </tr>
                                                                        <?php $j++;}}?>
                                                                        
                                                                       
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
  
                