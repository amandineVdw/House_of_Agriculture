<?php $__env->startSection('body'); ?>
    <div class="container small pt-xl">

        <div class="card content-wrap auto-height">
            <h1 class="list-heading"><?php echo e(trans('settings.user_api_token_delete')); ?></h1>

            <p><?php echo e(trans('settings.user_api_token_delete_warning', ['tokenName' => $token->name])); ?></p>

            <div class="grid half">
                <p class="text-neg"><strong><?php echo e(trans('settings.user_api_token_delete_confirm')); ?></strong></p>
                <div>
                    <form action="<?php echo e($token->getUrl()); ?>" method="POST" class="text-right">
                        <?php echo e(csrf_field()); ?>

                        <?php echo e(method_field('delete')); ?>


                        <a href="<?php echo e($token->getUrl()); ?>" class="button outline"><?php echo e(trans('common.cancel')); ?></a>
                        <button type="submit" class="button"><?php echo e(trans('common.confirm')); ?></button>
                    </form>
                </div>
            </div>

        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.simple', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /app/www/resources/views/users/api-tokens/delete.blade.php ENDPATH**/ ?>