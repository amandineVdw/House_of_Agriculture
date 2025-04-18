<?php $__env->startSection('body'); ?>
    <div class="container small">

        <main class="card content-wrap mt-xxl">

            <h1 class="list-heading"><?php echo e(trans('entities.tags')); ?></h1>

            <p class="text-muted"><?php echo e(trans('entities.tags_index_desc')); ?></p>

            <div class="flex-container-row wrap justify-space-between items-center mb-s gap-m">
                <div class="block inline mr-xs">
                    <form method="get" action="<?php echo e(url("/tags")); ?>">
                        <?php echo $__env->make('form.request-query-inputs', ['params' => ['name']], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                        <input type="text"
                               name="search"
                               placeholder="<?php echo e(trans('common.search')); ?>"
                               value="<?php echo e($listOptions->getSearch()); ?>">
                    </form>
                </div>
                <div class="block inline">
                    <?php echo $__env->make('common.sort', $listOptions->getSortControlData(), array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                </div>
            </div>

            <?php if($nameFilter): ?>
                <div class="my-m">
                    <strong class="mr-xs"><?php echo e(trans('common.filter_active')); ?></strong>
                    <?php echo $__env->make('entities.tag', ['tag' => new \BookStack\Activity\Models\Tag(['name' => $nameFilter])], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                    <form method="get" action="<?php echo e(url("/tags")); ?>" class="inline block">
                        <?php echo $__env->make('form.request-query-inputs', ['params' => ['search']], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                        <button class="text-button text-warn"><?php echo (new \BookStack\Util\SvgIcon('close'))->toHtml(); ?><?php echo e(trans('common.filter_clear')); ?></button>
                    </form>
                </div>
            <?php endif; ?>

            <?php if(count($tags) > 0): ?>
                <div class="item-list mt-m">
                    <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php echo $__env->make('tags.parts.tags-list-item', ['tag' => $tag, 'nameFilter' => $nameFilter], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>

                <div class="my-m">
                    <?php echo e($tags->links()); ?>

                </div>
            <?php else: ?>
                <p class="text-muted italic my-xl">
                    <?php echo e(trans('common.no_items')); ?>.
                    <br>
                    <?php echo e(trans('entities.tags_list_empty_hint')); ?>

                </p>
            <?php endif; ?>
        </main>

    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.simple', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /app/www/resources/views/tags/index.blade.php ENDPATH**/ ?>