<form action="<?php echo e(url('/login')); ?>" method="POST" id="login-form" class="mt-l">
    <?php echo csrf_field(); ?>


    <div class="stretch-inputs">
        <div class="form-group">
            <label for="email"><?php echo e(trans('auth.email')); ?></label>
            <?php echo $__env->make('form.text', ['name' => 'email', 'autofocus' => true], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        </div>

        <div class="form-group">
            <label for="password"><?php echo e(trans('auth.password')); ?></label>
            <?php echo $__env->make('form.password', ['name' => 'password'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <div class="small mt-s">
                <a href="<?php echo e(url('/password/email')); ?>"><?php echo e(trans('auth.forgot_password')); ?></a>
            </div>
        </div>
    </div>

    <div class="grid half collapse-xs gap-xl v-center">
        <div class="text-left ml-xxs">
            <?php echo $__env->make('form.custom-checkbox', [
                'name' => 'remember',
                'checked' => false,
                'value' => 'on',
                'label' => trans('auth.remember_me'),
            ], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        </div>

        <div class="text-right">
            <button class="button"><?php echo e(Str::title(trans('auth.log_in'))); ?></button>
        </div>
    </div>

</form>


<?php /**PATH /app/www/resources/views/auth/parts/login-form-standard.blade.php ENDPATH**/ ?>