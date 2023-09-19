<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <meta name="description" content="<?php echo e(App\CommonSetting::first()->description??''); ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo e(asset('')); ?><?php echo e(App\CommonSetting::first()->favicon??''); ?>">
    <title><?php echo e(App\CommonSetting::first()->title??''); ?></title>
    <!-- ===== Bootstrap CSS ===== -->
    <link href="<?php echo e(asset('bootstrap/dist/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.css" rel="stylesheet">
    <!-- ===== Plugin CSS ===== -->
    <link href="<?php echo e(asset('plugins/components/chartist-js/dist/chartist.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('plugins/components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css')); ?>"
          rel="stylesheet">
    <link href="<?php echo e(asset('plugins/components/toast-master/css/jquery.toast.css')); ?>" rel="stylesheet">
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" />

    <!-- ===== Animation CSS ===== -->
    <link href="<?php echo e(asset('css/animate.css')); ?>" rel="stylesheet">
    <!-- ===== Custom CSS ===== -->
    <link href="<?php echo e(asset('css/common.css')); ?>" rel="stylesheet">
    <?php echo $__env->yieldPushContent('css'); ?>
    <!--====== Dynamic theme changing =====-->
    <?php if(session()->get('theme-layout') == 'fix-header'): ?>
        <link href="<?php echo e(asset('css/style-fix-header.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('css/colors/default.css')); ?>" id="theme" rel="stylesheet">
    <?php elseif(session()->get('theme-layout') == 'mini-sidebar'): ?>
        <link href="<?php echo e(asset('css/style-mini-sidebar.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('css/colors/default.css')); ?>" id="theme" rel="stylesheet">
    <?php else: ?>
        <link href="<?php echo e(asset('css/style-normal.css')); ?>" rel="stylesheet">
        <link href="<?php echo e(asset('css/colors/default.css')); ?>" id="theme" rel="stylesheet">
        <!-- Custom Old Stylesheet starts here -->
        <!-- <link href="<?php echo e(asset('css/old_style.css')); ?>" rel="stylesheet"> -->
         <!-- Custom  Stylesheet starts here -->
         <link href="<?php echo e(asset('css/style.css')); ?>" rel="stylesheet">
    <?php endif; ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-iconpicker/1.9.0/css/bootstrap-iconpicker.min.css"/>


    <!-- ===== Color CSS ===== -->
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
        @media (min-width: 768px) {
            .extra.collapse li a span.hide-menu {
                /* display: block !important; */
            }

            .extra.collapse.in li a.waves-effect span.hide-menu {
                display: block !important;
            }

            .extra.collapse li.active a.active span.hide-menu {
                /* display: block !important; */
            }

            ul.side-menu li:hover + .extra.collapse.in li.active a.active span.hide-menu {
                display: block !important;
            }
        }
    </style>
</head>

<body class="<?php if(session()->get('theme-layout')): ?> <?php echo e(session()->get('theme-layout')); ?> <?php endif; ?>">
<!-- ===== Main-Wrapper ===== -->
<div id="wrapper">
    <div class="preloader">
        <div class="cssload-speeding-wheel"></div>
    </div>
    <!-- ===== Top-Navigation ===== -->
<?php echo $__env->make('layouts.partials.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<!-- ===== Top-Navigation-End ===== -->

    <!-- ===== Left-Sidebar ===== -->
<?php echo $__env->make('layouts.partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.partials.right-sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<!-- ===== Left-Sidebar-End ===== -->
    <!-- ===== Page-Content ===== -->
    <div class="page-wrapper">
        <?php echo $__env->yieldContent('content'); ?>
        <!-- <footer class="footer t-a-c">
            <div class="p-20 bg-white">
                <center> <?php echo e(App\CommonSetting::first()->footer_text??''); ?> </center>
            </div>
        </footer> -->
    </div>
    <!-- ===== Page-Content-End ===== -->
</div>
<!-- ===== Main-Wrapper-End ===== -->


<!-- Modals starts here -->

<!-- Modal -->
<div class="modal fade upload_csv_modal" id="upload_csv_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <!-- <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> -->
      <div class="modal-body">
        <form action="<?php echo e(route('import')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
        <div class="close_btn">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal_title text-center">
            <h2>Upload CSV</h2>
        </div>
        <div class="row">
            <div class="col-md-12">
                <label>Upload CSV</label>
            </div>
            <div class="col-md-12">
                <div class="inner_section_upload_field">
                    <div class="upload_field">
                        <input class="upload_csv_input" type="file" name="file" id="file" required>
                        <label class="file_name">File Here</label>
                        <i class="fa-solid fa-arrow-up-from-bracket"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
          
            
           
        </div>
        <div class="row" style="padding: 10px 0 0 0;">
            <div class="col-md-12">
                <div class="inner_section_submit_btn">
                    <input class="btn btn_primary btn-block" onclick="return confirm('Are you sure want to Upload File?')" type="submit" value="Upload">
                </div>
            </div>
        </div>
        </form>
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>

<!-- Modals ends here -->
<!-- Modal -->
<div class="modal fade upload_csv_modal" id="add_users_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <!-- <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> -->
      <div class="modal-body">
        <form action="<?php echo e(route('add.user')); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
        <div class="close_btn">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal_title text-center">
            <h2>Add User</h2>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="txt_field_white">
                    <label>Name</label>
                    <input class="form-control" type="text" name="name" id="" placeholder="John Smith" required>
                </div>
            </div>
            <div class="col-md-12">
                <div class="txt_field_white">
                    <label>Email</label>
                    <input class="form-control" type="email" name="email" id="" placeholder="Email Here" required>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="inner_section_submit_btn">
                    <input class="btn btn_primary btn-block" type="submit" value="Submit">
                </div>
            </div>
        </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
      </form>
    </div>
  </div>
  </div>
</div>
<!-- Modals ends here -->


<!-- Add Group Modal Here -->
<div class="modal fade upload_csv_modal" id="add_group_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <!-- <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> -->
      <div class="modal-body">
         <form method="POST" action="<?php echo e(url('/group/group')); ?>" accept-charset="UTF-8" class="form-horizontal" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="close_btn">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal_title text-center">
                <h2>Add Group</h2>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="txt_field_white">
                        <label>Group Name</label>
                        <input class="form-control" type="text" name="name" id="" placeholder="Group 1" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="inner_section_upload_field txt_field_white">
                        <div class="upload_field">
                            <input class="upload_csv_input" type="file" name="file" id="file" required>
                            <label class="file_name">Upload CSV File</label>
                            <i class="fa-solid fa-arrow-up-from-bracket"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 ">
                    <div class="inner_section_submit_btn">
                        <input class="btn btn_primary btn-block" type="submit" value="Submit">
                    </div>
                </div>
            </div>
        </form>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
      </div>
    </div>
  </div>
</div>
<!-- Modals ends here -->


<!-- Add Group SIngle EMail Modal Start Here -->
<div class="modal fade upload_csv_modal" id="edit_group_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body">
         <form method="POST" action="<?php echo e(url('singleGroupEmail')); ?>" class="form-horizontal" >
        <?php echo csrf_field(); ?>
        <input type="hidden" name="group_id" id="group_id" value="">
        <div class="close_btn">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal_title text-center">
            <h2>Add Email</h2>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="txt_field_white">
                    <label>Name</label>
                    <input class="form-control" type="text" name="name" id="" placeholder="John Smith" required>
                </div>
            </div>
             <div class="col-md-12">
                <div class="txt_field_white">
                    <label>Email</label>
                    <input class="form-control" type="email" name="email" id="" placeholder="johnSmith@yopmail.com" required>
                </div>
            </div>
        
         <div class="col-md-12">
                <div class="inner_section_submit_btn">
                    <input class="btn btn_primary btn-block" type="submit" value="Submit">
                </div>
            </div>
        </div>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- Edit Edit Modals Ends here -->


<!-- Modal -->
<div class="modal fade upload_csv_modal add_users_modal" id="edit_users_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <!-- <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> -->
      <div class="modal-body">
        <form action="">
        <div class="close_btn">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal_title text-center">
            <h2>Edit User</h2>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="txt_field_white">
                    <label>Name</label>
                    <input class="form-control" type="text" name="user_name" id="" placeholder="John Smith">
                </div>
            </div>
            <div class="col-md-12">
                <div class="txt_field_white">
                    <label>Email</label>
                    <input class="form-control" type="email" name="user_email" id="" placeholder="Email Here">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="inner_section_submit_btn">
                    <input class="btn btn_primary btn-block" type="submit" value="Submit">
                </div>
            </div>
        </div>
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
      </form>
    </div>
  </div>
</div>

<!-- Modals ends here -->


<!-- Modal -->
<div class="modal fade upload_csv_modal add_users_modal delete_confirm_modal" id="delete_confirm_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <!-- <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> -->
      <div class="modal-body">
        <form action="">
        <div class="close_btn">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <!-- <div class="modal_title text-center">
            <h2>Edit User</h2>
        </div> -->
        <div class="row">
            <div class="col-md-12">
                <div class="main_text">
                    <h1>Are You Sure You Want To Delete This User</h1>
                </div>
                <div class="inner_section_submit_btn">
                    <input class="btn btn_primary" type="submit" value="Yes">
                </div>
            </div>
        </div>
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
      </form>
    </div>
  </div>
</div>

<!-- Modals ends here -->

<!-- Modal -->
<div class="modal fade upload_csv_modal add_users_modal delete_confirm_modal" id="delete_group_confirm_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <!-- <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> -->
      <div class="modal-body">
        <form action="">
        <div class="close_btn">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <!-- <div class="modal_title text-center">
            <h2>Edit User</h2>
        </div> -->
        <div class="row">
            <div class="col-md-12">
                <div class="main_text">
                    <h1>Are You Sure You Want To Delete This Group</h1>
                </div>
                <div class="inner_section_submit_btn">
                    <input class="btn btn_primary" type="submit" value="Yes">
                </div>
            </div>
        </div>
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
      </form>
    </div>
  </div>
</div>

<!-- Modals ends here -->

<!-- Modal -->
<div class="modal fade upload_csv_modal add_users_modal delete_confirm_modal" id="delete_mail_confirm_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <!-- <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div> -->
      <div class="modal-body">
        <form action="">
        <div class="close_btn">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <!-- <div class="modal_title text-center">
            <h2>Edit User</h2>
        </div> -->
        <div class="row">
            <div class="col-md-12">
                <div class="main_text">
                    <h1>Are You Sure You Want To Delete This Email</h1>
                </div>
                <div class="inner_section_submit_btn">
                    <input class="btn btn_primary" type="submit" value="Yes">
                </div>
            </div>
        </div>
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
      </form>
    </div>
  </div>
</div>

<!-- Modals ends here -->


<!-- ==============================
    Required JS Files
=============================== -->
<!-- ===== jQuery ===== -->
<script src="<?php echo e(asset('plugins/components/jquery/dist/jquery.min.js')); ?>"></script>
<!-- ===== Bootstrap JavaScript ===== -->
<script src="<?php echo e(asset('bootstrap/dist/js/bootstrap.min.js')); ?>"></script>
<!-- ===== Slimscroll JavaScript ===== -->
<script src="<?php echo e(asset('js/jquery.slimscroll.js')); ?>"></script>
<!-- ===== Wave Effects JavaScript ===== -->
<script src="<?php echo e(asset('js/waves.js')); ?>"></script>
<!-- ===== Menu Plugin JavaScript ===== -->
<script src="<?php echo e(asset('js/sidebarmenu.js')); ?>"></script>
<!-- ===== Custom JavaScript ===== -->

<?php if(session()->get('theme-layout') == 'fix-header'): ?>
    <script src="<?php echo e(asset('js/custom-fix-header.js')); ?>"></script>
<?php elseif(session()->get('theme-layout') == 'mini-sidebar'): ?>
    <script src="<?php echo e(asset('js/custom-mini-sidebar.js')); ?>"></script>
<?php else: ?>
    <script src="<?php echo e(asset('js/custom-normal.js')); ?>"></script>
<?php endif; ?>


<!-- ===== Plugin JS ===== -->
<script src="<?php echo e(asset('plugins/components/chartist-js/dist/chartist.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/components/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/components/sparkline/jquery.sparkline.min.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/components/sparkline/jquery.charts-sparkline.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/components/knob/jquery.knob.js')); ?>"></script>
<script src="<?php echo e(asset('plugins/components/easypiechart/dist/jquery.easypiechart.min.js')); ?>"></script>
<!-- ===== Style Switcher JS ===== -->
<script src="<?php echo e(asset('plugins/components/styleswitcher/jQuery.style.switcher.js')); ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-iconpicker/1.9.0/js/bootstrap-iconpicker-iconset-all.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-iconpicker/1.9.0/js/bootstrap-iconpicker.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script> -->

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function(){
        $('#myTable_filter').find('input').attr('placeholder','Search');
    })
</script>
<script type="text/javascript">
    <?php if(session()->has('message')): ?>
        Swal.fire({
            title: "<?php echo e(session()->get('title')??'success!'); ?>",
            html: "<?php echo e(@ucwords(preg_replace('/(?<!\ )[A-Z]/', ' $0', session()->get('message')))); ?>",
            icon: "<?php echo e(session()->get('type')??'success'); ?>",
            timer: 5000,
            buttons: false,
        });
    <?php endif; ?>
    <?php if(session()->has('flash_message')): ?>
        Swal.fire({
            title: "<?php echo e(@ucwords(preg_replace('/(?<!\ )[A-Z]/', ' $0', session()->get('flash_message')))); ?>",

            icon: "<?php echo e(session()->get('type')??'success'); ?>",
            timer: 5000,
            buttons: false,
        });
    <?php endif; ?>
</script>
<script src="<?php echo e(asset('ckeditor/ckeditor.js')); ?>"></script>
<script>
  CKEDITOR.replace('body');
</script>
<?php echo $__env->yieldPushContent('js'); ?>

</body>

</html><?php /**PATH /home1/backendpro/public_html/shoaib/airwave/resources/views/layouts/master.blade.php ENDPATH**/ ?>