
<?php if(count($activity) > 0): ?>
    <div class="activity-list">
        <?php $__currentLoopData = $activity; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $activityItem): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="activity-list-item">
                <?php echo $__env->make('common.activity-item', ['activity' => $activityItem], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
<?php else: ?>
    <p class="text-muted empty-text mb-none pb-l"><?php echo e(trans('common.no_activity')); ?></p>
<?php endif; ?><?php /**PATH /app/www/resources/views/common/activity-list.blade.php ENDPATH**/ ?>