<?php $__env->startSection('content'); ?>
    <div class="container-fluid custom_form_shadow">
        <div class="row">
            <div class="col-md-12">
                    <h3 class="box-title pull-left">Create New <?php echo e(preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'SentEmail')); ?></h3>
                    <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('view-'.str_slug('SentEmail'))): ?>
                    <a  class="btn btn-success pull-right" href="<?php echo e(url('/sentEmail/sent-email')); ?>"><i class="icon-arrow-left-circle"></i> Add <?php echo e(preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', 'SentEmail')); ?></a>
                    <?php endif; ?>

                    <div class="clearfix"></div>
                    <?php if($errors->any()): ?>
                        <ul class="alert alert-danger">
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    <?php endif; ?>

                    <form method="POST" action="<?php echo e(url('/sentEmail/sent-email')); ?>" accept-charset="UTF-8"
                          class="form-horizontal" enctype="multipart/form-data">
                        <?php echo e(csrf_field()); ?>

                        <div class="row">
                            <?php echo $__env->make('sentEmail.sent-email.form', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home1/backendpro/public_html/shoaib/airwave/resources/views/sentEmail/sent-email/create.blade.php ENDPATH**/ ?>