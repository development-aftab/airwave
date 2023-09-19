

<?php $__env->startPush('css'); ?>
    <style>
        .info-box .info-count {
            margin-top: 0px !important;
        }
    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

    <section class="dash_heading_sec">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-xs-12">
                    <div class="inner_section_heading_wrapper">
                        <div class="top_heading">
                            <h1>Sent Email <?php echo e($sentemail->id); ?></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="dash_orderDetails_sec">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12 col-lg-12 col-xs-12">
                    <div class="inner_section_view_email white_box">
                        <div class="mail_header">
                            <div class="user_details_wrapper">
                                <div class="user_image">
                                    <img src="<?php echo e(asset('website')); ?>/images/user_img.png" alt="">
                                </div>
                                <div class="user_name_email_wrapper">
                                    <div class="user_name">
                                        <h3><?php echo e($sentemail->to); ?></h3>
                                    </div>
                                    <div class="user_email">
                                        <p><?php echo e($sentemail->email_date??''); ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="delete_icon">
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-'.str_slug('SentEmail'))): ?>
                                    <a href="<?php echo e(url('/sentEmail/sent-email')); ?>"><i class="fa-solid fa-arrow-up-from-bracket"></i></a>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="mail_body">
                            <?php echo $sentemail->body??''; ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
    <script src="<?php echo e(asset('js/db1.js')); ?>"></script>

    <script>
        jQuery(".upload_csv_input").on("change", function(e){
            var fileName = e.target.files[0].name;
            // alert(fileName);
            jQuery("#upload_csv_modal .inner_section_upload_field .upload_field .file_name").html(fileName);
        });
    </script>

<?php $__env->stopPush(); ?>


<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home1/backendpro/public_html/shoaib/airwave/resources/views/sentEmail/sent-email/show.blade.php ENDPATH**/ ?>