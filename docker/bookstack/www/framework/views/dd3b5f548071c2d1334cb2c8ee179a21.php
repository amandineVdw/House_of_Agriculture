<?php $__env->startSection('card'); ?>
    <h1 id="registration" class="list-heading"><?php echo e(trans('settings.reg_settings')); ?></h1>
    <form action="<?php echo e(url("/settings/registration")); ?>" method="POST">
        <?php echo csrf_field(); ?>

        <input type="hidden" name="section" value="registration">

        <div class="setting-list">
            <div class="grid half gap-xl">
                <div>
                    <label class="setting-list-label"><?php echo e(trans('settings.reg_enable')); ?></label>
                    <p class="small"><?php echo trans('settings.reg_enable_desc'); ?></p>
                </div>
                <div>
                    <?php echo $__env->make('form.toggle-switch', [
                        'name' => 'setting-registration-enabled',
                        'value' => setting('registration-enabled'),
                        'label' => trans('settings.reg_enable_toggle')
                    ], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>

                    <?php if(in_array(config('auth.method'), ['ldap', 'saml2', 'oidc'])): ?>
                        <div class="text-warn text-small mb-l"><?php echo e(trans('settings.reg_enable_external_warning')); ?></div>
                    <?php endif; ?>

                    <label for="setting-registration-role"><?php echo e(trans('settings.reg_default_role')); ?></label>
                    <select id="setting-registration-role" name="setting-registration-role"
                            <?php if($errors->has('setting-registration-role')): ?> class="neg" <?php endif; ?>>
                        <option value="0" <?php if(intval(setting('registration-role', '0')) === 0): ?> selected <?php endif; ?>>
                            -- <?php echo e(trans('common.none')); ?> --
                        </option>
                        <?php $__currentLoopData = \BookStack\Users\Models\Role::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $role): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($role->id); ?>"
                                    data-system-role-name="<?php echo e($role->system_name ?? ''); ?>"
                                    <?php if(intval(setting('registration-role', '0')) === $role->id): ?> selected <?php endif; ?>
                            >
                                <?php echo e($role->display_name); ?>

                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            </div>

            <div class="grid half gap-xl">
                <div>
                    <label for="setting-registration-restrict"
                           class="setting-list-label"><?php echo e(trans('settings.reg_confirm_restrict_domain')); ?></label>
                    <p class="small"><?php echo trans('settings.reg_confirm_restrict_domain_desc'); ?></p>
                </div>
                <div class="pt-xs">
                    <input type="text" id="setting-registration-restrict" name="setting-registration-restrict"
                           placeholder="<?php echo e(trans('settings.reg_confirm_restrict_domain_placeholder')); ?>"
                           value="<?php echo e(setting('registration-restrict', '')); ?>">
                </div>
            </div>

            <div class="grid half gap-xl">
                <div>
                    <label class="setting-list-label"><?php echo e(trans('settings.reg_email_confirmation')); ?></label>
                    <p class="small"><?php echo e(trans('settings.reg_confirm_email_desc')); ?></p>
                </div>
                <div>
                    <?php echo $__env->make('form.toggle-switch', [
                        'name' => 'setting-registration-confirmation',
                        'value' => setting('registration-confirmation'),
                        'label' => trans('settings.reg_email_confirmation_toggle')
                    ], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                </div>
            </div>

        </div>

        <div class="form-group text-right">
            <button type="submit" class="button"><?php echo e(trans('settings.settings_save')); ?></button>
        </div>
    </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('settings.layout', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH /app/www/resources/views/settings/categories/registration.blade.php ENDPATH**/ ?>