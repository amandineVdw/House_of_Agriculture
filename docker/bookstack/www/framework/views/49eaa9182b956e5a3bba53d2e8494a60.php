<?php $__env->startSection('body'); ?>

    <div class="container small">
        <?php echo $__env->make('settings.parts.navbar', ['selected' => 'roles'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

        <div class="card content-wrap">
            <h1 class="list-heading"><?php echo e(trans('settings.role_edit')); ?></h1>

            <form action="<?php echo e(url("/settings/roles/{$role->id}")); ?>" method="POST">
                <?php echo e(csrf_field()); ?>

                <?php echo e(method_field('PUT')); ?>


                <?php echo $__env->make('settings.roles.parts.form', ['role' => $role], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

                <div class="form-group text-right">
                    <a href="<?php echo e(url("/settings/roles")); ?>" class="button outline"><?php echo e(trans('common.cancel')); ?></a>
                    <a href="<?php echo e(url("/settings/roles/new?copy_from={$role->id}")); ?>" class="button outline"><?php echo e(trans('common.copy')); ?></a>
                    <a href="<?php echo e(url("/settings/roles/delete/{$role->id}")); ?>" class="button outline"><?php echo e(trans('settings.role_delete')); ?></a>
                    <button type="submit" class="button"><?php echo e(trans('settings.role_save')); ?></button>
                </div>
            </form>

        </div>


        <div class="card content-wrap auto-height">
            <h2 class="list-heading"><?php echo e(trans('settings.role_users')); ?></h2>
            <?php if(count($role->users ?? []) > 0): ?>
                <div class="grid third">
                    <?php $__currentLoopData = $role->users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="user-list-item">
                            <div>
                                <img class="avatar small" src="<?php echo e($user->getAvatar(40)); ?>" alt="<?php echo e($user->name); ?>">
                            </div>
                            <div>
                                <?php if(userCan('users-manage') || user()->id == $user->id): ?>
                                    <a href="<?php echo e(url("/settings/users/{$user->id}")); ?>">
                                        <?php endif; ?>
                                        <?php echo e($user->name); ?>

                                        <?php if(userCan('users-manage') || user()->id == $user->id): ?>
                                    </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php else: ?>
                <p class="text-muted">
                    <?php echo e(trans('settings.role_users_none')); ?>

                </p>
            <?php endif; ?>
        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.simple', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /app/www/resources/views/settings/roles/edit.blade.php ENDPATH**/ ?>