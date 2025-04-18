<section class="card content-wrap auto-height" id="api_tokens">
    <div class="flex-container-row wrap justify-space-between items-center mb-s">
        <h2 class="list-heading"><?php echo e(trans('settings.users_api_tokens')); ?></h2>
        <div class="text-right pt-xs">
            <?php if(userCan('access-api')): ?>
                <a href="<?php echo e(url('/api/docs')); ?>" class="button outline"><?php echo e(trans('settings.users_api_tokens_docs')); ?></a>
                <a href="<?php echo e(url('/api-tokens/' . $user->id . '/create?context=' . $context)); ?>" class="button outline"><?php echo e(trans('settings.users_api_tokens_create')); ?></a>
            <?php endif; ?>
        </div>
    </div>
    <p class="text-small text-muted"><?php echo e(trans('settings.users_api_tokens_desc')); ?></p>
    <?php if(count($user->apiTokens) > 0): ?>
        <div class="item-list my-m">
            <?php $__currentLoopData = $user->apiTokens; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $token): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="item-list-row flex-container-row items-center wrap py-xs gap-x-m">
                    <div class="flex px-m py-xs min-width-m">
                        <a href="<?php echo e($token->getUrl("?context={$context}")); ?>"><?php echo e($token->name); ?></a> <br>
                        <span class="small text-muted italic"><?php echo e($token->token_id); ?></span>
                    </div>
                    <div class="flex flex-container-row items-center min-width-m">
                        <div class="flex px-m py-xs text-muted">
                            <strong class="text-small"><?php echo e(trans('settings.users_api_tokens_expires')); ?></strong> <br>
                            <?php echo e($token->expires_at->format('Y-m-d') ?? ''); ?>

                        </div>
                        <div class="flex px-m py-xs text-right">
                            <a class="button outline small" href="<?php echo e($token->getUrl("?context={$context}")); ?>"><?php echo e(trans('common.edit')); ?></a>
                        </div>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php else: ?>
        <p class="text-muted italic py-m"><?php echo e(trans('settings.users_api_tokens_none')); ?></p>
    <?php endif; ?>
</section><?php /**PATH /app/www/resources/views/users/api-tokens/parts/list.blade.php ENDPATH**/ ?>