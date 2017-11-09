<!-- END HEADER -->
<!-- BEGIN HEADER & CONTENT DIVIDER -->
<div class="clearfix"></div>
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
                            <?php echo anchor('admin/welcome/dashboard', '<i class="icon-home"></i> <span class="title">Home</span>
                                <span class="selected"></span>'); ?>
                            <i class="fa fa-circle"></i>
                        </li>
                        <li>
                            <span class="active">Manage Customer </span>
                        </li>
                    </ul>
                </div>

                <div class="col-md-6 m-right">
                    <?php echo anchor('admin/users/view', '<i class="fa fa-eye">&nbsp;</i>View ', array('class' => 'btn btn-sm green-jungle dropdown-toggle m-btn-right')); ?>
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

                            <?php if (isset($add_data) && !empty($add_data)) { ?>
                                <div class="custom-alerts alert alert-success fade in" id="prefix_921267107268">
                                    <button aria-hidden="true" data-dismiss="alert" class="close"
                                            type="button"></button>
                                    <i class="fa-lg fa fa-check"></i>  <?= $add_data; ?></div>

                            <?php } ?>

                            <?php if (isset($edit_data) && !empty($edit_data)) { ?>
                                <div class="custom-alerts alert alert-success fade in" id="prefix_921267107268">
                                    <button aria-hidden="true" data-dismiss="alert" class="close"
                                            type="button"></button>
                                    <i class="fa-lg fa fa-check"></i>  <?= $edit_data; ?></div>

                            <?php } ?>

                            <div class="caption">
                                <i class=" icon-layers font-red"></i>
                                <span
                                    class="caption-subject font-red sbold uppercase"><?php if (isset($edit_data) && !empty($edit_data)) {
                                        echo 'Edit';
                                    } else {
                                        echo 'Add';
                                    } ?> Customer </span>
                            </div>


                        </div>


                        <!--  <div class="portlet-body">-->

                        <?php //if(isset($edit_data) && !empty($edit_data)){?>
                        <?php if (isset($user_record) && !empty($user_record)) {
                            // print_r($school_record);

                            ?>
                            <!-- BEGIN EDIT FORM-->
                            <!--<form action="#" id="form_sample_1">-->
                            <?php echo form_open_multipart('admin/users/edit/' . $user_record[0]->uid, array('class' => 'form_sample_3', 'name' => 'schools_add', 'method' => 'post')); ?>
                            <div class="form-body">


                                <div class="row">


                                    <div
                                        class="form-group form-md-line-input form-md-floating-label col-md-6 <?php if (form_error('username') != '') {
                                            echo 'has-error';
                                        } ?>">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="username" id="form_control_1"
                                                   required value="<?php echo $user_record[0]->name; ?>">
                                            <span id="form_control_1-error"
                                                  class="help-block help-block-error error"><?php echo form_error('username'); ?></span>
                                            <label class="control-label" for="form_control_1">User Name</label>
                                            <span class="input-group-addon"><i class=""></i></span>
                                        </div>
                                    </div>


                                    <div
                                        class="form-group form-md-line-input form-md-floating-label col-md-6 <?php if (form_error('mobile') != '') {
                                            echo 'has-error';
                                        } ?>">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="mobile" maxlength="10"
                                                   required value="<?php echo $user_record[0]->mobile; ?>">
                                            <span id="form_control_1-error"
                                                  class="help-block help-block-error error"><?php echo form_error('mobile'); ?></span>
                                            <label for="form_control_1">Mobile</label>
                                                                    <span class="input-group-addon">
                                                                        <i class="fa fa-mobile"></i>
                                                                    </span>

                                        </div>
                                    </div>

                                </div>

                                <div class="row">


                                    <div
                                        class="form-group form-md-line-input form-md-floating-label col-md-6 <?php if (form_error('emailid') != '') {
                                            echo 'has-error';
                                        } ?>">
                                        <div class="input-group">
                                            <input type="email" class="form-control" name="emailid" required
                                                   value="<?php echo $user_record[0]->email; ?>">
                                            <span id="form_control_1-error"
                                                  class="help-block help-block-error error"><?php echo form_error('emailid'); ?></span>
                                            <label for="form_control_1">Email</label>
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-envelope"></i>
                                                                </span>

                                        </div>
                                    </div>


                                    <div
                                        class="form-group form-md-line-input form-md-floating-label col-md-6 <?php if (form_error('homeaddress') != '') {
                                            echo 'has-error';
                                        } ?>">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="homeaddress"
                                                   id="form_control_1" required
                                                   value="<?php echo $user_record[0]->home_address; ?>">
                                            <span id="form_control_1-error"
                                                  class="help-block help-block-error error"><?php echo form_error('homeaddress'); ?></span>
                                            <label class="control-label" for="form_control_1">Home Address</label>
                                            <span class="input-group-addon"><i class=""></i></span>

                                        </div>
                                    </div>

                                </div>

                                <div class="row">

                                    <div
                                        class="form-group form-md-line-input form-md-floating-label col-md-6 <?php if (form_error('officeaddress') != '') {
                                            echo 'has-error';
                                        } ?>">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="officeaddress"
                                                   id="form_control_1" required
                                                   value="<?php echo $user_record[0]->office_address; ?>">
                                            <span id="form_control_1-error"
                                                  class="help-block help-block-error error"><?php echo form_error('officeaddress'); ?></span>
                                            <label for="form_control_1">Office Address</label>
                                            <span class="input-group-addon"><i class=""></i></span>

                                        </div>
                                    </div>
                                    <div
                                        class="form-group form-md-line-input form-md-floating-label col-md-6 <?php if (form_error('peeraddress') != '') {
                                            echo 'has-error';
                                        } ?>">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="peeraddress"
                                                   id="form_control_1" required
                                                   value="<?php echo $user_record[0]->peer_address; ?>">
                                            <span id="form_control_1-error"
                                                  class="help-block help-block-error error"><?php echo form_error('peeraddress'); ?></span>
                                            <label for="form_control_1">Peer Address</label>
                                            <span class="input-group-addon"><i class=""></i></span>

                                        </div>
                                    </div>
                                </div>


                            </div>
                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn dark">Update</button>

                                    </div>
                                </div>
                            </div>
                            <?php echo form_close(); ?>
                            <!--</form>-->
                            <!-- END EDIT FORM-->
                        <?php } else { ?>


                            <!-- BEGIN ADD FORM-->
                            <!--<form action="#" id="form_sample_1">-->
                            <?php echo form_open_multipart('admin/users/add', array('class' => 'form_sample_3', 'name' => 'user_add', 'method' => 'post')); ?>
                            <div class="form-body">

                                <div class="row">


                                    <div
                                        class="form-group form-md-line-input form-md-floating-label col-md-6 <?php if (form_error('username') != '') {
                                            echo 'has-error';
                                        } ?>">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="username" id="form_control_1"
                                                   required>
                                            <span id="form_control_1-error"
                                                  class="help-block help-block-error error"><?php echo form_error('username'); ?></span>
                                            <label class="control-label" for="form_control_1">User Name</label>
                                            <span class="input-group-addon"><i class=""></i></span>
                                        </div>
                                    </div>


                                    <div
                                        class="form-group form-md-line-input form-md-floating-label col-md-6 <?php if (form_error('mobile') != '') {
                                            echo 'has-error';
                                        } ?>">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="mobile" maxlength="10"
                                                   required>
                                            <span id="form_control_1-error"
                                                  class="help-block help-block-error error"><?php echo form_error('mobile'); ?></span>
                                            <label for="form_control_1">Mobile</label>
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-mobile"></i>
                                                                </span>

                                        </div>
                                    </div>

                                </div>

                                <div class="row">


                                    <div
                                        class="form-group form-md-line-input form-md-floating-label col-md-6 <?php if (form_error('emailid') != '') {
                                            echo 'has-error';
                                        } ?>">
                                        <div class="input-group">
                                            <input type="email" class="form-control" name="emailid" required>
                                            <span id="form_control_1-error"
                                                  class="help-block help-block-error error"><?php echo form_error('emailid'); ?></span>
                                            <label for="form_control_1">Email</label>
                                                                <span class="input-group-addon">
                                                                    <i class="fa fa-envelope"></i>
                                                                </span>

                                        </div>
                                    </div>


                                    <div
                                        class="form-group form-md-line-input form-md-floating-label col-md-6 <?php if (form_error('homeaddress') != '') {
                                            echo 'has-error';
                                        } ?>">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="homeaddress"
                                                   id="form_control_1" required>
                                            <span id="form_control_1-error"
                                                  class="help-block help-block-error error"><?php echo form_error('homeaddress'); ?></span>
                                            <label class="control-label" for="form_control_1">Home Address</label>
                                            <span class="input-group-addon"><i class=""></i></span>

                                        </div>
                                    </div>

                                </div>

                                <div class="row">

                                    <div
                                        class="form-group form-md-line-input form-md-floating-label col-md-6 <?php if (form_error('officeaddress') != '') {
                                            echo 'has-error';
                                        } ?>">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="officeaddress"
                                                   id="form_control_1" required>
                                            <span id="form_control_1-error"
                                                  class="help-block help-block-error error"><?php echo form_error('officeaddress'); ?></span>
                                            <label for="form_control_1">Office Address</label>
                                            <span class="input-group-addon"><i class=""></i></span>

                                        </div>
                                    </div>
                                    <div
                                        class="form-group form-md-line-input form-md-floating-label col-md-6 <?php if (form_error('peeraddress') != '') {
                                            echo 'has-error';
                                        } ?>">
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="peeraddress"
                                                   id="form_control_1" required>
                                            <span id="form_control_1-error"
                                                  class="help-block help-block-error error"><?php echo form_error('peeraddress'); ?></span>
                                            <label for="form_control_1">Peer Address</label>
                                            <span class="input-group-addon"><i class=""></i></span>

                                        </div>
                                    </div>
                                </div>


                            </div>


                            <div class="form-actions">
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn dark">Save</button>
                                        <button type="reset" class="btn default">Reset</button>
                                    </div>
                                </div>
                            </div>
                            <?php echo form_close(); ?>
                            <!--</form>-->
                            <!-- END ADD FORM-->

                        <?php } ?>




                        <!-- BEGIN FOOTER -->
                        <?php //include('includes/footer.php'); ?>
                        <!-- END FOOTER -->
<?php /*?>   <!--[if lt IE 9]>
<script src="../assets/global/plugins/respond.min.js"></script>
<script src="../assets/global/plugins/excanvas.min.js"></script> 
<![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="../assets/global/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/jquery-validation/js/additional-methods.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="../assets/global/scripts/app.min.js" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="../assets/pages/scripts/form-validation-md.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
         <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="../assets/global/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/bootstrap-markdown/lib/markdown.js" type="text/javascript"></script>
        <script src="./../assets/global/plugins/bootstrap-markdown/js/bootstrap-markdown.js" type="text/javascript"></script>
        <script src="../assets/global/plugins/bootstrap-summernote/summernote.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
         <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <script src="../assets/pages/scripts/components-editors.min.js" type="text/javascript"></script>
        <!-- END PAGE LEVEL SCRIPTS -->
        
        
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <script src="../assets/layouts/layout4/scripts/layout.min.js" type="text/javascript"></script>
        <script src="../assets/layouts/layout4/scripts/demo.min.js" type="text/javascript"></script>
        <script src="../assets/layouts/global/scripts/quick-sidebar.min.js" type="text/javascript"></script>
        <!-- END THEME LAYOUT SCRIPTS -->
    </body>

</html><?php */ ?>