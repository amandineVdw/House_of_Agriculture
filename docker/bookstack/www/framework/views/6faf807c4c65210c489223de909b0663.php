
<?php echo $__env->make('form.custom-checkbox', [
    'name' => $name,
    'label' => $label,
    'value' => 'true',
    'checked' => old($name) || (!old() && isset($model) && $model->$name)
], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

<?php if($errors->has($name)): ?>
    <div class="text-neg text-small"><?php echo e($errors->first($name)); ?></div>
<?php endif; ?><?php /**PATH /app/www/resources/views/form/checkbox.blade.php ENDPATH**/ ?>