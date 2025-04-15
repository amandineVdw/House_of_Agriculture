<input type="date" id="<?php echo e($name); ?>" name="<?php echo e($name); ?>"
       <?php if($errors->has($name)): ?> class="text-neg" <?php endif; ?>
       placeholder="<?php echo e($placeholder ?? 'YYYY-MM-DD'); ?>"
       <?php if($autofocus ?? false): ?> autofocus <?php endif; ?>
       <?php if($disabled ?? false): ?> disabled="disabled" <?php endif; ?>
       <?php if(isset($model) || old($name)): ?> value="<?php echo e(old($name) ?? $model->$name->format('Y-m-d') ?? ''); ?>" <?php endif; ?>>
<?php if($errors->has($name)): ?>
    <div class="text-neg text-small"><?php echo e($errors->first($name)); ?></div>
<?php endif; ?>
<?php /**PATH /app/www/resources/views/form/date.blade.php ENDPATH**/ ?>