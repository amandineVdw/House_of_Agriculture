<?php $__env->startSection('body'); ?>
    <div class="container small">

        <?php echo $__env->make('settings.parts.navbar', ['selected' => 'users'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

        <section class="card content-wrap">
            <h1 class="list-heading"><?php echo e($user->id === user()->id ? trans('settings.users_edit_profile') : trans('settings.users_edit')); ?></h1>
            <form action="<?php echo e(url("/settings/users/{$user->id}")); ?>" method="post" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>

                <input type="hidden" name="_method" value="PUT">

                <div class="setting-list">
                    <?php echo $__env->make('users.parts.form', ['model' => $user, 'authMethod' => $authMethod], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

                    <div class="grid half gap-xl">
                        <div>
                            <label for="user-avatar"
                                   class="setting-list-label"><?php echo e(trans('settings.users_avatar')); ?></label>
                            <p class="small"><?php echo e(trans('settings.users_avatar_desc')); ?></p>
                        </div>
                        <div>
                            <?php echo $__env->make('form.image-picker', [
                                'resizeHeight' => '512',
                                'resizeWidth' => '512',
                                'showRemove' => false,
                                'defaultImage' => url('/user_avatar.png'),
                                'currentImage' => $user->getAvatar(80),
                                'currentId' => $user->image_id,
                                'name' => 'profile_image',
                                'imageClass' => 'avatar large'
                            ], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                        </div>
                    </div>

                    <?php if(!$user->isGuest()): ?>
                        <?php echo $__env->make('users.parts.language-option-row', ['value' => old('language') ?? $user->getLocale()->appLocale()], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                    <?php endif; ?>
                </div>

                <div class="text-right">
                    <a href="<?php echo e(url("/settings/users")); ?>"
                       class="button outline"><?php echo e(trans('common.cancel')); ?></a>
                    <?php if($authMethod !== 'system'): ?>
                        <a href="<?php echo e(url("/settings/users/{$user->id}/delete")); ?>"
                           class="button outline"><?php echo e(trans('settings.users_delete')); ?></a>
                    <?php endif; ?>
                    <button class="button" type="submit"><?php echo e(trans('common.save')); ?></button>
                </div>
            </form>
        </section>

        <section class="card content-wrap auto-height">
            <h2 class="list-heading"><?php echo e(trans('settings.users_mfa')); ?></h2>
            <p class="text-small"><?php echo e(trans('settings.users_mfa_desc')); ?></p>
            <div class="grid half gap-xl v-center pb-s">
                <div>
                    <?php if($mfaMethods->count() > 0): ?>
                        <span class="text-pos"><?php echo (new \BookStack\Util\SvgIcon('check-circle'))->toHtml(); ?></span>
                    <?php else: ?>
                        <span class="text-neg"><?php echo (new \BookStack\Util\SvgIcon('cancel'))->toHtml(); ?></span>
                    <?php endif; ?>
                    <?php echo e(trans_choice('settings.users_mfa_x_methods', $mfaMethods->count())); ?>

                </div>
                <div class="text-m-right">
                    <?php if($user->id === user()->id): ?>
                        <a href="<?php echo e(url('/mfa/setup')); ?>"
                           class="button outline"><?php echo e(trans('settings.users_mfa_configure')); ?></a>
                    <?php endif; ?>
                </div>
            </div>

        </section>

        <?php if(count($activeSocialDrivers) > 0): ?>
            <section class="card content-wrap auto-height">
                <div class="flex-container-row items-center justify-space-between wrap">
                    <h2 class="list-heading"><?php echo e(trans('settings.users_social_accounts')); ?></h2>
                    <div>
                        <?php if(user()->id === $user->id): ?>
                            <a class="button outline" href="<?php echo e(url('/my-account/auth#social-accounts')); ?>"><?php echo e(trans('common.manage')); ?></a>
                        <?php endif; ?>
                    </div>
                </div>
                <p class="text-muted text-small"><?php echo e(trans('settings.users_social_accounts_desc')); ?></p>
                <div class="container">
                    <div class="grid third">
                        <?php $__currentLoopData = $activeSocialDrivers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $driver => $driverName): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="text-center mb-m">
                                <div role="presentation"><?php echo (new \BookStack\Util\SvgIcon('auth/'. $driver, ['style' => 'width: 56px;height: 56px;']))->toHtml(); ?></div>
                                <p class="my-none bold"><?php echo e($driverName); ?></p>
                                <?php if($user->hasSocialAccount($driver)): ?>
                                    <p class="text-pos bold text-small my-none"><?php echo e(trans('settings.users_social_status_connected')); ?></p>
                                <?php else: ?>
                                    <p class="text-neg bold text-small my-none"><?php echo e(trans('settings.users_social_status_disconnected')); ?></p>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </section>
        <?php endif; ?>

        <?php echo $__env->make('users.api-tokens.parts.list', ['user' => $user, 'context' => 'settings'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.simple', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /app/www/resources/views/users/edit.blade.php ENDPATH**/ ?>