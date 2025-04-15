<?php $__env->startSection('card'); ?>
    <h1 id="features" class="list-heading"><?php echo e(trans('settings.app_features_security')); ?></h1>
    <form action="<?php echo e(url("/settings/features")); ?>" method="POST">
        <?php echo csrf_field(); ?>

        <input type="hidden" name="section" value="features">

        <div class="setting-list">


            <div class="grid half gap-xl">
                <div>
                    <label for="setting-app-public" class="setting-list-label"><?php echo e(trans('settings.app_public_access')); ?></label>
                    <p class="small"><?php echo trans('settings.app_public_access_desc'); ?></p>
                    <?php if(userCan('users-manage')): ?>
                        <p class="small mb-none">
                            <a href="<?php echo e(url($guestUser->getEditUrl())); ?>"><?php echo trans('settings.app_public_access_desc_guest'); ?></a>
                        </p>
                    <?php endif; ?>
                </div>
                <div>
                    <?php echo $__env->make('form.toggle-switch', [
                        'name' => 'setting-app-public',
                        'value' => setting('app-public'),
                        'label' => trans('settings.app_public_access_toggle'),
                    ], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                </div>
            </div>

            <div class="grid half gap-xl">
                <div>
                    <label class="setting-list-label"><?php echo e(trans('settings.app_secure_images')); ?></label>
                    <p class="small"><?php echo e(trans('settings.app_secure_images_desc')); ?></p>
                </div>
                <div>
                    <?php echo $__env->make('form.toggle-switch', [
                        'name' => 'setting-app-secure-images',
                        'value' => setting('app-secure-images'),
                        'label' => trans('settings.app_secure_images_toggle'),
                    ], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                </div>
            </div>

            <div class="grid half gap-xl">
                <div>
                    <label class="setting-list-label"><?php echo e(trans('settings.app_disable_comments')); ?></label>
                    <p class="small"><?php echo trans('settings.app_disable_comments_desc'); ?></p>
                </div>
                <div>
                    <?php echo $__env->make('form.toggle-switch', [
                        'name' => 'setting-app-disable-comments',
                        'value' => setting('app-disable-comments'),
                        'label' => trans('settings.app_disable_comments_toggle'),
                    ], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                </div>
            </div>


        </div>

        <div class="form-group text-right">
            <button type="submit" class="button"><?php echo e(trans('settings.settings_save')); ?></button>
        </div>
    </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('settings.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /app/www/resources/views/settings/categories/features.blade.php ENDPATH**/ ?>