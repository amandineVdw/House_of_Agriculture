<?php $__env->startSection('content'); ?>
    <div class="container very-small mt-xl">
        <div class="card content-wrap auto-height">
            <h1 class="list-heading"><?php echo e(trans('auth.reset_password')); ?></h1>

            <p class="text-muted small"><?php echo e(trans('auth.reset_password_send_instructions')); ?></p>

            <form action="<?php echo e(url("/password/email")); ?>" method="POST" class="stretch-inputs">
                <?php echo csrf_field(); ?>


                <div class="form-group">
                    <label for="email"><?php echo e(trans('auth.email')); ?></label>
                    <?php echo $__env->make('form.text', ['name' => 'email'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                </div>

                <div class="from-group text-right mt-m">
                    <button class="button"><?php echo e(trans('auth.reset_password_send_button')); ?></button>
                </div>
            </form>

        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.simple', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /app/www/resources/views/auth/passwords/email.blade.php ENDPATH**/ ?>