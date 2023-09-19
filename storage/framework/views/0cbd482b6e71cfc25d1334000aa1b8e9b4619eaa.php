<?php $__env->startPush('css'); ?>
    <link href="<?php echo e(asset('plugins/components/datatables/jquery.dataTables.min.css')); ?>" rel="stylesheet" type="text/css"/>
    <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet"
          type="text/css"/>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>

<section class="dash_heading_sec">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12 col-lg-12 col-xs-12">
                <div class="inner_section_heading_wrapper search_space">
                    <div class="top_heading">
                        <h1>All Campaigns</h1>
                    </div>
                    <div class="search_form">
                        <form action="">
                            <!-- <div class="search_btn">
                                <input class="btn btn_primary" type="submit" value="Search">
                            </div> -->
                            <div class="filter_btn">
                            <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('add-'.str_slug('Campaign'))): ?>
                                <a class="btn btn_primary" href="<?php echo e(url('/campaign/campaign/create')); ?>">Create <?php echo e(preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'Campaign')); ?></a>
                            <?php endif; ?>
                                <!-- <a class="btn btn_primary" href="<?php echo e(route('create_campaign')); ?>">
                                    Create Campaign
                                </a> -->
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

<section class="search_bar_position button_exists">
    <div class="container-fluid " style="padding-top: 0">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                
                <div class="clearfix"></div>
                <!-- <hr> -->
                <div class="inner_section_table">
                    <div class="table-responsive">
                        <table class="table" id="myTable">
                            <thead>
                            <tr>
                                <th></th>
                                <th>Name</th>
                                <th>Subject</th>
                                <th>Created Date</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $__currentLoopData = $campaign; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td>
                                        <div class="custom_checkbox">
                                            <input id="chk_<?php echo e($key); ?>" type="checkbox" name="" id="">
                                            <label class="custom_check" for="chk_<?php echo e($key); ?>"></label>
                                        </div>
                                    </td>
                                <!-- <td><?php echo e($loop->iteration??$item->id); ?></td> -->
                                    <td><?php echo e($item->name); ?></td>
                                    <td><?php echo e($item->subject); ?></td>
                                    <td><?php echo e($item->created_at); ?></td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn dropdown-toggle action_btn" type="button"
                                                    id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                <i class="fa-solid fa-ellipsis"></i>
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="<?php echo e(url('send_campaigns'.'/'.$item->id)); ?>">Send</a>
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-'.str_slug('Campaign'))): ?>
                                                    <a class="dropdown-item" href="<?php echo e(url('/campaign/campaign/' . $item->id)); ?>" title="View <?php echo e(preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'Campaign')); ?>">View</a>
                                                <?php endif; ?>
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit-'.str_slug('Campaign'))): ?>
                                                    <a class="dropdown-item" href="<?php echo e(url('/campaign/campaign/' . $item->id)); ?>/edit" title="View <?php echo e(preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'Campaign')); ?>">Edit</a>
                                                <?php endif; ?>
                                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete-'.str_slug('Campaign'))): ?>
                                                    <form action="" action="<?php echo e(url('/campaign/campaign' . '/' . $item->id)); ?>" accept-charset="UTF-8" style="display:inline">
                                                        <?php echo e(method_field('DELETE')); ?>

                                                        <?php echo e(csrf_field()); ?>

                                                        <button type="submit" class="dropdown-item" title="Delete <?php echo e(preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'Campaign')); ?>"
                                                                onclick="return confirm(&quot;Confirm delete?&quot;)">Delete</button>
                                                    </form>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    </td>
                                    
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                        <div class="pagination-wrapper"> <?php echo $campaign->appends(['search' => Request::get('search')])->render(); ?> </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('js'); ?>
    <script src="<?php echo e(asset('plugins/components/toast-master/js/jquery.toast.js')); ?>"></script>

    <script src="<?php echo e(asset('plugins/components/datatables/jquery.dataTables.min.js')); ?>"></script>
    <!-- start - This is for export functionality only -->
    <!-- end - This is for export functionality only -->
    <script>
        $(document).ready(function () {

            <?php if(\Session::has('message')): ?>
            $.toast({
                heading: 'Success!',
                position: 'top-center',
                text: '<?php echo e(session()->get('message')); ?>',
                loaderBg: '#ff6849',
                icon: 'success',
                hideAfter: 3000,
                stack: 6
            });
            <?php endif; ?>
        })

        $(function () {
            $('#myTable').DataTable({
                'bPaginate': false,
                'bInfo': false,
                'aoColumnDefs': [{
                    'bSortable': false,
                    'aTargets': [-1] /* 1st one, start by the right */
                }]
            });

        });
    </script>

    <script>
        $("#table_filter_search").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tbody tr").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    </script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home1/backendpro/public_html/shoaib/airwave/resources/views/campaign/campaign/index.blade.php ENDPATH**/ ?>