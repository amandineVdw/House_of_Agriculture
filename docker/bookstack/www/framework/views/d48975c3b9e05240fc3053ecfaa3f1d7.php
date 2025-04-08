
<label component="custom-checkbox" class="toggle-switch <?php if($errors->has($name)): ?> text-neg <?php endif; ?>">
    <input type="checkbox" name="<?php echo e($name); ?>" value="<?php echo e($value); ?>" <?php if($checked): ?> checked="checked" <?php endif; ?> <?php if($disabled ?? false): ?> disabled="disabled" <?php endif; ?>>
    <span tabindex="0" role="checkbox"
          aria-checked="<?php echo e($checked ? 'true' : 'false'); ?>"
          class="custom-checkbox text-primary"><?php echo (new \BookStack\Util\SvgIcon('check'))->toHtml(); ?></span>
    <span class="label"><?php echo e($label); ?></span>
</label><?php /**PATH /app/www/resources/views/form/custom-checkbox.blade.php ENDPATH**/ ?>