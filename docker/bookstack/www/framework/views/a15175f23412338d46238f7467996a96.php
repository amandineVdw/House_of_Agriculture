<?php $__env->startSection('body'); ?>

    <div class="container small">

        <?php echo $__env->make('settings.parts.navbar', ['selected' => 'users'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

        <main class="card content-wrap">
            <h1 class="list-heading"><?php echo e(trans('settings.users_add_new')); ?></h1>

            <form action="<?php echo e(url("/settings/users/create")); ?>" method="post">
                <?php echo csrf_field(); ?>


                <div class="setting-list">
                    <?php echo $__env->make('users.parts.form', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                    <?php echo $__env->make('users.parts.language-option-row', ['value' => old('language') ?? config('app.default_locale')], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                </div>

                <div class="form-group text-right">
                    <a href="<?php echo e(url(userCan('users-manage') ? "/settings/users" : "/")); ?>" class="button outline"><?php echo e(trans('common.cancel')); ?></a>
                    <button class="button" type="submit"><?php echo e(trans('common.save')); ?></button>
                </div>

            </form>

        </main>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.simple', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /app/www/resources/views/users/create.blade.php ENDPATH**/ ?>