<!--  <link rel="stylesheet" type="text/css" href="http://medical.awn.pw/awn-admin/assets/plugins/fonts-yes/css/font-awesome.css" />-->

<link rel="stylesheet" href="<?php echo base_url('assets/css/scroll.css'); ?>"/>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/css/chat.css'); ?>"/>
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery-ui.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.ui.touch-punch.min.js'); ?>"></script>


<style>
    .m-re {
        width: 25% !important;
        float: left;
    }

    @media (max-width: 769px) {
        .m-re {
            width: 100% !important;
            float: none;
            margin-bottom: 10px;

        }

        .m-re {
        }
</style>
<style>
    .productsub {
        display: none;

    }
</style>
<!-- BEGIN HEADER & CONTENT DIVIDER -->
<div class="clearfix"></div>
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
                                <span
                                    class="caption-subject bold uppercase">Lists of Product</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <p><?php if (isset($_GET['message'])) {
                                        echo $_GET['message'];
                                    } ?></p>
                                <button class="btn btn-success newproduct">New</button>
                                <div class="col-md-12 productsub"><br>

                                    <h3>Add New Product</h3>
                                    <hr>
                                    <div class="col-md-6">
                                        <?php echo form_open('admin/colorproduct/add', array('class' => 'form_sample_3', 'name' => 'product_add', 'method' => 'post')); ?>
                                        <div class="input-group">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control" name="name"
                                                   placeholder="Product Name" required/>
                                        </div>

                                        <br>

                                        <div>
                                            <button class="btn btn-success" type="submit">Submit</button>
                                            &nbsp;
                                            <button class="btn btn-danger" type="reset">Reset</button>
                                        </div>
                                        <?php echo form_close(); ?>
                                    </div>
                                    <div class="col-md-6"></div>
                                </div>
                                <table class="table table-hover">
                                    <thead>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>isActive</th>
                                    <th>Create At</th>
                                    <th>Actions</th>
                                    </thead>
                                    <tbody>
                                    <?php
                                    foreach ($records as $product) {
                                        ?>
                                        <tr>
                                            <td><?php echo $product->id; ?></td>
                                            <td><?php echo $product->name; ?></td>
                                            <td><?php echo $product->isActive; ?></td>
                                            <td><?php echo $product->created_at; ?></td>
                                            <td>
                                                <?php echo anchor('admin/product/update?id=' . $product->id, '<i class="fa fa-pencil-square-o"></i>', array()); ?>
                                                <?php echo anchor('admin/product/delete?id=' . $product->id, '<i
                                                        class="fa fa-times-circle-o"></i>', array('onclick' => "return confirm('are you sure want to delete');", 'style' => 'color:red;')); ?>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                    </tbody>
                                </table>
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


<script src="<?php echo base_url('assets/js/scroll.js'); ?>"></script>

<script>
    (function ($) {
        $(window).load(function () {

            $(".chat-data").mCustomScrollbar({
                theme: "light-2",
                scrollButtons: {
                    enable: true
                },
                callbacks: {
                    onTotalScroll: function () {
                        addContent(this)
                    },
                    onTotalScrollOffset: 100,
                    alwaysTriggerOffsets: false
                }
            });


        });
    })(jQuery);
</script>
<script>
    $(document).ready(function () {
        $('.newproduct').click(function () {
            $('.productsub').slideToggle();
        });
    });
</script>


