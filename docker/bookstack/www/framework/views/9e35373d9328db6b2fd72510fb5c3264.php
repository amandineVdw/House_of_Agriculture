
<?php if($user): ?>
    <a href="<?php echo e($user->getEditUrl()); ?>" class="flex-container-row inline gap-s items-center">
        <div class="flex-none"><img width="40" height="40" class="avatar block" src="<?php echo e($user->getAvatar(40)); ?>" alt="<?php echo e($user->name); ?>"></div>
        <div class="flex"><?php echo e($user->name); ?></div>
    </a>
<?php else: ?>
    [ID: <?php echo e($user_id); ?>] <?php echo e(trans('common.deleted_user')); ?>

<?php endif; ?><?php /**PATH /app/www/resources/views/settings/parts/table-user.blade.php ENDPATH**/ ?>