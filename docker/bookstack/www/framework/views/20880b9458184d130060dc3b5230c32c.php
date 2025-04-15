
<?php
    $keyAppends = ($mode === 'light' ? '' : '-' . $mode);
?>
<div component="setting-color-picker"
     option:setting-color-picker:default="<?php echo e(config('setting-defaults.'. $type .'-color' . $keyAppends)); ?>"
     option:setting-color-picker:current="<?php echo e(setting($type .'-color' . $keyAppends)); ?>"
     class="grid no-break half mb-l">
    <div>
        <label for="setting-<?php echo e($type); ?>-color<?php echo e($keyAppends); ?>" class="text-dark"><?php echo e(trans('settings.'. str_replace('-', '_', $type) .'_color')); ?></label>
        <button refs="setting-color-picker@default-button" type="button" class="text-button text-muted"><?php echo e(trans('common.default')); ?></button>
        <span class="sep">|</span>
        <button refs="setting-color-picker@reset-button" type="button" class="text-button text-muted"><?php echo e(trans('common.reset')); ?></button>
    </div>
    <div>
        <input type="color"
               refs="setting-color-picker@input"
               value="<?php echo e(setting($type . '-color' . $keyAppends)); ?>"
               name="setting-<?php echo e($type); ?>-color<?php echo e($keyAppends); ?>"
               id="setting-<?php echo e($type); ?>-color<?php echo e($keyAppends); ?>"
               placeholder="<?php echo e(config('setting-defaults.'. $type .'-color' . $keyAppends)); ?>"
               class="small">
    </div>
</div>
<?php /**PATH /app/www/resources/views/settings/parts/setting-color-picker.blade.php ENDPATH**/ ?>