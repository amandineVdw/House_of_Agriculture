<?php $__env->startSection('body'); ?>
    <div class="container small pt-xl">
        <main class="card content-wrap">
            <h1 class="list-heading"><?php echo e($title); ?></h1>

            <div class="book-contents">
                <?php echo $__env->make('entities.list', ['entities' => $entities, 'style' => 'detailed'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            </div>

            <div class="text-right">
                <?php if($hasMoreLink): ?>
                    <a href="<?php echo e($hasMoreLink); ?>" class="button outline"><?php echo e(trans('common.more')); ?></a>
                <?php endif; ?>
            </div>
        </main>
    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.simple', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /app/www/resources/views/common/detailed-listing-with-more.blade.php ENDPATH**/ ?>