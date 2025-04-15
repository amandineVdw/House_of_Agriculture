<div class="item-list-row flex-container-row py-xs items-center">
    <div class="py-xs px-m flex-2">
        <a href="<?php echo e(url("/settings/roles/{$role->id}")); ?>"><?php echo e($role->display_name); ?></a><br>
        <?php if($role->mfa_enforced): ?>
            <small title="<?php echo e(trans('settings.role_mfa_enforced')); ?>"><?php echo (new \BookStack\Util\SvgIcon('lock'))->toHtml(); ?> </small>
        <?php endif; ?>
        <small><?php echo e($role->description); ?></small>
    </div>
    <div class="text-right flex py-xs px-m text-muted">
        <?php echo e(trans_choice('settings.roles_x_users_assigned', $role->users_count, ['count' => $role->users_count])); ?>

        <br>
        <?php echo e(trans_choice('settings.roles_x_permissions_provided', $role->permissions_count, ['count' => $role->permissions_count])); ?>

    </div>
</div><?php /**PATH /app/www/resources/views/settings/roles/parts/roles-list-item.blade.php ENDPATH**/ ?>