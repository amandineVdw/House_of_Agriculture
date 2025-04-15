<form action="<?php echo e(url('/preferences/toggle-dark-mode')); ?>" method="post">
    <?php echo e(csrf_field()); ?>

    <?php echo e(method_field('patch')); ?>

    <input type="hidden" name="_return" value="<?php echo e(url()->current()); ?>">
    <?php if(setting()->getForCurrentUser('dark-mode-enabled')): ?>
        <button class="<?php echo e($classes ?? ''); ?>"><span><?php echo (new \BookStack\Util\SvgIcon('light-mode'))->toHtml(); ?></span><span><?php echo e(trans('common.light_mode')); ?></span></button>
    <?php else: ?>
        <button class="<?php echo e($classes ?? ''); ?>"><span><?php echo (new \BookStack\Util\SvgIcon('dark-mode'))->toHtml(); ?></span><span><?php echo e(trans('common.dark_mode')); ?></span></button>
    <?php endif; ?>
</form><?php /**PATH /app/www/resources/views/common/dark-mode-toggle.blade.php ENDPATH**/ ?>