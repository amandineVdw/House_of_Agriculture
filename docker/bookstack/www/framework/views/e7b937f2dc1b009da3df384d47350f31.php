
<div class="toggle-switch-list dual-column-content">
    <input type="hidden" name="<?php echo e($name); ?>[0]" value="0">
    <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div>
            <?php echo $__env->make('form.custom-checkbox', [
                'name' => $name . '[' . strval($role->id) . ']',
                'label' => $role->display_name,
                'value' => $role->id,
                'checked' => old($name . '.' . strval($role->id)) || (!old('name') && isset($model) && $model->hasRole($role->id))
            ], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<?php if($errors->has($name)): ?>
    <div class="text-neg text-small"><?php echo e($errors->first($name)); ?></div>
<?php endif; ?><?php /**PATH /app/www/resources/views/form/role-checkboxes.blade.php ENDPATH**/ ?>