<?php $classname=$this->router->fetch_class();
	$methodname=$this->router->fetch_method();?>
<!-- BEGIN SIDEBAR -->
            <div class="page-sidebar-wrapper">
              
                <div class="page-sidebar navbar-collapse collapse">
                  
                    <ul class="page-sidebar-menu" data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
                      
                       
                        <li class="nav-item start <?php if($methodname=='dashboard'){echo 'active open';}?> ">
                         <?php echo anchor('admin/welcome/dashboard','<i class="icon-home"></i> <span class="title">Dashboard</span>
                                <span class="selected"></span>');?>                           
                        </li>
                      <!--  <li class="heading">
                            <h3 class="uppercase">Master</h3>
                        </li>-->
                        
                         <?php //if($this->session->userdata('login_type')==1){?>
                        
                         <li class="nav-item  <?php if($methodname=='viewcolorbookcat'){echo 'active';}?>">
                        		 <?php echo anchor('admin/masters/viewcolorbookcat',' <i class="fa fa-list"></i> <span class="title">ColorBook Categories</span>',array('class'=>'nav-link'));?>
                       	</li>
                        
                          <li class="nav-item <?php if($classname=='masters' && $methodname=='viewcolorbook'){echo 'active';}?> ">
                        		 <?php echo anchor('admin/masters/viewcolorbook',' <i class="fa fa-book"></i> <span class="title">ColorBooks</span>',array('class'=>'nav-link'));?>
                       	</li>
                         <li class="nav-item <?php if($classname=='user' && $methodname=='view'){echo 'active';}?> ">
                         <?php echo anchor('admin/user/view',' <i class="fa fa-user"></i> <span class="title"> Users</span>',array('class'=>'nav-link'));?>
                        </li>
                        <li class="nav-item <?php if($classname=='product' && $methodname=='view'){echo 'active';}?> ">
                            <?php echo anchor('admin/product/lists',' <i class="fa fa-user"></i> <span class="title"> Products</span>',array('class'=>'nav-link'));?>
                        </li>

                        <li class="nav-item <?php if($classname=='customer' && $methodname=='view'){echo 'active';}?> ">
                            <?php echo anchor('admin/customer/lists',' <i class="fa fa-user"></i> <span class="title"> Customers</span>',array('class'=>'nav-link'));?>
                        </li>
                        
                        
                       <?php //}?>
                       
                   
                        
                    </ul>
                    <!-- END SIDEBAR MENU -->
                </div>
                <!-- END SIDEBAR -->
            </div>
            <!-- END SIDEBAR -->
