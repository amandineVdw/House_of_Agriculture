<?php $__env->startSection('body'); ?>
    <div class="container small">

        <?php echo $__env->make('settings.parts.navbar', ['selected' => 'users'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

        <main class="card content-wrap">

            <div class="flex-container-row wrap justify-space-between items-center">
                <h1 class="list-heading"><?php echo e(trans('settings.users')); ?></h1>
                <div>
                    <a href="<?php echo e(url("/settings/users/create")); ?>" class="outline button my-none"><?php echo e(trans('settings.users_add_new')); ?></a>
                </div>
            </div>

            <p class="text-muted"><?php echo e(trans('settings.users_index_desc')); ?></p>

            <div class="flex-container-row items-center justify-space-between gap-m mt-m mb-l wrap">
                <div>
                    <div class="block inline mr-xs">
                        <form method="get" action="<?php echo e(url("/settings/users")); ?>">
                            <input type="text"
                                   name="search"
                                   placeholder="<?php echo e(trans('settings.users_search')); ?>"
                                   value="<?php echo e($listOptions->getSearch()); ?>">
                        </form>
                    </div>
                </div>
                <div class="justify-flex-end">
                    <?php echo $__env->make('common.sort', $listOptions->getSortControlData(), array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                </div>
            </div>

            <div class="item-list">
                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php echo $__env->make('users.parts.users-list-item', ['user' => $user], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>

            <div>
                <?php echo e($users->links()); ?>

            </div>
        </main>

    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.simple', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /app/www/resources/views/users/index.blade.php ENDPATH**/ ?>