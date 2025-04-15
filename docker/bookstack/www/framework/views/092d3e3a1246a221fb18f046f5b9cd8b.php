<?php $__env->startSection('body'); ?>

    <div class="container small">

        <?php echo $__env->make('settings.parts.navbar', ['selected' => 'roles'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

        <div class="card content-wrap auto-height">

            <div class="grid half v-center">
                <h1 class="list-heading"><?php echo e(trans('settings.role_user_roles')); ?></h1>

                <div class="text-right">
                    <a href="<?php echo e(url("/settings/roles/new")); ?>" class="button outline my-none"><?php echo e(trans('settings.role_create')); ?></a>
                </div>
            </div>

            <p class="text-muted"><?php echo e(trans('settings.roles_index_desc')); ?></p>

            <div class="flex-container-row items-center justify-space-between gap-m mt-m mb-l wrap">
                <div>
                    <div class="block inline mr-xs">
                        <form method="get" action="<?php echo e(url("/settings/roles")); ?>">
                            <input type="text"
                                   name="search"
                                   placeholder="<?php echo e(trans('common.search')); ?>"
                                   value="<?php echo e($listOptions->getSearch()); ?>">
                        </form>
                    </div>
                </div>
                <div class="justify-flex-end">
                    <?php echo $__env->make('common.sort', $listOptions->getSortControlData(), array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                </div>
            </div>

            <div class="item-list">
                <?php $__currentLoopData = $roles; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo $__env->make('settings.roles.parts.roles-list-item', ['role' => $role], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <div class="mb-m">
                <?php echo e($roles->links()); ?>

            </div>

        </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.simple', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /app/www/resources/views/settings/roles/index.blade.php ENDPATH**/ ?>