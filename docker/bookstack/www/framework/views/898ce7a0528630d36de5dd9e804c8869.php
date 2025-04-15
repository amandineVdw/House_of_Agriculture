
<?php echo $__env->make('form.custom-checkbox', [
       'name' => 'permissions[' . $permission . ']',
       'value' => 'true',
       'checked' => old('permissions'.$permission, false)|| (!old('display_name', false) && (isset($role) && $role->hasPermission($permission))),
       'label' => $label
], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /app/www/resources/views/settings/roles/parts/checkbox.blade.php ENDPATH**/ ?>