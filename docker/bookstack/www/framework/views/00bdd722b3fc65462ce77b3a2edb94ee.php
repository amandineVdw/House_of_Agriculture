<?php $__env->startSection('body'); ?>

    <div class="container small pt-xl">

        <main class="card content-wrap auto-height">
            <h1 class="list-heading"><?php echo e(trans('settings.user_api_token')); ?></h1>

            <form action="<?php echo e($token->getUrl()); ?>" method="post">
                <?php echo e(method_field('put')); ?>

                <?php echo e(csrf_field()); ?>


                <div class="setting-list">

                    <div class="grid half gap-xl v-center">
                        <div>
                            <label class="setting-list-label"><?php echo e(trans('settings.user_api_token_id')); ?></label>
                            <p class="small"><?php echo e(trans('settings.user_api_token_id_desc')); ?></p>
                        </div>
                        <div>
                            <?php echo $__env->make('form.text', ['name' => 'token_id', 'readonly' => true], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                        </div>
                    </div>


                    <?php if( $secret ): ?>
                        <div class="grid half gap-xl v-center">
                            <div>
                                <label class="setting-list-label"><?php echo e(trans('settings.user_api_token_secret')); ?></label>
                                <p class="small text-warn"><?php echo e(trans('settings.user_api_token_secret_desc')); ?></p>
                            </div>
                            <div>
                                <input type="text" readonly="readonly" value="<?php echo e($secret); ?>">
                            </div>
                        </div>
                    <?php endif; ?>

                    <?php echo $__env->make('users.api-tokens.parts.form', ['model' => $token], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                </div>

                <div class="grid half gap-xl v-center">

                    <div class="text-muted text-small">
                        <span title="<?php echo e($token->created_at); ?>">
                            <?php echo e(trans('settings.user_api_token_created', ['timeAgo' => $token->created_at->diffForHumans()])); ?>

                        </span>
                        <br>
                        <span title="<?php echo e($token->updated_at); ?>">
                            <?php echo e(trans('settings.user_api_token_updated', ['timeAgo' => $token->created_at->diffForHumans()])); ?>

                        </span>
                    </div>

                    <div class="form-group text-right">
                        <a href="<?php echo e($back); ?>" class="button outline"><?php echo e(trans('common.back')); ?></a>
                        <a href="<?php echo e($token->getUrl('/delete')); ?>" class="button outline"><?php echo e(trans('settings.user_api_token_delete')); ?></a>
                        <button class="button" type="submit"><?php echo e(trans('common.save')); ?></button>
                    </div>
                </div>

            </form>

        </main>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.simple', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /app/www/resources/views/users/api-tokens/edit.blade.php ENDPATH**/ ?>