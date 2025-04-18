<input type="text" id="<?php echo e($name); ?>" name="<?php echo e($name); ?>"
       <?php if($errors->has($name)): ?> class="text-neg" <?php endif; ?>
       <?php if(isset($placeholder)): ?> placeholder="<?php echo e($placeholder); ?>" <?php endif; ?>
       <?php if($autofocus ?? false): ?> autofocus <?php endif; ?>
       <?php if($disabled ?? false): ?> disabled="disabled" <?php endif; ?>
       <?php if($readonly ?? false): ?> readonly="readonly" <?php endif; ?>
       <?php if(isset($model) || old($name)): ?> value="<?php echo e(old($name) ? old($name) : $model->$name); ?>" <?php endif; ?>>
<?php if($errors->has($name)): ?>
    <div class="text-neg text-small"><?php echo e($errors->first($name)); ?></div>
<?php endif; ?>
<?php /**PATH /app/www/resources/views/form/text.blade.php ENDPATH**/ ?>