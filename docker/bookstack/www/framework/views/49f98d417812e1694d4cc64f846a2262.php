<input type="password" id="<?php echo e($name); ?>" name="<?php echo e($name); ?>"
       <?php if($errors->has($name)): ?> class="text-neg" <?php endif; ?>
       <?php if(isset($placeholder)): ?> placeholder="<?php echo e($placeholder); ?>" <?php endif; ?>
       <?php if(isset($autocomplete)): ?> autocomplete="<?php echo e($autocomplete); ?>" <?php endif; ?>
       <?php if(old($name)): ?> value="<?php echo e(old($name)); ?>" <?php endif; ?>>
<?php if($errors->has($name)): ?>
    <div class="text-neg text-small"><?php echo e($errors->first($name)); ?></div>
<?php endif; ?>
<?php /**PATH /app/www/resources/views/form/password.blade.php ENDPATH**/ ?>