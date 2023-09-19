<?php $__env->startSection('content'); ?>
<section id="wrapper" class="login-register">
    <div class="login-box">
        <div class="white-box">
            <form class="form-horizontal form-material" id="loginform" method="POST" action="<?php echo e(route('register')); ?>">
                <?php echo e(csrf_field()); ?>

                <h3 class="box-title m-b-20">Sign Up</h3>
                <div class="form-group ">
                    <div class="col-xs-12">
                        <input id="name" type="text" class="form-control<?php echo e($errors->has('name') ? ' is-invalid' : ''); ?>" placeholder="Name" name="name" value="<?php echo e(old('name')); ?>" required autofocus>

                        <?php if($errors->has('name')): ?>
                            <span class="invalid-feedback">
                                        <strong><?php echo e($errors->first('name')); ?></strong>
                                    </span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group ">
                    <div class="col-xs-12">
                        <input id="email" type="email" class="form-control<?php echo e($errors->has('email') ? ' is-invalid' : ''); ?>" name="email" placeholder="Email" value="<?php echo e(old('email')); ?>" required>

                        <?php if($errors->has('email')): ?>
                            <span class="invalid-feedback">
                                        <strong><?php echo e($errors->first('email')); ?></strong>
                                    </span>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="form-group ">
                    <div class="col-xs-12">
                        <input id="password" type="password" class="form-control<?php echo e($errors->has('password') ? ' is-invalid' : ''); ?>" placeholder="Password" name="password" required>

                        <?php if($errors->has('password')): ?>
                            <span class="invalid-feedback">
                                        <strong><?php echo e($errors->first('password')); ?></strong>
                                    </span>
                        <?php endif; ?>
                    </div>

                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <div class="checkbox checkbox-primary p-t-0">
                            <input id="checkbox-signup" type="checkbox">
                            <label for="checkbox-signup"> I agree to all <a href="#">Terms</a></label>
                        </div>
                    </div>
                </div>
                <div class="form-group text-center m-t-20">
                    <div class="col-xs-12">
                        <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Sign Up</button>
                    </div>
                </div>
                <div class="form-group m-b-0">
                    <div class="col-sm-12 text-center">
                        <p>Already have an account? <a href="<?php echo e(route('login')); ?>" class="text-primary m-l-5"><b>Sign In</b></a></p>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home1/backendpro/public_html/shoaib/airwave/resources/views/auth/register.blade.php ENDPATH**/ ?>