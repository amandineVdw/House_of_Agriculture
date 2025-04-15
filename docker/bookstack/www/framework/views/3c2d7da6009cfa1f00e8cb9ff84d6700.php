<form action="<?php echo e(url('/watching/update')); ?>" method="POST">
    <?php echo e(csrf_field()); ?>

    <?php echo e(method_field('PUT')); ?>

    <input type="hidden" name="type" value="<?php echo e($entity->getMorphClass()); ?>">
    <input type="hidden" name="id" value="<?php echo e($entity->id); ?>">
    <button type="submit"
            name="level"
            value="updates"
            class="icon-list-item text-link">
        <span><?php echo (new \BookStack\Util\SvgIcon('watch'))->toHtml(); ?></span>
        <span><?php echo e(trans('entities.watch')); ?></span>
    </button>
</form><?php /**PATH /app/www/resources/views/entities/watch-action.blade.php ENDPATH**/ ?>