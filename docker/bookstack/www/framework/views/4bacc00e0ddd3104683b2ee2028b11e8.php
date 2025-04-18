<?php $__env->startSection('body'); ?>

    <div class="container small">

        <?php echo $__env->make('settings.parts.navbar', ['selected' => 'webhooks'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

        <div class="card content-wrap auto-height">

            <div class="flex-container-row items-center justify-space-between wrap">
                <h1 class="list-heading"><?php echo e(trans('settings.webhooks')); ?></h1>

                <div>
                    <a href="<?php echo e(url("/settings/webhooks/create")); ?>"
                       class="button outline"><?php echo e(trans('settings.webhooks_create')); ?></a>
                </div>
            </div>

            <p class="text-muted"><?php echo e(trans('settings.webhooks_index_desc')); ?></p>

            <div class="flex-container-row items-center justify-space-between gap-m mt-m mb-l wrap">
                <div>
                    <div class="block inline mr-xs">
                        <form method="get" action="<?php echo e(url("/settings/webhooks")); ?>">
                            <input type="text"
                                   name="search"
                                   placeholder="<?php echo e(trans('common.search')); ?>"
                                   value="<?php echo e($listOptions->getSearch()); ?>">
                        </form>
                    </div>
                </div>
                <div class="justify-flex-end">
                    <?php echo $__env->make('common.sort', $listOptions->getSortControlData(), array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                </div>
            </div>

            <?php if(count($webhooks) > 0): ?>
                <div class="item-list">
                    <?php $__currentLoopData = $webhooks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $webhook): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php echo $__env->make('settings.webhooks.parts.webhooks-list-item', ['webhook' => $webhook], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php else: ?>
                <p class="text-muted empty-text px-none">
                    <?php echo e(trans('settings.webhooks_none_created')); ?>

                </p>
            <?php endif; ?>

            <div class="my-m">
                <?php echo e($webhooks->links()); ?>

            </div>

        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.simple', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /app/www/resources/views/settings/webhooks/index.blade.php ENDPATH**/ ?>