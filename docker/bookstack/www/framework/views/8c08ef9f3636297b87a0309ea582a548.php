<?php $__env->startSection('main'); ?>

    <?php if($authMethod === 'standard'): ?>
        <section class="card content-wrap auto-height">
            <form action="<?php echo e(url('/my-account/auth/password')); ?>" method="post">
                <?php echo e(method_field('put')); ?>

                <?php echo e(csrf_field()); ?>


                <h2 class="list-heading"><?php echo e(trans('preferences.auth_change_password')); ?></h2>

                <p class="text-muted text-small">
                    <?php echo e(trans('preferences.auth_change_password_desc')); ?>

                </p>

                <div class="grid half mt-m gap-xl wrap stretch-inputs mb-m">
                    <div>
                        <label for="password"><?php echo e(trans('auth.password')); ?></label>
                        <?php echo $__env->make('form.password', ['name' => 'password', 'autocomplete' => 'new-password'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                    </div>
                    <div>
                        <label for="password-confirm"><?php echo e(trans('auth.password_confirm')); ?></label>
                        <?php echo $__env->make('form.password', ['name' => 'password-confirm'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                    </div>
                </div>

                <div class="form-group text-right">
                    <button class="button"><?php echo e(trans('common.update')); ?></button>
                </div>

            </form>
        </section>
    <?php endif; ?>

    <section class="card content-wrap auto-height items-center flex-container-row gap-m gap-x-l wrap justify-space-between">
        <div class="flex-min-width-m">
            <h2 class="list-heading"><?php echo e(trans('settings.users_mfa')); ?></h2>
            <p class="text-muted text-small"><?php echo e(trans('settings.users_mfa_desc')); ?></p>
            <p class="text-muted">
                <?php if($mfaMethods->count() > 0): ?>
                    <span class="text-pos"><?php echo (new \BookStack\Util\SvgIcon('check-circle'))->toHtml(); ?></span>
                <?php else: ?>
                    <span class="text-neg"><?php echo (new \BookStack\Util\SvgIcon('cancel'))->toHtml(); ?></span>
                <?php endif; ?>
                <?php echo e(trans_choice('settings.users_mfa_x_methods', $mfaMethods->count())); ?>

            </p>
        </div>
        <div class="text-right">
            <a href="<?php echo e(url('/mfa/setup')); ?>"
               class="button outline"><?php echo e(trans('common.manage')); ?></a>
        </div>
    </section>

    <?php if(count($activeSocialDrivers) > 0): ?>
        <section id="social-accounts" class="card content-wrap auto-height">
            <h2 class="list-heading"><?php echo e(trans('settings.users_social_accounts')); ?></h2>
            <p class="text-muted text-small"><?php echo e(trans('settings.users_social_accounts_info')); ?></p>
            <div class="container">
                <div class="grid third">
                    <?php $__currentLoopData = $activeSocialDrivers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $driver => $enabled): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="text-center mb-m">
                            <div role="presentation"><?php echo (new \BookStack\Util\SvgIcon('auth/'. $driver, ['style' => 'width: 56px;height: 56px;']))->toHtml(); ?></div>
                            <div>
                                <?php if(user()->hasSocialAccount($driver)): ?>
                                    <form action="<?php echo e(url("/login/service/{$driver}/detach")); ?>" method="POST">
                                        <?php echo e(csrf_field()); ?>

                                        <button aria-label="<?php echo e(trans('settings.users_social_disconnect')); ?> - <?php echo e($driver); ?>"
                                                class="button small outline"><?php echo e(trans('settings.users_social_disconnect')); ?></button>
                                    </form>
                                <?php else: ?>
                                    <a href="<?php echo e(url("/login/service/{$driver}")); ?>"
                                       aria-label="<?php echo e(trans('settings.users_social_connect')); ?> - <?php echo e($driver); ?>"
                                       class="button small outline"><?php echo e(trans('settings.users_social_connect')); ?></a>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </section>
    <?php endif; ?>

    <?php if(userCan('access-api')): ?>
        <?php echo $__env->make('users.api-tokens.parts.list', ['user' => user(), 'context' => 'my-account'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('users.account.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /app/www/resources/views/users/account/auth.blade.php ENDPATH**/ ?>