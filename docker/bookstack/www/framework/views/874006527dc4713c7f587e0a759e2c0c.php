<label components="custom-checkbox toggle-switch" class="toggle-switch">
    <input type="hidden" name="<?php echo e($name); ?>" value="<?php echo e($value?'true':'false'); ?>"/>
    <input type="checkbox" <?php if($value): ?> checked="checked" <?php endif; ?>>
    <span tabindex="0" role="checkbox"
          aria-checked="<?php echo e($value ? 'true' : 'false'); ?>"
          class="custom-checkbox text-primary"><?php echo (new \BookStack\Util\SvgIcon('check'))->toHtml(); ?></span>
    <span class="label"><?php echo e($label); ?></span>
</label><?php /**PATH /app/www/resources/views/form/toggle-switch.blade.php ENDPATH**/ ?>