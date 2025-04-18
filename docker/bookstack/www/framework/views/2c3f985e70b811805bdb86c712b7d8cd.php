<?php if(count($entities) > 0): ?>
    <div class="entity-list <?php echo e($style ?? ''); ?>">
        <?php $__currentLoopData = $entities; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $entity): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php echo $__env->make('entities.list-item', ['entity' => $entity, 'showPath' => $showPath ?? false, 'showTags' => $showTags ?? false], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php else: ?>
    <p class="text-muted empty-text pb-l mb-none">
        <?php echo e($emptyText ?? trans('common.no_items')); ?>

    </p>
<?php endif; ?><?php /**PATH /app/www/resources/views/entities/list.blade.php ENDPATH**/ ?>