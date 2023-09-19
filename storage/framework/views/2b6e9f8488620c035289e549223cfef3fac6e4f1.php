

<?php $__env->startPush('css'); ?>

<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />


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
                        <h1>Email Logs</h1>
                    </div>
                    <div class="search_form">
                        <form action="">
                            <div class="txt_field">
                                <i class="fa-regular fa-calendar"></i>
                                <input class="form-control" name="dates" type="text">
                            </div>
                            <div class="txt_field">
                                <!-- <i class="fa-solid fa-magnifying-glass"></i> -->
                                <select class="form-control" name="" id="">
                                    <option value="0">Any Status</option>
                                    <option value="0">New</option>
                                    <option value="0">Delivered</option>
                                    <option value="0">Pending</option>
                                </select>
                            </div>
                            <div class="txt_field">
                                <i class="fa-solid fa-magnifying-glass"></i>
                                <input class="form-control" type="text" placeholder="Search">
                            </div>
                            <!-- <div class="search_btn">
                                <input class="btn btn_primary" type="submit" value="Search">
                            </div> -->
                            <div class="filter_btn">
                                <a class="btn btn_primary" href="javascript:void(0)">
                                    Download Logs
                                </a>
                            </div>
                            <!-- <div class="add_sticker_btn">
                                <a class="btn btn_primary" href="javascript:void(0)" data-toggle="modal" data-target="#add_users_modal">Add User</a>
                            </div> -->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="dash_orderDetails_sec">
    <div class="container-fluid">
        <div class="row">
            <!-- <div class="col-md-12 col-lg-12 col-xs-12">
                <div class="inner_section_heading_wrapper">
                    <div class="top_heading">
                        <h1>Recent Emails</h1>
                    </div>
                    <div class="btn_sec">
                        <a class="btn btn_primary" href="#!">View All</a>
                    </div>
                </div>
            </div> -->
            <div class="col-md-12 col-lg-12 col-xs-12">
                <div class="inner_section_table">
                    <div class="table-responsive">
                        <table class="table table-fixed sticker_table">
                            <thead>
                                <tr>
                                    <!-- <th>
                                        <div class="checkbox checkbox-info">
                                            <input id="c1" type="checkbox">
                                            <label for="c1"></label>
                                        </div>
                                    </th> -->
                                    <th scope="col">From</th>
                                    <th scope="col">Timestamp</th>
                                    <th scope="col">Event(Status)</th>
                                    <th scope="col">Recipient</th>
                                    <th scope="col">Open</th>
                                    <th scope="col">Click</th>
                                    <th scope="col">Subject</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $result['messages']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php $eventdate=\Carbon\Carbon::createFromFormat('Y-m-d\TH:i:s\Z',@$item['last_event_time']);?>
                                <tr>
                                    <td><?php echo e(@$item['from_email']??'N/A'); ?></td>
                                    <td><?php echo e($eventdate->format('Y-m-d H:i:A')??'N/A'); ?></td>
                                    <td><?php echo e(@$item['status']??'N/A'); ?></td>
                                    <td><?php echo e(@$item['to_email']??'N/A'); ?></td>
                                    <td><?php echo e(@$item['opens_count']??'N/A'); ?></td>
                                    <td><?php echo e(@$item['clicks_count']??'N/A'); ?></td>
                                    <td><?php echo e(@$item['subject']??'N/A'); ?></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                           
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>

<script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>

<script>
    $('input[name="dates"]').daterangepicker();
</script>

<script src="<?php echo e(asset('js/db1.js')); ?>"></script>

<script>
    jQuery(".upload_csv_input").on("change", function(e){
        var fileName = e.target.files[0].name;
        // alert(fileName);
        jQuery("#upload_csv_modal .inner_section_upload_field .upload_field .file_name").html(fileName);
    });
</script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home1/backendpro/public_html/shoaib/airwave/resources/views/dashboard/email_logs.blade.php ENDPATH**/ ?>