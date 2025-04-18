<?php $__env->startSection('body'); ?>
    <div class="container medium">

        <div class="grid gap-xxl right-focus my-xl">

            <div>
                <div class="sticky-top-m">
                    <h5><?php echo e(trans('preferences.my_account')); ?></h5>
                    <nav class="active-link-list in-sidebar">
                        <a href="<?php echo e(url('/my-account/profile')); ?>" class="<?php echo e($category === 'profile' ? 'active' : ''); ?>"><?php echo (new \BookStack\Util\SvgIcon('user'))->toHtml(); ?> <?php echo e(trans('preferences.profile')); ?></a>
                        <a href="<?php echo e(url('/my-account/auth')); ?>" class="<?php echo e($category === 'auth' ? 'active' : ''); ?>"><?php echo (new \BookStack\Util\SvgIcon('security'))->toHtml(); ?> <?php echo e(trans('preferences.auth')); ?></a>
                        <a href="<?php echo e(url('/my-account/shortcuts')); ?>" class="<?php echo e($category === 'shortcuts' ? 'active' : ''); ?>"><?php echo (new \BookStack\Util\SvgIcon('shortcuts'))->toHtml(); ?> <?php echo e(trans('preferences.shortcuts_interface')); ?></a>
                        <?php if(userCan('receive-notifications')): ?>
                            <a href="<?php echo e(url('/my-account/notifications')); ?>" class="<?php echo e($category === 'notifications' ? 'active' : ''); ?>"><?php echo (new \BookStack\Util\SvgIcon('notifications'))->toHtml(); ?> <?php echo e(trans('preferences.notifications')); ?></a>
                        <?php endif; ?>
                    </nav>
                </div>
            </div>

            <div>
                <?php echo $__env->yieldContent('main'); ?>
            </div>

        </div>

    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.simple', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /app/www/resources/views/users/account/layout.blade.php ENDPATH**/ ?>