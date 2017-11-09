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
                                    class="caption-subject bold uppercase">Update Product</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <p><?php if (isset($_GET['submission'])) {
                                        echo $_GET['submission'];
                                    } ?></p>
                                <div class="col-md-12 productsub"><br>
                                    <hr>
                                    <div class="col-md-6">
                                        <?php echo form_open('admin/product/edit', array('class' => 'form_sample_3', 'name' => 'product_add', 'method' => 'post')); ?>
                                        <input type="hidden" value="<?php echo $record[0]->id;?>" name="id">
                                        <div class="input-group">
                                            <label for="name">Name</label>
                                            <input type="text" class="form-control" value="<?php echo $record[0]->name;?>" name="name"
                                                   placeholder="Product Name" required/>
                                        </div>
                                        <br>

                                        <div class="input-group">
                                            <label for="description">Description</label>
                                                <textarea class="form-control" name="description" rows="3" cols="17"
                                                          placeholder="Product Description" required><?php echo $record[0]->description;?></textarea>
                                        </div>
                                        <br>

                                        <div class="input-group">
                                            <label for="price">Price</label>
                                            <input type="number" name="price"  value="<?php echo $record[0]->price;?>" class="form-control"
                                                   placeholder="Product Price" required/>
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



