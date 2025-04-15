

<div component="page-picker"
     option:page-picker:selector-endpoint="<?php echo e($selectorEndpoint); ?>">
    <div class="input-base overflow-hidden height-auto">
        <span <?php if($value): ?> hidden <?php endif; ?> refs="page-picker@default-display" class="text-muted italic"><?php echo e($placeholder); ?></span>
        <a <?php if(!$value): ?> hidden <?php endif; ?> href="<?php echo e(url('/link/' . $value)); ?>" target="_blank" rel="noopener" class="text-page" refs="page-picker@display">#<?php echo e($value); ?>, <?php echo e($value ? \BookStack\Entities\Models\Page::query()->visible()->find($value)->name ?? '' : ''); ?></a>
    </div>
    <br>
    <input refs="page-picker@input" type="hidden" value="<?php echo e($value); ?>" name="<?php echo e($name); ?>" id="<?php echo e($name); ?>">
    <button <?php if(!$value): ?> hidden <?php endif; ?> type="button" refs="page-picker@reset-button" class="text-button"><?php echo e(trans('common.reset')); ?></button>
    <span refs="page-picker@button-seperator" <?php if(!$value): ?> hidden <?php endif; ?> class="sep">|</span>
    <button type="button" refs="page-picker@select-button" class="text-button"><?php echo e(trans('common.select')); ?></button>
</div><?php /**PATH /app/www/resources/views/form/page-picker.blade.php ENDPATH**/ ?>