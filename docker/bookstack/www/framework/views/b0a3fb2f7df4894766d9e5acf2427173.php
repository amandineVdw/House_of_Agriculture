<div id="entity-selector-wrap">
    <div components="popup entity-selector-popup" class="popup-background">
        <div class="popup-body small" tabindex="-1">
            <div class="popup-header primary-background">
                <div class="popup-title"><?php echo e(trans('entities.entity_select')); ?></div>
                <button refs="popup@hide" type="button" class="popup-header-close"><?php echo (new \BookStack\Util\SvgIcon('close'))->toHtml(); ?></button>
            </div>
            <?php echo $__env->make('entities.selector', ['name' => 'entity-selector', 'selectorEndpoint' => ''], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <div class="popup-footer">
                <button refs="entity-selector-popup@select" type="button" disabled class="button"><?php echo e(trans('common.select')); ?></button>
            </div>
        </div>
    </div>
</div><?php /**PATH /app/www/resources/views/entities/selector-popup.blade.php ENDPATH**/ ?>