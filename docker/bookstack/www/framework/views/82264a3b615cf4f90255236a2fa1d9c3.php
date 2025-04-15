<?php $__env->startSection('body'); ?>

    <div class="container small pt-xl">

        <main class="card content-wrap auto-height">
            <h1 class="list-heading"><?php echo e(trans('settings.user_api_token_create')); ?></h1>

            <form action="<?php echo e(url('/api-tokens/' . $user->id . '/create')); ?>" method="post">
                <?php echo e(csrf_field()); ?>


                <div class="setting-list">
                    <?php echo $__env->make('users.api-tokens.parts.form', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

                    <div>
                        <p class="text-warn italic">
                            <?php echo e(trans('settings.user_api_token_create_secret_message')); ?>

                        </p>
                    </div>
                </div>

                <div class="form-group text-right">
                    <a href="<?php echo e($back); ?>" class="button outline"><?php echo e(trans('common.cancel')); ?></a>
                    <button class="button" type="submit"><?php echo e(trans('common.save')); ?></button>
                </div>

            </form>

        </main>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.simple', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /app/www/resources/views/users/api-tokens/create.blade.php ENDPATH**/ ?>