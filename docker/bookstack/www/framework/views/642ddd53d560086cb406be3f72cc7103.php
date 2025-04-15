<div class="item-list-row flex-container-row items-center wrap">
    <div class="flex py-s px-m min-width-s">
        <strong><?php echo e($title); ?></strong> <br>
        <a href="#" refs="permissions-table@toggle-row" class="text-small text-link"><?php echo e(trans('common.toggle_all')); ?></a>
    </div>
    <div class="flex py-s px-m min-width-xxs">
        <small class="hide-over-m bold"><?php echo e(trans('common.create')); ?><br></small>
        <?php if($permissionPrefix === 'page' || $permissionPrefix === 'chapter'): ?>
            <?php echo $__env->make('settings.roles.parts.checkbox', ['permission' => $permissionPrefix . '-create-own', 'label' => trans('settings.role_own')], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <br>
        <?php endif; ?>
        <?php echo $__env->make('settings.roles.parts.checkbox', ['permission' => $permissionPrefix . '-create-all', 'label' => trans('settings.role_all')], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    </div>
    <div class="flex py-s px-m min-width-xxs">
        <small class="hide-over-m bold"><?php echo e(trans('common.view')); ?><br></small>
        <?php echo $__env->make('settings.roles.parts.checkbox', ['permission' => $permissionPrefix . '-view-own', 'label' => trans('settings.role_own')], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <br>
        <?php echo $__env->make('settings.roles.parts.checkbox', ['permission' => $permissionPrefix . '-view-all', 'label' => trans('settings.role_all')], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    </div>
    <div class="flex py-s px-m min-width-xxs">
        <small class="hide-over-m bold"><?php echo e(trans('common.edit')); ?><br></small>
        <?php echo $__env->make('settings.roles.parts.checkbox', ['permission' => $permissionPrefix . '-update-own', 'label' => trans('settings.role_own')], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <br>
        <?php echo $__env->make('settings.roles.parts.checkbox', ['permission' => $permissionPrefix . '-update-all', 'label' => trans('settings.role_all')], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    </div>
    <div class="flex py-s px-m min-width-xxs">
        <small class="hide-over-m bold"><?php echo e(trans('common.delete')); ?><br></small>
        <?php echo $__env->make('settings.roles.parts.checkbox', ['permission' => $permissionPrefix . '-delete-own', 'label' => trans('settings.role_own')], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <br>
        <?php echo $__env->make('settings.roles.parts.checkbox', ['permission' => $permissionPrefix . '-delete-all', 'label' => trans('settings.role_all')], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    </div>
</div><?php /**PATH /app/www/resources/views/settings/roles/parts/asset-permissions-row.blade.php ENDPATH**/ ?>