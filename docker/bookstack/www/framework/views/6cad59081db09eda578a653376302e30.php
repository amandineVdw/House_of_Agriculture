
<?php $isOpen = setting()->getForCurrentUser('section_expansion#'. $key); ?>
<button component="expand-toggle"
        option:expand-toggle:target-selector="<?php echo e($target); ?>"
        option:expand-toggle:update-endpoint="<?php echo e(url('/preferences/change-expansion/' . $key)); ?>"
        option:expand-toggle:is-open="<?php echo e($isOpen ? 'true' : 'false'); ?>"
        type="button"
        class="icon-list-item <?php echo e($classes ?? ''); ?>">
    <span><?php echo (new \BookStack\Util\SvgIcon('expand-text'))->toHtml(); ?></span>
    <span><?php echo e(trans('common.toggle_details')); ?></span>
</button>
<?php if($isOpen): ?>
    <?php $__env->startPush('head'); ?>
        <style>
            <?php echo e($target); ?> {display: block;}
        </style>
    <?php $__env->stopPush(); ?>
<?php endif; ?><?php /**PATH /app/www/resources/views/home/parts/expand-toggle.blade.php ENDPATH**/ ?>