<?php $__env->startSection('body'); ?>
    <div class="container medium">

        <?php echo $__env->make('settings.parts.navbar', ['selected' => 'settings'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

        <div class="grid gap-xxl right-focus">

            <div>
                <h5><?php echo e(trans('settings.categories')); ?></h5>
                <nav class="active-link-list in-sidebar">
                    <a href="<?php echo e(url('/settings/features')); ?>" class="<?php echo e($category === 'features' ? 'active' : ''); ?>"><?php echo (new \BookStack\Util\SvgIcon('star'))->toHtml(); ?> <?php echo e(trans('settings.app_features_security')); ?></a>
                    <a href="<?php echo e(url('/settings/customization')); ?>" class="<?php echo e($category === 'customization' ? 'active' : ''); ?>"><?php echo (new \BookStack\Util\SvgIcon('palette'))->toHtml(); ?> <?php echo e(trans('settings.app_customization')); ?></a>
                    <a href="<?php echo e(url('/settings/registration')); ?>" class="<?php echo e($category === 'registration' ? 'active' : ''); ?>"><?php echo (new \BookStack\Util\SvgIcon('security'))->toHtml(); ?> <?php echo e(trans('settings.reg_settings')); ?></a>
                    <a href="<?php echo e(url('/settings/sorting')); ?>" class="<?php echo e($category === 'sorting' ? 'active' : ''); ?>"><?php echo (new \BookStack\Util\SvgIcon('sort'))->toHtml(); ?> <?php echo e(trans('settings.sorting')); ?></a>
                </nav>

                <h5 class="mt-xl"><?php echo e(trans('settings.system_version')); ?></h5>
                <div class="py-xs">
                    <a target="_blank" rel="noopener noreferrer" href="https://github.com/BookStackApp/BookStack/releases">
                        BookStack <?php if(!str_starts_with($version, 'v')): ?> version <?php endif; ?> <?php echo e($version); ?>

                    </a>
                    <br>
                    <a target="_blank" href="<?php echo e(url('/licenses')); ?>" class="text-muted"><?php echo e(trans('settings.license_details')); ?></a>
                </div>
            </div>

            <div>
                <div class="card content-wrap auto-height">
                    <?php echo $__env->yieldContent('card'); ?>
                </div>
                <?php echo $__env->yieldContent('after-card'); ?>
            </div>

        </div>

    </div>

    <?php echo $__env->yieldContent('after-content'); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.simple', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /app/www/resources/views/settings/layout.blade.php ENDPATH**/ ?>