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
            </div>


            <div class="row">
                <div class="col-md-12">
                    <!-- BEGIN EXAMPLE TABLE PORTLET-->
                    <div class="portlet light bordered">
                        <div class="portlet-title">
                            <?php if ($this->session->flashdata('del_data_inactive')) { ?>
                                <div class="custom-alerts alert alert-danger fade in" id="prefix_866536685506">
                                    <button aria-hidden="true" data-dismiss="alert" class="close"
                                            type="button"></button>
                                    <i class="fa-lg fa fa-times"></i>  <?= $this->session->flashdata('del_data_inactive'); ?>
                                </div>
                            <?php } ?>

                            <?php if ($this->session->flashdata('del_data_active')) { ?>
                                <div class="custom-alerts alert alert-success fade in" id="prefix_921267107268">
                                    <button aria-hidden="true" data-dismiss="alert" class="close"
                                            type="button"></button>
                                    <i class="fa-lg fa fa-check"></i>  <?= $this->session->flashdata('del_data_active'); ?>
                                </div>

                            <?php } ?>

                            <?php if ($this->session->flashdata('not_del_data')) { ?>
                                <div class="custom-alerts alert alert-warning fade in" id="prefix_921267107268">
                                    <button aria-hidden="true" data-dismiss="alert" class="close"
                                            type="button"></button>
                                    <i class="fa-lg fa fa-warning"></i>
                                    &nbsp;&nbsp; <?= $this->session->flashdata('not_del_data'); ?> </div>
                            <?php } ?>



                            <div class="caption font-dark">
                                <i class="font-dark"></i>
                                <span class="caption-subject bold uppercase"> Manage Users</span>
                            </div>
                        </div>
                        <div class="portlet-body">
                            <div class="table-toolbar">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="btn-group">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <table class="table table-striped table-bordered table-hover table-checkable order-column"
                                   id="sample_1">
                                <thead>
                                <tr>
                                    <th><input type="checkbox" class="group-checkable"
                                               data-set="#sample_1 .checkboxes"/></th>
                                    <th> Name</th>
                                    <th> Email</th>
                                    <th> Type/Link</th>
                                    <th> Status</th>
                                    <th> isSubscribed</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php

                                if (isset($record) && !empty($record)) {
                                    $j = 1;
                                    foreach ($record as $row) { ?>


                                        <tr class="odd gradeX">
                                            <td><input type="checkbox" class="checkboxes"
                                                       value="<?php echo $row->id; ?>"/></td>
                                            <td> <?php echo $row->username; ?> </td>
                                            <td>
                                                <?php echo $row->user_email ?>
                                            </td>
                                            <td> <?php if ($row->login_type == '0') {
                                                    echo 'Friend';
                                                } else if ($row->login_type == 2) {
                                                    echo "Facebook";
                                                } else {
                                                    echo 'Registered';
                                                } ?> </td>
                                            <td>
                                                <?php echo $row->status; ?>
                                            </td>
                                            <td>
                                                <?php
                                                if ($row->isSubscribed == 1) {
                                                    echo '<i class="fa fa-check" style="color: forestgreen;"></i>';
                                                } else {
                                                    echo '<i class="fa fa-times" style="color:red;"></i>';
                                                }
                                                ?>
                                            </td>


                                        </tr>
                                    <?php }
                                } ?>


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
                    