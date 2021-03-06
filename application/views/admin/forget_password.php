<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <title>Ovoc | User Login </title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/global/plugins/font-awesome/css/font-awesome.min.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/global/plugins/simple-line-icons/simple-line-icons.min.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/global/plugins/bootstrap/css/bootstrap.min.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/global/plugins/uniform/css/uniform.default.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css');?>" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="<?php echo base_url('assets/global/plugins/select2/css/select2.min.css');?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url('assets/global/plugins/select2/css/select2-bootstrap.min.css');?>" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="<?php echo base_url('assets/global/css/components-rounded.min.css');?>" rel="stylesheet" id="style_components" type="text/css" />
        <link href="<?php echo base_url('assets/global/css/plugins.min.css');?>" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link href="<?php echo base_url('assets/pages/css/login.min.css');?>" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> </head>
    <!-- END HEAD -->

    <body class=" login">
        <div class="menu-toggler sidebar-toggler"></div>
        <!-- END SIDEBAR TOGGLER BUTTON -->
        <!-- BEGIN LOGO -->
        <div class="logo">
            <a href="index.html">
                <img src="<?php echo base_url('assets/pages/img/ovoc-logo.png');?>" alt="" width="250" /> </a>
        </div>
        <!-- END LOGO -->
        <!-- BEGIN LOGIN -->
        <div class="content">
            <!-- BEGIN LOGIN FORM -->
           <!-- BEGIN FORGOT PASSWORD FORM -->
            
          <!--  <form class="forget-form" action="" method="post">
                <h3 class="font-green">Forget Password ?</h3>
                <p> Enter your e-mail address below to reset your password. </p>
                <div class="form-group">
                    <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email" reuired /> </div>
                <div class="form-actions">
                    <button type="button" id="back-btn" class="btn btn-default">Back</button>
                    <button type="submit" class="btn btn-success uppercase pull-right">Submit</button>
                </div>
            </form>-->
           <!-- END FORGOT PASSWORD FORM -->
           
              <?php echo form_open('admin/welcome/forgetpassword', array('class' => 'login-form1', 'name' => 'loginform','method'=>'post')); ?>
           <!-- <form class="login-form" action="" method="post">-->
                 <h3 class="font-green">Forget Password ?</h3>
                   <?php if(isset($msg) && !empty($msg)){?>
                <div class="alert alert-danger "><!--display-hide-->
                    <button class="close" data-close="alert"></button>
                    <span> <?php echo $msg;?> <!--Enter any username and password.--> </span>
                </div>
                <?php } ?>
                  <p> Enter your e-mail address below to reset your password. </p>
              
                <div class="form-group">
                    <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                    
                    
                    
                    <?php echo form_input(array('id'=>'emailid','name'=>'emailid','type'=>'email','class'=>'form-control placeholder-no-fix','autocomplete'=>'off','placeholder'=>'Email','required'=>'required'),set_value('email'));?>
                  <!--  <input class="form-control form-control-solid placeholder-no-fix" type="text" autocomplete="off" placeholder="Username" name="username"  /> -->
                    <span class="error"><?php echo form_error('emailid'); ?></span>
                    </div>
                
                
                <div class="form-actions">
               	  <?php echo anchor('admin/welcome/login','Back','class="btn btn-default"');?>
                   <!-- <button type="button" id="back-btn" class="btn btn-default">Back</button>-->
                    <button type="submit" class="btn btn-success uppercase pull-right">Submit</button>
                </div>
                
                
              
                <div class="create-account">
                   <!-- <p>
                        <a href="javascript:;" id="register-btn" class="uppercase">Create an account</a>
                    </p>-->
                </div>
            <!--</form>-->
             <?php echo form_close();?> 
            <!-- END LOGIN FORM -->
           
     
   
           <?php //echo form_close();?> 
            <!-- END FORGOT PASSWORD FORM -->
        </div>
        <div class="copyright"> <?=date('Y');?> © Ovoc. Admin Dashboard. </div>
        <!--[if lt IE 9]>
<script src="../assets/global/plugins/respond.min.js"></script>
<script src="../assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <script src="<?php echo base_url('assets/global/plugins/jquery.min.js');?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/global/plugins/bootstrap/js/bootstrap.min.js');?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/global/plugins/js.cookie.min.js');?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/global/plugins/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js');?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js');?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/global/plugins/jquery.blockui.min.js');?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/global/plugins/uniform/jquery.uniform.min.js');?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js');?>" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?php echo base_url('assets/global/plugins/jquery-validation/js/jquery.validate.min.js');?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/global/plugins/jquery-validation/js/additional-methods.min.js');?>" type="text/javascript"></script>
        <script src="<?php echo base_url('assets/global/plugins/select2/js/select2.full.min.js');?>" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="<?php echo base_url('assets/global/scripts/app.min.js');?>" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="<?php echo base_url('assets/pages/scripts/login.min.js');?>" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <!-- END THEME LAYOUT SCRIPTS -->
    </body>

</html>