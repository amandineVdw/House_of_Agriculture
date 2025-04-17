
<?php if($authMethod === 'system' && $user->system_name == 'public'): ?>
    <p class="mb-none text-warn"><?php echo e(trans('settings.users_system_public')); ?></p>
<?php endif; ?>

<div class="pt-m">
    <label class="setting-list-label"><?php echo e(trans('settings.users_details')); ?></label>
    <?php if($authMethod === 'standard'): ?>
        <p class="small"><?php echo e(trans('settings.users_details_desc')); ?></p>
    <?php endif; ?>
    <?php if($authMethod === 'ldap' || $authMethod === 'system'): ?>
        <p class="small"><?php echo e(trans('settings.users_details_desc_no_email')); ?></p>
    <?php endif; ?>
    <div class="grid half mt-m gap-xl mb-l">
        <div>
            <label for="name"><?php echo e(trans('auth.name')); ?></label>
            <?php echo $__env->make('form.text', ['name' => 'name'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        </div>
        <div>
            <?php if($authMethod !== 'ldap' || userCan('users-manage')): ?>
                <label for="email"><?php echo e(trans('auth.email')); ?></label>
                <?php echo $__env->make('form.text', ['name' => 'email', 'disabled' => !userCan('users-manage')], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            <?php endif; ?>
        </div>
    </div>
    <div>
        <div class="form-group collapsible mb-none" component="collapsible" id="external-auth-field">
            <button refs="collapsible@trigger" type="button" class="collapse-title text-link" aria-expanded="false">
                <label for="external-auth"><?php echo e(trans('settings.users_external_auth_id')); ?></label>
            </button>
            <div refs="collapsible@content" class="collapse-content stretch-inputs">
                <p class="small"><?php echo e(trans('settings.users_external_auth_id_desc')); ?></p>
                <?php echo $__env->make('form.text', ['name' => 'external_auth_id'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
            </div>
        </div>
    </div>
</div>

<div>
    <label for="role" class="setting-list-label"><?php echo e(trans('settings.users_role')); ?></label>
    <p class="small"><?php echo e(trans('settings.users_role_desc')); ?></p>
    <div class="mt-m">
        <?php echo $__env->make('form.role-checkboxes', ['name' => 'roles', 'roles' => $roles], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
    </div>
</div>

<?php if($authMethod === 'standard'): ?>
    <div component="new-user-password">
        <label class="setting-list-label"><?php echo e(trans('settings.users_password')); ?></label>

        <?php if(!isset($model)): ?>
            <p class="small">
                <?php echo e(trans('settings.users_send_invite_text')); ?>

            </p>

            <?php echo $__env->make('form.toggle-switch', [
                'name' => 'send_invite',
                'value' => old('send_invite', 'true') === 'true',
                'label' => trans('settings.users_send_invite_option')
            ], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
        <?php endif; ?>

        <div refs="new-user-password@input-container" <?php if(!isset($model)): ?> style="display: none;" <?php endif; ?>>
            <p class="small mb-none"><?php echo e(trans('settings.users_password_desc')); ?></p>
            <?php if(isset($model)): ?>
                <p class="small">
                    <?php echo e(trans('settings.users_password_warning')); ?>

                </p>
            <?php endif; ?>
            <div class="grid half mt-m gap-xl">
                <div>
                    <label for="password"><?php echo e(trans('auth.password')); ?></label>
                    <?php echo $__env->make('form.password', ['name' => 'password', 'autocomplete' => 'new-password'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                </div>
                <div>
                    <label for="password-confirm"><?php echo e(trans('auth.password_confirm')); ?></label>
                    <?php echo $__env->make('form.password', ['name' => 'password-confirm'], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?>
                </div>
            </div>
        </div>

    </div>
<?php endif; ?>
<?php /**PATH /app/www/resources/views/users/parts/form.blade.php ENDPATH**/ ?>