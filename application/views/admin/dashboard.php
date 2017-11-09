  <!--  <link rel="stylesheet" type="text/css" href="http://medical.awn.pw/awn-admin/assets/plugins/fonts-yes/css/font-awesome.css" />-->
    
    <link rel="stylesheet" href="<?php echo base_url('assets/css/scroll.css');?>" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/chat.css');?>" />
    <script type="text/javascript" src="<?php echo base_url('assets/js/jquery-ui.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.ui.touch-punch.min.js');?>"></script>
  
  
    
    <style>
    .m-re { width:25% !important; float:left;  }
	@media(max-width:769px) {
	.m-re { width:100% !important; float:none;  margin-bottom:10px;
	
	}
	.m-re {}
    </style>
        <!-- BEGIN HEADER & CONTENT DIVIDER -->
        <div class="clearfix"> </div>
        <!-- END HEADER & CONTENT DIVIDER -->
        <!-- BEGIN CONTAINER -->
        <div class="page-container">


            <!-- BEGIN SIDEBAR -->
          <?php $this->load->view('admin/includes/left');
		  
		  ?>            
            <!-- END SIDEBAR -->

            <!-- BEGIN CONTENT -->
            <div class="page-content-wrapper">
                <!-- BEGIN CONTENT BODY -->
                <div class="page-content">
                    <!-- BEGIN PAGE HEAD-->
                    <div class="page-head">
                        <!-- BEGIN PAGE TITLE -->
                        
                        <!-- END PAGE TITLE -->
                    </div>
                    <!-- END PAGE HEAD-->
                    <!-- BEGIN PAGE BREADCRUMB -->
                   
                    <!-- END PAGE BREADCRUMB -->
                    <!-- BEGIN PAGE BASE CONTENT -->
                    
                    <div class="row">
                        
                        <div class="col-md-12 col-sm-12">
                            <div class="portlet light bordered">
                                <div class="portlet-title">
                                    <div class="caption font-green">
                                        <span class="caption-subject bold uppercase">User Name : <?php echo $this->session->userdata('name');?></span>
                                     </div>
                                    
                                </div>
                                <div class="portlet-body" >
                                    <div id="dashboard_amchart_4" class="CSSAnimationChart" style="height:auto;"> 
                                    <div class="clear"></div>
                                    <div id="container1" style="float:left;">



 
 					 <div class="row widget-row">
                        <div class="col-md-4">
                            <!-- BEGIN WIDGET THUMB -->
                            <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                                <h4 class="widget-thumb-heading">ColorBook Categories</h4>
                                <div class="widget-thumb-wrap">
                                    <i class="widget-thumb-icon bg-green icon-list"></i>
                                    <div class="widget-thumb-body">
                                        <span class="widget-thumb-subtitle">Total</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="7,644"><?=$this->mastersmodel->viewTotalColorBookCat();?></span>
                                    </div>
                                </div>
                            </div>
                            <!-- END WIDGET THUMB -->
                        </div>
                        <div class="col-md-4">
                            <!-- BEGIN WIDGET THUMB -->
                            <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                                <h4 class="widget-thumb-heading">ColorBooks</h4>
                                <div class="widget-thumb-wrap">
                                    <i class="widget-thumb-icon bg-red icon-notebook"></i>
                                    <div class="widget-thumb-body">
                                        <span class="widget-thumb-subtitle">Total</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="1,293"><?=$this->mastersmodel->viewTotalColorBook();?></span>
                                    </div>
                                </div>
                            </div>
                            <!-- END WIDGET THUMB -->
                        </div>
                        <div class="col-md-4">
                            <!-- BEGIN WIDGET THUMB -->
                            <div class="widget-thumb widget-bg-color-white text-uppercase margin-bottom-20 bordered">
                                <h4 class="widget-thumb-heading">Users</h4>
                                <div class="widget-thumb-wrap">
                                    <i class="widget-thumb-icon bg-purple icon-user"></i>
                                    <div class="widget-thumb-body">
                                        <span class="widget-thumb-subtitle">Total</span>
                                        <span class="widget-thumb-body-stat" data-counter="counterup" data-value="815"><?=$this->mastersmodel->viewTotalUser();?></span>
                                    </div>
                                </div>
                            </div>
                            <!-- END WIDGET THUMB -->
                        </div>
                        
                    </div>
                    
                    



									</div>


<div class="clear"></div>



<div class="clear"></div>
                                    
                                    
                                    
                                    
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                    
                    
                    <!-- END PAGE BASE CONTENT -->
                </div>
                <!-- END CONTENT BODY -->
            </div>
            <!-- END CONTENT -->
            <!-- BEGIN QUICK SIDEBAR -->
            
           
            <!-- END QUICK SIDEBAR -->
        </div>
        <!-- END CONTAINER -->
        
        
     	<script src="<?php echo base_url('assets/js/scroll.js');?>"></script>
	
	<script>
		(function($){
			$(window).load(function(){
				
				$(".chat-data").mCustomScrollbar({
					theme:"light-2",
					scrollButtons:{
						enable:true
					},
					callbacks:{
						onTotalScroll:function(){ addContent(this) },
						onTotalScrollOffset:100,
						alwaysTriggerOffsets:false
					}
				});
				
				
				
			});
		})(jQuery);
	</script>


