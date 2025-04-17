<div class="flex-container-row item-list-row items-center wrap py-xs">
    <div class="px-m py-xs flex-container-row items-center flex-2 gap-l min-width-m">
        <img class="avatar med" width="40" height="40" src="<?php echo e($user->getAvatar(40)); ?>" alt="<?php echo e($user->name); ?>">
        <a href="<?php echo e(url("/settings/users/{$user->id}")); ?>">
            <?php echo e($user->name); ?>

            <br>
            <span class="text-muted"><?php echo e($user->email); ?></span>
            <?php if($user->mfa_values_count > 0): ?>
                <span title="MFA Configured" class="text-pos"><?php echo (new \BookStack\Util\SvgIcon('lock'))->toHtml(); ?></span>
            <?php endif; ?>
        </a>
    </div>
    <div class="flex-container-row items-center flex-3 min-width-m">
        <div class="px-m py-xs flex">
            <?php $__currentLoopData = $user->roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $index => $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <small><a href="<?php echo e(url("/settings/roles/{$role->id}")); ?>"><?php echo e($role->display_name); ?></a><?php if($index !== count($user->roles) -1): ?>,<?php endif; ?></small>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
        <div class="px-m py-xs flex text-right text-muted">
            <?php if($user->last_activity_at): ?>
                <small><?php echo e(trans('settings.users_latest_activity')); ?></small>
                <br>
                <small title="<?php echo e($user->last_activity_at->format('Y-m-d H:i:s')); ?>"><?php echo e($user->last_activity_at->diffForHumans()); ?></small>
            <?php endif; ?>
        </div>
    </div>
</div><?php /**PATH /app/www/resources/views/users/parts/users-list-item.blade.php ENDPATH**/ ?>