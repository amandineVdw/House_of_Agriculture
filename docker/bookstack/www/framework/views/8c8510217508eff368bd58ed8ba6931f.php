<div components="popup confirm-dialog"
     <?php if($id ?? false): ?> id="<?php echo e($id); ?>" <?php endif; ?>
     refs="confirm-dialog@popup <?php echo e($ref ?? false); ?>"
     class="popup-background">
    <div class="popup-body very-small" tabindex="-1">

        <div class="popup-header primary-background">
            <div class="popup-title"><?php echo e($title); ?></div>
            <button refs="popup@hide" type="button" class="popup-header-close"><?php echo (new \BookStack\Util\SvgIcon('close'))->toHtml(); ?></button>
        </div>

        <div class="px-m py-m">
            <?php echo e($slot); ?>


            <div class="text-right">
                <button type="button" class="button outline" refs="popup@hide"><?php echo e(trans('common.cancel')); ?></button>
                <button type="button" class="button" refs="confirm-dialog@confirm"><?php echo e(trans('common.continue')); ?></button>
            </div>
        </div>

    </div>
</div><?php /**PATH /app/www/resources/views/common/confirm-dialog.blade.php ENDPATH**/ ?>