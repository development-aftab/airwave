<?php $__env->startSection('content'); ?>
    <div class="container-fluid">
        <!-- .row -->
        <div class="row">
            <div class="col-sm-12">
                <div class="white-box">
                    <h3 class="box-title pull-left"><?php echo e(preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'Campaign')); ?> <?php echo e($campaign->id); ?></h3>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-'.str_slug('Campaign'))): ?>
                        <a class="btn btn-success pull-right" href="<?php echo e(url('/campaign/campaign')); ?>">
                            <i class="icon-arrow-left-circle" aria-hidden="true"></i> Back</a>
                    <?php endif; ?>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="table-responsive">
                        <table class="table table">
                            <tbody>
                            <tr>
                                <th>ID</th>
                                <td><?php echo e($campaign->id); ?></td>
                            </tr>
                            <tr><th> Name </th><td> <?php echo e($campaign->name); ?> </td></tr><tr><th> Subject </th><td> <?php echo e($campaign->subject); ?> </td></tr><tr><th> Body </th><td> <?php echo $campaign->body; ?> </td></tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home1/backendpro/public_html/shoaib/airwave/resources/views/campaign/campaign/show.blade.php ENDPATH**/ ?>