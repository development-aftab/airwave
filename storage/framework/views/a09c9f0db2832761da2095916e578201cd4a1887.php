<?php $__env->startPush('css'); ?>
    <link href="<?php echo e(asset('plugins/components/datatables/jquery.dataTables.min.css')); ?>" rel="stylesheet" type="text/css"/>
    <link href="https://cdn.datatables.net/buttons/1.2.2/css/buttons.dataTables.min.css" rel="stylesheet"
          type="text/css"/>
          <style type="text/css">
                .dataTables_filter input {
                border: 3px dashed rgb(38 35 35)!important;  
            }
    .info-box .info-count {
        margin-top: 0px !important;
    }

    .inner_section_table .dataTables_length, .inner_section_table .dataTables_filter{display: block !important;}

</style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container-fluid search_space">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                    <h1 class="box-title pull-left"><?php echo e(preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'SentEmail')); ?></h1>
                    
                    <div class="clearfix"></div>
                        <div class="inner_section_table search_bar_position">
                            <div class="table-responsive">
                                <table class="table table-fixed sticker_table" id="myTable">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Group</th>
                                        <th>Campaign</th>
                                        <th>Recepient</th>
                                        <th>Date</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $__currentLoopData = $sentemail; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($loop->iteration??$item->id); ?></td>
                                            <td><?php echo e($item->group->name??''); ?></td>
                                            <td><?php echo e($item->campaign->name??''); ?></td>
                                            <td><?php echo e($item->to??''); ?></td>
                                            <td><?php echo e($item->created_at->format('Y-m-d | h:i:s')); ?></td>
                                            <td>
                                                <div class="dropdown">
                                                    <button class="btn dropdown-toggle action_btn" type="button"
                                                        id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                        aria-expanded="false">
                                                        <i class="fa-solid fa-ellipsis"></i>
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-'.str_slug('SentEmail'))): ?>
                                                        <a class="dropdown-item" href="<?php echo e(url('/sentEmail/sent-email/' . $item->id)); ?>">View</a>
                                                        <?php endif; ?>
                                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('edit-'.str_slug('SentEmail'))): ?>
                                                        <a class="dropdown-item" href="<?php echo e(url('/sentEmail/sent-email/' . $item->id . '/edit')); ?>"> <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a>
                                                        <?php endif; ?>
                                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('delete-'.str_slug('SentEmail'))): ?>
                                                        
                                                        <form method="POST"
                                                        action="<?php echo e(url('/sentEmail/sent-email' . '/' . $item->id)); ?>"
                                                        accept-charset="UTF-8" style="display:inline">
                                                        <?php echo e(method_field('DELETE')); ?>

                                                        <?php echo e(csrf_field()); ?>

                                                            <button type="submit" class="dropdown-item"
                                                                    title="Delete <?php echo e(preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'SentEmail')); ?>"
                                                                    onclick="return confirm(&quot;Confirm delete?&quot;)">Delete
                                                            </button>
                                                        </form>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </tbody>
                                </table>
                                <div class="pagination-wrapper"> <?php echo $sentemail->appends(['search' => Request::get('search')])->render(); ?> </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>

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
                "bPaginate": false,
                "bInfo": false,
                'aoColumnDefs': [{
                    'bSortable': false,
                    'aTargets': [-1] /* 1st one, start by the right */
                }]
            });

        });
    </script>

<?php $__env->stopPush(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home1/backendpro/public_html/shoaib/airwave/resources/views/sentEmail/sent-email/index.blade.php ENDPATH**/ ?>