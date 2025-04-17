<?php $__env->startSection('main'); ?>

    <section class="card content-wrap auto-height">
        <form action="<?php echo e(url('/my-account/profile')); ?>" method="post" enctype="multipart/form-data">
            <?php echo e(method_field('put')); ?>

            <?php echo e(csrf_field()); ?>


            <div class="flex-container-row gap-l items-center wrap justify-space-between">
                <h1 class="list-heading"><?php echo e(trans('preferences.profile')); ?></h1>
                <div>
                    <a href="<?php echo e(user()->getProfileUrl()); ?>" class="button outline"><?php echo e(trans('preferences.profile_view_public')); ?></a>
                </div>
            </div>

            <p class="text-muted text-small mb-none"><?php echo e(trans('preferences.profile_desc')); ?></p>

            <div class="setting-list">

                <div class="flex-container-row gap-l items-center wrap">
                    <div class="flex">
                        <label class="setting-list-label" for="name"><?php echo e(trans('auth.name')); ?></label>
                        <p class="text-small mb-none"><?php echo e(trans('preferences.profile_name_desc')); ?></p>
                    </div>
                    <div class="flex stretch-inputs">
                        <?php echo $__env->make('form.text', ['name' => 'name'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                    </div>
                </div>

                <div>
                    <div class="flex-container-row gap-l items-center wrap">
                        <div class="flex">
                            <label class="setting-list-label" for="email"><?php echo e(trans('auth.email')); ?></label>
                            <p class="text-small mb-none"><?php echo e(trans('preferences.profile_email_desc')); ?></p>
                        </div>
                        <div class="flex stretch-inputs">
                            <?php echo $__env->make('form.text', ['name' => 'email', 'disabled' => !userCan('users-manage')], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                        </div>
                    </div>
                    <?php if(!userCan('users-manage')): ?>
                        <p class="text-small text-muted"><?php echo e(trans('preferences.profile_email_no_permission')); ?></p>
                    <?php endif; ?>
                </div>

                <div class="grid half gap-xl">
                    <div>
                        <label for="user-avatar"
                               class="setting-list-label"><?php echo e(trans('settings.users_avatar')); ?></label>
                        <p class="text-small"><?php echo e(trans('preferences.profile_avatar_desc')); ?></p>
                    </div>
                    <div>
                        <?php echo $__env->make('form.image-picker', [
                            'resizeHeight' => '512',
                            'resizeWidth' => '512',
                            'showRemove' => false,
                            'defaultImage' => url('/user_avatar.png'),
                            'currentImage' => user()->getAvatar(80),
                            'currentId' => user()->image_id,
                            'name' => 'profile_image',
                            'imageClass' => 'avatar large'
                        ], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                    </div>
                </div>

                <?php echo $__env->make('users.parts.language-option-row', ['value' => old('language') ?? user()->getLocale()->appLocale()], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

            </div>

            <div class="form-group text-right">
                <a href="<?php echo e(url('/my-account/delete')); ?>" class="button outline"><?php echo e(trans('preferences.delete_account')); ?></a>
                <button class="button"><?php echo e(trans('common.save')); ?></button>
            </div>

        </form>
    </section>

    <?php if(userCan('users-manage')): ?>
        <section class="card content-wrap auto-height">
            <div class="flex-container-row gap-l items-center wrap">
                <div class="flex">
                    <h2 class="list-heading"><?php echo e(trans('preferences.profile_admin_options')); ?></h2>
                    <p class="text-small"><?php echo e(trans('preferences.profile_admin_options_desc')); ?></p>
                </div>
                <div class="text-m-right">
                    <a class="button outline" href="<?php echo e(user()->getEditUrl()); ?>"><?php echo e(trans('common.open')); ?></a>
                </div>
            </div>
        </section>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('users.account.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /app/www/resources/views/users/account/profile.blade.php ENDPATH**/ ?>